<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package 		PyroCMS
 * @subpackage 		Piecemaker 2 Manager
 * @author			Miguel Justo - Mj Web Designs - http://migueljusto.net
 *
 * Show piecemaker on your site
 */

class Widget_Piecemaker extends Widgets
{
	public $title		= array(
		'en' => 'Piecemaker',
		'br' => 'Piecemaker',
		'pt' => 'Piecemaker'
	);
	public $description	= array(
		'en' => 'Display piecemaker slide show.',
		'br' => 'Mostra o piecemaker escolhido.',
		'pt' => 'Mostra o piecemaker escolhido.'
	);
	public $author		= 'Miguel Justo';
	public $website		= 'http://migueljusto.net/';
	public $version		= '1.0';
	
	
	public $fields = array(
		array(
			'field' => 'id',
			'label' => 'id Or slug',
			'rules' => 'required'
		),
		array(
			'field' => 'width',
			'label' => 'Width'
		),
		array(
			'field' => 'height',
			'label' => 'Height'
		)
		
	);
	
	
	public function form($options)
	{
		$this->load->model('piecemaker/piecemaker_m');
		
		If ($options['id']) {
		$return = $this->piecemaker_m->get_piecemaker($options['id']);
		
		
		$settings = $return->settings;
		
		/* Add 10% to the user image width and height */
		$default_width = $return->settings['image_width'] + 100;
		$default_height = $return->settings['image_height'] + 100;
		
		// option defaults
		!empty($options['width'])				OR $options['width'] = $default_width;
		!empty($options['height'])				OR $options['height'] = $default_height;
		
		}else{
		$options['width'] = '';
		$options['height'] = '';
		}
		
		
		// define the folder dropdown array
		$select_piece = array();
		$piecemakers = $this->piecemaker_m->get_piecemakers();
		foreach($piecemakers as $piece)
		{	
			$select_piece[$piece->id] = $piece->title.' - '.count(unserialize($piece->files)) ;
		}
		
		
		
		// return the good stuff
		return array(
			'options'	  => $options,
			'select_piece'=>$select_piece
		);
	}

	
	public function run($options)
	{
		$this->config->load('piecemaker/config');	
	
		// add path to module assets
		Asset::add_path('piecemaker', ''.$this->config->item('addon_path').'modules/piecemaker/');

		
			$this->template->append_js(array(
				'piecemaker::swfobject/swfobject.js',
			));
		
		return array(
			'options' => $options,
			'piecemaker_css_path' => base_url().$this->config->item('addon_path').'modules/piecemaker/css/piecemaker.css',
			'piecemaker_swf_path' => base_url().$this->config->item('addon_path').'modules/piecemaker/js/piecemaker.swf'
			
		);
	}	
}
