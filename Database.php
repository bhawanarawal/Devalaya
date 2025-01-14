<?php

    class Database{
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $db_name = 'devalaya_db';
        private $db;
        public function __construct()
        {
            
            try{
                $this->db = new PDO('mysql:host=localhost;dbname=devalaya_db', 'root','');
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }catch( PDOException $e){
                die("Fail connection: ".$e->getMessage());
            }
        }

        public function getConnection()
        {
            return $this->db;
        }

    }

$obj = new Database();


   

?>