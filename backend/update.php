<?php
/**
 *  Update Todo
 */

// include connection
require 'connect.php';

// Get the posted data
$data = file_get_contents("php://input");

if (isset($data) && !empty($data)) {

    // Convertir en tableau associative
    $request = json_decode($data, true);

    // Sanitize
    $id = mysqli_real_escape_string($con, (int)$_GET['id']);
    $todo = mysqli_real_escape_string($con, trim($request['todo']));
    $completed = mysqli_real_escape_string($con, trim($request['completed']));

    // Update
    $sql = "UPDATE `todos` SET `todo` = '$todo', `completed` = '$completed' WHERE `id` = '{$id}' LIMIT 1";

    if (mysqli_query($con, $sql)) {

        $status_code = http_response_code(204);
        $message = "Todo successfully updated.";
        $response = "OK";

    } else {

        $status_code = http_response_code(422);
        $message = "Todo not successfully updated.";
        $response = "OK";

    }

    $response = array(
        'status' => $status_code,
        'msg' => $message,
        'response' => $response
    );

    echo json_encode($response);

}