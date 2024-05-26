<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents('php://input'), true);

$student_id = $data['id'];
$sundent_name = $data['student_name'];
$sundent_age = $data['age'];
$sundent_city = $data['city'];

include 'config.php';

$sql = "UPDATE students SET student_name = '$sundent_name', age = '$sundent_age', city = '$sundent_city' WHERE id = '$student_id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Student Record Updated', 'status' => true));
} else {
    echo json_encode(array('message' => 'Student Record Not Updated', 'status' => false));
}
