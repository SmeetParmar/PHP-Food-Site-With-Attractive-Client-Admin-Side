<?php 
  require('dbConnection.php');

    class product{

        function getDatabase()
        {
            $dbConnection = new Database();
            $database = $dbConnection->getDatabase();
            return $database;
        }

        function insertProduct($productName,$productPrice,$productCategoryID,$productDescription,$productImagePath){

            $dbConnection = new Database();
            $database = $dbConnection->getDatabase();

            $insertQuery = "INSERT INTO `products`(`name`, `price`, `categoryID`, `description`, `image`) VALUES (?,?,?,?,?)";
            
            $prepareStatement = mysqli_prepare($database, $insertQuery);

            mysqli_stmt_bind_param(
                $prepareStatement,
                'sssss', 
                $productName,
                $productPrice,
                $productCategoryID,
                $productDescription,
                $productImagePath
            );

            return mysqli_stmt_execute($prepareStatement);
        }

        function updateProduct($productCategoryID,$productDescription,$productImagePath,$productPrice,$productName,$productID){
            $dbConnection = new Database();
            $database = $dbConnection->getDatabase();

            $updateQuery = "UPDATE products SET categoryID = ?, description = ?, image = ?, price = ?, name = ? WHERE id = ? ;";
            
            $prepareStatement = mysqli_prepare($database, $updateQuery);

            mysqli_stmt_bind_param(
                $prepareStatement,
                'ssssss', 
                $productCategoryID,
                $productDescription,
                $productImagePath,
                $productPrice,
                $productName,
                $productID
            );

            return mysqli_stmt_execute($prepareStatement);
        }

        function getCategories()
        {
            $database = $this->getDatabase();
            return mysqli_query($database,"SELECT * FROM categories");
        }

        function deleteProduct($productId)
        {
            $database = $this->getDatabase();
            return mysqli_query($database,"DELETE FROM products WHERE id='$productId'");
        }

        function getProducts()
        {
            $database = $this->getDatabase();
            return mysqli_query($database,"SELECT * FROM products");
        }

        function getProductByCategory($categoryID)
        {
            $database = $this->getDatabase();
            return mysqli_query($database, "SELECT * FROM products WHERE categoryID='$categoryID'");
        }

        function getProductByID($ID)
        {
            $database = $this->getDatabase();
            return mysqli_query($database,"SELECT * FROM products WHERE id='$ID'");
        }

        function getRandomProducts()
        {
            $database = $this->getDatabase();
            return mysqli_query($database, "SELECT * FROM products ORDER BY RAND() LIMIT 3");
        }

    }

?>