<?php

    require('dbConnection.php');

    class user{
       
        function getDatabase()
        {
            $dbConnection = new Database();
            $database = $dbConnection->getDatabase();
            return $database;
        }

        function getAllUsers()
        {
            $database = $this->getDatabase();
            return mysqli_query($database,"SELECT * FROM users");
        }

        function loginUser($email,$password)
        {
            $database = $this->getDatabase();
            return mysqli_query($database,"SELECT * FROM users WHERE email='$email' AND password='$password'");
        }
        
        function registerUser($firstName,$lastName,$email,$password,$userType)
        {
            $database = $this->getDatabase();
            
            $insertQuery = "INSERT INTO `users`(`firstName`, `lastName`, `email`, `password`, `userType`) VALUES (?,?,?,?,?)";
            
            $prepareStatement = mysqli_prepare($database, $insertQuery);

            mysqli_stmt_bind_param(
                $prepareStatement,
                'sssss', 
                $firstName,
                $lastName,
                $email,
                $password,
                $userType
            );

            return mysqli_stmt_execute($prepareStatement);
        }
    }

?>