<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * The Piecemaker Manager module enables users to create piecemakers, upload files and manage their existing files, transitions and settings.
 *
 * @author 		Miguel Justo - Mj Web Designs - http://migueljusto.net
 * @package 	PyroCMS
 * @subpackage 	Piecemaker 2 Manager Module
 * @category 	Modules
 * @license 	Apache License v2.0
 */
class Admin extends Admin_Controller
{
	public $id = 0;
	
	private $_path 		= '';

	/**
	 * Validation rules for creating a new piecemaker gallery
	 *
	 * @var array
	 * @access private
	 */
	private $piecemaker_validation_rules = array(
		array('field' => 'title','label' => 'lang:piecemaker.title_label','rules' => 'trim|max_length[255]|required'),
		array('field' => 'slug','label'  => 'lang:piecemaker.slug_label','rules' => 'trim|max_length[255]|required'),
		array('field' => 'description','label' => 'lang:piecemaker.description_label','rules' => 'trim'),
		array('field' => 'image_width','label' => 'lang:piecemaker.image_width_label','rules' => 'trim|required'),
		array('field' => 'image_height','label' => 'lang:piecemaker.image_height_label','rules' => 'trim|required'),
		array('field' => 'loader_color','label' => 'lang:piecemaker.loader_color_label','rules' => 'trim|required'),
		array('field' => 'inner_side_color','label' => 'lang:piecemaker.inner_side_color_label','rules' => 'trim|required'),
		array('field' => 'side_shadow_alpha','label' => 'lang:piecemaker.side_shadow_alpha_label','rules' => 'trim|required'),
		array('field' => 'drop_shadow_alpha','label' => 'lang:piecemaker.drop_shadow_alpha_label','rules' => 'trim|required'),
		array('field' => 'drop_shadow_distance','label' => 'lang:piecemaker.drop_shadow_distance_label','rules' => 'trim|required'),
		array('field' => 'drop_shadow_scale','label' => 'lang:piecemaker.drop_shadow_scale_label','rules' => 'trim|required'),
		array('field' => 'drop_shadow_blur_x','label' => 'lang:piecemaker.drop_shadow_blur_x_label','rules' => 'trim|required'),
		array('field' => 'drop_shadow_blur_y','label' => 'lang:piecemaker.drop_shadow_blur_y_label','rules' => 'trim|required'),
		array('field' => 'menu_distance_x','label' => 'lang:piecemaker.menu_distance_x_label','rules' => 'trim|required'),
		array('field' => 'menu_distance_y','label' => 'lang:piecemaker.menu_distance_y_label','rules' => 'trim|required'),
		array('field' => 'menu_color_1','label' => 'lang:piecemaker.menu_color_1_label','rules' => 'trim|required'),
		array('field' => 'menu_color_2','label' => 'lang:piecemaker.menu_color_2_label','rules' => 'trim|required'),
		array('field' => 'menu_color_3','label' => 'lang:piecemaker.menu_color_3_label','rules' => 'trim|required'),
		array('field' => 'control_size','label' => 'lang:piecemaker.control_size_label','rules' => 'trim|required'),
		array('field' => 'control_distance','label' => 'lang:piecemaker.control_distance_label','rules' => 'trim|required'),
		array('field' => 'control_color_1','label' => 'lang:piecemaker.control_color_1_label','rules' => 'trim|required'),
		array('field' => 'control_color_2','label' => 'lang:piecemaker.control_color_2_label','rules' => 'trim|required'),
		array('field' => 'control_alpha','label' => 'lang:piecemaker.control_alpha_label','rules' => 'trim|required'),
		array('field' => 'control_alpha_over','label' => 'lang:piecemaker.control_alpha_over_label','rules' => 'trim|required'),
		array('field' => 'controls_x','label' => 'lang:piecemaker.controls_x_label','rules' => 'trim|required'),
		array('field' => 'controls_y','label' => 'lang:piecemaker.controls_y_label','rules' => 'trim|required'),
		array('field' => 'controls_align','label' => 'lang:piecemaker.controls_align_label','rules' => 'trim|required'),
		array('field' => 'tooltip_height','label' => 'lang:piecemaker.tooltip_height_label','rules' => 'trim|required'),
		array('field' => 'tooltip_color','label' => 'lang:piecemaker.tooltip_color_label','rules' => 'trim|required'),
		array('field' => 'tooltip_text_y','label' => 'lang:piecemaker.tooltip_text_y_label','rules' => 'trim|required'),
		array('field' => 'tooltip_text_style','label' => 'lang:piecemaker.tooltip_text_style_label','rules' => 'trim|required'),
		array('field' => 'tooltip_text_color','label' => 'lang:piecemaker.tooltip_text_color_label','rules' => 'trim|required'),
		array('field' => 'tooltip_margin_left','label' => 'lang:piecemaker.tooltip_margin_left_label','rules' => 'trim|required'),
		array('field' => 'tooltip_margin_right','label' => 'lang:piecemaker.tooltip_margin_right_label','rules' => 'trim|required'),
		array('field' => 'tooltip_text_sharpness','label' => 'lang:piecemaker.tooltip_text_sharpness_label','rules' => 'trim|required'),
		array('field' => 'tooltip_text_thickness','label' => 'lang:piecemaker.tooltip_text_thickness_label','rules' => 'trim|required'),
		array('field' => 'info_width','label' => 'lang:piecemaker.info_width_label','rules' => 'trim|required'),
		array('field' => 'info_background','label' => 'lang:piecemaker.info_background_label','rules' => 'trim|required'),
		array('field' => 'info_background_alpha','label' => 'lang:piecemaker.info_background_alpha_label','rules' => 'trim|required'),
		array('field' => 'info_margin','label' => 'lang:piecemaker.info_margin_label','rules' => 'trim|required'),
		array('field' => 'info_sharpness','label' => 'lang:piecemaker.info_sharpness_label','rules' => 'trim|required'),
		array('field' => 'info_thickness','label' => 'lang:piecemaker.info_thickness_label','rules' => 'trim|required'),
		array('field' => 'autoplay','label' => 'lang:piecemaker.autoplay_label','rules' => 'trim|required'),
		array('field' => 'field_of_view','label' => 'lang:piecemaker.field_of_view_label','rules' => 'trim|required')
	);
	
	
	/**
	 * Constructor method
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->config->load('config');	
		// Load all the required classes

		$this->load->model('piecemaker_m');
		
		$this->lang->load('piecemaker');
		
		$this->load->library('form_validation');
		

		$this->_path = $this->config->item('files_folder');
		
		
		$this->drop_align = array(
			'center'   => lang('piecemaker.center_label'),
			'left'     => lang('piecemaker.left_label'),
			'right'    => lang('piecemaker.right_label')
		);
			
	}


	/**
	 * List all existing piecemakers
	 */
	public function index()
	{
		// Get all the pieces
		$piecemakers = $this->piecemaker_m->get_piecemakers();
		
		 $this->template->active_section = 'piecemakers';
		// Load the view
		$this->template
			->title($this->module_details['name'])
			->set('piecemaker',	$piecemakers)
			->build('admin/index');
	}
	
	
	// Create New Piecemaker
	public function create()
	{
		
	$this->data->drop_align =$this->drop_align;
		
		// Set the validation rules
		$this->form_validation->set_rules($this->piecemaker_validation_rules);

		if ($this->form_validation->run() )
		{
			if ($id = $this->piecemaker_m->insert($this->input->post()))
			{
				// Everything went ok..
				$this->session->set_flashdata('success', lang('piecemaker.create_success'));

				// Redirect back to the form or main page
				$this->input->post('btnAction') == 'save_exit'
					? redirect('admin/piecemaker/')
					: redirect('admin/piecemaker/create');
			}
			
			// Something went wrong..
			else
			{
				$this->session->set_flashdata('error', lang('piecemaker.create_error'));
				redirect('admin/piecemaker/create');
			}
		}else{


				$this->data->default_settings = array(
								'image_width' => '900', 
								'image_height' => '360', 
								'loader_color' => '222222',
								'inner_side_color' => '222222', 
								'side_shadow_alpha' => '0.8', 
								'drop_shadow_alpha' => '0.7', 
								'drop_shadow_distance' => '25', 
								'drop_shadow_scale' => '0.95', 
								'drop_shadow_blur_x' => '40', 
								'drop_shadow_blur_y' => '4', 
								'menu_distance_x' => '20', 
								'menu_distance_y' => '50', 
								'menu_color_1' => '999999', 
								'menu_color_2' => '333333', 
								'menu_color_3' => 'FFFFFF', 
								'control_size' => '100', 
								'control_distance' => '20', 
								'control_color_1' => '222222',
								'control_color_2' => 'FFFFFF',
								'control_alpha' => '0.8',
								'control_alpha_over' => '0.95',
								'controls_x' => '450',
								'controls_y' => '280&#xD;&#xA;',
								'controls_align' => 'center',
								'tooltip_height' => '30',
								'tooltip_color' => '222222',
								'tooltip_text_y' => '5',
								'tooltip_text_style' => 'P-Italic',
								'tooltip_text_color' => 'FFFFFF',
								'tooltip_margin_left' => '5',
								'tooltip_margin_right' => '7',
								'tooltip_text_sharpness' => '50',
								'tooltip_text_thickness' => '-100',
								'info_width' => '400',
								'info_background' => 'FFFFFF',
								'info_background_alpha' => '0.95',
								'info_margin' => '15',
								'info_sharpness' => '0',
								'info_thickness' => '0',
								'autoplay' => '10',
								'field_of_view'=> '45'//last item
								);
		// Required for validation
		foreach ($this->piecemaker_validation_rules as $rule)
		{
			$settings->{$rule['field']} = $this->input->post($rule['field']);
		}

		$this->template
			->title($this->module_details['name'], lang('piecemaker.create_piecemaker_title'))
			->append_css('module::admin-piecemaker.css')
			->append_css('module::colorpicker/colorpicker.css')
			->append_js('module::admin/colorpicker/colorpicker.js')
			->append_js('module::admin/settings.js')
			->set('settings',$settings)
			->build('admin/form-piecemaker',$this->data);
		
		}
	}


	
	
	
	// Edit Piecemaker Settings
	public function settings($id_piecemaker)
	{
		
		
		$this->data->drop_align =$this->drop_align;
		
	    $this->template->active_section = 'settings';
		
		$settings = $this->piecemaker_m->get_piecemaker($id_piecemaker);
		
		
		$default_settings = $settings->settings;
		
		// Set the validation rules
		$this->form_validation->set_rules($this->piecemaker_validation_rules);

		if ( $this->form_validation->run())
		{
			if ($this->piecemaker_m->update_settings($this->input->post() , $id_piecemaker))
			{
				// Everything went ok..
				$this->session->set_flashdata('success', lang('piecemaker.update_success'));
				
				// Redirect back to the form or main page
				$this->input->post('btnAction') == 'save_exit'
					? redirect('piecemaker/admin_files/files/'.$id_piecemaker)
					: redirect('admin/piecemaker/settings/'.$id_piecemaker);

				
			}
			
			// Something went wrong..
			else
			{
				$this->session->set_flashdata('error', lang('piecemaker.update_error'));
				redirect('admin/piecemaker/settings/'.$id_piecemaker);
			}
		}else{
		
		// Required for validation
		foreach ($this->piecemaker_validation_rules as $rule)
		{
			if($this->input->post($rule['field']))
			{
			   $settings->{$rule['field']} = $this->input->post($rule['field']);
			}
		}
		
		// Assign data for display
		$this->data->settings =& $settings;
		
		$this->data->default_settings =& $default_settings;
		
		
		// Load the view
		$this->template
			->title($this->module_details['name'], lang('piecemaker.edit_piecemaker_title'))
			->append_css('module::admin-piecemaker.css')
			->append_css('module::colorpicker/colorpicker.css')
			->append_js('module::admin/colorpicker/colorpicker.js')
			->append_js('module::admin/settings.js')
			->build('admin/form-piecemaker',$this->data);

		}
	}
		
public function action()
	{
		$action = strtolower($this->input->post('btnAction'));
		

		if ($action)
		{
			// Get the id('s)
			$id_array = $this->input->post('action_to');

			// Call the action we want to do
			if (method_exists($this, $action))
			{
				
				$this->{$action}($id_array);
				
				
			}
		}

		redirect('admin/piecemaker/');
	}	




	
	// Admin: Delete file/s piecemkaer
	public function delete($ids)
	{
		
				
		// Check for one
		$ids = ( ! is_array($ids)) ? array($ids) : $ids;

		// Go through the array of ids to delete
		$pieces = array();
		foreach ($ids as $id)
		{
			// Get the current comment so we can grab the id too
			if ($piece = $this->piecemaker_m->get_piecemaker($id))
			{
			
				$this->piecemaker_m->delete_piecemaker($id);

				
				$pieces[] = $piece->id;
			}
		}

		// Some comments have been deleted
		if ( ! empty($pieces))
		{
			(count($pieces) == 1)
				? $this->session->set_flashdata('success', sprintf(lang('piecemaker.delete_success'), $imagens[0]))				/* Only deleting one comment */
				: $this->session->set_flashdata('success', sprintf(lang('piecemaker.delete_multi_success'), implode(', #', $imagens )));	/* Deleting multiple comments */
		}

		// For some reason, none of them were deleted
		else
		{
			$this->session->set_flashdata('error', lang('piecemaker.delete_error'));
		}
		
		
		redirect('admin/piecemaker/');
	}
	

	
}
