 <h4 class="text-center"><?php echo $formtitle;?></h4>

    <div class="row">
    <div class="col-xs-3 col-sm-2"></div>
    <div class="col-xs-9 col-sm-8">

  <?php 

    echo form_open_multipart('listing/contact');

  ?>

   <div class="card">
   <div class="card-body">

  <div class="form-group">
    <label for="exampleInputEmail1">First Name:</label>

    <?php
    if(form_error('firstname')){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'.
                     form_error('firstname')
                 .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }

    ?>
         <input type="text" class="form-control" name="firstname" value="" placeholder="First Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Last Name:</label>

    <?php
    if(form_error('lastname')){

                echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error('lastname').'</div>';

    }

    ?>
        <input type="text" class="form-control" name="lastname" value="" placeholder="Last Name">
  </div>

  

  <div class="form-group">
    <label for="exampleInputEmail1">Phone Number:</label>

    <?php
    if(form_error('phonenumber')){

                      echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error('phonenumber').'</div>';

    }

    ?>
      <input type="text" class="form-control" name="phonenumber" value="<?php echo set_value('phonenumber', isset($listing['telephone']) ? $listing['phonenumber'] : ''); ?>" placeholder="Phone Number">
  </div>
  
  <div class="form-group"><!-- possibility of multiple api -->
    <label for="exampleInputEmail1">Email:</label>

    <?php
    if(form_error('email')){

                      echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error('email').'</div>';

    }

    ?>
      <input type="text" class="form-control" name="email" value="<?php echo set_value('email', isset($listing['email']) ? $listing['email'] : ''); ?>" placeholder="Email">
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Message:</label>

    <?php
    if(form_error('message')){

                      echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error('message').'</div>';

    }

    ?>
      <textarea type="text" class="form-control" name="message" value="" placeholder="Message"></textarea>
  </div>

  <input  type="submit" name="submit" class="btn btn-info btn-block" value="Send" />

       </div>        
    </div>

  </div>   

</form>

  <!-- Optional: clear the XS cols if their content doesn't match in height -->
  <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-3 col-sm-2"></div>

</div>