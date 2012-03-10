<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Piecemaker extends Module {

	public $version = '1.0';

	public function info()
	{
	$info = array(
			'name' => array(
				'en' => 'Piecemaker Manager',
				'br' => 'Piecemaker gestor',
				'pt' => 'Piecemaker gestor',	
			),
			'description' => array(
				
				'en' => 'The Image Slider is a module to manage images on Home Page',
				'br' => 'The Image Slider is a module to manage images on Home Page',
				'pt' => 'O módulo Slider images permite-lhe gerir as imagens do slider de apresentação',		    
			),
			'frontend' => FALSE,
			'backend' => TRUE,
			'menu' => 'content',
					       
					
							 
			);
		
			$assignment_uris = array('files','add_file','edit_file', 'transitions','add_transition','edit_transition', 'settings');
			
			if( ( in_array( $this->uri->segment(3), $assignment_uris) ) && ( $this->uri->segment(3) != '' ) ){
			
				$info['sections'] = array(
											'files' => array(
				    						  				'name' => 'piecemaker.files_label',
				   							  				 'uri' => 'piecemaker/admin_files/files/'.$this->uri->segment(4),
				   						 			   'shortcuts' => array(
																			array(
																				 'name' => 'piecemaker.add_file_label',
							         											  'uri' => 'piecemaker/admin_files/add_file/'.$this->uri->segment(4),
																				'class' => 'add'
																				 )
			   																)	
															),
										  'transitions' => array(
				  							 					'name'    =>  'piecemaker.transitions_label',
				    						 					'uri'     => 	'piecemaker/admin_transitions/transitions/'.$this->uri->segment(4),
															  'shortcuts' => array(
																			       array(
																				 'name' => 'piecemaker.add_transition_label',
							         											  'uri' => 'piecemaker/admin_transitions/add_transition/'.$this->uri->segment(4),
																				'class' => 'add'
																				 )
			   																)	
															),					
			   							  'settings' => array(
				  							 					'name'    =>  'piecemaker.settings_label',
				    						 					'uri'     => 	'admin/piecemaker/settings/'.$this->uri->segment(4)
																),
											
												);
													
												
			}else{
				
			if(  $this->uri->segment(3) == '' ):
			$info['shortcuts'] =array(
								 'add'=> array(
							                   'name'   => 'piecemaker.add_piecemaker_label',
									          	'uri'   => 'admin/piecemaker/create',
									            'class' => 'add'
									           ),
								
									);
			 endif;
				
			}
	
			return $info;
		
	}

	public function install()
	{
		$this->dbforge->drop_table('piecemaker');
		
		$piecemaker = "CREATE TABLE `".$this->db->dbprefix('piecemaker')."` (
			  		 `id` int(11) NOT NULL AUTO_INCREMENT,
 					 `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 					 `description` text COLLATE utf8_unicode_ci,
					 `files` text COLLATE utf8_unicode_ci,
 					 `settings` text COLLATE utf8_unicode_ci,
 					 `transitions` text COLLATE utf8_unicode_ci,
 					 `created_on` int(15) DEFAULT NULL,
 					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=0;
					";
		

		if($this->db->query($piecemaker))
		{
			return TRUE;
		}
	}

	public function uninstall()
	{

		if($this->dbforge->drop_table('piecemaker')) 
		{
			return TRUE;
		}
	}


	public function upgrade($old_version)
	{
		// Your Upgrade Logic
		return TRUE;
	}

	public function help()
	{
		// Return a string containing help info
		// You could include a file and return it here.
		return "<h4>Overview</h4>
		<p>Slider Image</p>
		<h4>Add image</h4>
		<p>To add any image please go on menu CONTENT->FILES and upload your image.<br>
		Now you can select and add your image on Add image.<br><br>
		
		Very easy :)<br><br>
		Created by  <a target='_new' href='http://migueljusto.net/'>Mj Web Designer</p>";
	}
}
/* End of file details.php */