<?php
/**
 * Create(Insert) data
 */

require 'connect.php';

// Get the posted data
$data = file_get_contents("php://input");

// Check data if exist  and if not null
if (isset($data) && !empty($data)) {

    // convertir en tableau associative
    $request = json_decode($data, true);

    // Sanitize
    $todo       = mysqli_real_escape_string($con, trim($request['todo']));
    //$completed  = mysqli_real_escape_string($con, trim($request['completed']));

    // Insert
    $sql = "INSERT INTO todos (todo) values ('".$todo."')";

    // Check 
    if (mysqli_query($con, $sql)) {
        // if true
        $status_code = http_response_code(201);
        $message     = "Todo successfully added.";
        $response    = "OK";

    } else {
        // if false
        $status_code = http_response_code(422);
        $message     = "Todo not successfully added.";
        $response    = "OK";

    }
    $response = array(
        "status" => $status_code,
        "msg" => $message,
        "response" => $response
    );

    echo json_encode($response);

}

?>