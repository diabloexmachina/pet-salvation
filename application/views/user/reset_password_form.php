<?php
$new_password = array(

	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class' => 'form-control'
);
$confirm_new_password = array(

	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
	'class' => 'form-control'
);
?>

<h4 class="text-center"><?php echo $formtitle;?></h4>
<div class="row">
    <div class="col-xs-2 col-sm-2"></div>
    <div class="col-xs-8 col-sm-8">
        <?php if (isset($success_message)) { echo '<p>'.$success_message.'</p>';}
        ?>

        <?php
              echo form_open('user/reset_password');
        ?>

             <div class="card">
                <div class="card-body">

                  <div class="form-group">

                  	<?php echo form_label('New Password', $new_password['id']); ?>

                    <?php
                       if(form_error($new_password['name'])){

                            echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error($new_password['name']).'</div>';

                        } 

                    ?>

		             <?php echo form_password($new_password); ?>

		          </div>


		          <div class="form-group">


		          	<?php echo form_label('Confirm New Password', $confirm_new_password['id']); ?>

                    <?php
                       if(form_error($confirm_new_password['name'])){

                            echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error($confirm_new_password['name']).'</div>';

                        } 

                    ?>
	
		            <?php echo form_password($confirm_new_password); ?>

		          </div>

                    <?php echo form_submit('change', 'Change Password'); ?>
                    <?php echo form_close(); ?>


            </div>
        </div>
    </div>
    <div class="clearfix visible-xs-block"></div>
    <div class="col-xs-2 col-sm-2"></div>

</div>
