
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
    
    <div class="minimise"><img class="channel1" src="images/boreds/<?php echo $urls[$feed_url] ?>.png"/>
 
    <div class="minimise2"><h2>See whats new on <?php echo $urls[$feed_url] ?>.</h2>
      <a href="<?php echo $feed_url; ?>" target="_blank" title="Go to <?php echo $urls[$feed_url] ?>.com">
      <img class="launch" src="images/launch.png"/></a>
    </div></div>
    
    <div class="maximise empt">
      <div class="innermaxmask">
          <div class="innermax">
            <img class="channel" src="images/boreds/<?php echo $urls[$feed_url] ?>.png"/><br>
          <a href="<?php echo $feed_url; ?>">
        <h2>See whats new on <?php echo $urls[$feed_url] ?>.</h2></a>
        </div>
      </div>
    </div>
  </div>
    
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
      
        <div class="minimise">
          <strong id="amount"><?php echo ''.$feedCount; ?></strong>
            <img class="channel1" src="images/boreds/<?php echo $urls[$feed_url] ?>.png"/>
          <div class="minimise2"><h2><?php echo $item->get_title(); ?></h2>
            <div class="launch">
            <a href="<?php echo $item->get_permalink(); ?>" target="_blank" title="go to <?php echo $urls[$feed_url] ?>.com">
            <img src="images/launch.png"/></a>
            <a href="<?php echo $item->get_permalink(); ?>" target="_blank" title="read feed">
            <img src="images/feed.png"/></a>
            <img src="images/maximize.png" title="maximize" />
          </div>
          </div>
        </div>
        
        <div class="maximise">
          <div class="innermaxmask">
          <div class="innermax">
              <a href="<?php echo $item->get_permalink(); ?>" target="_blank">
              <img class="channel" src="images/boreds/<?php echo $urls[$feed_url] ?>.png" title="Go to <?php echo $urls[$feed_url] ?>.com"/></a><br>
              <a href="<?php echo $item->get_permalink(); ?>" target="_blank"><h2><?php echo $item->get_title(); ?></h2></a><br>
              <p><?php echo $item->get_description(); ?></p>
              <div class="launch">
                <img class="userlaunch" src="images/minimize.png" title="minimize" />
                <a href="<?php echo $item->get_permalink(); ?>" target="_blank" title="go to feed page">
                <img class="userlaunch" src="images/feed.png"/></a>
                <a href="<?php echo $item->get_permalink(); ?>" target="_blank" title="go to <?php echo $urls[$feed_url] ?>.com homepage">
                <img class="userlaunch" src="images/launch.png"/></a>
              </div>
          </div>
            
          </div>
        </div>
      
      </div>
    <?php
  }
}


?>
</div>
<?php require("inc/footer.php"); ?>