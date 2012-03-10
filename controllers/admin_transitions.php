<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * The Piecemaker module enables users to create piecemaker gallerys, and manage their existing settings.
 *
 * @author 		Miguel Justo - Mj web designer
 * @package 	PyroCMS
 * @subpackage 	Piecemaker Module
 * @category 	Modules
 * @license 	Apache License v2.0
 */
class Admin_transitions extends Admin_Controller
{
	
	/**
	 * Validation rules for add a new piecemaker transition
	 *
	 * @var array
	 * @access private
	 */
	private $transitions_validation_rules = array(
		array('field' => 'pieces','label'    => 'lang:piecemaker.pieces_label','rules' => 'trim|required'),
		array('field' => 'time_cube','label' => 'lang:piecemaker.time_label','rules' => 'trim|required'),
		array('field' => 'transition','label'=> 'lang:piecemaker.transition_label','rules' => 'trim|required'),
		array('field' => 'delay','label'     => 'lang:piecemaker.delay_label','rules' => 'trim|required'),
		array('field' => 'depth_offset','label'  => 'lang:piecemaker.depth_offset_label','rules' => 'trim|required'),
		array('field' => 'cube_distance','label' => 'lang:piecemaker.cube_distance_label','rules' => 'trim|required'),
		
	);
	
	
	/**
	 * Constructor method
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('piecemaker_m');
		
		$this->lang->load('piecemaker');
		
		$this->load->library('form_validation');
		

		$this->transitions_eff = array(
		
			'linear'        => array('linear' => 'Linear'),
			'Sine'          => array('easeInSine'    => 'Ease In Sine',
									 'easeOutSine'   => 'Ease Out Sine'),
			
			'Cubic'         => array('easeInCubic'   => 'Ease In Cubic',
									 'easeOutCubic'  => 'Ease Out Cubic',
									 'easeInOutCubic'=> 'Ease In Out Cubic',
									 'easeOutInCubic'=> 'Ease Out In Cubic'),
			'Quint'         => array('easeInQuint'   => 'Ease In Quint',
									 'easeOutQuint'  => 'Ease Out Quint',
									 'easeInOutQuint'=> 'Ease In Out Quint',
									 'easeOutInQuint'=> 'Ease Out In Quint'),
			'Circ'          => array('easeInCirc'    => 'Ease In Circ',
									 'easeOutCirc'   => 'Ease Out Circ',
									 'easeInOutCirc' => 'Ease In Out Circ',
									 'easeOutInCirc' => 'Ease Out In Circ'),	
			'Back'          => array('easeInBack'    => 'Ease In Back',
									 'easeOutBack'   => 'Ease Out Back',
									 'easeInOutBack' => 'Ease In Out Back',
									 'easeOutInBack' => 'Ease Out In Back'),
			'Quad'          => array('easeInQuad'   => 'Ease In Quad',
									 'easeOutQuad'   => 'Ease Out Quad',
									 'easeInOutQuad' => 'Ease In Out Quad',
									 'easeOutInQuad' => 'Ease Out In Quad'),
			'Quart'         => array('easeInQuart'   => 'Ease In Quart',
								     'easeOutQuar'   => 'Ease Out Quar',
									 'easeInOutQuart'=> 'Ease In Out Quart',
									 'easeOutInQuart'=> 'Ease Out In Quart'),
			'Expo'          => array('easeInExpo'    => 'Ease In Expo',
									 'easeInOutExpo' => 'Ease In Out Expo',
								     'easeInOutExpo' => 'Ease In Out Expo',
									 'easeOutInExpo' => 'Ease Out In Expo'),
			'Elastic'       => array('easeInElastic' => 'Ease In Elastic',
									 'easeOutElastic'=> 'Ease Out Elastic',
									 'easeInOutElastic'=>'Ease In Out Elastic',
									 'easeOutInElastic'=>'Ease Out In Elastic'),
			'Bounce'        => array('easeInBounce'   =>'Ease In Bounce',
									 'easeOutBounce'  =>'Ease Out Bounce',
									 'easeInOutBounce'=>'Ease In Out Bounce',
									 'easeOutInBounce'=>'Ease Out In Bounce')
		);
			
	}




// View Piecemaker Transitions
	public function transitions($id_piecemaker)
	{
		
	    $this->template->active_section = 'transitions';
		
		$return = $this->piecemaker_m->get_piecemaker($id_piecemaker);
		
		
		$this->data->piecemaker = $return;
		
		$this->data->transitions = $return->transitions;
		
		// Load the view
		$this->template
			->title($this->module_details['name'])
			->append_metadata(js('admin/transitions.js', 'piecemaker'))
			->build('admin/transitions/transitions',$this->data);
	}
	
	
	


public function add_transition($id_piecemaker)
	{
		
		$this->data->default_transition = array(
								'pieces' => '9', 
								'time_cube' => '1.2', 
								'transition' => 'easeInOutBack',
								'delay' => '0.1', 
								'depth_offset' => '300', 
								'cube_distance' => '30'
								);
		
	
		$this->data->transitions_eff = $this->transitions_eff;
		
		
		
		// Set the validation rules
		$this->form_validation->set_rules($this->transitions_validation_rules);
		
		
		if ($this->form_validation->run() )
		{
			if ($id = $this->piecemaker_m->insert_transition($this->input->post()))
			{
				// Everything went ok..
				$this->session->set_flashdata('success', lang('piecemaker.insert_transition_success'));

				// Redirect back to the form or main page
				$this->input->post('btnAction') == 'save_exit'
					? redirect('piecemaker/admin_transitions/transitions/'.$this->input->post('id_piecemaker'))
					: redirect('piecemaker/admin_transitions/add_transition/'.$this->input->post('id_piecemaker'));
			}
			
			// Something went wrong..
			else
			{
				$this->session->set_flashdata('error', lang('piecemaker.insert_transition_error'));
				redirect('piecemaker/admin_transitions/add_transition/'.$this->input->post('id_piecemaker'));
			}
		}else{
					
		// Required for validation
		foreach ($this->transitions_validation_rules as $rule)
		{
			$transition->{$rule['field']} = $this->input->post($rule['field']);
		}

	    $this->template->active_section = 'transitions';
		
		$return = $this->piecemaker_m->get_piecemaker($id_piecemaker);
		
		
		$this->data->piecemaker = $return;
		
		$this->data->transition = $transition;
		
		
		// Load the view
		$this->template
			->title($this->module_details['name'])
			->build('admin/transitions/form',$this->data);
		}
}




public function edit_transition($id_piecemaker,$id_trans)
	{
		
		
		
		//dropdown
		$this->data->transitions_eff = $this->transitions_eff;
		
		
		
		// Set the validation rules
		$this->form_validation->set_rules($this->transitions_validation_rules);
		
		
		if ($this->form_validation->run() )
		{
			
			$return = $this->piecemaker_m->get_piecemaker($id_piecemaker);
		
	   				 $transitions = $return->transitions;
		 $transitions['transition_'.$this->input->post('id_trans').'']=array(
		 														    'pieces'       => $this->input->post('pieces'), 
											 		 				'time_cube'    => $this->input->post('time_cube'), 
											 		  				'transition'   => $this->input->post('transition'),
											 		 				'delay'		   => $this->input->post('delay'), 
											 		  				'depth_offset' => $this->input->post('depth_offset'), 
											 		  				'cube_distance'=> $this->input->post('cube_distance')
																	);
		
			if ($id = $this->piecemaker_m->update_transition($transitions , $this->input->post('id_piecemaker')))
			{
				// Everything went ok..
				$this->session->set_flashdata('success', lang('piecemaker.update_transition_success'));

				// Redirect back to the form or main page
				$this->input->post('btnAction') == 'save_exit'
					? redirect('piecemaker/admin_transitions/transitions/'.$this->input->post('id_piecemaker'))
					: redirect('piecemaker/admin_transitions/edit_transition/'.$this->input->post('id_piecemaker').'/'.$this->input->post('id_trans'));
			}
			
			// Something went wrong..
			else
			{
				$this->session->set_flashdata('error', lang('piecemaker.update_transition_error'));
				redirect('piecemaker/admin_transitions/add_transition/'.$this->input->post('id_piecemaker'));
			}
		}else{
					
		// Required for validation
		foreach ($this->transitions_validation_rules as $rule)
		{
			$transition->{$rule['field']} = $this->input->post($rule['field']);
		}

	    $this->template->active_section = 'transitions';
		
		$return = $this->piecemaker_m->get_piecemaker($id_piecemaker);
		
		$this->data->default_transition = $return->transitions['transition_'.$id_trans.''];
										
		$this->data->piecemaker = $return;
		
		$transition->id = $id_trans;
		$this->data->transition = $transition;
		
		
		// Load the view
		$this->template
			->title($this->module_details['name'])
			->build('admin/transitions/form',$this->data);
		}
}
	
	


public function action()
	{
		$action = strtolower($this->input->post('btnAction'));
		

		
			// Get the id('s)
			$id_array = $this->input->post('action_to');

			// Call the action we want to do
			if (method_exists($this, $action))
			{
				
				$this->{$action}($id_array , $this->input->post('id_piecemaker'));
				
				
			}
		

		redirect('piecemaker/admin_transitions/transitions/'.$this->input->post('id_piecemaker'));
	}	







// Admin: Delete file/s piecemkaer
	public function delete($ids , $id_piecemaker)
	{
		
				
		// Check for one
		$ids = ( ! is_array($ids)) ? array($ids) : $ids;
		
        if ($return = $this->piecemaker_m->get_piecemaker($id_piecemaker)){
	
	      $transitions_old = $return->transitions;
		  
		  $new_trans = array();
	  
		  // Go through the array of ids to delete
		  foreach ($ids as $id)
		  {	
			 unset($transitions_old['transition_'.$id.'']);
		  }	
		  

		  // Order array
		  $i = 0;
		  foreach ($transitions_old as $key => $value )
		  {	
			$new_trans['transition_'.$i.''] = $transitions_old[$key];
			
			$i++;
		  }	
		  
		  
		}

		// Some comments have been deleted
		if ($this->piecemaker_m->update_transition($new_trans, $id_piecemaker))
		{
			 $this->session->set_flashdata('success', sprintf(lang('piecemaker.delete_transition_success'), $imagens[0]));				/* Only deleting one comment */
				
		}

		// For some reason, none of them were deleted
		else
		{
			$this->session->set_flashdata('error', lang('piecemaker.delete_transition_error'));
		}
		
		
		redirect('piecemaker/admin_transitions/transitions/'.$id_piecemaker);
	}	
	
	
	

	
}
