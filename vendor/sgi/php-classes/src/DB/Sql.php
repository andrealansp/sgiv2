<?php

namespace SGI\DB;

class Sql {

    const HOSTNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DBNAME = "bd_iadt";

    private $conn;

    public function __construct() {

        $this->conn = new \PDO(
            "mysql:dbname=" . Sql::DBNAME . ";host=" . Sql::HOSTNAME, Sql::USERNAME, Sql::PASSWORD
        );
    }

    private function setParams($statement, $parameters = array()) {

        foreach ($parameters as $key => $value) {
            $this->bindParam($statement, $key, $value);
        }
        
    }

    private function bindParam($statement, $key, $value) {

        $statement->bindParam($key, $value);
    }

    public function query($rawQuery, $params = array()) {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();
    }

    public function select($rawQuery, $params = array()): array {

        try{
           $stmt = $this->conn->prepare($rawQuery);
           $this->setParams($stmt, $params);
           $stmt->execute();
           $retorno = $stmt->fetchAll(\PDO::FETCH_ASSOC);
           return $retorno;
       }
       catch (\Exception $e) {
        var_dump($e);
    }

}

}

?>