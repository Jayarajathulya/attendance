
<?php

$conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");


if (!empty($_POST["floor"])) {
    $id = ($_POST['floor']);


    $stmt = mysqli_query($conn, "SELECT distinct room FROM masterfacility WHERE floor ='$id'");
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