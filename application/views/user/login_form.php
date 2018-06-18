<?php

    $login = array(
        'name'	=> 'login',
        'id'	=> 'login',
        'value' => set_value('login'),
        'maxlength'	=> 80,
        'size'	=> 30,
        'class' => 'form-control'
    );
    if ($login_by_username AND $login_by_email) {
        $login_label = 'Email or login';
    } else if ($login_by_username) {
        $login_label = 'Login';
    } else {
        $login_label = 'Email';
    }
    $password = array(
        'name'	=> 'password',
        'id'	=> 'password',
        'size'	=> 30,
        'class' => 'form-control'
    );
    $remember = array(
        'name'	=> 'remember',
        'id'	=> 'remember',
        'value'	=> 1,
        'checked'	=> set_value('remember'),
        'style' => 'margin:0;padding:0',
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
    <div class="col-xs-2 col-sm-2"></div>
    <div class="col-xs-8 col-sm-8">
        <?php if (isset($success_message)) { echo '<p>'.$success_message.'</p>';}
        ?>
        <?php

        echo form_open('user/login');

        ?>

        <div class="card alert-white">
            <div class="card-body alert-white">

                <div class="form-group">

                    <label id="username" for="username">Login:</label>

                    <?php
                    if(form_error('login')){

                        echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error('login').'</div>';

                    }

                    ?>
                    <?php echo form_input($login); ?>
                </div>
                <div class="form-group">
                    <label id="password" for="password">Password:</label>

                    <?php
                    if(form_error('password')){

                        echo '<div class="alert alert-danger">'.'<a href="#" class="close" data-dismiss="alert">&times;</a>'.form_error('password').'</div>';

                    }

                    ?>
                    <?php echo form_input($password); ?>
                    <span class="login">
                        <?php echo anchor('/user/forgot_password/', 'Forgot password?'); ?>
                    </span>
                </div>



                <input  type="submit" class="btn btn-info btn-block" name="submit" value="Login" />
                </form>

                <table>
                <?php if ($show_captcha) {
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
                        <tr>
                            <td colspan="3">
                                <p>Enter the code exactly as it appears:</p>
                                <?php echo $captcha_html; ?>
                            </td>
                        </tr>

                    <div class="form-group">
                            <?php echo form_label('Confirmation Code', $captcha['id']); ?>
                            <?php echo form_input($captcha); ?>
                            <?php echo form_error($captcha['name']); ?>
                    </div>

                    <?php }
                } ?>

                    <div class="form-group"></div>
                    <div class="form-group">
                        <?php echo form_label('Remember me: ', $remember['id']); ?>
                        <?php echo '<span>'.form_checkbox($remember).'</span>'; ?>
                    </div>


                    <span></span>
 

                    <span  class="login">
                        <?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/user/register/', 'Sign Up to post listings'); ?>
                    </span>

                </table>


            </div>
        </div>
    </div>
    <div class="clearfix visible-xs-block"></div>
    <div class="col-xs-2 col-sm-2"></div>

</div>


