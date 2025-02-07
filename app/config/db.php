<?php
class Db {

    private static $instance = NULL;
    private  $connection;
    private  function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "06database@SM23";
        $dbname = "Veillehub";
        $port = 3306;

        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=$dbname;port=$port", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'error connecting to the database ' . $e->getMessage();
        }
    }


    public static function Getinstanse()
    {
        if (self::$instance === NULL) {
            self::$instance = new Db();
            return self::$instance;
        }
        return self::$instance;
    }

    public function getconnection()
    {
        return $this->connection;
    }

}