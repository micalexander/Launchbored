<?php

/**
* 
*/
class BoredController
{
    private $database;
    private $feed_loader;
    
    public function __construct($database, $feed_loader)
    {
        $this->database = $database;
        $this->feed_loader = $feed_loader;
    }
    
    /**
     * Displays the controller view
     */
    public function displayPage()
    {
        // assign variables for use inside of our view
        $feed_map = array();
        $urls = array();
        
        
        $query_results = $this->database->query('SELECT * FROM boreds');
        
        while($row = mysql_fetch_assoc($query_results))
        {
            $feed_map[$row['feed_url']] = $row;
            if ($row['is_valid'])
            {
                $urls[$row['feed_url']] = $row['bored_name'];
            }
        }
        
        $feed = $this->feed_loader;
        
        
        // we want all feeds on the homepage, but we only want 1 article per feed url
        $this->feed_loader->set_feed_url(array_keys($urls));
        $this->feed_loader->set_item_limit(1);
        
        $success = $this->feed_loader->init();
        $this->feed_loader->handle_content_type();
        
        
        ob_start();
        include_once('view/homepage.php');
        $page_content = ob_get_clean();
        
        // fetch the view file content
        include_once('view/layout.php');
        
        // print the parsed view content
    }
}
