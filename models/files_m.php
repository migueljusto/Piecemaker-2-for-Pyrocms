<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author 		Miguel Justo - Mj web designer
 * @package 	PyroCMS
 * @subpackage 	Piecemaker Module
 * @category 	Modules
 * @license 	Apache License v2.0
 */
class Files_m extends MY_Model {

	/**
	 * Get all galleries along with the total number of photos in each gallery
	 *
	 * @author Yorick Peterse - PyroCMS Dev Team
	 * @access public
	 * @return mixed
	 */
	 	
	// GET All Files In Piecemaker X
	public function get_files($id_piecemaker)
  	{
		$query = $this->db->get_where('piecemaker', array('id' => $id_piecemaker));
	
    	
    	return  $query->row();
  	}
	
	// GET single File
	public function get_file($id_file)
  	{

		$query = $this->db->get_where('piecemaker_files', array('id_file' => $id_file));
    	
    	return $query->row();	
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
	
	
	
	
	public function update_file($new,$id)
	{
		$data = array(
               'files' => serialize($new)
			   
            );

		$this->db->where('id', $id);
		return $this->db->update('piecemaker', $data); 
    	
		
	}
	
	
	

public function insert_file($input)
	{
		$this->load->helper('date');	
		
	
	    $query = $this->db->get_where('piecemaker', array('id' => $input['id_piecemaker']));
		
		$result = $query->row();
		
		$files = unserialize($result->files);
		
		$count = 0;
		
		if (count($files)>>''){
			
		$count=count($files);
		
		
		}
		
		$files['file_'.$count.''] = array('title' => $input['title'], 
										  'info' => isset($input['info']) ? $input['info'] : '', 
										  'file_type'=> $input['file_type'],
										  'file_name'=>  $input['file'],
									      'background' => isset($input['file_background']) ? $input['file_background'] : '', 
										  'autoplay' =>  isset($input['video_autoplay']) ? $input['video_autoplay'] : '0', 
										  'created_on'=>  now()
											);
		
		
		
		$data = array(
               'files' => serialize($files)
			   
            );

		$this->db->where('id', $input['id_piecemaker']);
		return  $this->db->update('piecemaker', $data); 
		
	}
	
	




	
	
	public function delete_file($id)
	{
		$this->db->delete('piecemaker_files', array('id_file' => $id));
		
		return $id;
    	
		
	}
	
	
	


}