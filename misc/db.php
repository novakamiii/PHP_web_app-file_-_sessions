<?php
    #Uncomment someone's credentials if you need to access the site.
    #Follow the format of the variables.

    #Paulo's SQL's Credentials
    #$db_server = "localhost:3306";
    #$db_user = "root";
    #$db_pass = 'paulo';

    $db_server = "localhost:3306";
    $db_user = "root";
    $db_pass = "";

    #Keep this intact.
    $db_name = "shop";

    #Initialize connection variable
    $conn = false;

    try {
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
        
        // Check if connection was successful
        if (!$conn) {
            throw new Exception("Connection failed: " . mysqli_connect_error());
        }
    } catch (Exception $e) {
        // Log error or handle as needed
        error_log("Database connection error: " . $e->getMessage());
        $conn = false;
    }