
<?php

$conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");


if (!empty($_POST["tower"])) {
    $id = ($_POST['tower']);


    $stmt = mysqli_query($conn, "SELECT distinct floor FROM masterfacility WHERE tower ='$id'");
?>
      <option value="<?php echo "select" ?>"><?php echo "Select Floor"; ?>
        </option>
 <?php   
    while ($row = mysqli_fetch_assoc($stmt)) {
?>
        <option value="<?php echo htmlentities($row['floor']); ?>"><?php echo htmlentities($row['floor']); ?>
        </option>
    <?php

    } {
    ?>

<?php
    }
}

?>