<?php
session_start();
// $conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");
include_once './include/config.php';

if (!empty($_POST["room"])) {
    $city = ($_POST['room']);
    
    $stmt = mysqli_query($conn, "SELECT wifiname, wifipassword,intercom FROM intercom_wifi WHERE room='$city' AND branchname='". $_SESSION['facilityname'] ."' AND floor='". $_SESSION['floor'] ."'");
    
    $wifiData = array();
    while ($row = mysqli_fetch_assoc($stmt)) {
        $wifiData[] = $row['wifiname'];
        $wifiData[] = $row['wifipassword'];
        $wifiData[] = $row['intercom'];
        
    }
    echo json_encode($wifiData); // return JSON data to AJAX success function
    exit(); // stop script execution after echoing JSON data
}
?>