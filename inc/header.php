<?php require_once("connection.php"); ?>
<?php 

require_once('php/autoloader.php');


$feed = new SimplePie(); // Create a new instance of SimplePie
// Load the feeds

$bored_query_result = bored_query($connection);


$feed_urls = array();
$bored_names = array();

  while($row = mysql_fetch_assoc($bored_query_result)){
    $feed_urls[] = $row['feed_url'] ;
    $bored_names[] = $row['bored_name'] ;
    
   
    
}
$urls = array_combine($feed_urls, $bored_names);






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
  <link href='http://fonts.googleapis.com/css?family=Orienta' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/normalize.css" />

  <!-- scripts on footer -->

</head>
<body class="homepage">


<div id="top" class="transitions-enabled clearfix">
<div id="topcontent" class="transitions-enabled clearfix">
<div id="topleft" class="transitions-enabled clearfix">
  <div id="homepage"><p><a href="#">click make this your hompage</a></p>
  </div>
  <div id="signin"><p><a href="#">sign in/up to customize</p></a>
  </div>
</div>
  
<div id="topcenter" class="transitions-enabled clearfix">
<div id="logo" class="transitions-enabled clearfix"></div>
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
<div id="topright" class="transitions-enabled clearfix">
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
<p>sort boreds</p>
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



</div>
<div id="containerwrapper">
    <div id="container" class="transitions-enabled clearfix">
      <form id="filter" action="#">

          <fieldset class="transitions-enabled clearfix">
            <input type="text" name="search" value="" id="channel" placeholder="filter..." autofocus />
          </fieldset>
    </form>
        
    