<?php echo validation_errors(); ?>

  <h3 class="text-center"><?php  echo $formtitle;  ?></h3>
  <div class="row">
  <div class="col-xs-3 col-sm-3"></div>
  <div class="col-xs-6 col-sm-6">
        
          <?php echo form_open('admin/create'); ?>

      <div class="panel panel-default">
          <div class="panel-body">
            <div class="form-group">
             <label id="username" for="username">Username:</label>
             <input id="username"class="form-control" name="username" type="text" value="<?php //echo set_value('username', isset($userdetails['username']) ? $userdetails['username'] : '');  ?>"/>
            </div>


            <div class="form-group">
              <label id="email" for="email">Email:</label>
              <input id="email" class="form-control" name="email" type="text" value="<?php //echo set_value('email', isset($userdetails['email']) ? $userdetails['email'] : '');  ?>"/>
            </div>
      
            <div class="form-group">
              <label id="password" for="password">Password:</label>
              <input id="password"class="form-control" name="password" type="password" value="<?php //echo set_value('password', isset($userdetails['password']) ? $userdetails['password'] : '');  ?>"/>
            </div>


            <div class="form-group">
              <label id="password" for="password">Password Confirm:</label>
              <input id="password"class="form-control" name="passwordconfirm" type="password" value="<?php //echo set_value('password', isset($userdetails['passwordconfirm']) ? $userdetails['passwordconfirm'] : '');  ?>"/>
            </div>


            <input  type="submit" class="btn btn-info" name="submit" value="Register" />
    
        </form>
		
		   </div>
		</div>
   </div>
  <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-3 col-sm-3"></div>
    
</div>