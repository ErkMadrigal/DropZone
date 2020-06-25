<?php
    class database{

        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $db = "images";

        public function getConnection(){
            $dbc = new PDO("mysql:host=$this->host;dbname=$this->db;",$this->user,$this->password);
            return $dbc;
        } 

    }
?>