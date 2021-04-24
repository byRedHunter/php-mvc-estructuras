<?php
  Class Database {
    private $host;
    private $db;
    private $user;
    private $password;

    public function __construct() {
      $this->host = constant('HOST');
      $this->db = constant('DB');
      $this->user = constant('USER');
      $this->password = constant('PASSWORD');
    }

    public function connect() {
      try {
        $connection = "mysql:host=$this->host;dbname=$this->db;";

        // para ver los error de forma más amigable
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false];

        $pdo = new PDO($connection, $this->user, $this->password, $options);

        return $pdo;
      } catch (PDOException $e) {
        print_r("Error connection: " . $e->getMessage());
      }
    }
  }
?>