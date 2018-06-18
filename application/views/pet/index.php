<div class="container" id="the-container">

<h4 class="text-center"><?php echo $title ?></h4>

<?php

if(isset($message)){

	echo'<p>'.$message.'</p>';

}
?>

<div class="card-deck">
<?php
if(!empty($pets)){


 foreach($pets as $pet){

   $id=$pet["pet_id"];
 
  
?>

<?php

          echo'<div class="card">';
?>
                       <img class="card-img-top" src="<?php echo base_url().'uploads/'.$pet['photos'];?>" alt="Card image cap">

<?php
                  echo'<div class="card-body">';
                       echo'<h5 class="card-title"><strong>Posted By:</strong>'.$pet["posted_by"].'</h5>';
                       echo'<p class="card-text">'.$pet["description"]." Call  ".$pet["telephone"].'</p>';
                       echo'<p class="card-text"><small class="text-muted">'.$pet["date_posted"].'</small></p>';
                 echo'</div>';
          echo'</div>';
          
        
  
?>

<?php
}
?>

</div>

<?php
if(!empty($links)){

  echo $links;

}
}

?>

  

  </div>