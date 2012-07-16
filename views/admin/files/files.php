<?php $this->load->helper('text'); ?>

<section class="title">
	<h4><?php echo lang('piecemaker.files_title'); ?> &rarr; <?php echo $piecemaker->title; ?></h4>
</section>

<section class="item">


                
<?php if ( !empty($files)){ ?>
<?php echo form_open('piecemaker/admin_files/files_action' , 'class="crud"');?>

 <input type="hidden" name="id_piecemaker" value="<?php echo $piecemaker->id;?>" />
<table border="0" class="table-list" id="files">
		<thead>
			<tr>
				<td width="10" align="center"></td>
                <td width="30"align="center"></td>
                <td width="100"><strong><?php echo lang('piecemaker.image_label');?></strong></td>
                <td width="100"><strong><?php echo lang('piecemaker.title_label');?></strong></td>
                <td><strong><?php echo lang('piecemaker.description_label');?>:</strong></td>
                <td width="50"><strong><?php echo lang('piecemaker.type_file_label');?>:</strong></td>
				<td width="100"><strong><?php echo lang('piecemaker.created_on_label');?></strong></td>
				<td width="140"></td>
			</tr>
		</thead>
        <tbody>
           <?php   
		    $count = 0;	
			foreach ($files as  $row): ?>
			<tr>
				<td width="10"><?php echo form_checkbox('action_to[]', $count); ?></td>
                 <input type="hidden" name="id_file" value="<?php echo $count;?>" />
                <td width="30" class="handle">
				 <span class="move-handle"></span>
               
                </td>
                <td ><?php if ($row['file_type'] == 'img' ){ ?>
							
								<img src="<?php 
								 $file = $row['file_name'];
							     $info = pathinfo($file);
							     $file_name =  basename($file,'.'.$info['extension']);
								 
							     $image_thumb = increment_string( $file_name, '_', 'thumb.'.$info['extension']); 
								
								 echo $upload_path. $image_thumb; ?>" width="100"  />
								
         

							<?php }else{ ?>
                            	
                                <img src="<?php 
								 $file = $row['background'];
							     $info = pathinfo($file);
							     $file_name =  basename($file,'.'.$info['extension']);
								 
							     $image_thumb = increment_string( $file_name, '_', 'thumb.'.$info['extension']); 
								
								 echo $upload_path. $image_thumb; ?>" width="100"  />
							 	 
							<?php } ?>
					  
              </td>
                <td><?php echo character_limiter($row['title'], 10);?></td>
                <td><?php echo character_limiter($row['info'], 45);?></td>
                <td><?php echo $row['file_type']; ?></td>
				<td><?php echo format_date($row['created_on']); ?></td>
				<td class="actions">
				<?php echo anchor('piecemaker/admin_files/edit_file/'.$piecemaker->id.'/'.$count, lang('buttons.edit'), 'class="btn orange"'); ?>
                 
				<?php echo anchor('piecemaker/admin_files/delete/'.$count.'/'.$piecemaker->id, lang('buttons.delete'), array('class'=>'confirm btn red delete')); ?>
				</td>
			</tr>
            
            <?php
			 $count++;
			  endforeach; ?>
            <tr>
             <td colspan="8" style="text-align:center;">
            	<?php echo anchor('piecemaker/admin_files/add_file/'.$piecemaker->id, lang('piecemaker.add_file_label'), array('class'=>'btn green')); ?>
                </td>
            </tr>   	
            </tbody>
            </table>
            
           <div class="table_action_buttons">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete') )); ?>
	</div>
<?php echo form_close(); ?>

<?php }else{ ?>
	<div class="no_data">
		<?php // echo image('album.png', 'piecemaker', array('alt' => 'No Images')); ?>
		<?php echo lang('piecemaker.no_files_label'); ?><br/><br/>
        <?php echo anchor('piecemaker/admin_files/add_file/'.$piecemaker->id, lang('piecemaker.add_file_label'), 'class="btn blue"'); ?>
		
	</div>
<?php }?>

	

</section>