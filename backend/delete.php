<?php

    // Include connection
    require 'connect.php';

    // Get id
    $id = mysqli_real_escape_string($con, (int)$_GET['id']);

    if (!$id) {
        return http_response_code(400);
    }

    // Delete
    $sql = "DELETE FROM todos WHERE id = '{$id}'";

    if (mysqli_query($con, $sql)) {

        $status_code = http_response_code(204);
        $message = "Todo deleted.";
        $response = "OK";

    } else {
        
        $status_code = http_response_code(422);
        $message = "Todo not deleted.";
        $response = "OK";
    }

    $response = array(
        "status" => $status_code,
        "msg" => $message,
        "response" => $response
    );

    echo json_encode($response);

?>