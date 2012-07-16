<ul>
	<li class="<?php echo alternator('even', ''); ?>">
			<label for="id">Choose Piecemaker</label>
			<?php echo form_dropdown('id', $select_piece, $options['id']); ?>
	</li>
   
 	 <li class="even">
		<label>Width</label>
    <?php echo form_input(array('name' => 'width', 'value' => $options['width'])); ?>
	</li>
    <li class="even">
		<label>Height</label>
    <?php echo form_input(array('name' => 'height', 'value' => $options['height'])); ?>
	</li>
</ul>