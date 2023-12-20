<?php

    //Clase controlador que será el principal, carga modelos y vistas
    class Controller{
        //Cargar modelo
        public function model($model){
            require_once('../app/models/'.$model.'.php');
            //Instanciamos el modelo
            return new $model();
        }

        //Cargar vista
        public function view($view, $data = []){
            //chequear si el archivo vista existente
            if(file_exists('../app/views/'.$view.'.php'))
            {
                require_once('../app/views/'.$view.'.php');
            }else
            {
                die('La vista no existe.');
            }
        }
    }

?>