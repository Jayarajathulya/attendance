<?php 
session_start();
error_reporting(0);
include('../include/config.php');

// $conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");


if (!empty($_POST["place"])) {
    $id = ($_POST['place']);


    $stmt = mysqli_query($conn, "SELECT distinct wifipassword FROM wifi13 WHERE place ='$id' AND branchcode ='" . $_SESSION['branchcode'] . "'");
?>
 <?php   
    while ($row = mysqli_fetch_assoc($stmt)) {
?>
        <option value="<?php echo htmlentities($row['wifipassword']); ?>"><?php echo htmlentities($row['wifipassword']); ?>
        </option>
    <?php

    } {
    ?>

<?php
    }
}

?>  