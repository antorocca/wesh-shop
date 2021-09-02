<?php
    class Database{

        private static $dbName = 'wesh';
        private static $dbHost = 'localhost';
        private static $dbUserName = 'root';
        private static $dbUserPassword = '';
        public static $bdd = null;
    
        public static function construct(){
            die('Init function is not allowed');
        }

        public static function connect(){
            if (null == self::$bdd){
                try{
                    self::$bdd = new PDO('mysql:host=' . self::$dbHost . ';dbname=' . self::$dbName . ";charset=utf8", self::$dbUserName, self::$dbUserPassword);
                }
                catch (PDOException $e){
                    die($e->getmessage());
                }
            }
            return self::$bdd;
            }
  
        public static function disconnect(){
            self::$bdd = null;
        }
    }
    ?>