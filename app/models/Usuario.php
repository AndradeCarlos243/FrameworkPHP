<?php

    class Usuario{
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getUsuarios()
        {
            $this->db->query('SELECT * FROM usuarios');
            $registros = $this->db->getRegistros();

            return $registros;
        }

        public function getUsuario($id)
        {
            $this->db->query('SELECT * FROM usuarios WHERE idUsuario = :id');
            $this->db->bind(':id', $id);
            $registro = $this->db->getRegistro();

            return $registro;
        }

        public function addUsuario($data)
        {
            $this->db->query('INSERT INTO usuarios(nombre, email, telefono) VALUES (:nombre, :email, :telefono)');

            //Vinculamos los valores
            $this->db->bind(':nombre', $data['nombre']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':telefono', $data['telefono']);

            //Ejecutamos la inserción
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function updateUsuario($data)
        {
            $this->db->query('UPDATE usuarios SET nombre = :nombre, email = :email, telefono = :telefono WHERE idUsuario = :id');

            //Vinculamos los valores
            $this->db->bind(':id', $data['idUsuario']);
            $this->db->bind(':nombre', $data['nombre']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':telefono', $data['telefono']);

            //Ejecutamos la inserción
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteUsuario($data)
        {
            $this->db->query('DELETE FROM usuarios WHERE idUsuario = :id');

            //Vinculamos los valores
            $this->db->bind(':id', $data['idUsuario']);

            //Ejecutamos la inserción
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }

?>