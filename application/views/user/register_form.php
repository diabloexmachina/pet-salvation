<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
    'class' => 'form-control'
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
    'class' => 'form-control'
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
  'class' => 'form-control'
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
  'class' => 'form-control'
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
  'class' => 'form-control'
);
?>


<h4 class="text-center"><?php echo $formtitle;?></h4>

    <div class="row">
    <div class="col-xs-3 col-sm-2"></div>
    <div class="col-xs-9 col-sm-8">


<div class="card">
   <div class="card-body">

       <?php if (isset($success_message)) { echo '<p>'.$success_message.'</p>';}?>
       <?php

       echo form_open('user/register');

       ?>
               <?php if ($use_username) { ?>
                <div class="form-group">

                       <label id="username" for="username">Username:</label>

                       <?php
                       if(form_error($username['name'])){

                           echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error($username['name']).'</div>';

                       }

                       ?>
                       <?php echo form_input($username); ?>
                </div>
               <?php } ?>

               <div class="form-group">
                   <label id="email" for="email">Email:</label>

                   <?php
                   if(form_error($email['name'])){

                          echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error($email['name']).'</div>';

                   }

                   ?>
                   <?php echo form_input($email); ?>
               </div>

               <div class="form-group">
               <label id="password" for="password">Password:</label>

                 <?php
                 if(form_error($password['name'])){

                           echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error($password['name']).'</div>';

                 }

                 ?>
                  <?php echo form_password($password); ?>
               </div>

               <div class="form-group">
                   <label id="password" for="password">Confirm Password:</label>

                   <?php

                   if(form_error($confirm_password['name'])){

                       echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error($confirm_password['name']).'</div>';

                   }

                   ?>
                   <?php echo form_password($confirm_password); ?>
               </div>

               <input  type="submit" class="btn btn-info btn-block" name="submit" value="Register" />
               </form>


  <table>
       <?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
  <div class="form-group"></div>
	<tr>
		<td colspan="3">
			<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
	</tr>
	<?php }
	} ?>
</table>


     </div>
   </div>

<div class="clearfix visible-xs-block"></div>
  <div class="col-xs-3 col-sm-2"></div>
    </div>
    </div>