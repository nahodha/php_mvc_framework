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

    /**
     * Prepare statement with query
     * @param String $sql
     */
    public function query($sql)
    {
      $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * Bind Values
     */
    public function bind($param, $value, $type=null)
    {
      if (is_null(true))
      {
        switch (true) {
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          default:
            $type = PDO::PARAM_STR;
            break;
        }
      }

      $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Execute the prepared statement.
     */
    public function execute()
    {
      return $this->stmt->execute();
    }

    /**
     * Execute prepared statement and then return the
     * full resultset.
     *
     * @return Array resultset
     */
    public function resultSet()
    {
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Execute prepared statement and return a single
     * result.
     *
     * @return result
     */
    public function single()
    {
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Return the number of rows from the query.
     *
     * @return int
     */
    public function rowCount()
    {
      return $this->stmt->rowCount();
    }
  }
