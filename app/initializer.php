<?php
    require_once 'config/config.php';

    //AUTOLOAD
    spl_autoload_register(function($class)
    {
        require_once 'libs/' .$class. '.php';
    });
    

?>