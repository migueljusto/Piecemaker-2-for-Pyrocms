<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Galleries Plugin
 *
 * Create a list of images
 *
 * @package		PyroCMS
 * @author		Jerel Unruh - PyroCMS Dev Team
 * @copyright	Copyright (c) 2008 - 2010, PyroCMS
 *
 */
class Plugin_Piecemaker extends Plugin
{
	/**
	 * Image List
	 * 
	 * Creates a list of gallery images
	 * 
	 * Usage:
	 * 
	 * {pyro:galleries:images slug="nature" limit="5"}
	 * 	<a href="{pyro:url:base}galleries/{gallery_slug}/{id}" title="{name}">
	 * 		<img src="{pyro:url:base}files/thumb/{file_id}/75/75" alt="{description}"/>
	 * 	</a>
	 * {/pyro:galleries:images}
	 * 
	 * The following is a list of tags that are available to use from this method
	 * 
	 * 	{file_id}
	 * 	{name}
	 * 	{filename}
	 * 	{description}
	 * 	{extension}
	 * 
	 * @return	array
	 */ 
	function slider()
	{
		
		
		$data['id_object']= $this->attribute('id');
		
		
		
		return $this->module_view('piecemaker', 'piecemaker_view', $data, TRUE);
		
		
		
	}

	
}

/* End of file plugin.php */