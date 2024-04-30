<?php 

    require('dbConnection.php');

    class cart{

        function getDatabase()
        {
            $dbConnection = new Database();
            $database = $dbConnection->getDatabase();
            return $database;
        }

        function getCartItems($productID)
        {
            $database = $this->getDatabase();
            
            return mysqli_query($database,"SELECT * FROM products WHERE id='$productID'");
        }
    }
?>