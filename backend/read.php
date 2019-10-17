<?php 
/**
 * Read (List)
 */

// Include connection
require 'connect.php';

$todos = [];
$sql = "SELECT * FROM todos";

if ($result = mysqli_query($con, $sql)) {

    $index = 0;

    while($row = mysqli_fetch_assoc($result)) {
        $todos[$index]['id']        = $row['id'];
        $todos[$index]['todo']      = $row['todo'];
        $todos[$index]['completed'] = $row['completed'];
        $index ++;
    }

    echo json_encode($todos);

} else {
    http_response_code(404);
}