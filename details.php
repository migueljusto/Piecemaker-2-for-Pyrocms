<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Piecemaker extends Module {

	public $version = '1.0';

	public function info()
	{
	$info = array(
			'name' => array(
				'en' => 'Piecemaker',
				'br' => 'Piecemaker',
				'pt' => 'Piecemaker',	
			),
			'description' => array(
				
				'en' => 'The Piecemaker Manager lets users to manage the content and settings from all piecemakers easely ',
				'br' => 'O Gestor de Piecemakers permite-lhe gerir os ficheiros das suas apresentações facilmente',
				'pt' => 'O Gestor de Piecemakers permite-lhe gerir os ficheiros das suas apresentações facilmente',		    
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
																				 'name' => 'piecemaker.new_file_label',
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
					 `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
		/**
		 * Either return a string containing help info
		 * return "Some help info";
		 *
		 * Or add a language/help_lang.php file and
		 * return TRUE;
		 *
		 * help_lang.php contents
		 * $lang['help_body'] = "Some help info";
		*/
		return TRUE;
		
	}
}
/* End of file details.php */