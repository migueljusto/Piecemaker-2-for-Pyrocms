<section class="title">
	<h4><?php echo lang('piecemaker.index_title'); ?></h4>
</section>



<section class="item">	
<?php if ( !empty($piecemaker)): ?>
<?php echo form_open('admin/piecemaker/action' , 'class="crud"');?>
<table border="0" class="table-list">
		<thead>
			<tr>
				<td  width="10" align="center"></td>
                <td width="10" align="center"><strong><?php echo lang('piecemaker.id_label');?></strong></td>
                <td  width="120" align="center"><strong><?php echo lang('piecemaker.slug_label');?></strong></td>
                <td  width="100"><strong><?php echo lang('piecemaker.title_label');?></strong></td>
                <td width="150"><strong><?php echo lang('piecemaker.description_label');?></strong></td>
                <td width="30"><strong><?php echo lang('piecemaker.number_files_label');?></strong></td>
                <td width="30"><strong><?php echo lang('piecemaker.number_transitions_label');?></strong></td>
				<td width="100"><strong><?php echo lang('piecemaker.created_on_label');?></strong></td>
				<th></th>
			</tr>
		</thead>
        
        <tbody>
           <?php  foreach( $piecemaker as $row ): ?>
			<tr>
				<td><?php echo form_checkbox('action_to[]', $row ->id); ?></td>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->slug; ?></td>
                <td><?php echo  character_limiter($row->title, 10); ?></td>
                <td ><?php echo character_limiter($row->description, 20); ?></td>
                <td><?php echo  count(unserialize($row->files)); ?></td>
            	<td><?php echo  count(unserialize($row->transitions)); ?></td>
				<td ><?php echo format_date($row->created_on); ?></td>
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
		<?php // echo img('album.png', 'piecemaker', array('alt' => 'No Images')); ?>
		<?php echo lang('piecemaker.no_piecemakers_label'); ?><br/><br/>
        <?php echo anchor('admin/piecemaker/create', lang('piecemaker.add_piecemaker_label'), 'class="btn blue"'); ?>
		
	</div>
<?php endif;?>


</section>