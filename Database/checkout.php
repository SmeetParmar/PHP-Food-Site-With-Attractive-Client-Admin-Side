<?php

require('dbConnection.php');
    class checkout{
       
        function getDatabase()
        {
            $dbConnection = new Database();
            $database = $dbConnection->getDatabase();
            return $database;
        }

        function insertCheckoutForm($orderID,$userEmail,$userPassword,$name,$email,$phone,$street,$city,$prov,$postal,$card,$expiry_date,$cvv,$orderDate,$total){

            $database = $this->getDatabase();

            $insertQuery = "INSERT INTO `orders`(`id`, `userEmail`, `userPassword`, `name`, `email`, `phone`, `street`, `city`, `province`, `postalCode`, `cardNumber`, `expiryDate`, `cvv`, `date`, `total`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        
            $prepareStatement = mysqli_prepare($database, $insertQuery);

            mysqli_stmt_bind_param(
                $prepareStatement,
                'sssssssssssssss', 
                $orderID,
                $userEmail,
                $userPassword,
                $name,
                $email,
                $phone,
                $street,
                $city,
                $prov,
                $postal,
                $card,
                $expiry_date,
                $cvv,
                $orderDate,
                $total
            );

            return mysqli_stmt_execute($prepareStatement);
        }
    }

?>