<h4 class="text-center"><?php echo $title ?></h4>

<?php

if(isset($message)){

  echo'<p>'.$message.'</p>';

}

//
if(!empty($ads)){

 foreach($ads as $ad){

    $id=$ad["ad_id"];

//echo "<div class=' spacing well'>";
  echo '<div class="panel panel-default">';
  echo '<div class="panel-body">';
  echo '<table style="width:100%" class="table table-striped">';
  echo '<tr><td style="width:5%"><strong>Ad ID:</strong></td><td style="width:5%">'.$ad["ad_id"]."</td></td>";
  echo '<td style="width:15%"><strong>Date Posted:</strong></td><td style="width:15%">'.$ad["date_posted"]."</td>";
  echo '<td style="width:15%"><strong>Town:</strong></td><td style="width:15%">'.$ad["town"]."</td>";
  echo '<td style="width:15%"><strong>Town:</strong></td><td style="width:15%">'.$ad["description"]."</td>";


?>

<?php

echo'<div class="btn-group" role="group" aria-label="...">';

?>
<a class="btn btn-success xs" title="View Request" href="<?php echo base_url();?>commercialrequest/show/<?php echo $id;?>">Details</a>
<a class="btn btn-success xs" title="View Request" href="<?php echo base_url();?>ad/approve/<?php echo $id;?>">approve</a>
<a class="btn btn-success xs" title="View Request" href="<?php echo base_url();?>ad/remove/<?php echo $id;?>">remove</a>
</div>


<?php
echo "</table>";
echo"</div>";
echo"</div>";
?>

<?php
}
if(!empty($links)){

  echo $links;

}
}
?>