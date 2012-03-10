<section class="title">
	<h4><?php echo $module_details['name']; ?></h4>
</section>



<section class="item">	
<?php if ( !empty($piecemaker)): ?>
<?php echo form_open('admin/piecemaker/action' , 'class="crud"');?>
<table border="0" class="table-list">
		<thead>
			<tr>
				<td align="center"></td>
                <td align="center"><strong><?php echo lang('piecemaker.id_label');?></strong></td>
                <td><strong><?php echo lang('piecemaker.title_label');?></strong></td>
                <td><strong><?php echo lang('piecemaker.description_label');?>:</strong></td>
                <td><strong><?php echo lang('piecemaker.number_files_label');?>:</strong></td>
				<td><strong><?php echo lang('piecemaker.created_on_label');?></strong></td>
				<th></th>
			</tr>
		</thead>
        
        <tbody>
           <?php  foreach( $piecemaker as $row ): ?>
			<tr>
				<td width="10"><?php echo form_checkbox('action_to[]', $row ->id); ?></td>
                <td width="10"><?php echo $row->id; ?></td>
                <td width="130"><?php echo $row->title; ?></td>
                <td ><?php  $this->load->helper('text');  echo word_limiter($row->description, 20); ?></td>
               
              
				<td width="100"><?php echo format_date($row->created_on); ?></td>
				<td class="actions">
			
                    <?php echo anchor('piecemaker/admin_files/add_file/'.$row->id, lang('piecemaker.add_file_label'), 'class="btn green"'); ?>
					<?php echo anchor('piecemaker/admin_files/files/'.$row->id, lang('piecemaker.manage_label'), 'class="btn orange edit"'); ?>
              
				</td>
			</tr>
            <?php endforeach; ?>		
            </tbody>
            </table>
        
          	
	

	<div class="table_action_buttons">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete') )); ?>
	</div>

<?php echo form_close(); ?>

<?php else: ?>
	<div class="no_data">
		<?php echo image('album.png', 'piecemaker', array('alt' => 'No Images')); ?>
		
        <?php echo anchor('admin/piecemaker/create', 'Add piecemaker', 'class="btn blue"'); ?>
		<h2><?php echo lang('piecemaker.no_piecemakers_label'); ?></h2>
	</div>
<?php endif;?>


</section>