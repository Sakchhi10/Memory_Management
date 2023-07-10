<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";


    //Create Database 
    
    $sql ="CREATE DATABASE `quiz`";
    if($conn->query($sql)==TRUE){
        echo "Database created succesfully";
    }
    else{
        echo "Error creating database".$conn->error;
    }

    $sql1 = "CREATE TABLE `quiz`.`questions`(
        id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        question VARCHAR(500),
        opt1 VARCHAR(400),
        opt2 VARCHAR(400),
        opt3 VARCHAR(400),
        opt4 VARCHAR(400),
        option VARCHAR(400),
        explanation VARCHAR(400)
    )";

    if($conn->query($sql1)==TRUE){
        echo "TABLE CREATED SUCCESSFULLY";
    }
    else{
        echo "ERROR CREATING TABLE";
    }

    $sql2 = "CREATE TABLE `quiz`.`info`(
        SRN VARCHAR(20) PRIMARY KEY, 
        name VARCHAR(30),
        percentage FLOAT(5)
    )";

    if($conn->query($sql2)==TRUE){
        
    }
    else{
        echo "ERROR CREATING TABLE";
    }



    $conn->close();
?>

