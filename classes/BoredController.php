<?php

/**
* 
*/
class BoredController
{
    private $database;
    private $feed_loader;
    private $view;
    
    public function __construct($database, $feed_loader, $view)
    {
        $this->database = $database;
        $this->feed_loader = $feed_loader;
        $this->view = $view;
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
        
        // we want all feeds on the homepage, but we only want 1 article per feed url
        $this->feed_loader->set_feed_url(array_keys($urls));
        $this->feed_loader->set_item_limit(5);
        
        $this->feed_loader->init();
        $this->feed_loader->handle_content_type();
        
        
        $itemMap = array();
        foreach ($this->feed_loader->get_items() as $item)
        {
            if (!array_key_exists($item->feed->feed_url, $itemMap))
            {
                $itemMap[$item->feed->feed_url] = array();
            }
            $itemMap[$item->feed->feed_url][] = $item;
        }
        
        $this->view->assign('feed_map', $feed_map);
        $this->view->assign('item_map', $itemMap);
        $this->view->assign('urls', $urls);
        $this->view->clearAllCache();
        
        print $this->view->fetch('layout.html');
    }
}
