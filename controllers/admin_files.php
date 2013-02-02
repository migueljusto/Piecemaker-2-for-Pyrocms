<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * The Piecemaker Manager module enables users to create piecemakers, upload files and manage their existing files, transitions and settings.
 *
 * @author 		Miguel Justo - Mj Web Designs - http://migueljusto.net
 * @package 	PyroCMS
 * @subpackage 	Piecemaker 2 Manager Module
 * @category 	Modules
 */
class Admin_files extends Admin_Controller
{
	public $id = 0;
	
	private $_path 		= '';

	/**
	 * Validation rules for add a new file
	 *
	 * @var array
	 * @access private
	 */
	private $files_validation_rules = array(
	    array(
	 		'field' => 'file_type',
			'label' => 'lang:piecemaker.type_file_label',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'title',
			'label' => 'lang:piecemaker.title_label',
			'rules' => 'trim|max_length[30]|required'
		),
		array(
			'field' => 'file',
			'label' => 'lang:piecemaker.file_label',
			'rules' => ''
		),
		array(
			'field' => 'file_background',
			'label' => 'lang:piecemaker.file_label',
			'rules' => 'trim'
		),
		
		array(
			'field' => 'info',
			'label' => 'lang:piecemaker.info_label',
			'rules' => 'trim'
		),
		array(
			'field' => 'autoplay',
			'label' => 'lang:piecemaker.autoplay_label',
			'rules' => 'trim'
		)
	);
	

	

	/**
	 * Constructor method
	 */
	public function __construct()
	{
		parent::__construct();

		$this->config->load('piecemaker/config');	
		// Load all the required classes

		$this->load->model('piecemaker_m');
		
		$this->lang->load('piecemaker');
		
		$this->load->library('form_validation');
		

		$this->_path = $this->config->item('files_folder');
	 
		
	}


	/**
	 * List all existing piecemakers
	 */
	public function files($id_piecemaker)
	{
		
	    $this->template->active_section = 'files';
		
		$return = $this->piecemaker_m->get_piecemaker($id_piecemaker);
		
		$files = $return->files;
		
		$settings = $return->settings;
		
		$piecemaker = $return;
		
		
		// Load the view
		$this->template
			->title($this->module_details['name'])
			->append_css('module::admin-piecemaker.css')
		    ->append_js('module::admin/files.js')
			->set('piecemaker',$piecemaker)
			->set('files',$files)
			->set('settings',$settings)
			->set('upload_path',base_url().$this->config->item('files_folder'))
			->build('admin/files/files');
	}
	
	
	
	
	
	// Add Files to Piecemaker
	
	public function add_file($id_piecemaker)
	{
	
		$this->template->active_section = 'files';

	
		// Set the validation rules
		$this->form_validation->set_rules($this->files_validation_rules);
		
		if ($this->form_validation->run() )
		{
			
			
		 $data = $this->input->post();
	
			 
		if ( ! empty($_FILES['file']['name'])){
					

					if ( !  $this->piecemaker_m->upload_file('file',$this->input->post('file_type')))
					{	
						
						$status		= 'error';
						$message	= $this->upload->display_errors();

						$this->session->set_flashdata($status, $message);
					 
						
					}else{
						
						
						$result_data = $this->upload->data();
						// pass the attachment info to the email event
						$data['file']= $result_data['file_name'];
						
						
					}
		}// End if Image exist	
					
		
		if ( ! empty($_FILES['file_background']['name'])){
							
		
							if ( ! $this->piecemaker_m->upload_file('file_background','img'))
							{
								
								$status		= 'error';
								$message	= $this->upload->display_errors();

								$this->session->set_flashdata($status, $message);
					
							}else{
						
								$result_data = $this->upload->data();
						
								$data['file_background']= $result_data['file_name'];

							}
				
		 }// End if Background image exist	
					
				
				
				
				if ($this->piecemaker_m->insert_file($data))
					{
						// Everything went ok..
						$this->session->set_flashdata('success', lang('piecemaker.add_file_success'));

						// Redirect back to the form or main page
						$this->input->post('btnAction') == 'save_exit'
						? redirect('piecemaker/admin_files/files/'.$this->input->post('id_piecemaker'))
						: redirect('piecemaker/admin_files/add_file/' . $this->input->post('id_piecemaker'));
					 }
			
					// Something went wrong on db insert..
					else
					{
						$this->session->set_flashdata('error', lang('piecemaker.add_file_error'));
						redirect('piecemaker/admin_files/add_file/'.$this->input->post('id_piecemaker'));
					}
	
		
	
		}
	
		// Required for validation
		foreach ($this->files_validation_rules as $rule)
		{
			$file["{$rule['field']}"] = $this->input->post($rule['field']);
		}
		
		
		$return = $this->piecemaker_m->get_piecemaker($id_piecemaker);
		$this->data->piecemaker = $return;
		$settings = $return->settings;
		
	
		$this->template
			->title($this->module_details['name'], lang('piecemaker.new_file_label'))
			->append_metadata( $this->load->view('fragments/wysiwyg', $this->data, TRUE) )
			->append_js('module::admin/files.js', 'piecemaker')
			->append_css('module::admin-piecemaker.css', 'piecemaker')
			->set('file',$file)
			->set('id_piecemaker',$id_piecemaker)
			->set('settings',$settings)
			->build('admin/files/form',$this->data);
			
		
		
	
	}
	
	
	
	// Edit Piecemaker Files 
	public function edit_file($id_piecemaker,$id_file)
	{
		
		// Set the validation rules
		$this->form_validation->set_rules($this->files_validation_rules);
		
		if ($this->form_validation->run() )
		{
	
		    $data = $this->input->post();
	
			//get old data
			$return = $this->piecemaker_m->get_piecemaker($id_piecemaker);
		
	   		$files = $return->files;
				 
			if ( ! empty($_FILES['file']['name'])){
	
				
				// Upload File
				if ( !$this->piecemaker_m->upload_file('file',$this->input->post('file_type')))
				{	
						
						$status		= 'error';
						$message	= $this->upload->display_errors('file');
					 
						$this->session->set_flashdata($status, $message);
				}else{
						
						
						$result_data = $this->upload->data();
						// pass the attachment info to the email event
						$data['file']= $result_data['file_name'];
						
						
						
						
						//delete old file
						@unlink($this->_path.$files['file_'.$this->input->post('id_file').'']['file_name']);
					
						if ($files['file_'.$this->input->post('id_file').'']['file_type']=='img'){
	
							//delete old file thumb	
							$file_x = $files['file_'.$this->input->post('id_file').'']['file_name'];
				   			$info = pathinfo($file_x);
				    		$file_name =  basename($file_x,'.'.$info['extension']);
								 
			       			$image_thumb = increment_string( $file_name, '_', 'thumb.'.$info['extension']); 
	
							@unlink($this->_path.$image_thumb);
			
						}
						
						
				}// end if upload ok
			} // end if new file
			
			
			// If new Background image
			if ( ! empty($_FILES['file_background']['name'])){
					
							// Upload File
							if ( !$this->piecemaker_m->upload_file('file_background','img'))
							{
								
								$status		= 'error';
								$message	= $this->upload->display_errors();

								$this->session->set_flashdata($status, $message);
	
							}else{
	
								$result_data = $this->upload->data();
						
	
								$data['file_background']= $result_data['file_name'];
								
								
								
								//delete old file
								@unlink($this->_path.$files['file_'.$this->input->post('id_file').'']['background']);
								//delete old file thumb	
								$file_x = $files['file_'.$this->input->post('id_file').'']['background'];
				   		 		$info = pathinfo($file_x);
				    			$file_name =  basename($file_x,'.'.$info['extension']);
								 
			        			$image_thumb = increment_string( $file_name, '_', 'thumb.'.$info['extension']); 
	
								@unlink($this->_path.$image_thumb);
							
						
							}
					}	
				
				// set new file data
		 		$files['file_'.$this->input->post('id_file').'']=array(
		 														    'title' => $this->input->post('title'), 
											 		 				'info'  => $this->input->post('info'), 
											 		  				'file_type' => $this->input->post('file_type'),
																	'file_name' =>isset($data['file']) ? $data['file'] : $files['file_'.$this->input->post('id_file').'']['file_name'],
																	'background' =>isset($data['file_background']) ? $data['file_background'] : $files['file_'.$this->input->post('id_file').'']['background'],
											 		  				'autoplay'  => $this->input->post('autoplay'),
																	'created_on'  => $files['file_'.$this->input->post('id_file').'']['created_on']
																	);
		
		
				
		
		
					if ($this->piecemaker_m->update_files($files,$this->input->post('id_piecemaker')))
					{
						// Everything went ok..
						$this->session->set_flashdata('success', lang('piecemaker.update_file_success'));

						// Redirect back to the form or main page
						$this->input->post('btnAction') == 'save_exit'
						? redirect('piecemaker/admin_files/files/'.$this->input->post('id_piecemaker'))
						: redirect('piecemaker/admin_files/edit_file/'.$this->input->post('id_piecemaker').'/'. $this->input->post('id_file'));
					 }
			
					// Something went wrong on db insert..
					else
					{
						$this->session->set_flashdata('error', lang('piecemaker.update_file_error'));
						redirect('piecemaker/admin_files/edit_file/'.$this->input->post('id_piecemaker').'/'.$this->input->post('id_file'));
					}
					
	
		}
	
		// Required for validation
		foreach ($this->files_validation_rules as $rule)
		{
			$file["{$rule['field']}"] = $this->input->post($rule['field']);
		}
	
		$this->data->id_piecemaker = $id_piecemaker;
		
		$return = $this->piecemaker_m->get_piecemaker($id_piecemaker);
		
		
		
		$this->data->piecemaker = $return;
		
		
		$file = $return->files['file_'.$id_file.''];
		
		$this->data->id_file = $id_file;
		
		$settings = $return->settings;
		
		
		$this->template->active_section = 'files';
		
		$this->data->upload_path = base_url().$this->config->item('files_folder');
		
		$this->template
			->title($this->module_details['name'], lang('piecemaker.new_file_label'))
			->append_metadata( $this->load->view('fragments/wysiwyg', $this->data, TRUE) )
			->append_js('module::admin/files.js')
			->append_css('module::admin-piecemaker.css')
			->set('file',$file)
			->set('settings',$settings)
			->build('admin/files/form',$this->data);
			
	}
	
	

public function files_action()
	{
		$action = strtolower($this->input->post('btnAction'));
		

		if ($action)
		{
			// Get the id('s)
			$id_array = $this->input->post('action_to');

			// Call the action we want to do
			if (method_exists($this, $action))
			{
				
				$this->{$action}($id_array,$this->input->post('id_piecemaker'));
				
				
			}
		}

		redirect('piecemaker/admin_files/files/'.$this->input->post('id_piecemaker'));
	}	
	
	
	
	
	// Admin: Delete file/s piecemaker
	public function delete($ids, $id_piecemaker)
	{
		
		
		// Check for one
		$ids = ( ! is_array($ids)) ? array($ids) : $ids;

		// Go through the array of ids to delete
		$files_delete = array();
		
		
		 if ($return = $this->piecemaker_m->get_piecemaker($id_piecemaker)){
	
	      $files_old = $return->files;
		  
		  $new_files = array();
	  
		  // Go through the array of ids to delete
		  foreach ($ids as $id)
		  {	
				@unlink($this->_path.$files_old['file_'.$id.'']['file_name']);
				@unlink($this->_path.$files_old['file_'.$id.'']['background']);
				
				//delete tumbs
				if($files_old['file_'.$id.'']['file_type']=='img'){
					
					$file = $files_old['file_'.$id.'']['file_name'];
				    $info = pathinfo($file);
				    $file_name =  basename($file,'.'.$info['extension']);
								 
			        $image_thumb = increment_string( $file_name, '_', 'thumb.'.$info['extension']); 
	
					@unlink($this->_path.$image_thumb);
					
				}else{
				
					$file = $files_old['file_'.$id.'']['background'];
				    $info = pathinfo($file);
				    $file_name =  basename($file,'.'.$info['extension']);
								 
			        $image_thumb = increment_string( $file_name, '_', 'thumb.'.$info['extension']); 
	
					@unlink($this->_path.$image_thumb);
				}
				
				 unset($files_old['file_'.$id.'']);
		
				$files_delete[] = $id;
				
			
		  }	//END FOR
		  
		   // Order array
		  $i = 0;
		  foreach ($files_old as $key => $value )
		  {	
			$new_files['file_'.$i.''] = $files_old[$key];
			
			$i++;
		  }	
		  
		 }//
		
		

		// Some files have been deleted
		if ( ! empty($files_delete))
		{
			
			if ($this->piecemaker_m->update_files($new_files, $id_piecemaker))
			{
			
			(count($imagens) == 1)? $this->session->set_flashdata('success', sprintf(lang('piecemaker.delete_file_success'), $files_delete[0]))				/* Only deleting one file */
				: $this->session->set_flashdata('success', sprintf(lang('piecemaker.delete_multi_file_success'), implode(', #', $files_delete )));	/* Deleting multiple files */
			}
			// For some reason, none of them were deleted
			else
			{
			$this->session->set_flashdata('error', lang('piecemaker.delete_file_error'));
			}
		
		}

		// For some reason, none of them were deleted
		else
		{
			$this->session->set_flashdata('error', lang('piecemaker.delete_file_error'));
		}
		
		
		redirect('piecemaker/admin_files/files/'.$id_piecemaker);
	}
	

	
}
