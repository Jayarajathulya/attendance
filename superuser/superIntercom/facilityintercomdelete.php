<?php 
include_once '../include/config.php';
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM intercom WHERE id=$id");
    $_SESSION['message'] = "Address deleted!";
    header('location: facilityintercomlist.php');
}


?>