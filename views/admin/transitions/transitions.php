<section class="title">
	<h4>Transitions  ->  <?php echo $piecemaker->title; ?></h4>
</section>

<section class="item">


                
<?php if ( !empty($transitions)){ ?>
<?php echo form_open('piecemaker/admin_transitions/action' , 'class="crud"');?>
<?php echo form_hidden('id_piecemaker', $piecemaker->id);  ?>
<table border="0" class="table-list">
		<thead>
			<tr>
				<td width="10" align="center"></td>
                <td width="30"align="center"></td>
                <td><strong><?php echo lang('piecemaker.pieces_label');?></strong></td>
                <td><strong><?php echo lang('piecemaker.time_label');?></strong></td>
                <td><strong><?php echo lang('piecemaker.transition_label');?>:</strong></td>
                <td><strong><?php echo lang('piecemaker.delay_file_label');?>:</strong></td>
                <td><strong><?php echo lang('piecemaker.depth_offset_label');?>:</strong></td>
                <td><strong><?php echo lang('piecemaker.cube_distance_label');?>:</strong></td>
				<td width="140"></td>
			</tr>
		</thead>
        <tbody>
           <?php  
		   $count = 0;
		   foreach ($transitions as  $row): ?>
			<tr>
				<td width="10"><?php echo form_checkbox('action_to[]', $count); ?></td>
                <td width="30" class="handle">
				<?php echo image('icons/drag_handle.gif'); ?>
                <input type="hidden" name="id_trans" value="<?php echo $count; ?>" />
                </td>
              
                <td><?php echo $row['pieces'];   ?></td>
                <td><?php echo $row['time_cube'];?></td>
                <td><?php echo $row['transition']; ?></td>
				<td><?php echo $row['delay']; ?></td>
                <td><?php echo $row['depth_offset']; ?></td>
                <td><?php echo $row['cube_distance']; ?></td>
				<td class="actions">
                <?php echo anchor('piecemaker/admin_transitions/edit_transition/'.$piecemaker->id.'/'.$count, lang('buttons.edit'), 'class="btn orange"'); ?>
				<?php echo anchor('piecemaker/admin_transitions/delete/'.$count.'/'.$piecemaker->id, lang('buttons.delete'), array('class'=>'confirm btn red delete')); ?>
				</td>
			</tr>
            <?php 
			 $count++;
			endforeach; ?>
            <tr>
             <td colspan="9" style="text-align:center;">
            	<?php echo anchor('piecemaker/admin_transitions/add_transition/'.$piecemaker->id, lang('piecemaker.add_transition_label'), array('class'=>'btn green')); ?>
                </td>
            </tbody>
            </table>
            
            <div class="table_action_buttons">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete') )); ?>
	</div>
<?php echo form_close(); ?>

<?php }else{ ?>
	<div class="no_data">
		<?php echo image('album.png', 'piecemaker', array('alt' => 'No Images')); ?>
		
        <?php echo anchor('piecemaker/admin_transitions/add_transition/'.$piecemaker->id, 'Add Transition', 'class="btn blue"'); ?>
		<h2><?php echo lang('piecemaker.no_transitions_label'); ?></h2>
	</div>
<?php }?>

					
				
                
                

	


</section>