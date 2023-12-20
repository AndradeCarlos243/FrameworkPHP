<?php

    class Paginas extends Controller{
        private $modeloUsuario;
        public function __construct()
        {
            $this->modeloUsuario = $this->model('Usuario');
        }

        public function index()
        {

            //obtenerUsuarios
            $usuarios = $this->modeloUsuario->getUsuarios();
            $data = [
                'usuarios' => $usuarios
            ];
            $this->view('paginas/inicio', $data);
        }

        public function addUsuario(){

            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $data = [
                    'nombre' => trim($_POST['nombre-usuario']),
                    'email' => trim($_POST['email-usuario']),
                    'telefono' => trim($_POST['telefono-usuario']),
                ];

                if($this->modeloUsuario->addUsuario($data))
                {
                    redirect('/paginas');
                }else
                {
                    die('Algo salió mal');
                }
            }else
            {
                $data = [
                    'nombre' => '',
                    'email' => '',
                    'telefono' => '',
                ];

                $this->view('paginas/addUsuario', $data);
            }
        }

        public function updateUsuario($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $data = [
                    'idUsuario' => $id,
                    'nombre' => trim($_POST['nombre-usuario']),
                    'email' => trim($_POST['email-usuario']),
                    'telefono' => trim($_POST['telefono-usuario']),
                ];

                if($this->modeloUsuario->updateUsuario($data))
                {
                    redirect('/paginas');
                }else
                {
                    die('Algo salió mal');
                }
            }else
            {
                //Obteniendo datos desde el modelo
                $usuario = $this->modeloUsuario->getUsuario($id);

                $data = [
                    'idUsuario' => $usuario->idUsuario,
                    'nombre' => $usuario->nombre,
                    'email' => $usuario->email,
                    'telefono' => $usuario->telefono,
                ];

                $this->view('paginas/updateUsuario', $data);
            }
        }

        public function deleteUsuario($id){

            //Obteniendo datos desde el modelo
            $usuario = $this->modeloUsuario->getUsuario($id);
            $data = [
                'idUsuario' => $usuario->idUsuario,
                'nombre' => $usuario->nombre,
                'email' => $usuario->email,
                'telefono' => $usuario->telefono,
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $data = [
                    'idUsuario' => $id,
                ];
                if($this->modeloUsuario->deleteUsuario($data))
                {
                    redirect('/paginas');
                }else
                {
                    die('Algo salió mal');
                }
            }
            $this->view('paginas/deleteUsuario', $data);
        }
    }

?>