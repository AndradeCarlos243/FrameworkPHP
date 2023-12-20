<?php

    class Paginas extends Controller{
        public function __construct()
        {
        }

        public function index()
        {
            $data = [
                'titulo' => 'Bienvenidos',
            ];
            $this->view('paginas/inicio', $data);
        }
    }

?>