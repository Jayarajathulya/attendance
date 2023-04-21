
<?php

$conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");


if (!empty($_POST["floor"])) {
    $id = ($_POST['floor']);


    $stmt = mysqli_query($conn, "SELECT distinct place FROM wifi13 WHERE floor ='$id'");
?>
      <option value="<?php echo "select" ?>"><?php echo "Select place"; ?>
        </option>
 <?php   
    while ($row = mysqli_fetch_assoc($stmt)) {
?>
        <option value="<?php echo htmlentities($row['place']); ?>"><?php echo htmlentities($row['place']); ?>
        </option>
    <?php

    } {
    ?>

<?php
    }
}

?>