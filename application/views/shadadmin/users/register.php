<div class="box">
	<h2>Create an Account</h2>
	<?php	if ( ! empty($errors)):?>
			<ul class="error_message">
			<?php foreach ($errors as $fields => $error): ?>
					<li><?php echo $error;?></li>
			<?php endforeach; ?>
			</ul>
	<?php	endif ?>
		<?php echo form::open(); ?>
		<div>
            <ul>
                <li>
		    <?php echo form::label('username'); ?>
		    <?php echo form::input('username', form::set_value('username')); ?>
		        </li>
                <li>
            <?php echo form::label('password'); ?>
		    <?php echo form::password('password'); ?>
		        </li>
                <li>
            <?php echo form::label('password_confirm'); ?>
		    <?php echo form::password('password_confirm'); ?>
		        </li>
                <li>
            <?php echo form::label('first_name'); ?>
		    <?php echo form::input('first_name', form::set_value('first_name')); ?>
		        </li>
                <li>
            <?php echo form::label('last_name'); ?>
		    <?php echo form::input('last_name', form::set_value('last_name')); ?>
		        </li>
            <?php echo form::label('email'); ?>
		    <?php echo form::input('email', form::set_value('email'), 'style="margin: 0 0 4px 0"'); ?>
		        <li>
            <?php echo $captcha->render(); ?>
		    <?php echo form::input('captcha_response', NULL, 'class="captcha"'); ?>
		        </li>
                <li>
            <?php echo form::submit('register', 'Register', 'class="submit"'); ?>
		        </li>
            </ul>
        </div>
		<?php echo form::close(); ?>
</div>