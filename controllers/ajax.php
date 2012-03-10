<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * PyroStreams AJAX Controller
 *
 * @package		PyroStreams
 * @author		Parse19
 * @copyright	Copyright (c) 2011 - 2012, Parse19
 * @license		http://parse19.com/pyrostreams/docs/license
 * @link		http://parse19.com/pyrostreams
 */
class Ajax extends Admin_Controller {

    function __construct()
    {
        parent::__construct();
        
        // No matter what we don't show the profiler
        // in our AJAX calls.
        $this->output->enable_profiler(FALSE);
 
        // Only AJAX gets through!
       	if( !$this->input->is_ajax_request() ) die('Invalid request.');
		
		$this->load->model('piecemaker_m');
		
		
		
    }

	// --------------------------------------------------------------------------

	/**
	 * Get our build params
	 *
	 * Accessed via AJAX
	 *
	 * @access	public
	 * @return	void
	 */
	public function build_form()
	{
		$this->lang->load('piecemaker');
		// Out for certain characters
		if( $this->input->post('data') == '-' ) return null;
			
			$id_piecemaker = $this->input->post('id_piece');
		
		    $type = $this->input->post('data');
	
			$data['type'] =  $type;
			
			$return = $this->piecemaker_m->get_piecemaker($id_piecemaker);
		
	    	$data['settings'] = $return->settings;
		
			echo $this->load->view('admin/files/ajax/form_inputs', $data, TRUE);
			
			
	}
	
	
	

// ------------------------------------------------------------------------	
	public function ajax_update_files_order()
	{
		
		$id_piecemaker = $this->input->post('id_piece');
		
		$ids = explode(',', $this->input->post('order'));
		
		$return = $this->piecemaker_m->get_piecemaker($id_piecemaker);
		
	    $files = $return->files;
		
		$new_order = array();
		
		$i = 0;
		foreach ($ids as $id)
		{
		
		
		$new_order['file_'.$i.''] = $files['file_'.$id.''];
		
		
			$i++;
		}
		
		$i--;
		
		unset($new_order['file_'.$i.'']);
		
		$this->piecemaker_m->update_files($new_order, $id_piecemaker);
		
		
	}

// ------------------------------------------------------------------------	
	public function ajax_update_transitions_order()
	{
		
		$id_piecemaker = $this->input->post('id_piece');
		
		$ids = explode(',', $this->input->post('order'));
		
		$return = $this->piecemaker_m->get_piecemaker($id_piecemaker);
		
	    $transitions = $return->transitions;
		
		$new_trans = array();
		
		$i = 0;
		foreach ($ids as $id)
		{
		
		
		$new_trans['transition_'.$i.''] = $transitions['transition_'.$id.''];
		
		
			$i++;
		}
		
		$i--;
		unset($new_trans['transition_'.$i.'']);
		
		$this->piecemaker_m->update_transition($new_trans, $id_piecemaker);
	}

		
}

/* End of file ajax.php */