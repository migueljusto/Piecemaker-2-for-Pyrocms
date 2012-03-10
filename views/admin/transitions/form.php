
<section class="title">
<?php if ($this->method === 'add_transition'): ?>
<h4><?php echo lang('piecemaker.add_transition_label'); ?></h4>
<?php else: ?>
<h4><?php echo lang('piecemaker.edit_transition_label').' -> '.  $piecemaker->title; ?></h4>
<?php endif; ?>

</section>

<section class="item">
<?php echo form_open_multipart(uri_string(),'class="form_inputs"'); ?>

<?php echo form_hidden('id_piecemaker', $piecemaker->id);  ?>

<?php if ($this->method === 'edit_transition'): ?>

<?php echo form_hidden('id_trans', $transition->id);  ?>

<?php endif; ?>

	<ul>
    
                
		     
           		 
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="pieces"><?php echo lang('piecemaker.pieces_label'); ?>
                    <small> <?php echo lang('piecemaker.pieces_desc'); ?></small>
                    </label>
					<input type="text" id="pieces" name="pieces"  value="<?php echo @$transition->pieces == '' ? $default_transition['pieces'] : $transition->pieces; ?>" />
				
				</li>
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="time_cube"><?php echo lang('piecemaker.time_label'); ?>
                    <small> <?php echo lang('piecemaker.time_desc'); ?></small>
                    </label>
					<input type="text" id="time_cube" name="time_cube"  value="<?php echo @$transition->time_cube == '' ? $default_transition['time_cube'] : $transition->time_cube; ?>" />
				
				</li>
                
                 <li class="<?php echo alternator('', 'even'); ?>">
					<label for="transition"><?php echo lang('piecemaker.transition_label'); ?>
                    <small> <?php echo lang('piecemaker.transition_desc'); ?></small>
                    </label>
<?php echo form_dropdown('transition', $transitions_eff,@$transition->transition == '' ? $default_transition['transition'] : $transition->transition ); ?>
				</li>
                 
                 <li class="<?php echo alternator('', 'even'); ?>">
					<label for="delay"><?php echo lang('piecemaker.delay_file_label'); ?>
                    <small> <?php echo lang('piecemaker.delay_file_desc'); ?></small>
                    </label>
					<input type="text" id="delay" name="delay"  value="<?php echo @$transition->delay == '' ? $default_transition['delay'] : $transition->delay;?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="depth_offset"><?php echo lang('piecemaker.depth_offset_label'); ?>
                    <small> <?php echo lang('piecemaker.depth_offset_desc'); ?></small>
                    </label>
					<input type="text" id="depth_offset" name="depth_offset"  value="<?php echo @$transition->depth_offset == '' ? $default_transition['depth_offset'] : $transition->depth_offset;?>" />
					
				</li>
                
                <li class="<?php echo alternator('', 'even'); ?>">
					<label for="cube_distance"><?php echo lang('piecemaker.cube_distance_label'); ?>
                    <small> <?php echo lang('piecemaker.cube_distance_desc'); ?></small>
                    </label>
					<input type="text" id="cube_distance" name="cube_distance"  value="<?php echo @$transition->cube_distance == '' ? $default_transition['cube_distance'] : $transition->cube_distance;?>" />
					
				</li>
                

			</ul>
		
       
		<div class="float-right buttons">
		<button type="submit" name="btnAction" value="save" class="btn blue"><span><?php echo lang('buttons.save'); ?></span></button>	
        <button type="submit" name="btnAction" value="save_exit" class="btn blue"><span><?php echo lang('buttons.save_exit'); ?></span></button>	
		<a href="<?php echo site_url('admin/piecemaker/files'. $piecemaker->id); ?>" class="btn gray cancel"><?php echo lang('buttons.cancel'); ?></a>
	</div>

		
</section>
	

