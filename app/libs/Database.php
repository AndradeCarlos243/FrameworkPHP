<?php

    //Clase para conectarse a la BD y ejecutar consultas PDO
    class Database{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $name = DB_NAME;

        private $dbh; //database handler
        private $stmt; //statement
        private $error;

        public function __construct()
        {
            $dsn = 'mysql:host='.$this->host.';dbname='.$this->name;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //Creamos la instancia después de la configuración
            try
            {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
                $this->dbh->exec('set names utf8');
            }
            catch(PDOException $e)
            {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        //PREPARAMOS LA CONSULTA
        public function query($sql)
        {
            $this->stmt = $this->dbh->prepare($sql);
        }

        //VINCULAMOS LOS PARÁMETROS A LA CONSULTA
        public function bind($parametro, $valor, $tipo = null)
        {
            if(is_null($tipo)){
                switch(true){
                    case is_int($valor):
                        $tipo = PDO::PARAM_INT;
                        break;
                    case is_bool($valor):
                        $tipo = PDO::PARAM_BOOL;
                        break;
                    case is_null($valor):
                        $tipo = PDO::PARAM_NULL;
                        break;
                    default:
                        $tipo = PDO::PARAM_STR;
                        break;
                }
            }
            $this->stmt->bindValue($parametro, $valor, $tipo);
        }

        //EJECUTAMOS LA CONSULTA
        public function execute()
        {
            $this->stmt->execute();
        }

        //OBTENER EL RESULTADO DE LA CONSULTA (MUCHOS)
        public function getRegistros(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        //OBTENER EL RESULTADO DE LA CONSULTA (UNO)
        public function getRegistro(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        //OBTENER CANTIDAD DE REGISTROS EN LA CONSULTA
        public function rowCont(){
            return $this->stmt->rowCont();
        }
    }