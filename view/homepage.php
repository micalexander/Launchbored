<?php

$itemMap = array();
foreach ($feed->get_items() as $item)
{
    if (!array_key_exists($item->feed->feed_url, $itemMap))
    {
        $itemMap[$item->feed->feed_url] = array();
    }
    $itemMap[$item->feed->feed_url][] = $item;
}

foreach ($feed_map as $feed_url => $value)
{
    // we don't have a feed
    if (!array_key_exists($feed_url, $urls))
    {
        ?>
        <div class="item element <?php echo $value['bored_cat_type']; ?> <?php echo $value['bored_cat_type2']; ?> <?php echo $value['bored_cat_type3']; ?>" data-symbol="<?php echo $value['bored_name']; ?>" name="<?php echo $value['bored_name']; ?>">
    
        <div class="minimise"><img class="channel1" src="images/boreds/<?php echo $value['bored_name']; ?>.png"/>
 
        <div class="minimise2"><h2>See whats new on <?php echo $value['bored_name']; ?>.</h2>
                     <div class="launch">
               <a href="<?php echo $value['url']; ?>" target="_blank" title="go to <?php echo $value['bored_name']; ?>.com">
               <img src="images/launch.png"/></a>
               <a href="<?php echo $value['url']; ?>" target="_blank" title="read feed">
               <img src="images/feed.png"/></a>
               <img src="images/maximize.png" title="maximize" />
             </div>
        </div></div>
    
        <div class="maximise">
          <div class="innermaxmask">
              <div class="innermax">
                <img class="channel" src="images/boreds/<?php echo $value['bored_name']; ?>.png"/><br>
              <a href="<?php echo $value['url']; ?>">
            <h2>See whats new on <?php echo $value['bored_name']; ?>.</h2></a>
            <div class="launch">
                   <img class="userlaunch" src="images/minimize.png" title="minimize" />
                   <a href="<?php echo $value['url']; ?>" target="_blank" title="go to feed page">
                   <img class="userlaunch" src="images/feed.png"/></a>
                   <a href="<?php echo $value['url']; ?>" target="_blank" title="go to <?php echo $value['bored_name']; ?>.com homepage">
                   <img class="userlaunch" src="images/launch.png"/></a>
                 </div>
            </div>
          </div>
        </div>
      </div>
     <?php
     }
     else
     {
         $items = isset($itemMap[$feed_url])
             ? $itemMap[$feed_url]
             : null;
         
         if ($items)
         {
         // we have a feed
         ?>
         
         <div class="item element feeds <?php echo $value['bored_cat_type']; ?> <?php echo $value['bored_cat_type2']; ?> <?php echo $value['bored_cat_type3']; ?>" data-symbol="<?php echo $urls[$feed_url] ?>" title="<?php echo strtolower($item->get_title()); ?>" name="<?php echo $urls[$feed_url] ?>">

           <div class="minimise">
             <strong id="amount"><?php echo count($items); ?></strong>
               <img class="channel1" src="images/boreds/<?php echo $urls[$feed_url] ?>.png"/>
             <div class="minimise2"><h2 class="headline"><?php echo $items[0]->get_title(); ?></h2>
               <div class="launch">
               <a href="<?php echo $value['url']; ?>" target="_blank" title="go to <?php echo $urls[$feed_url] ?>.com">
               <img src="images/launch.png"/></a>
               <a href="<?php echo $items[0]->get_permalink(); ?>" target="_blank" title="read feed">
               <img src="images/feed.png"/></a>
               <img src="images/maximize.png" title="maximize" />
             </div>
             </div>
           </div>

           <div class="maximise">
             <div class="innermaxmask">
             <div class="innermax" style="height:">
                
                <img class="channel" src="images/boreds/<?php echo $urls[$feed_url] ?>.png" title="Go to <?php echo $urls[$feed_url] ?>.com"/></a><br>

                
                <?php
                
                foreach ($items as $item)
                {
                    $media_group = $item->get_item_tags('', 'enclosure');
                    $image_name = $media_group[0]['attribs']['']['url'];
                    ?>
                <article data-image="<?php echo $image_name; ?>">
                    <?php /** if ($image_name): ?><img src="<?php echo $image_name; ?>" /><?php endif; **/ ?>
                    <a href="<?php echo $item->get_permalink(); ?>" target="_blank">
                    <a href="<?php echo $item->get_permalink(); ?>" target="_blank"><h2 class="headline"><?php echo $item->get_title(); ?></h2></a><br>
                     <p><?php echo strip_tags($item->get_description(), '<a><p>'); ?></p>
                     <div class="launch">
                       <img class="userlaunch" src="images/minimize.png" title="minimize" />
                       <a href="<?php echo $item->get_permalink(); ?>" target="_blank" title="go to feed page">
                       <img class="userlaunch" src="images/feed.png"/></a>
                       <a href="<?php echo $value['url']; ?>" target="_blank" title="go to <?php echo $urls[$feed_url] ?>.com homepage">
                       <img class="userlaunch" src="images/launch.png"/></a>
                     </div>
                 </article>
                 <?php
                 }
                 
                 ?>
             </div>

             </div>
           </div>

         </div>
         
         <?php
            }
        }
}

?>