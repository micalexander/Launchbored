<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php include("inc/header.php"); ?>

<?php




// Sort it
$feed_items = array(); // $feed_items is an array
$items = $feed->get_items(); //$items is everything that $items = $feed->get_items(); prduces
$urls = array_unique($urls); // $url = is an empty $


foreach ($urls as $url => $image) {
  $unset = array();
  $feed_items[$url] = array();
  
  $feedCount = 0;
  foreach ($items as $i => $item) {
    if ($item->get_feed()->feed_url == $url) {
      $feed_items[$url][] = $item;
      $unset[] = $i;
      $feedCount++;    
	}
  }


  foreach ($unset as $i) {
    unset($items[$i]);
  }
}


foreach ($feed_items as $feed_url => $items) {
  if (empty($items)) { ?>
    <div class="item"><a href="<?php echo $feed_url; ?>"><img src="images/boreds/<?php echo $urls[$feed_url] ?>.png"/><p>Visit <?php echo $urls[$feed_url] ?> now!</p></a></div>
  <?
    continue;
  }
  $first_item = $items[0];
  $feed = $first_item->get_feed();
  ?>
  
  <?php


  foreach ($items as $item) {
    ?>
    
    
      <div class="item"><strong id="amount"><?php echo ''.$feedCount; ?></strong><a href="<?php echo $item->get_permalink(); ?>"><img src="images/boreds/<?php echo $urls[$feed_url] ?>.png"/><p><?php echo $item->get_title(); ?></p></a></div>
    <?php
  }
}


?>

<?php require("inc/footer.php"); ?>