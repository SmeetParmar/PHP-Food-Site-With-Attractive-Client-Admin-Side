<?php
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'php_project');

    class Database{

        private $database;

        function __construct()
        {
            $this->database = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            OR die('Could not connect to MySQL: ' . mysqli_connect_error());
            mysqli_set_charset($this->database, 'utf8');
        }

        function getDatabase()
        {
            return $this->database;
        }

    }

?>