<?php require_once("connection.php"); ?>
<?php 

require_once('php/autoloader.php');


$feed = new SimplePie(); // Create a new instance of SimplePie
// Load the feeds

$bored_query_result = bored_query($connection);


$feed_urls = array();
$bored_names = array();
$bored_cat_type = array();

$feed_map = array();

while($row = mysql_fetch_assoc($bored_query_result))
{
    $feed_map[$row['feed_url']] = $row;
    if ($row['is_valid'])
    {
        $urls[$row['feed_url']] = $row['bored_name'];
    }
    // $feed_urls[] = $row['feed_url'] ;
    // $bored_names[] = $row['bored_name'] ;
}

// $urls = array_combine($feed_urls, $bored_names);

$feed->set_feed_url(array_keys($urls));

$feed->enable_cache(true);
$feed->set_cache_location('cache');
$feed->set_cache_duration(1800); // Set the cache time
$feed->set_item_limit(1);
$success = $feed->init(); // Initialize SimplePie


$feed->handle_content_type(); // Take care of the character encoding

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  
  <title>Launchbored</title>
  
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="initial-scale=0.8,user-scalable=no,maximum-scale=1,width=device-width">
  <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <link href='http://fonts.googleapis.com/css?family=Orienta' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/normalize.css" />

  <!-- scripts on footer -->

</head>
<body class="homepage">


<div id="top" class="transitions-enabled clearfix">
  <div id="topwrapper" class="transitions-enabled clearfix">
   <div id="logo" class="transitions-enabled clearfix"></div>
  <div id="order">
    
 
        
  <section id="options" class="clearfix" data-option-key="*">
    <ul class="option-set clearfix" >
      <li id="expandall" class="selected"><img src="../images/expand.png"></li>
    </ul>
    <ul id="sort-by" class="option-set clearfix not-mobile not-tablet" data-option-key="sortBy">
      <li><a href="#sortBy=original-order" data-option-value="original-order" class="selected" data><img src="../images/original.png"></a></li>
      <li id="shuffle"><a href='#shuffle'><img src="../images/shuffle.png"></a></li>
    </ul>

    <ul id="sort-direction" class="option-set clearfix not-mobile not-tablet" data-option-key="sortAscending">
      <li><a href="#sortAscending=true" data-option-value="true" class="selected"><img src="../images/ascending.png"></a></li>
      <li><a href="#sortAscending=false" data-option-value="false"><img src="../images/descending.png"></a></li>
    </ul>
        <form id="filtersearch" action="#">
            <input type="text" name="search" value="" id="channel" placeholder="search boreds..." autofocus />
        </form>
    <ul id="filters" class="option-set clearfix " data-option-key="*">
      <li><a href="#" data-filter="*" onclick="formReset()" class="selected" ><img src="../images/show.png"></a></li>
      <li class="not-mobile"><a href="#" data-filter=".search"><img src="../images/search.png"></a></li>
      <li class="not-mobile"><a href="#" data-filter=".mail"><img src="../images/mail.png"></a></li>
      <li class="not-mobile"><a href="#" data-filter=".shopping"><img src="../images/shop.png"></a></li>
      <li class="not-mobile"><a href="#" data-filter=".feeds"><img src="../images/b_feed.png"></a></li>
      <li class="not-mobile"><a href="#" data-filter=".news"><img src="../images/news.png"></a></li>
      <li class="not-mobile"><a href="#" data-filter=".learning"><img src="../images/learn.png"></a></li>
      <li class="not-mobile"><a href="#" data-filter=".tech"><img src="../images/tech.png"></a></li>
      <li class="not-mobile"><a href="#" data-filter=".tv"><img src="../images/tv.png"></a></li>
      <li class="not-mobile"><a href="#" data-filter=".videos"><img src="../images/video.png"></a></li>
      <li class="not-mobile"><a href="#" data-filter=".music"><img src="../images/music.png"></a></li>
      <li class="not-mobile"><a href="#" data-filter=".photos"><img src="../images/photo.png"></a></li>
      <li class="not-mobile"><a href="#" data-filter=".social"><img src="../images/social.png"></a></li>
      <li class="not-mobile"><a href="#" data-filter=".games"><img src="../images/game.png"></a></li>
      <li class="not-mobile"><a href="#" data-filter=".kids"><img src="../images/kids.png"></a></li>
    </ul>
    



</section>
</div> 
<!-- #options -->
<!-- <div id="topcontent" class="transitions-enabled clearfix">
<div id="topleft" class="transitions-enabled clearfix">
  <div id="homepage"><p><a href="#">click make this your hompage</a></p>
  </div>
  <div id="signin"><p><a href="#">sign in/up to customize</p></a>
  </div>
</div>
  
<div id="topcenter" class="transitions-enabled clearfix">
<div id="logo" class="transitions-enabled clearfix"></div>
<div> 

        <form method="get" action="http://www.google.com/search">
        
        <input id="searchbox" type="text"   name="q" size="31"
         maxlength="255" value="" />
        <input id="searchbutton" type="submit" value="Google Search" />
        
        </form>


</div>
</div>
<div id="topright" class="transitions-enabled clearfix">
<script src="../js/script.js"></script>
       </div>    
        
</div>
</div> -->
</div>
</div>

    <section id="content">

    <div id="usercontent">



</div>
<div id="containerwrapper">
  
    <div id="container" class="transitions-enabled clearfix">
         

        
    