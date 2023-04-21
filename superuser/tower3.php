
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");


if (!empty($_POST["office_client"])) {
    $id = ($_POST['office_client']);


    $stmt = mysqli_query($conn, "SELECT distinct room FROM masterfacility WHERE office_client ='$id' AND branchname='". $_SESSION['branchname'] ."'AND  floor ='". $_SESSION['floor'] ."'");
?>
      <option value="<?php echo "select" ?>"><?php echo "Select Room"; ?>
        </option>
 <?php   
    while ($row = mysqli_fetch_assoc($stmt)) {
?>
        <option value="<?php echo htmlentities($row['room']); ?>"><?php echo htmlentities($row['room']); ?>
        </option>
    <?php

    } {
    ?>

<?php
    }
}

?>