
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");


if (!empty($_POST["branchname"])) {
    $_SESSION['branchname'] = ($_POST['branchname']);
    
    $stmt = mysqli_query($conn, "SELECT distinct towername FROM masterfacility WHERE branchname='". $_SESSION['branchname'] ."'");
?>
    <option value="<?php echo "select" ?>"><?php echo "Select Towername"; ?>
    </option>
    <?php
    while ($row = mysqli_fetch_assoc($stmt)) {

    ?>
        <option value="<?php echo htmlentities($row['towername']); ?>"><?php echo htmlentities($row['towername']); ?>
        </option>
    <?php

    } {
    ?>

<?php
    }
}




?>