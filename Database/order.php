<?php

    require('dbConnection.php');

    class order{
       
        function getDatabase()
        {
            $dbConnection = new Database();
            $database = $dbConnection->getDatabase();
            return $database;
        }

        function getOrders()
        {
            $database = $this->getDatabase();
            return mysqli_query($database,"SELECT * FROM orders");
        }

        function getOrderByUser($email,$password)
        {
            $database = $this->getDatabase();
            return mysqli_query($database, "SELECT * FROM orders where userEmail='$email' AND userPassword='$password'");
        }

        function getOrderByID($orderID)
        {
            $database = $this->getDatabase();
            return mysqli_query($database,"SELECT * FROM orders WHERE id='$orderID'");
        }

    }

?>