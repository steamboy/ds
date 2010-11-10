<div class="box">
	<h2>Login</h2>
	<?php echo '<p>'.$this->session->get('login_message').'</p>'; ?>
	<?php	if ( ! empty($errors)):?>
			<ul class="error_message">
			<?php foreach ($errors as $fields => $error): ?>
					<li><?php echo $error;?></li>
			<?php endforeach; ?>
			</ul>
	<?php	endif ?>
	
		<?php echo form::open('users/login', array('id'=>'user_login')); ?>
		<div>
		    <ul>
                <li><?php echo form::label('username', 'Username');?> <?php echo form::input('username', form::set_value('username'));?></li>
                <li><?php echo form::label('password', 'Password');?> <?php echo form::password('password');?></li>
                <li><?php echo form::submit('sign_in', 'Log in', 'class="submit"');?></li>
            </ul>
		</div>
		<?php echo form::close(); ?>
	
</div>