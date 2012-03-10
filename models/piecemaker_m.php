<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * The galleries module enables users to create albums, upload photos and manage their existing albums.
 *
 * @author 		Yorick Peterse - PyroCMS Dev Team
 * @package 	PyroCMS
 * @subpackage 	Gallery Module
 * @category 	Modules
 * @license 	Apache License v2.0
 */
class Piecemaker_m extends MY_Model {

	/**
	 * Get all galleries along with the total number of photos in each gallery
	 *
	 * @author Yorick Peterse - PyroCMS Dev Team
	 * @access public
	 * @return mixed
	 */
	public function get_piecemakers()
	{
		 $results = $this->db->get('piecemaker');	
							 				 
		// Return the results
		return $results->result();
	}
	
	
	// GET All Files In Piecemaker X
	public function get_files($id_piecemaker)
  	{
		$this->db->order_by('file_order', 'asc');
		$query = $this->db->get_where('piecemaker_files', array('id_piecemaker' => $id_piecemaker));
    	
    	return $query->result();	
  	}
	
	// GET single File
	public function get_file($id_file)
  	{

		$query = $this->db->get_where('piecemaker_files', array('id_file' => $id_file));
    	
    	return $query->row();	
  	}
	
	public function get_piecemaker($id)
  	{
		$query = $this->db->get_where('piecemaker', array('id' => $id));
		
		$result = $query->row();
		
		$result->files = unserialize($result->files);
		
		$result->settings = unserialize($result->settings);
		
		$result->transitions = unserialize($result->transitions);
    	
    	return $result;
  	}
	
	
	public function update_order($id, $i)
  	{
		$data = array(
               'file_order' => $i
			   
            );

		$this->db->where('id_file', $id);
		$query = $this->db->update('piecemaker_files', $data); 

		
    	
    	return $query;
    	
  	}
	
	
	
	
	public function update($input)
  	{
		$data = array(
               'id_file'		=> $input['id_file'],
			   'title'		    => $input['title'],
			   'description'   => $input['description'],
			   
            );

		$this->db->where('id', $input['id']);
		$query = $this->db->update('slider_gallery', $data); 

		
    	
    	return $query;
    	
  	}
	
	
	
	
	public function delete_piecemaker($id)
	{
	 	
	 return $this->db->delete('piecemaker', array('id' => $id));	
		
	}

	
	 
	public function insert($input)
	{
		$this->load->helper('date');	
		
		
		
		$files = 'a:0:{}';
		
		$settings  = array(
								'image_width' 			=> $input['image_width'], 
								'image_height' 			=> $input['image_height'], 
								'loader_color'			=> $input['loader_color'],
								'inner_side_color'		=> $input['inner_side_color'], 
								'side_shadow_alpha' 	=> $input['side_shadow_alpha'], 
								'drop_shadow_alpha' 	=> $input['drop_shadow_alpha'], 
								'drop_shadow_distance'  => $input['drop_shadow_distance'], 
								'drop_shadow_scale' 	=> $input['drop_shadow_scale'], 
								'drop_shadow_blur_x' 	=> $input['drop_shadow_blur_x'], 
								'drop_shadow_blur_y' 	=> $input['drop_shadow_blur_y'], 
								'menu_distance_x' 		=> $input['menu_distance_x'], 
								'menu_distance_y' 		=> $input['menu_distance_y'], 
								'menu_color_1' 			=> $input['menu_color_1'], 
								'menu_color_2' 			=> $input['menu_color_2'], 
								'menu_color_3' 			=> $input['menu_color_3'], 
								'control_size' 			=> $input['control_size'], 
								'control_distance' 		=> $input['control_distance'], 
								'control_color_1' 		=> $input['control_color_1'],
								'control_color_2' 		=> $input['control_color_2'],
								'control_alpha' 		=> $input['control_alpha'],
								'control_alpha_over' 	=> $input['control_alpha_over'],
								'controls_x' 			=> $input['controls_x'],
								'controls_y' 			=> $input['controls_y'],
								'controls_align' 		=> $input['controls_align'],
								'tooltip_height'	 	=> $input['tooltip_height'],
								'tooltip_color' 		=> $input['tooltip_color'],
								'tooltip_text_y' 		=> $input['tooltip_text_y'],
								'tooltip_text_style' 	=> $input['tooltip_text_style'],
								'tooltip_text_color' 	=> $input['tooltip_text_color'],
								'tooltip_margin_left'	=> $input['tooltip_margin_left'],
								'tooltip_margin_right' 	=> $input['tooltip_margin_right'],
								'tooltip_text_sharpness'=> $input['tooltip_text_sharpness'],
								'tooltip_text_thickness'=> $input['tooltip_text_thickness'],
								'info_width' 			=> $input['info_width'],
								'info_background' 		=> $input['info_background'],
								'info_background_alpha' => $input['info_background_alpha'],
								'info_margin' 			=> $input['info_margin'],
								'info_sharpness' 		=> $input['info_sharpness'],
								'info_thickness' 		=> $input['info_thickness'],
								'autoplay' 				=> $input['autoplay'],
								'field_of_view'			=> $input['field_of_view']//last item
								);
		
		$transitions = array(
							'transition_0' => array(
													'pieces' 		=> "3", 
													'time_cube' 	=> "1.2", 
													'transition'	=> "easeInOutBack",
													'delay'			=> "0.1", 
													'depth_offset' 	=> "300", 
													'cube_distance' => "30"
													), 
							'transition_1' => array(
													'pieces' 		=> "9", 
													'time_cube' 	=> "1.2", 
													'transition'	=> "easeInOutBack",
													'delay'			=> "0.1", 
													'depth_offset' 	=> "300", 
													'cube_distance' => "30"
													)
							);
		
		
		
		$query = array(
			'title'		    => $input['title'],
			'description'   => $input['description'],
			'files'	        => $files,
			'settings'	    => serialize($settings),
			'transitions'	=> serialize($transitions),
			'created_on' 	=> now()
		);
		
		
		$this->db->insert('piecemaker', $query);
		
		return $this->db->insert_id();
    	
		
	}
	
	public function update_settings($input, $id)
	{
		
		$settings_piece = array(
								'image_width' 			=> $input['image_width'], 
								'image_height' 			=> $input['image_height'], 
								'loader_color'			=> $input['loader_color'],
								'inner_side_color'		=> $input['inner_side_color'], 
								'side_shadow_alpha' 	=> $input['side_shadow_alpha'], 
								'drop_shadow_alpha' 	=> $input['drop_shadow_alpha'], 
								'drop_shadow_distance'  => $input['drop_shadow_distance'], 
								'drop_shadow_scale' 	=> $input['drop_shadow_scale'], 
								'drop_shadow_blur_x' 	=> $input['drop_shadow_blur_x'], 
								'drop_shadow_blur_y' 	=> $input['drop_shadow_blur_y'], 
								'menu_distance_x' 		=> $input['menu_distance_x'], 
								'menu_distance_y' 		=> $input['menu_distance_y'], 
								'menu_color_1' 			=> $input['menu_color_1'], 
								'menu_color_2' 			=> $input['menu_color_2'], 
								'menu_color_3' 			=> $input['menu_color_3'], 
								'control_size' 			=> $input['control_size'], 
								'control_distance' 		=> $input['control_distance'], 
								'control_color_1' 		=> $input['control_color_1'],
								'control_color_2' 		=> $input['control_color_2'],
								'control_alpha' 		=> $input['control_alpha'],
								'control_alpha_over' 	=> $input['control_alpha_over'],
								'controls_x' 			=> $input['controls_x'],
								'controls_y' 			=> $input['controls_y'],
								'controls_align' 		=> $input['controls_align'],
								'tooltip_height'	 	=> $input['tooltip_height'],
								'tooltip_color' 		=> $input['tooltip_color'],
								'tooltip_text_y' 		=> $input['tooltip_text_y'],
								'tooltip_text_style' 	=> $input['tooltip_text_style'],
								'tooltip_text_color' 	=> $input['tooltip_text_color'],
								'tooltip_margin_left'	=> $input['tooltip_margin_left'],
								'tooltip_margin_right' 	=> $input['tooltip_margin_right'],
								'tooltip_text_sharpness'=> $input['tooltip_text_sharpness'],
								'tooltip_text_thickness'=> $input['tooltip_text_thickness'],
								'info_width' 			=> $input['info_width'],
								'info_background' 		=> $input['info_background'],
								'info_background_alpha' => $input['info_background_alpha'],
								'info_margin' 			=> $input['info_margin'],
								'info_sharpness' 		=> $input['info_sharpness'],
								'info_thickness' 		=> $input['info_thickness'],
								'autoplay' 				=> $input['autoplay'],
								'field_of_view'			=> $input['field_of_view']//last item
								);
		
		
		
		
		
		$query = array(
			'title'		    => $input['title'],
			'description'   => $input['description'],
			'settings'	    => serialize($settings_piece),
		);
		
		$this->db->where('id', $id);
		
		
		return $this->db->update('piecemaker', $query);
    	
		
	}
	
	
	
	public function insert_transition($input)
	{
		
		$query = $this->db->get_where('piecemaker', array('id' => $input['id_piecemaker']));
		
		$result = $query->row();
		
		$transitions = unserialize($result->transitions);
		
		$count=0;
		
		if(count($transitions)>>0){
		$count=count($transitions);
		}
		
		$transitions['transition_'.$count.''] = array('pieces' 		 => $input['pieces'], 
											 		  'time_cube'    => $input['time_cube'], 
											 		  'transition'	 => $input['transition'],
											 		  'delay'		 => $input['delay'], 
											 		  'depth_offset' => $input['depth_offset'], 
											 		  'cube_distance'=> $input['cube_distance']
											);
		
		
		
		$data = array(
               'transitions' => serialize($transitions)
			   
            );

		$this->db->where('id', $input['id_piecemaker']);
		return  $this->db->update('piecemaker', $data); 
    	
		
	}
	public function update_transition($new,$id)
	{
		$data = array(
               'transitions' => serialize($new)
			   
            );

		$this->db->where('id', $id);
		return $this->db->update('piecemaker', $data); 
    	
		
	}
	
	
	
	public function update_files($new , $id)
	{
		$data = array(
               'files' => serialize($new)
			   
            );

		$this->db->where('id', $id);
		return $this->db->update('piecemaker', $data); 
    	
		
	}
	

public function create_thumb($source_file)
	{
					$config['image_library'] = 'gd2';
					$config['source_image']	= $source_file;
					$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width']	 = 100;
					$config['height']	= 100;
					

					$this->load->library('image_lib', $config); 

					
		
		return $this->image_lib->resize();
    	
		
	}
	
	
	


}