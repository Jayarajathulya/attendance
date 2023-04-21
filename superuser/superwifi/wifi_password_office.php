<?php 
session_start();
error_reporting(0);
include('../include/config.php');
?>
        
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");


if (!empty($_POST["room"])) {
    $id = ($_POST['room']);


    $stmt = mysqli_query($conn, "SELECT distinct wifipassword FROM wifi13 WHERE room ='$id' ");
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