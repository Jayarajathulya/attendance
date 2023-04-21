 
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");


if (!empty($_POST["room"])) {
    $city = ($_POST['room']);
    
    $stmt = mysqli_query($conn, "SELECT distinct wifipassword FROM intercom_wifi WHERE room='$city' AND branchname='". $_SESSION['branchname'] ."'AND  floor ='". $_SESSION['floor'] ."'");
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