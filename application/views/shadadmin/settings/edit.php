<div class="title">		
	<h2>System Settings</h2>
</div>

<div class="box">
	<h2>System Settings List</h2>
	<?php	if ( ! empty($errors)):?>
			<ul class="error_message">
			<?php foreach ($errors as $fields => $error): ?>
					<li><?php echo $error;?></li>
			<?php endforeach; ?>
			</ul>
	<?php	endif ?>
		<?php echo form::open(); ?>
            <ul>
                <li>
		    		<?php echo form::label('content_path'); ?>
					<div>
		    			<?php echo form::input('content_path', form::set_value('content_path', $settings['content_path']), 'class="text medium"'); ?>
		        	</div>
					<label class="note">Input note message goes here.</label>
				</li>
                <li>
            		<?php echo form::label('font_path'); ?>
					<div>
		    			<?php echo form::input('font_path', form::set_value('font_path', $settings['font_path']), 'class="text medium"'); ?>
					</div>
					<label class="note">Input note message goes here.</label>
		        </li>
                <li>
            		<?php echo form::submit('update', 'Update', 'class="submit"'); ?>
		        </li>
            </ul>
		<?php echo form::close(); ?>
</div>