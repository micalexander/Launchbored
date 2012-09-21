<?php 

require_once('php/autoloader.php');


$feed = new SimplePie(); // Create a new instance of SimplePie
// Load the feeds
$urls = array(
  'http://abcfamily.go.com/service/feed?id=774372' => 'abc',
  'http://www.insideaolvideo.com/rss.xml' => 'aolvideo',
  'http://feeds.bbci.co.uk/news/world/rss.xml' => 'bbcwn',
  'http://feeds.cbsnews.com/CBSNewsMain?format=xml' => 'cbsnews',
  'http://feeds.feedburner.com/cnet/NnTv?tag=contentBody.1' => 'cnet',
  'http://www.cwtv.com/feed/episodes/xml' => 'cw',
  'http://www.engadget.com/rss.xml' => 'engadget',
  'http://syndication.eonline.com/syndication/feeds/rssfeeds/video/index.xml' => 'eonline',
  'http://sports.espn.go.com/espn/rss/news' => 'espn',
  'http://www.fxnetworks.com//home/tonight_rss.php' => 'fxnetworks',
  'http://www.history.com/this-day-in-history/rss' => 'history',
  'http://rss.hulu.com/HuluRecentlyAddedVideos?format=xml' => 'hulu',
  'http://rss.imdb.com/daily/born/' => 'imdb',
  'http://feeds.feedburner.com/Monkeyseecom-NewestVideos?format=xml' => 'monkeysee',
  'http://pheedo.msnbc.msn.com/id/18424824/device/rss/' => 'msnbc',
  'http://dvd.netflix.com/NewReleasesRSS' => 'netflix',
  'http://feeds.nytimes.com/nyt/rss/HomePage' => 'newyorktimes',
  'http://feeds.reuters.com/Reuters/worldNews' => 'reuters',
  'http://www.theverge.com/rss/index.xml' => 'theverge',
  'http://feeds.wired.com/wired/index?format=xml' => 'wired',
);
$nofeedurls = array(
  'http://www.bing.com' => 'bing',
  'http://www.bravotv.com' => 'bravo',
  'http://www.cartoonnetwork.com' => 'cartoonnetwork',
  'http://www.clicker.com/' => 'clicker',
  'http://www.comedycentral.com/' => 'comedycentral',
  'http://www.crackle.com/' => 'crackle',
  'http://disney.go.com/disneyxd/' => 'disneyxd',
  'http://facebook.com' => 'facebook',
  'http://flickr.com/espn/rss/news' => 'flickr',
  'http://www.hgtv.com/' => 'hgtv',
  'http://www.metacafe.com/' => 'metacafe',
  'http://www.nationalgeographic.com/' => 'nationalgeographic',
  'http://www.nick.com/' => 'nickelodeon',
  'http://www.nickjr.com/' => 'nickjr',
  'http://www.pandora.com/' => 'pandora',
  'http://www.pbskids.com/' => 'pbskids',
  'http://www.photobucket.com/' => 'photobucket',
  'http://www.revision3.com/' => 'revision3',
  'http://www.tbs.com/' => 'tbs',
  'http://www.tntdrama.com/' => 'tnt',
  'http://www.tvland.com/' => 'tvland',
  'http://www.vimeo.com/' => 'vimeo',
  'http://www.vudu.com/' => 'vudu',
  'http://www.xfinitytv.com/' => 'xfinitytv',
  'http://www.youtube.com/topic/4qRk91tndwg/most-popular#feed' => 'youtube',
 );

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
  <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/mormalize.css" />

  <!-- scripts on footer -->

</head>
<body class="homepage">


<div id="top">
<div id="topcontent">
<div id="topleft"><a href="#">click make this your hompage<br>sign in/up to customize</a></div>
  
<div id="topcenter">
<div id="logo"></div>
<div> 
        <!--<div id="searchbar">--> 
        <form method="get" action="http://www.google.com/search">
        
        <input id="searchbox" type="text"   name="q" size="31"
         maxlength="255" value="" />
        <input id="searchbutton" type="submit" value="Google Search" />
        
        </form>
        <!--</div>-->

</div>
</div>
<div id="topright">
 		<script type="text/javascript">
      
        
        var d_names = new Array("Sunday", "Monday", "Tuesday",
        "Wednesday", "Thursday", "Friday", "Saturday");
        
        var m_names = new Array("January", "February", "March", 
        "April", "May", "June", "July", "August", "September", 
        "October", "November", "December");
        
        var d = new Date();
        var curr_day = d.getDay();
        var curr_date = d.getDate();
        var sup = "";
        if (curr_date == 1 || curr_date == 21 || curr_date ==31)
           {
           sup = "st";
           }
        else if (curr_date == 2 || curr_date == 22)
           {
           sup = "nd";
           }
        else if (curr_date == 3 || curr_date == 23)
           {
           sup = "rd";
           }
        else
           {
           sup = "th";
           }
        var curr_month = d.getMonth();
        var curr_year = d.getFullYear();
      
        document.write(d_names[curr_day] + " " + curr_date + "<SUP>"
        + sup + "</SUP> " + m_names[curr_month] + " " + curr_year);
        
        
        var a_p = "";
        var d = new Date();
        
        var curr_hour = d.getHours();
        
        if (curr_hour < 12)
           {
           a_p = "AM";
           }
        else
           {
           a_p = "PM";
           }
        if (curr_hour == 0)
           {
           curr_hour = 12;
           }
        if (curr_hour > 12)
           {
           curr_hour = curr_hour - 12;
           }
        
        var curr_min = d.getMinutes();
         document.write('&nbsp; &nbsp; ');
        document.write(curr_hour + " : " + curr_min + " " + a_p);
        //-->
        </script>
        <section id="options" class="clearfix">

    <ul id="sort-by" class="option-set clearfix" data-option-key="sortBy">
      <li><a href="#sortBy=original-order" data-option-value="original-order" class="selected" data><img src="../images/original.png"></a></li>
    <li id="shuffle"><a href='#shuffle'><img src="../images/shuffle.png"></a></li>
      </ul>

    <ul id="sort-direction" class="option-set clearfix" data-option-key="sortAscending">
      <li><a href="#sortAscending=true" data-option-value="true" class="selected"><img src="../images/ascending.png"></a></li>
      <li><a href="#sortAscending=false" data-option-value="false"><img src="../images/descending.png"></a></li>
    </ul>


</section> <!-- #options --></div>    
        
</div>
</div>
</div>


    <section id="content">

    <div id="usercontent">

<form id="filter" action="#">
			<fieldset>
				<input type="text" name="search" value="" id="channel" placeholder="filter..." autofocus />
			</fieldset>
</form>
</div>
<div id="containerwrapper">
    <div id="container" class="transitions-enabled clearfix"><form id="filter" action="#">
      <fieldset class="transitions-enabled clearfix">
        <input type="text" name="search" value="" id="channel" placeholder="filter..." autofocus />
      </fieldset>
</form>
    
    