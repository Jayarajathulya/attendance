<?php

$conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");


if (!empty($_POST["city"])) {
    $city = ($_POST['city']);

    $stmt = mysqli_query($conn, "SELECT distinct branchname FROM masterfacility WHERE city ='$city'");
?>
    <option value="<?php echo "select" ?>"><?php echo "Select Branch"; ?>
    </option>
    <?php
    while ($row = mysqli_fetch_assoc($stmt)) {
    ?>
        <option value="<?php echo htmlentities($row['branchname']); ?>"><?php echo htmlentities($row['branchname']); ?>
        </option>
    <?php

    } {
    ?>

<?php
    }
}




?>