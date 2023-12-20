<?php
    /*
    Mapear la URL ingresada
    1-Controlador
    2-Método
    3-Parámetro
    */

    class Core
    {
        protected $controller = 'paginas';
        protected $metodoActual = 'index';
        protected $parametros = [];

        public function __construct()
        {
            $url = $this->getUrl();
            // print_r($this->getUrl());

            //Busca si existe el controlador
            if(isset($url)){
                if(file_exists('../app/controllers/' .ucwords($url[0]).'.php'))
                {
                    //Si existe, lo toma como controlador por defecto.
                    $this->controller = ucwords($url[0]);

                    //Unset indice
                    unset($url[0]);
                }
            }
             
            //requiere el nuevo controlador
            require_once '../app/controllers/'. $this->controller.'.php';
            $this->controller = new $this->controller;

            //revisa el método que solicita
            if(isset($url[1])){
                if(method_exists($this->controller, $url[1]))
                {
                    $this->metodoActual = $url[1];
                    //unset indice
                    unset($url[1]);
                }
            }

            //Prueba
            // echo $this->metodoActual;

            // parametros
            $this->parametros = $url ? array_values($url) : [];

            // llama callback de parámetros
            call_user_func_array([$this->controller, $this->metodoActual], $this->parametros);
        }

        public function getUrl()
        {
            // echo $_GET['url'];

            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }

    }

?>