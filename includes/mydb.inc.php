<?php
/**
 * A class to create a connection to the database
 */
class mydb
{
  private $servername;
  private $username;
  private $password;
  private $dbname;

  protected function connect() {
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->dbname = "ecommerce"

    $conn = new mysqli($this->servername,$this->username, $this->password, $this->dbname);
    return $conn;
  }
}

 ?>
