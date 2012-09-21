
<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php include("inc/header.php"); ?>

<?php




// Sort it
$feed_items = array(); // $feed_items is an array
$items = $feed->get_items(); //$items is everything that $items = $feed->get_items(); produces
$urls = array_unique($urls); // $url = is an empty $


foreach ($urls as $url => $image) {
  $unset = array();
  $feed_items[$url] = array();
  
 
  foreach ($items as $i => $item) {
    if ($item->get_feed()->feed_url == $url) {
      $feed_items[$url][] = $item;
      $unset[] = $i;
         
     }
  }


  foreach ($unset as $i) {
    unset($items[$i]);
  }
}


foreach ($feed_items as $feed_url => $items) {
  if (empty($items)) { ?>
  
    <div class="item element" data-symbol="<?php echo $urls[$feed_url] ?>" name="<?php echo $urls[$feed_url] ?>">
    
    <div class="minimise"><img src="images/boreds/<?php echo $urls[$feed_url] ?>.png"/>
    <div class="minimise2"><a href="<?php echo $feed_url; ?>"><h2>Visit <?php echo $urls[$feed_url] ?> now!</h2></a>
    </div></div>
    
    <div class="maximise empt"><a href="<?php echo $feed_url; ?>"><h2>Visit <?php echo $urls[$feed_url] ?> now!</h2></a></div></div>
    
  <?php
    continue;
  }
  $first_item = $items[0];
  $feed = $first_item->get_feed();
  ?>
  
  <?php

 $feedCount = 0;
  foreach ($items as $item) {
     $feedCount++;
    ?>
    
    
      <div class="item element" data-symbol="<?php echo $urls[$feed_url] ?>" name="<?php echo $urls[$feed_url] ?>">
      
      <div class="minimise"><strong id="amount"><?php echo ''.$feedCount; ?></strong><img src="images/boreds/<?php echo $urls[$feed_url] ?>.png"/>
      <div class="minimise2"><a href="<?php echo $item->get_permalink(); ?>"><h2><?php echo $item->get_title(); ?></h2></a>
      </div></div>
      
      <div class="maximise"><a href="<?php echo $item->get_permalink(); ?>"><h2><?php echo $item->get_title(); ?></h2></a><br><p><?php echo $item->get_description(); ?></p></div></div>
    <?php
  }
}


?>
</div>
<?php require("inc/footer2.php"); ?>