<?php
    #Uncomment someone's credentials if you need to access the site.
    #Follow the format of the variables.

    #Paulo's SQL's Credentials
    $db_server = "localhost:3306";
    $db_user = "root";
    $db_pass = 'paulo';

    #$db_server = "localhost:3307";
    #$db_user = "root";
    #$db_pass = "";

    #Keep this intact.
    $db_name = "shop";

    #Keep this empty
    $conn = "";

    try {
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    } catch (mysqli_sql_exception $e) {
        $e = addslashes(str_replace(array("\r", "\n"), ' ', $e->getMessage()));

    }