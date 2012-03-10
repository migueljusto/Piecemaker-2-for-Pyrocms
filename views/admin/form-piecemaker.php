


<section class="title">
	<?php if ($this->method == 'create'): ?>
		<h4><?php echo lang('piecemaker.create_piecemaker_title'); ?></h4>
	<?php else: ?>
		<h4><?php echo lang('piecemaker.edit_piecemaker_title').' -> '. $settings->title?></h4>
	<?php endif; ?>
</section>






<section class="item">

<?php echo form_open(uri_string(), 'class="form_inputs"'); ?>

<?php /*  if (isset($piece->id))echo form_hidden('id', $gallery->id);  */?>


<div class="one_half">


<section class="title">
			<h4><?php echo lang('piecemaker.general_title_label') ?></h4>
		</section>
		
	<section class="item">
			
		
	<ul>
           		 
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="title"><?php echo lang('piecemaker.title_label'); ?>
                    <small> <?php echo lang('piecemaker.title_desc'); ?></small>
                    </label>
					<input type="text" id="title" name="title"  value="<?php echo $settings->title; ?>" />
				</li>
                 <li class="<?php echo alternator('', 'even'); ?>">
					<label for="description"><?php echo lang('piecemaker.description_label'); ?>
                     <small> <?php echo lang('piecemaker.description_desc'); ?></small></label>
					<input type="text" id="description" name="description"  value="<?php echo $settings->description; ?>" />
				</li>
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="image_width"><?php echo lang('piecemaker.image_width_label'); ?>
                     <small> <?php echo lang('piecemaker.image_width_desc'); ?></small>
                     </label>
                    
					<input type="text" id="image_width" name="image_width"  value="<?php echo @$settings->image_width == '' ? $default_settings['image_width'] : $settings->image_width; ?>" />
                    
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="image_height"><?php echo lang('piecemaker.image_height_label'); ?>
                     <small> <?php echo lang('piecemaker.image_height_desc'); ?></small>
                     </label>
                   
					<input type="text" id="image_height" name="image_height"  value="<?php echo @$settings->image_height == '' ? $default_settings['image_height'] : $settings->image_height; ?>" />
					
				</li>
                  <li class="<?php echo alternator('', 'even'); ?>">
					<label for="loader_color"><?php echo lang('piecemaker.loader_color_label'); ?>
                     <small> <?php echo lang('piecemaker.loader_color_desc'); ?></small>
                     </label>
                    
					<input type="text" class="colorpickerField" id="loader_color" name="loader_color"  value="<?php echo @$settings->loader_color == '' ? $default_settings['loader_color'] : $settings->loader_color; ?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="inner_side_color"><?php echo lang('piecemaker.inner_side_color_label'); ?>
                      <small> <?php echo lang('piecemaker.inner_side_color_desc'); ?></small>
                      </label>
                    
					<input type="text" class="colorpickerField" id="inner_side_color" name="inner_side_color"  value="<?php echo @$settings->inner_side_color == '' ? $default_settings['inner_side_color'] : $settings->inner_side_color; ?>" />
					
				</li>
                
                 <li class="<?php echo alternator('', 'even'); ?>">
					<label for="autoplay"><?php echo lang('piecemaker.autoplay_label'); ?>
                       <small> <?php echo lang('piecemaker.autoplay_desc'); ?></small>
                       </label>
					<input type="text" id="autoplay" name="autoplay"  value="<?php echo @$settings->autoplay == '' ? $default_settings['autoplay'] : $settings->autoplay; ?>" />
				
				</li>
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="field_of_view"><?php echo lang('piecemaker.field_of_view_label'); ?>
                       <small> <?php echo lang('piecemaker.field_of_view_desc'); ?></small>
                       </label>
					<input type="text" id="field_of_view" name="field_of_view"  value="<?php echo @$settings->field_of_view == '' ? $default_settings['field_of_view'] : $settings->field_of_view; ?>" />
					
				</li>
     </ul>           

</section>

</div>


<div class="one_half last" >

<section class="title">
			<h4><?php echo lang('piecemaker.shadow_title_label') ?></h4>
		
		</section>
		
	<section class="item">

<ul>

                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="side_shadow_alpha"><?php echo lang('piecemaker.side_shadow_alpha_label'); ?>
                     <small> <?php echo lang('piecemaker.side_shadow_alpha_desc'); ?></small>
                     </label>
                     
					<input type="text" id="side_shadow_alpha" name="side_shadow_alpha"  value="<?php echo @$settings->side_shadow_alpha == '' ? $default_settings['side_shadow_alpha'] : $settings->side_shadow_alpha; ?>" />
					
				</li>

                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="drop_shadow_alpha"><?php echo lang('piecemaker.drop_shadow_alpha_label'); ?>
                    <small> <?php echo lang('piecemaker.drop_shadow_alpha_desc'); ?></small>
                    </label>
                      
					<input type="text" id="drop_shadow_alpha" name="drop_shadow_alpha"  value="<?php echo @$settings->drop_shadow_alpha == '' ? $default_settings['drop_shadow_alpha'] : $settings->drop_shadow_alpha; ?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="drop_shadow_distance"><?php echo lang('piecemaker.drop_shadow_distance_label'); ?>
                    <small> <?php echo lang('piecemaker.drop_shadow_distance_desc'); ?></small>
                    </label>
                     
					<input type="text" id="drop_shadow_distance" name="drop_shadow_distance"  value="<?php echo @$settings->drop_shadow_distance == '' ? $default_settings['drop_shadow_distance'] : $settings->drop_shadow_distance; ?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="drop_shadow_scale"><?php echo lang('piecemaker.drop_shadow_scale_label'); ?>
                    <small> <?php echo lang('piecemaker.drop_shadow_scale_desc'); ?></small>
                    </label>
                    
					<input type="text" id="drop_shadow_scale" name="drop_shadow_scale"  value="<?php echo @$settings->drop_shadow_scale == '' ? $default_settings['drop_shadow_scale'] : $settings->drop_shadow_scale; ?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="drop_shadow_blur_x"><?php echo lang('piecemaker.drop_shadow_blur_x_label'); ?>
                    <small> <?php echo lang('piecemaker.drop_shadow_blur_x_desc'); ?></small>
                    </label>
                     
					<input type="text" id="drop_shadow_blur_x" name="drop_shadow_blur_x"  value="<?php echo @$settings->drop_shadow_blur_x == '' ? $default_settings['drop_shadow_blur_x'] : $settings->drop_shadow_blur_x; ?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="drop_shadow_blur_y"><?php echo lang('piecemaker.drop_shadow_blur_y_label'); ?>
                     <small><?php echo lang('piecemaker.drop_shadow_blur_y_desc'); ?></small>
                    </label>
                   
					<input type="text" id="drop_shadow_blur_y" name="drop_shadow_blur_y"  value="<?php echo @$settings->drop_shadow_blur_y == '' ? $default_settings['drop_shadow_blur_y'] : $settings->drop_shadow_blur_y; ?>" />
					
				</li>
                
             </ul>
</section>


</div>




<div class="one_half last">

<section class="title">
			<h4><?php echo lang('piecemaker.controls_title_label') ?></h4>
			
		</section>
		
	<section class="item">

<ul>
               
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="control_size"><?php echo lang('piecemaker.control_size_label'); ?>
                      <small> <?php echo lang('piecemaker.control_size_desc'); ?></small>
                     </label>
					<input type="text" id="control_size" name="control_size"  value="<?php echo @$settings->control_size == '' ? $default_settings['control_size'] : $settings->control_size; ?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="control_distance"><?php echo lang('piecemaker.control_distance_label'); ?>
                     <small> <?php echo lang('piecemaker.control_distance_desc'); ?></small>
                     </label>
					<input type="text" id="control_distance" name="control_distance"  value="<?php echo @$settings->control_distance == '' ? $default_settings['control_distance'] : $settings->control_distance; ?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="control_color_1"><?php echo lang('piecemaker.control_color_1_label'); ?>
                    <small> <?php echo lang('piecemaker.control_color_1_desc'); ?></small>
                    </label>
					<input type="text"  class="colorpickerField" id="control_color_1" name="control_color_1"  value="<?php echo @$settings->control_color_1 == '' ? $default_settings['control_color_1'] : $settings->control_color_1; ?>" />
				
				</li>
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="control_color_2"><?php echo lang('piecemaker.control_color_2_label'); ?>
                    <small> <?php echo lang('piecemaker.control_color_2_desc'); ?></small>
                    </label>
					<input type="text"  class="colorpickerField" id="control_color_2" name="control_color_2"  value="<?php echo @$settings->control_color_2 == '' ? $default_settings['control_color_2'] : $settings->control_color_2; ?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="control_alpha"><?php echo lang('piecemaker.control_alpha_label'); ?>
                    <small> <?php echo lang('piecemaker.control_alpha_desc'); ?></small></label>
					<input type="text" id="control_alpha" name="control_alpha"  value="<?php echo @$settings->control_alpha == '' ? $default_settings['control_alpha'] : $settings->control_alpha; ?>" />
				
				</li>
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="control_alpha_over"><?php echo lang('piecemaker.control_alpha_over_label'); ?>
                     <small> <?php echo lang('piecemaker.control_alpha_over_desc'); ?></small>
                     </label>
					<input type="text" id="control_alpha_over" name="control_alpha_over"  value="<?php echo @$settings->control_alpha_over == '' ? $default_settings['control_alpha_over'] : $settings->control_alpha_over; ?>" />
					
				</li>
                
                 <li class="<?php echo alternator('', 'even'); ?>">
					<label for="controls_x"><?php echo lang('piecemaker.controls_x_label'); ?>
                      <small> <?php echo lang('piecemaker.controls_x_desc'); ?></small>
                      </label>
					<input type="text" id="controls_x" name="controls_x"  value="<?php echo @$settings->controls_x == '' ? $default_settings['controls_x'] : $settings->controls_x; ?>" />
					
				</li>
                 <li class="<?php echo alternator('', 'even'); ?>">
					<label for="controls_y"><?php echo lang('piecemaker.controls_y_label'); ?>
                      <small> <?php echo lang('piecemaker.controls_y_desc'); ?></small>
                      </label>
					<input type="text" id="controls_y" name="controls_y"  value="<?php echo @$settings->controls_y == '' ? $default_settings['controls_y'] : $settings->controls_y; ?>" />
					
				</li>
                
                 <li class="<?php echo alternator('', 'even'); ?>">
					<label for="controls_align"><?php echo lang('piecemaker.controls_align_label'); ?>
                      <small> <?php echo lang('piecemaker.controls_align_desc'); ?></small>
                      </label>
                      <?php echo form_dropdown('controls_align', $drop_align, @$settings->controls_align == '' ? $default_settings['controls_align'] : $settings->controls_align ); ?>
					
					
				</li>
                
                 </ul>

</section>

</div> 



<div class="one_half ">

<section class="title">
			<h4><?php echo lang('piecemaker.menu_title_label') ?></h4>
</section>
		
	<section class="item">

<ul>
  
                
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="menu_distance_x"><?php echo lang('piecemaker.menu_distance_x_label'); ?>
                     <small> <?php echo lang('piecemaker.menu_distance_x_desc'); ?></small>
                     </label>
                    
					<input type="text" id="menu_distance_x" name="menu_distance_x"  value="<?php echo @$settings->menu_distance_x == '' ? $default_settings['menu_distance_x'] : $settings->menu_distance_x; ?>" />
					
				</li>
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="menu_distance_y"><?php echo lang('piecemaker.menu_distance_y_label'); ?>
                     <small> <?php echo lang('piecemaker.menu_distance_y_desc'); ?></small>
                     </label>
                     
					<input type="text" id="menu_distance_y" name="menu_distance_y"  value="<?php echo @$settings->menu_distance_y == '' ? $default_settings['menu_distance_y'] : $settings->menu_distance_y; ?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="menu_color_1"><?php echo lang('piecemaker.menu_color_1_label'); ?>
                     <small> <?php echo lang('piecemaker.menu_color_1_desc'); ?></small>
                    </label>
                    
					<input type="text"  class="colorpickerField" id="menu_color_1" name="menu_color_1"  value="<?php echo @$settings->menu_color_1 == '' ? $default_settings['menu_color_1'] : $settings->menu_color_1; ?>" />
					
				</li>
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="menu_color_2"><?php echo lang('piecemaker.menu_color_2_label'); ?>
                     <small> <?php echo lang('piecemaker.menu_color_2_desc'); ?></small>
                     </label>
                    
					<input type="text"  class="colorpickerField" id="menu_color_2" name="menu_color_2"  value="<?php echo @$settings->menu_color_2 == '' ? $default_settings['menu_color_2'] : $settings->menu_color_2; ?>" />
					
				</li>
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="menu_color_3"><?php echo lang('piecemaker.menu_color_3_label'); ?>
                     <small> <?php echo lang('piecemaker.menu_color_3_desc'); ?></small>
                     </label>
                    
					<input type="text"  class="colorpickerField" id="menu_color_3" name="menu_color_3"  value="<?php echo @$settings->menu_color_3 == '' ? $default_settings['menu_color_3'] : $settings->menu_color_3; ?>" />
					
				</li>
                
                 
             </ul>

</section>

</div>

<div class="one_half">

<section class="title">
			<h4><?php echo lang('piecemaker.tooltip_title_label') ?></h4>
			
</section>
		
	<section class="item" style="width:95%">           
               <ul>  
                
                 <li class="<?php echo alternator('', 'even'); ?>">
					<label for="tooltip_height"><?php echo lang('piecemaker.tooltip_height_label'); ?>
                      <small> <?php echo lang('piecemaker.tooltip_height_desc'); ?></small>
                      </label>
					<input type="text" id="tooltip_height" name="tooltip_height"  value="<?php echo @$settings->tooltip_height == '' ? $default_settings['tooltip_height'] : $settings->tooltip_height; ?>" />
				
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="tooltip_color"><?php echo lang('piecemaker.tooltip_color_label'); ?>
                       <small> <?php echo lang('piecemaker.tooltip_color_desc'); ?></small>
                       </label>
					<input type="text"  class="colorpickerField" id="tooltip_color" name="tooltip_color"  value="<?php echo @$settings->tooltip_color == '' ? $default_settings['tooltip_color'] : $settings->tooltip_color; ?>" />
				
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="tooltip_text_y"><?php echo lang('piecemaker.tooltip_text_y_label'); ?>
                       <small> <?php echo lang('piecemaker.tooltip_text_y_desc'); ?></small>
                     </label>
					<input type="text" id="tooltip_text_y" name="tooltip_text_y"  value="<?php echo @$settings->tooltip_text_y == '' ? $default_settings['tooltip_text_y'] : $settings->tooltip_text_y; ?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="tooltip_text_style"><?php echo lang('piecemaker.tooltip_text_style_label'); ?>
                      <small> <?php echo lang('piecemaker.tooltip_text_style_desc'); ?></small>
                      </label>
					<input type="text" id="tooltip_text_style" name="tooltip_text_style"  value="<?php echo @$settings->tooltip_text_style == '' ? $default_settings['tooltip_text_style'] : $settings->tooltip_text_style; ?>" />
				
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="tooltip_text_color"><?php echo lang('piecemaker.tooltip_text_color_label'); ?>
                     <small> <?php echo lang('piecemaker.tooltip_text_color_desc'); ?></small>
                     </label>
					<input type="text"  class="colorpickerField" id="tooltip_text_color" name="tooltip_text_color"  value="<?php echo @$settings->tooltip_text_color == '' ? $default_settings['tooltip_text_color'] : $settings->tooltip_text_color; ?>" />
				
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="tooltip_margin_left"><?php echo lang('piecemaker.tooltip_margin_left_label'); ?>
                        <small> <?php echo lang('piecemaker.tooltip_margin_left_desc'); ?></small>
                        </label>
					<input type="text" id="tooltip_margin_left" name="tooltip_margin_left"  value="<?php echo @$settings->tooltip_margin_left == '' ? $default_settings['tooltip_margin_left'] : $settings->tooltip_margin_left; ?>" />
				
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="tooltip_margin_right"><?php echo lang('piecemaker.tooltip_margin_right_label'); ?>
                     <small> <?php echo lang('piecemaker.tooltip_margin_right_desc'); ?></small>
                     </label>
					<input type="text" id="tooltip_margin_right" name="tooltip_margin_right"  value="<?php echo @$settings->tooltip_margin_right == '' ? $default_settings['tooltip_margin_right'] : $settings->tooltip_margin_right; ?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="tooltip_text_sharpness"><?php echo lang('piecemaker.tooltip_text_sharpness_label'); ?>
                      <small> <?php echo lang('piecemaker.tooltip_text_sharpness_desc'); ?></small>
                      </label>
				<input type="text" id="tooltip_text_sharpness" name="tooltip_text_sharpness"  value="<?php echo @$settings->tooltip_text_sharpness == '' ? $default_settings['tooltip_text_sharpness'] : $settings->tooltip_text_sharpness; ?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="tooltip_text_thickness"><?php echo lang('piecemaker.tooltip_text_thickness_label'); ?>
                           <small> <?php echo lang('piecemaker.tooltip_text_thickness_desc'); ?></small>
                     </label>
				<input type="text" id="tooltip_text_thickness" name="tooltip_text_thickness"  value="<?php echo @$settings->tooltip_text_thickness == '' ? $default_settings['tooltip_text_thickness'] : $settings->tooltip_text_thickness; ?>" />
					
				</li>
            </ul>

</section>

</div>              
                
 <div class="one_half last">

<section class="title">
			<h4><?php echo lang('piecemaker.info_title_label') ?></h4>
		
		</section>
		
	<section class="item">    
    
    <ul>               
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="info_width"><?php echo lang('piecemaker.info_width_label'); ?>
                      <small> <?php echo lang('piecemaker.info_width_desc'); ?></small>
                      </label>
					<input type="text" id="info_width" name="info_width"  value="<?php echo @$settings->info_width == '' ? $default_settings['info_width'] : $settings->info_width; ?>" />
			
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="info_background"><?php echo lang('piecemaker.info_background_label'); ?>
                      <small> <?php echo lang('piecemaker.info_background_desc'); ?></small>
                      </label>
					<input type="text"  class="colorpickerField" id="info_background" name="info_background"  value="<?php echo @$settings->info_background == '' ? $default_settings['info_background'] : $settings->info_background; ?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="info_background_alpha"><?php echo lang('piecemaker.info_background_alpha_label'); ?>
                      <small> <?php echo lang('piecemaker.info_background_alpha_desc'); ?></small>
                      </label>
					<input type="text" id="info_background_alpha" name="info_background_alpha"  value="<?php echo @$settings->info_background_alpha == '' ? $default_settings['info_background_alpha'] : $settings->info_background_alpha; ?>" />
				
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="info_margin"><?php echo lang('piecemaker.info_margin_label'); ?>
                     <small> <?php echo lang('piecemaker.info_margin_desc'); ?></small>
                     </label>
					<input type="text" id="info_margin" name="info_margin"  value="<?php echo @$settings->info_margin == '' ? $default_settings['info_margin'] : $settings->info_margin; ?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="info_sharpness"><?php echo lang('piecemaker.info_sharpness_label'); ?>
                      <small> <?php echo lang('piecemaker.info_sharpness_desc'); ?></small>
                      </label>
					<input type="text" id="info_sharpness" name="info_sharpness"  value="<?php echo @$settings->info_sharpness == '' ? $default_settings['info_sharpness'] : $settings->info_sharpness; ?>" />
				
				</li>
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="info_thickness"><?php echo lang('piecemaker.info_thickness_label'); ?>
                           <small> <?php echo lang('piecemaker.info_thickness_desc'); ?></small>
                     </label>
					<input type="text" id="info_thickness" name="info_thickness"  value="<?php echo @$settings->info_thickness == '' ? $default_settings['info_thickness'] : $settings->info_thickness; ?>" />
					
				</li>
    
             </ul>

</section>

</div>   

<div class="clear"  />          
             
<div class="float-right buttons">
		<button type="submit" name="btnAction" value="save" class="btn blue"><span><?php echo lang('buttons.save'); ?></span></button>	
		<a href="<?php echo site_url('admin/piecemaker'); ?>" class="btn gray cancel"><?php echo lang('buttons.cancel'); ?></a>
	</div>


	

		
</section>



