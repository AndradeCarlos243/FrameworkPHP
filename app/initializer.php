<?php
    require_once 'config/config.php';
    require_once 'helpers/url_helper.php';

    //AUTOLOAD
    spl_autoload_register(function($class)
    {
        require_once 'libs/' .$class. '.php';
    });
    

?>