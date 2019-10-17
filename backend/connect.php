<?php
// Define CORS
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Define variables de la connexion à la DB 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'todo_ng_php');

// Function connect
function connect() {

    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if (mysqli_connect_errno($connect)) {
        die("Erreur de connexion: ".mysqli_connect_errno());
    }

    mysqli_set_charset($connect, "utf8");

    return $connect;

}


$con = connect();