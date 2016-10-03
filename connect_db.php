<?php
 // USING CONSTANTS 
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "shivam5@");
    define("DB_NAME", "search");
   /* $dbhost = "localhost";
    $dbuser = "widget_cms";
    $dbpass = "secretpassword";
    $dbname = "widget_corp";
    */
    // 1. create a database connection
    global $connection;
    $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    // test if connection occured.
    if(mysqli_connect_errno()) {
        die("Database connection failed: " . 
        mysqli_connect_error() . 
        "(" . mysqli_connect_errno() . ")"
        );
    }


?>