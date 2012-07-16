<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Galleries Plugin
 *
 * Create a list of images and show slider
 *
 * @package		PyroCMS
 * @author		Miguel Justo - http:// migueljusto.net
 *
 */
class Plugin_Piecemaker extends Plugin
{
	/**
	 * Image List
	 * 
	 * Creates a list of gallery images
	 * 
	 * Usage:
	 * 
	 * {pyro:galleries:images slug="nature" limit="5"}
	 * 	<a href="{pyro:url:base}galleries/{gallery_slug}/{id}" title="{name}">
	 * 		<img src="{pyro:url:base}files/thumb/{file_id}/75/75" alt="{description}"/>
	 * 	</a>
	 * {/pyro:galleries:images}
	 * 
	 * The following is a list of tags that are available to use from this method
	 * 
	 * 	{file_id}
	 * 	{name}
	 * 	{filename}
	 * 	{description}
	 * 	{extension}
	 * 
	 * @return	array
	 */ 
	function slider()
	{
		$this->config->load('config');	
		$this->load->model('piecemaker_m');
		
		
		
		if  ($this->attribute('slug')!=''){
			$data['id']=$this->attribute('slug');
		} else {
			$data['id']  = $this->attribute('id');
		}
		
		
		
		$return = $this->piecemaker_m->get_piecemaker($data['id']);
		
		If ($return) {
		$settings = $return->settings;
		
		/* Add 10% to the user image width and height */
		$default_width = $return->settings['image_width'] + 100;
		$default_height = $return->settings['image_height'] + 100;
		
		$data['width']= @$this->attribute('width') == '' ?  $default_width : $this->attribute('width');
		$data['height']=@$this->attribute('height') == '' ? $default_height : $this->attribute('height'); 
		
		
		 	
			// add path to module assets
			Asset::add_path('piecemaker', ''.$this->config->item('addon_path').'modules/piecemaker/');
	
			$this->template->append_js(array(
				'piecemaker::swfobject/swfobject.js',
			));
		
		
		$data['piecemaker_css_path']=base_url().$this->config->item('addon_path').'modules/piecemaker/css/piecemaker.css';
		$data['piecemaker_swf_path']=base_url().$this->config->item('addon_path').'modules/piecemaker/js/piecemaker.swf';
		
		
		return $this->module_view('piecemaker', 'piecemaker_view', $data);
		}
		
		
	}

	
}

/* End of file plugin.php */