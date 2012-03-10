
<section class="title">
<?php if ($this->method === 'add_file'): ?>
<h4><?php echo lang('piecemaker.new_file_label'); ?></h4>
<?php else: ?>
<h4><?php echo lang('piecemaker.edit_file_label').' -> '. $file['title'].' -> '.$piecemaker->title; ?></h4>
<?php endif; ?>

</section>

<section class="item">
<?php echo form_open_multipart(uri_string()); ?>

<?php echo form_hidden('id_piecemaker', $piecemaker->id);  ?>

<?php 
if ($this->method === 'edit_file'):
echo form_hidden('id_file', $id_file); 
endif;
 ?>

<div class="form_inputs">

	<ul>
    
                
   				 <li class="<?php echo alternator('', 'even'); ?>">
    				<label for="file_type"><?php echo lang('piecemaker.type_file_label'); ?></label>
				
					<?php echo form_radio('file_type', 'img', $file['file_type'] == 'img') ?> <?php echo lang('piecemaker.image_label');?>
					<?php echo form_radio('file_type', 'swf', $file['file_type'] == 'swf') ?> <?php echo lang('piecemaker.swf_label');?>
					<?php echo form_radio('file_type', 'video', $file['file_type'] == 'video') ?> <?php echo lang('piecemaker.video_label');?>
	
				</li>
		     
           		 
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="title"><?php echo lang('piecemaker.title_label'); ?></label>
					<input type="text" id="title" name="title"  value="<?php echo $file['title']; ?>" />
					<span class="required-icon tooltip"><?php echo lang('required_label'); ?></span>
				</li>
                
                
                 <li class="<?php echo alternator('', 'even'); ?>">
				<label for="file"><?php echo lang('piecemaker.file_label'); ?></label>
                
                
                
                <?php if ($this->method === 'edit_file'): ?>
                
                	
							<?php if ($file['file_type'] == 'img') { ?>
                            
								<img src="<?php 
								 $file_x = $file['file_name'];
							     $info = pathinfo($file_x);
							     $file_name =  basename($file_x,'.'.$info['extension']);
								 
							     $image_thumb = increment_string( $file_name, '_', 'thumb.'.$info['extension']); 
								
								 echo $upload_path. $image_thumb; ?>" width="100"  />
		
                
							<?php }else{ 
							
								 echo $file['file_name']; 
							
							 }
							   
							 	 
			 	   endif; ?>
                
				<?php echo form_upload('file'); ?><?php echo $settings['image_width'] ?>px<?php echo $settings['image_height'] ?>px
                <span class="required-icon tooltip"><?php echo lang('required_label'); ?></span>
			     </li>
                 
                 
             <?php if (  ($this->method === 'edit_file') or (!empty($file['file_type'])) ): ?>
             
             <?php if ( $file['file_type'] === 'img'){ ?>
             
				 <li class="fild_input <?php echo alternator('', 'even'); ?>">
                 	<label for="info"><?php echo lang('piecemaker.info_label'); ?></label>
                    <br style="clear: both; width:;" />
					<?php echo form_textarea(array('id' => 'info', 'name' => 'info', 'value' => $file['info'], 'class' => 'wysiwyg-advanced','cols' => '10' , 'style' =>'width:'.$settings['info_width'].'px;' )); ?>
				</li>
                
			  <?php }else { ?>
       
                 <li class="fild_input <?php echo alternator('', 'even'); ?>">
				<label for="file_background"><?php echo lang('piecemaker.background_label'); ?></label>
                
                 <?php if ($this->method == 'edit_file' and  $file['background']!=''){ ?>
               
							
								<img src="<?php 
								 $file_x = $file['background'];
							     $info = pathinfo($file_x);
							     $file_name =  basename($file_x,'.'.$info['extension']);
								 
							     $image_thumb = increment_string( $file_name, '_', 'thumb.'.$info['extension']); 
								
								 echo $upload_path. $image_thumb; ?>" width="100"  />
		 	 
			    <?php } ?>
                
				<?php echo form_upload('file_background'); ?><?php echo $settings['image_width'] ?>px<?php echo $settings['image_height'] ?>px
                </li>
				
			   <?php }
			   
			    if ( $file['file_type'] == 'video'){ ?>
              
               <li class="fild_input <?php echo alternator('', 'even'); ?>">
                	<label for="autoplay"><?php echo lang('piecemaker.autoplay_label'); ?></label>
                    <?php echo form_radio('autoplay', '1', $file['autoplay'] == '1',TRUE) ?> <?php echo lang('piecemaker.yes_label');?>
					<?php echo form_radio('autoplay', '0', $file['autoplay'] == '0') ?> <?php echo lang('piecemaker.no_label');?>
			   </li>
               <?php } ?>
                 
                 
			 <?php endif; ?>
                
              

			</ul>
		
        </div>
		<div class="float-right buttons">
		<button type="submit" name="btnAction" value="save" class="btn blue"><span><?php echo lang('buttons.save'); ?></span></button>	
        <button type="submit" name="btnAction" value="save_exit" class="btn blue"><span><?php echo lang('buttons.save_exit'); ?></span></button>	
		<a href="<?php echo site_url('admin/piecemaker/files'.$id_piecemaker); ?>" class="btn gray cancel"><?php echo lang('buttons.cancel'); ?></a>
	</div>

		
</section>
	

