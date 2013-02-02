<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Piecemaker Plugin
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
	 * Creates the piecemaker
	 * 
	 * Usage:
	 * 
	 * {{ piecemaker:slider id="(can be the id or slug)" width="960" height="460" }}
	 * 
	 * @return	array
	 */ 
	 
	 
	  public function __construct()
	{	
	    $this->config->load('piecemaker/config');	
		$this->load->model('piecemaker/piecemaker_m');
		
	
		// add path to module asset
		$dir=FCPATH.'addons/'.SITE_REF.'/modules/piecemaker';
		
		if(is_dir($dir))
		{
           Asset::add_path('piecemaker', ''.ADDONPATH.'modules/piecemaker/');   
        }
		else
		{
		   Asset::add_path('piecemaker', ''.SHARED_ADDONPATH.'modules/piecemaker/');
		}
	
	}
	function slider()
	{
		if  ($this->attribute('slug')!=''){
			$data['id']=$this->attribute('slug');
		} else {
			$data['id']  = $this->attribute('id');
		}
	
		$return = $this->piecemaker_m->get_piecemaker($data['id']);
		
		If ($return) 
		{
			$settings = $return->settings;
			
			/* Add 10% to the user image width and height */
			$default_width = $return->settings['image_width'] + 100;
			$default_height = $return->settings['image_height'] + 100;
			
			$data['width']= @$this->attribute('width') == '' ?  $default_width : $this->attribute('width');
			$data['height']=@$this->attribute('height') == '' ? $default_height : $this->attribute('height'); 
		
			
			return $this->module_view('piecemaker', 'piecemaker_view', $data);
		}
		
	}

	
}

/* End of file plugin.php */