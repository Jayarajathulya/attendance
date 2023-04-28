<?php

// $conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");
include_once './include/config.php';


if (!empty($_POST["branchname"])) {
    $city = ($_POST['branchname']);

    $stmt = mysqli_query($conn, "SELECT distinct branch_code FROM masterfacility WHERE branchname ='$city'");
?>
    <?php
    while ($row = mysqli_fetch_assoc($stmt)) {
    ?>
        <option  value="<?php echo htmlentities($row['branch_code']); ?>"><?php echo htmlentities($row['branch_code']); ?></option>
    <?php

    } {
    ?>

<?php
    }
}




?>