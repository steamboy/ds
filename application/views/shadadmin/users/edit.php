<div class="title">		
  <h2>User</h2>
</div>

<div class="box">
  <h2>Edit User</h2>
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
            <?php echo form::label('username'); ?>
          <div>
              <?php echo form::input('username', form::set_value('username', $user->username), 'readonly'); ?>
          </div>
            </li>
                <li>
                <?php echo form::label('password'); ?>
            <div>
            <?php echo form::password('password'); ?>
              </div>
        </li>
                <li>
                <?php echo form::label('password_confirm'); ?>
            <div>
            <?php echo form::password('password_confirm'); ?>
              </div>
        </li>
                <li>
          <?php echo form::label('firstname'); ?>
            <div>
            <?php echo form::input('firstname', form::set_value('firstname', $user->firstname)); ?>
              </div>
        </li>
                <li>
                <?php echo form::label('lastname'); ?>
            <div>
            <?php echo form::input('lastname', form::set_value('lastname', $user->lastname)); ?>
              </div>
        </li>
        <li>
                <?php echo form::label('email'); ?>
            <div>
            <?php echo form::input('email', form::set_value('email', $user->email), 'style="margin: 0 0 4px 0"'); ?>
              </div>
        </li>
        <!--li>
                <?php //echo $captcha->render(); ?>
          <div>
              <?php //echo form::input('captcha_response', NULL, 'class="captcha"'); ?>
              </div>
        </li-->
                <li>
                <?php echo form::submit('register', 'Register', 'class="submit"'); ?>
            </li>
            </ul>
    <?php echo form::close(); ?>
</div>
