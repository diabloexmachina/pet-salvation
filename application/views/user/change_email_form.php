<?php

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'class'=> 'form-control'
);

$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class'=> 'form-control'
);


?>



<?php echo form_open($this->uri->uri_string()); ?>


<h4 class="text-center"><?php echo $formtitle;?></h4>
<div class="row">
    <div class="col-xs-2 col-sm-2"></div>
    <div class="col-xs-8 col-sm-8">
        <?php if (isset($success_message)) { echo '<p>'.$success_message.'</p>';}
        ?>

        <?php
              echo form_open('user/change_email');
        ?>

             <div class="panel panel-default">
                <div class="panel-body">


                  <div class="form-group">

                  	<?php
                       if(form_error($password['name'])){

                              echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error($password['name']).'</div>';

                       }

                    ?>

		              <?php echo form_label('Password', $password['id']); ?>
		              <?php echo form_password($password); ?>
		              
		          </div>
	
	              <div class="form-group">

                       <?php
                            if(form_error($email['name'])){

                               echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error($email['name']).'</div>';

                             }

                       ?>

		              <?php echo form_label('New email address', $email['id']); ?>
		              <?php echo form_input($email); ?>
		              
		          </div>
	

                <?php echo form_submit('change', 'Send confirmation email'); ?>
                <?php echo form_close(); ?>


             </div>
        </div>
    </div>
    <div class="clearfix visible-xs-block"></div>
    <div class="col-xs-2 col-sm-2"></div>

</div>
