<?php
  /**
  * PDO Database Class
  * Connects to database
  * Create Prepared Statements
  * Bind values
  * Return rows and results.
  */

  class Database
  {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh; // property for creating prepared statement.
    private $stmt; // property for storing statement
    private $error; // Errors stored here

    public function __construct()
    {
      // set DSN
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION
      );

      // Create PDO instance
      try
      {
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
      } catch(PDOException $e)
      {
        $this->error = $e->getMessage();
        echo $this->error;

      }
    }
  }
