<?php
    class DB{
        public static function connect(){
            $url_mysql="mysql: host=localhost; dbname=tecnosoluciones";
            $user_mysql="root";
            $password_mysql="";
            try {
            $cn = new PDO($url_mysql, $user_mysql, $password_mysql);
            return $cn;
            } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
            }
        }
    }
?>