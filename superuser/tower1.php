<?php
session_start();
// $conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");
include_once './include/config.php';

if (!empty($_POST["towername"]) ) {
    $_SESSION['towername'] = ($_POST['towername']);



    $stmt = mysqli_query($conn, "SELECT distinct floor FROM masterfacility  WHERE towername ='". $_SESSION['towername'] ."' AND branchname='". $_SESSION['facilityname'] ."' ");
?>
      <option value="<?php echo "select" ?>"><?php echo "Select Floor"; ?>
        </option>
 <?php   
    while ($row = mysqli_fetch_assoc($stmt)) {
        
?>
        <option value="<?php echo htmlentities($row['floor']);?>"><?php echo htmlentities($row['floor']);?>
        </option>
    <?php

    } {
    ?>

<?php
    }
}

?>