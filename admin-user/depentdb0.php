<?php

// $conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");
include_once './include/config.php';

if (!empty($_POST["country"])) {
    $id = ($_POST['country']);


    $stmt = mysqli_query($conn, "SELECT distinct state FROM masterfacility WHERE country ='$id'");
?>
      <option value="<?php echo "select" ?>"><?php echo "Select State"; ?>
        </option>
 <?php   
    while ($row = mysqli_fetch_assoc($stmt)) {
?>
        <option value="<?php echo htmlentities($row['state']); ?>"><?php echo htmlentities($row['state']); ?>
        </option>
    <?php

    } {
    ?>

<?php
    }
}




?>