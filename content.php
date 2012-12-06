<?php require_once("inc/connection.php"); ?>
<?php require_once("inc/functions.php"); ?>
<?php include("inc/header.php"); ?>

 
 
 <?php 
 
 foreach ($feed_items as $feed_url => $items) {
	 
	 $item = $items[0];
	 var_dump($items);die;
	 $feed = $item->get_feed();
	
	foreach ($items as $item) {
	
	 }
	}
	 


	 
?>
	 
	 
	 
	<?php
	$max = $feed->get_item_quantity(1);
	for ($x = 3; $x < $max; $x++):
		$item = $feed->get_item($x);
		?>
 
		<div class="item">
			<a href="<?php echo $item->get_permalink(); ?>"><img src="images/boreds/abc.png"><p><?php echo $item->get_title(); ?><br><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p></a>
            
            
		</div>
 
	<?php endfor; ?>
    
    <?php
	$max = $feed->get_item_quantity(1);
	for ($x = 0; $x < $max; $x++):
		$item = $feed->get_item($x);
		?>
 
		<div class="item">
			<a href="<?php echo $item->get_permalink(); ?>"><img src="images/boreds/animalplanet.png"><p><?php echo $item->get_title(); ?><br><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p></a>
            
            
		</div>
 
	<?php endfor; ?>
    
     <?php
	$max = $feed->get_item_quantity(2);
	for ($x = 0; $x < $max; $x++):
		$item = $feed->get_item($x);
		?>
 
		<div class="item">
			<a href="<?php echo $item->get_permalink(); ?>"><img src="images/boreds/engadget.png"><p><?php echo $item->get_title(); ?><br><small>Posted on <?php echo $item->get_date('j F Y | g:i a'); ?></small></p></a>
		
			
		</div>
 
	<?php endfor; ?>
    
<?php require("inc/footer.php"); ?>