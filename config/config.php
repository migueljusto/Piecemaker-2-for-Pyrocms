<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

//Addon Path

// MODIFY THIS PATH IF YOU'D LIKE TO KEEP THE MODULE ELSEWHERE
$config['addon_path'] = SHARED_ADDONPATH; // ADDONPATH

//Upload Folder
$config['files_folder'] = UPLOAD_PATH . 'piecemaker/';

//Alowed Types
$config['files_allowed_file_img'] ='gif|jpg|png';
$config['files_allowed_file_swf'] ='swf';
$config['files_allowed_file_video'] ='mpeg4|f4v|fvl|mp4';

?>