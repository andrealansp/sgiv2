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
      "mysql:dbname=" . Sql::DBNAME . ";host=" . Sql::HOSTNAME, Sql::USERNAME, Sql::PASSWORD,array(
        \PDO::ATTR_EMULATE_PREPARES=>false,
        \PDO::MYSQL_ATTR_DIRECT_QUERY=>false,
        \PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION
      )    );
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
  return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
}catch(Exception $e){
  print_r($e);
}


}

}
