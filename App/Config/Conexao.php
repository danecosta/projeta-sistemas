<?php
 namespace App\Config;
    class Conexao{
        private static $instanciaBanco;

        public static function getConexaoBD(){
            if(!isset(self::$instanciaBanco)):
                self::$instanciaBanco = new \PDO('mysql:host=localhost:3306;dbname=projetasistema; charset=utf8', 'root', '');
            endif;
                return self::$instanciaBanco;

        }
    }
