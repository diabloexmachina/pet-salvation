<h3 class="text-center"><?php  echo $formtitle;  ?></h3>
<div class="row">
  <div class="col-xs-3 col-sm-3"></div>
  <div class="col-xs-6 col-sm-6">
    <?php if (isset($success_message)) { echo '<p>'.$success_message.'</p>';}else{?>
		<?php echo '<p>To login enter your credentials:</p>';}?>
        <?php 
        echo form_open('admin/authenticate');

                  if(validation_errors()){

                      echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.
                      validation_errors().'</div>';

                  }

        ?>

        <div class="panel panel-default">
          <div class="panel-body">
            
            <div class="form-group">
            <label id="username" for="username">Username:</label>
            <input id="username"class="form-control" name="username" type="text" value="<?php if (!empty($username)) echo $username; ?>"/>
			      </div>
			      <div class="form-group">
            <label id="password" for="password">Password:</label>
            <input id="password"class="form-control" name="password" type="password" value=""/>
			      </div>
			
            <input  type="submit" class="btn btn-info" name="submit" value="Login" />
        </form>

        
        </div>
      </div>
   </div>
  <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-3 col-sm-3"></div>
		
</div>