<?php

    //Redireccionador
    function redirect($pagina){
        header('location: '.RUTA_URL.$pagina);
    }
?>