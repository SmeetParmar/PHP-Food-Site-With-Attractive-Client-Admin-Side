<?php

require('dbConnection.php');
    class feedback{
       
        function getDatabase()
        {
            $dbConnection = new Database();
            $database = $dbConnection->getDatabase();
            return $database;
        }

        function insertFeedback($fName,$fPhone,$fEmail,$fMessage){

            $database = $this->getDatabase();

            $insertQuery = "INSERT INTO `feedbacks`(`name`, `phone`, `email`, `message`) VALUES (?,?,?,?)";
            
            $prepareStatement = mysqli_prepare($database, $insertQuery);

            mysqli_stmt_bind_param(
                $prepareStatement,
                'ssss', 
                $fName,
                $fPhone,
                $fEmail,
                $fMessage
            );

            return mysqli_stmt_execute($prepareStatement);
        }

        function getFeedbacks()
        {
            $database = $this->getDatabase();

            return mysqli_query($database,"SELECT * FROM feedbacks");
        }

        function getRandomFeedbacks()
        {
            $database = $this->getDatabase();

            return mysqli_query($database,"SELECT name,message FROM feedbacks ORDER BY RAND() LIMIT 3");
        }
        
        function deleteFeedback($fedId)
        {
            $database = $this->getDatabase();
            return mysqli_query($database,"DELETE FROM feedbacks WHERE id='$fedId'");
        }
    }

?>