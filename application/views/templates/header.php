<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('css/main.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('fonts/fontawesome-all.css'); ?>" rel="stylesheet">
    <title>ClaimYourPet</title>

  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">ClaimYourPet</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">

        <ul class="navbar-nav mr-auto">

          <li class="nav-item">

          <a href="<?php echo base_url('pet/index'); ?>" class="nav-link"  role="button" aria-haspopup="true" aria-expanded="false">HOME</a>

          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('pet/add/pet-info'); ?>" role="button" aria-haspopup="true" aria-expanded="false">ADD PET</a>
          </li>
                            

         <li class="nav-item">

          <a class="nav-link"  href="<?php echo base_url('pet/contact'); ?>"   role="button" aria-haspopup="true" aria-expanded="false">CONTACT</a>

         </li>

        <li class="nav-item">
          
          <a class="nav-link" href="<?php echo base_url('pet/about'); ?>" role="button" aria-haspopup="true" aria-expanded="false">ABOUT</a>

        </li>

        </ul>

        <ul class="nav navbar-nav pull-right">

           <li class="nav-item">

            <a  class="nav-link" href="<?php echo base_url('user/login'); ?>" role="button" aria-haspopup="true" aria-expanded="false">LOGIN</a>

           </li>

           <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('user/logout'); ?>" role="button" aria-haspopup="true" aria-expanded="false">LOGOUT</a>

           </li>


           <li id="hidesearch" class="nav-item" style="display:none">

                 <?php 

                    $attributes = array('class' => 'form-inline my-2 my-md-0');
                    echo form_open('pet/results');

                 ?>
        
                   <input class="form-control" type="text" placeholder="Enter Keyword(s)" aria-label="Search">
                 </form>

           </li>

           <li class="nav-item pull-right">
              
              <a class="nav-link" href="#search"><i class="fas fa-search" style = "color : #ffffff  ;"></i></a>

           </li>

           

        </ul>

      
        <?php if($this->session->userdata('logged_in')){ ?>

        <ul class="nav navbar-nav navbar-right">

          <li class="nav-item"><a class="nav-item" href=""><?php echo 'Welcome'.' '.$this->session->userdata('username').',';?></a></li><!-- change to cn/displayname -->
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/logout'); ?>">Log Out</a></li>
        </ul>
        <?php } ?>
        
      </div>
    </nav>


<?php
if($this->session->flashdata('status_message')) {
?>
<div class="row">
  <div class="col-xs-2 col-sm-2"></div>
  <div class="col-xs-8 col-sm-8">
     <div class="alert alert-success">
      <a href="#" class="close text-center" data-dismiss="alert" aria-label="close">&times;</a>
        <strong><?php echo $this->session->flashdata('status_message'); ?></strong>
     </div>
 <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-2 col-sm-2"></div>
    </div>
    </div>

<?php
}
?>

<?php
if($this->session->flashdata('login_success')) {
?>
<div class="row">
  <div class="col-xs-2 col-sm-2"></div>
  <div class="col-xs-8 col-sm-8">
     <div class="alert alert-success">
      <a href="#" class="close text-center" data-dismiss="alert" aria-label="close">&times;</a>
        <strong><?php echo $this->session->flashdata('login_success'); ?></strong>
     </div>
 <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-2 col-sm-2"></div>
    </div>
    </div>
<?php
}
?>

<?php
if($this->session->flashdata('login_error')) {
?>
<div class="row">
  <div class="col-xs-2 col-sm-2"></div>
  <div class="col-xs-8 col-sm-8">
     <div class="alert alert-danger">
      <a href="#" class="close text-center" data-dismiss="alert" aria-label="close">&times;</a>
        <strong><?php echo $this->session->flashdata('login_error'); ?></strong>
     </div>
 <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-2 col-sm-2"></div>
    </div>
    </div>
<?php
}
?>

<?php
if($this->session->flashdata('comment_message')) {
?>
<div class="row">
  <div class="col-xs-2 col-sm-2"></div>
  <div class="col-xs-8 col-sm-8">
     <div class="alert alert-success">
      <a href="#" class="close text-center" data-dismiss="alert" aria-label="close">&times;</a>
        <strong><?php echo $this->session->flashdata('comment_message'); ?></strong>
     </div>
 <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-2 col-sm-2"></div>
    </div>
    </div>
<?php
}
?>
