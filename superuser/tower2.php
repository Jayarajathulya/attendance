<?php
session_start();
// $conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");
include_once './include/config.php';


if (!empty($_POST["floor"])) {
    $_SESSION['floor'] = ($_POST['floor']);


    $stmt = mysqli_query($conn, "SELECT distinct office_client FROM masterfacility  WHERE floor ='". $_SESSION['floor'] ."' AND branchname='". $_SESSION['facilityname'] ."' AND towername ='". $_SESSION['towername'] ."'");
?>
      <option value="<?php echo "select" ?>"><?php echo "Select "; ?>
        </option>
 <?php   
    while ($row = mysqli_fetch_assoc($stmt)) {
?>
        <option value="<?php echo htmlentities($row['office_client']); ?>"><?php echo htmlentities($row['office_client']); ?>
        </option>
    <?php

    } {
    ?>

<?php
    }
}

?>