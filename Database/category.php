<?php 

    require('dbConnection.php');

    class category{

        function getDatabase()
        {
            $dbConnection = new Database();
            $database = $dbConnection->getDatabase();
            return $database;
        }

        function insertCategory($categoryName){

            $dbConnection = new Database();
            $database = $dbConnection->getDatabase();

            $insertQuery = "INSERT INTO `categories`(`categoryName`) VALUES (?)";
        
            $prepareStatement = mysqli_prepare($database, $insertQuery);

            mysqli_stmt_bind_param(
                $prepareStatement,
                's', 
                $categoryName,
            );

            return mysqli_stmt_execute($prepareStatement);
        }

        function updateCategory($categoryId,$categoryName)
        {
            $dbConnection = new Database();
            $database = $dbConnection->getDatabase();

            $updateCategory = "UPDATE `categories` set categoryName = ? where id= ? ;";
        
            $prepareStatement = mysqli_prepare($database, $updateCategory);

            mysqli_stmt_bind_param(
                $prepareStatement,
                'ss', 
                $categoryName,
                $categoryId
            );

            return mysqli_stmt_execute($prepareStatement);
        }

        function getCategories()
        {
            $database = $this->getDatabase();

            return mysqli_query($database,"SELECT * FROM categories");
        }

        function checkIfProductExists($categoryId)
        {
            $database = $this->getDatabase();
            return mysqli_query($database,"SELECT * FROM products WHERE categoryID='$categoryId'");
        }

        function deleteCategory($categoryId)
        {
            $database = $this->getDatabase();
            return mysqli_query($database,"DELETE FROM categories WHERE id='$categoryId'");
        }

        function getCategoryByID($ID)
        {
            $database = $this->getDatabase();
            return mysqli_query($database,"SELECT * FROM categories WHERE id='$ID' ");
        }

        
    } 

?>