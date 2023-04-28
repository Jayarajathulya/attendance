<?php
include_once './include/config.php';

if (!empty($_POST["state"])) {
    $id = ($_POST['state']);


    $stmt = mysqli_query($conn, "SELECT distinct city FROM masterfacility WHERE state ='$id'");
?>
      <option value="<?php echo "select" ?>"><?php echo "Select Location"; ?>
        </option>
 <?php   
    while ($row = mysqli_fetch_assoc($stmt)) {
?>
        <option value="<?php echo htmlentities($row['city']); ?>"><?php echo htmlentities($row['city']); ?>
        </option>
    <?php

    } {
    ?>

<?php
    }
}




?>