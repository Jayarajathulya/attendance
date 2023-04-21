<?php
session_start();
include('../include/config.php');

// fetch records
$sql = "SELECT * FROM intercom ";
$result = mysqli_query($conn, $sql);


while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

$dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
);

echo json_encode($dataset);
?>



