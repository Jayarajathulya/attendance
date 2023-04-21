
<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "athul9z1_cms");

if (!empty($_POST["towername"]) ) {
    $id = ($_POST['towername']);



    $stmt = mysqli_query($conn, "SELECT distinct floor FROM masterfacility   WHERE towername ='$id' AND branchname='". $_SESSION['branchname'] ."' ");
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