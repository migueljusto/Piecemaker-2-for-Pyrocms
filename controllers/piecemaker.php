<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Piecemaker front view XML
 *
 * Create a list of images transitions and settings
 *
 * @package		PyroCMS
 * @author		Miguel Justo - migueljusto.net
 *
 */
class Piecemaker extends Public_Controller
{

function get_images($id_piecemaker)
{
$this->config->load('config');	

$this->load->model('piecemaker_m');

$upload_path= base_url().$this->config->item('files_folder');
	
 
 	$return = $this->piecemaker_m->get_piecemaker($id_piecemaker);
		
	$files = $return->files;
		
	$settings_piece = $return->settings;
	
	$transitions = $return->transitions;
		
 
echo '<?xml version="1.0" encoding="utf-8"?>
		<Piecemaker>';
	
echo '<Contents>';

foreach ($files as  $row):

	if( $row['file_type'] =='img' ){
		
		
	echo '<Image Source="'.$upload_path.$row['file_name'].'" Title="'.$row['title'].'">';
	
		if(!empty($row['info'])){ echo'<Text>'.$row['info'].'</Text>';}
		if(!empty($row['url'])){ echo'<Hyperlink URL="'.$row['url'].'" Target="_blank" />'; }
	
	echo'</Image>';
	}  
	
	if($row['file_type']=='swf'){
	echo '<Flash Source="'.$upload_path.$row['file_name'].'" Title="'.$row['title'].'">';
	
			if(!empty($row['background'])){ echo'<Image Source="'.$upload_path.$row['background'].'" />';}
			
	echo'</Flash>';
	}
	
	if($row['file_type']=='video'){
		
	if($row['autoplay']=='1'){ $autoplay="true"; }else{ $autoplay="false";}
		
	echo '<Video Source="'.$upload_path.$row['file_name'].'"  Width="910" Height="365" Autoplay="'.$autoplay.'" Title="'.$row['title'].'">';
	
			if(!empty($row['background'])){ echo'<Image Source="'.$upload_path.$row['background'].'" />';}
	
	echo'</Video>';
	}   
	 
	 
  endforeach;
   
echo'</Contents>';
  
 

 
 echo'<Settings 
 ImageWidth="'.$settings_piece['image_width'].'" 
 ImageHeight="'.$settings_piece['image_height'].'" 
 LoaderColor="0x'.$settings_piece['loader_color'].'" 
 InnerSideColor="0x'.$settings_piece['inner_side_color'].'" 
 SideShadowAlpha="'.$settings_piece['side_shadow_alpha'].'" 
 DropShadowAlpha="'.$settings_piece['drop_shadow_alpha'].'" 
 DropShadowDistance="'.$settings_piece['drop_shadow_distance'].'" 
 DropShadowScale="'.$settings_piece['drop_shadow_scale'].'" 
 DropShadowBlurX="'.$settings_piece['drop_shadow_blur_x'].'" 
 DropShadowBlurY="'.$settings_piece['drop_shadow_blur_y'].'" 
 MenuDistanceX="'.$settings_piece['menu_distance_x'].'" 
 MenuDistanceY="'.$settings_piece['menu_distance_y'].'" 
 MenuColor1="0x'.$settings_piece['menu_color_1'].'" 
 MenuColor2="0x'.$settings_piece['menu_color_2'].'" 
 MenuColor3="0x'.$settings_piece['menu_color_3'].'" 
 ControlSize="'.$settings_piece['control_size'].'" 
 ControlDistance="'.$settings_piece['control_distance'].'" 
 ControlColor1="0x'.$settings_piece['control_color_1'].'" 
 ControlColor2="0x'.$settings_piece['control_color_2'].'" 
 ControlAlpha="'.$settings_piece['control_alpha'].'" 
 ControlAlphaOver="'.$settings_piece['control_alpha_over'].'" 
 ControlsX="'.$settings_piece['controls_x'].'" 
 ControlsY="'.$settings_piece['controls_y'].'" 
 ControlsAlign="'.$settings_piece['controls_align'].'"
 TooltipHeight="'.$settings_piece['tooltip_height'].'" 
 TooltipColor="0x'.$settings_piece['tooltip_color'].'" 
 TooltipTextY="'.$settings_piece['tooltip_text_y'].'" 
 TooltipTextStyle="'.$settings_piece['tooltip_text_style'].'" 
 TooltipTextColor="0x'.$settings_piece['tooltip_text_color'].'" 
 TooltipMarginLeft="'.$settings_piece['tooltip_margin_left'].'" 
 TooltipMarginRight="'.$settings_piece['tooltip_margin_right'].'" 
 TooltipTextSharpness="'.$settings_piece['tooltip_text_sharpness'].'" 
 TooltipTextThickness="'.$settings_piece['tooltip_text_thickness'].'" 
 InfoWidth="'.$settings_piece['info_width'].'" 
 InfoBackground="0x'.$settings_piece['info_background'].'" 
 InfoBackgroundAlpha="'.$settings_piece['info_background_alpha'].'" 
 InfoMargin="'.$settings_piece['info_margin'].'" 
 InfoSharpness="'.$settings_piece['info_sharpness'].'" 
 InfoThickness="'.$settings_piece['info_thickness'].'" 
 Autoplay="'.$settings_piece['autoplay'].'" 
 FieldOfView="'.$settings_piece['field_of_view'].'"
 >
 </Settings> 
';

 
echo '<Transitions>';



for ($i = 0; $i < count($transitions); $i++) {

    echo'<Transition Pieces="'.$transitions['transition_'.$i.'']['pieces'].'"  Time="'.$transitions['transition_'.$i.'']['time_cube'].'"  Transition="'.$transitions['transition_'.$i.'']['transition'].'"  Delay="'.$transitions['transition_'.$i.'']['delay'].'"  DepthOffset="'.$transitions['transition_'.$i.'']['depth_offset'].'"  CubeDistance="'.$transitions['transition_'.$i.'']['cube_distance'].'" >
	     </Transition>';
 }
 
echo'</Transitions>';

echo '</Piecemaker>';

		
	}

	
}

/* End of file piecemaker.php */