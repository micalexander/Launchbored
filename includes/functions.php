<?php

function launchbored_autoload($classname)
{
    if (file_exists('classes/'.$classname.'.php'))
    {
        require_once('classes/'.$classname.'.php');
    }
}