<?php
        error_reporting(E_ALL);
           /*env_variables:
          # Replace project, instance, database, user and password with the values obtained
          # when configuring your Cloud SQL instance.
          MYSQL_DSN: mysql:unix_socket=/cloudsql/eventagious3:us-central1:mysql;dbname=EventagiousProject
          MYSQL_USER: root
          MYSQL_PASSWORD: 'root123'


        $app['database'] = function () use ($app) {
          // Connect to CloudSQL from App Engine.
          $dsn = 'mysql:unix_socket=/cloudsql/eventagious3:us-central1:mysql;dbname=EventagiousProject';
          $user = 'root';
          $password = 'root123');
          if (!isset($dsn, $user) || false === $password) {
              throw new Exception('Set MYSQL_DSN, MYSQL_USER, and MYSQL_PASSWORD environment variables');
          }

        $db = new PDO($dsn, $user, $password);

        return $db;
        };*/


class Db {
    // The database connection
    protected static $connection;

    /**
     * Connect to the database
     * 
     * @return bool false on failure / mysqli MySQLi object instance on success
     */
    public function connect() {    
        // Try and connect to the database
        if(!isset(self::$connection)) {
            // Load configuration as an array. Use the actual location of your configuration file
            $config = parse_ini_file('./config.ini');
            echo $config['dsn'];
            try{
            self::$connection = new PDO($config['dsn'],$config['username'],$config['password']);
            }
            catch (PDOException $e) { 
                echo $e->getMessage();
                echo "får fel i connect";
            }
        }

        // If connection was not successful, handle the error
        if(self::$connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return false;
        }
        return self::$connection;
    }

    /**
     * Query the database
     *
     * @param $query The query string
     * @return mixed The result of the mysqli::query() function
     */
    public function query($query) {
        // Connect to the database
        $connection = $this -> connect();

        // Query the database
        $result = $connection -> query($query);

        return $result;
    }

    /**
     * Fetch rows from the database (SELECT query)
     *
     * @param $query The query string
     * @return bool False on failure / array Database rows on success
     */
    public function select($query) {
        $connection = $this -> connect();
        $rows = array();
        $result = $this -> query($query);
        if($result === false) {
            echo "  Det blir false i selsct!  ";
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            echo "  Resultat  ";
            echo $row;
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * Fetch the last error from the database
     * 
     * @return string Database error message
     */
    public function error() {
        $connection = $this -> connect();
        return $connection -> error;
    }

    /**
     * Quote and escape value for use in a database query
     *
     * @param string $value The value to be quoted and escaped
     * @return string The quoted and escaped string
     */
    public function quote($value) {
        $connection = $this -> connect();
        return "'" . $connection -> real_escape_string($value) . "'";
    }
}
?>