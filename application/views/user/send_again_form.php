<?php
$email = array(

	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class'=> 'form-control'
);
?>



<h4 class="text-center"><?php echo $formtitle;?></h4>
<div class="row">
    <div class="col-xs-2 col-sm-2"></div>
    <div class="col-xs-8 col-sm-8">
        <?php if (isset($success_message)) { echo '<p>'.$success_message.'</p>';}
        ?>

        <?php
              echo form_open('user/send_again');
        ?>

             <div class="card">
                <div class="card-body">


                  <div class="form-group">

                  	<?php

                    if(form_error($email['name'])){

                        echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error($email['name']).'</div>';

                    }

                    ?>

		            <?php echo form_label('Email Address', $email['id']); ?>
		            <?php echo form_input($email); ?>

		          </div>
	
                   <?php echo form_submit('send', 'Send'); ?>
                   <?php echo form_close(); ?>


            </div>
        </div>
    </div>
    <div class="clearfix visible-xs-block"></div>
    <div class="col-xs-2 col-sm-2"></div>

</div>

