<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class'=> 'form-control'
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>

<h4 class="text-center"><?php echo $formtitle;?></h4>
<div class="row">
    <div class="col-xs-2 col-sm-2"></div>
    <div class="col-xs-8 col-sm-8">
        <?php if (isset($success_message)) { echo '<p>'.$success_message.'</p>';}
        ?>

        <?php
              echo form_open('user/forgot_password');
        ?>

             <div class="card">
                <div class="card-body">


                  <div class="form-group">

                    <label id="email" for="username">Email(or Login):</label>

                    <?php
                    if(form_error($login['name'])){

                        echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error($login['name']).'</div>';

                    }

                    ?>
                    <?php echo form_input($login); ?>

                 </div>

	             <input  type="submit" class="btn btn-success btn-block" name="reset" value="Get a new password" />
                 <?php echo form_close(); ?>

            </div>
        </div>
    </div>
    <div class="clearfix visible-xs-block"></div>
    <div class="col-xs-2 col-sm-2"></div>

</div>
