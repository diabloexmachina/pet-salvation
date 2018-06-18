<?php
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
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
              echo form_open('user/send_again');
        ?>

             <div class="card">
                <div class="card-body">


                  <div class="form-group">

                  	<?php

                    if(form_error($password['name'])){

                        echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error($password['name']).'</div>';

                    }

                    ?>

		            <?php echo form_label('Password', $password['id']); ?>
		            <?php echo form_password($password); ?>

		           </div>
	
                   <?php echo form_submit('cancel', 'Delete account'); ?>
                   <?php echo form_close(); ?>


           </div>
        </div>
    </div>
    <div class="clearfix visible-xs-block"></div>
    <div class="col-xs-2 col-sm-2"></div>

</div>