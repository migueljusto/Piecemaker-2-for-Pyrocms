<script type="text/javascript">

    var instance_old = CKEDITOR.instances[$('textarea.wysiwyg-advanced').attr('id')];
			    instance_old && instance_old.destroy();
				
	var instance;

	function update_instance()
	{
		instance = CKEDITOR.currentInstance;
	}
	
	         

	(function($) {
		$(function(){


				
			pyro.init_ckeditor = function(){
				
				$('textarea.wysiwyg-advanced').ckeditor({
					toolbar: [
						['Maximize'],
						['pyroimages', 'pyrofiles'],
						['Cut','Copy','Paste','PasteFromWord'],
						['Undo','Redo','-','Find','Replace'],
						['Link','Unlink'],
						['Table','HorizontalRule','SpecialChar'],
						['Bold','Italic','StrikeThrough'],
						['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl'],
						['Format', 'FontSize', 'Subscript','Superscript', 'NumberedList','BulletedList','Outdent','Indent','Blockquote'],
						['ShowBlocks', 'RemoveFormat', 'Source']
					],
					extraPlugins: 'pyroimages,pyrofiles',
					width: '99%',
					height: 400,
					dialog_backgroundCoverColor: '#000',
					removePlugins: 'elementspath',
					defaultLanguage: 'en',
					language: 'pt'
				});
			};
			pyro.init_ckeditor();

		});
	})(jQuery);
</script>
           		 
<?php if ( $type =='img'){ 



?>
                 
	<li class="fild_input <?php echo alternator('', 'even'); ?>">
    	<label for="info"><?php echo lang('piecemaker.description_label'); ?></label>
   		 <br style="clear: both;" />
		<?php echo form_textarea(array('id' => 'info', 'name' => 'info', 'value' =>'', 'class' => 'wysiwyg-advanced')); ?>
	</li>

 <?php } ?>        
 
 <?php if ( $type =='swf'){ ?>
                 
	<li class="fild_input <?php echo alternator('', 'even'); ?>">
    	<label for="file_background"><?php echo lang('piecemaker.background_label'); ?></label>
		<?php echo form_upload('file_background'); ?><?php echo $settings['image_width'] ?>px<?php echo $settings['image_height'] ?>px
	</li>

 <?php } ?>       
 
  <?php if ( $type =='video'){ ?>
  
  	<li class="fild_input <?php echo alternator('', 'even'); ?>">
  		<label for="file_background"><?php echo lang('piecemaker.background_label'); ?></label>
		<?php echo form_upload('file_background'); ?><?php echo $settings['image_width'] ?>px<?php echo $settings['image_height'] ?>px
    </li>            
	<li class="fild_input <?php echo alternator('', 'even'); ?>">
    	<label for="autoplay"><?php echo lang('piecemaker.autoplay_label'); ?></label>
        <?php echo form_radio('autoplay', '1',TRUE) ?> <?php echo lang('piecemaker.yes_label');?>
		<?php echo form_radio('autoplay', '0') ?> <?php echo lang('piecemaker.no_label');?>
	</li>

 <?php } ?>   
              

			