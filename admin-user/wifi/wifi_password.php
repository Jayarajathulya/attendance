
<?php
session_start();
// $conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");
include('../include/config.php');

if (!empty($_POST["room"])) {
    $id = ($_POST['room']);


    $stmt = mysqli_query($conn, "SELECT distinct wifipassword FROM wifi1 WHERE roomno ='$id' AND branchcode ='" . $_SESSION['branchcode'] . "'");
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