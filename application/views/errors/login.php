<h3 class="text-center"><?php  echo $formtitle;  ?></h3>
<div class="row">
  <div class="col-xs-3 col-sm-3"></div>
  <div class="col-xs-6 col-sm-6">
    <?php if (isset($success_message)) { echo '<p>'.$success_message.'</p>';}else{?>
		<?php echo '<p>To login enter your credentials:</p>';}?>
        <?php 
        echo form_open('user/authenticate');
        echo '<div class="well">';

        ?>
            <div class="form-group">
            <label id="username" for="username">Username:</label>
            <input id="username"class="form-control" name="username" type="text" value="<?php //if (!empty($user_username)) echo $user_username; ?>"/>
			      </div>
			
			      <div class="form-group">
            <label id="password" for="password">Password:</label>
            <input id="password"class="form-control" name="password" type="password" value="<?php //if (!empty($user_username)) echo $user_username; ?>"/>
			      </div>

            <div class="form-group">
            <label id="email" for="email">Email:</label>
            <input id="email" class="form-control" name="email" type="text" value="<?php //if (!empty($user_username)) echo $user_username; ?>"/>
            </div>


            <div class="form-group">
            <label id="department" for="department">Department:</label>
            <input id="department"class="form-control" name="department" type="text" value="<?php //if (!empty($user_username)) echo $user_username; ?>"/>
            </div>

            <div class="form-group">
              <label id="position" for="position">Title:</label>
              <input id="position"class="form-control" name="title" type="text" value="<?php //if (!empty($user_username)) echo $user_username; ?>"/>
            </div>

            <input  type="submit" class="btn btn-success" name="submit" value="Login" />
		 
        </form>

        <?php 
        echo validation_errors(); 
        echo '</div>';
        ?>
   </div>
  <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-3 col-sm-3"></div>
		
</div>