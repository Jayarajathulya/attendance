<?php
session_start();
include_once './include/config.php';


if (isset($_POST['date']) && isset($_POST['country']) && isset($_POST['state']) && isset($_POST['city']) && isset($_POST['branchname'])) {
    $date = $_POST['date'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $branchname = $_POST['branchname'];
  
    $query = "SELECT * FROM attendance_taken 
              JOIN employee_details ON attendance_taken.employee_id = employee_details.id
              WHERE date='$date'";
    $result = mysqli_query($conn,$query);
  
    if ($result) {
      if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>
                <th>Name</th>
                <th>Department</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
                <th>Branchname</th>
              </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['department'] . "</td>";
          echo "<td>" . $row['country'] . "</td>";
          echo "<td>" . $row['state'] . "</td>";
          echo "<td>" . $row['city'] . "</td>";
          echo "<td>" . $row['branchname'] . "</td>";
          echo "</tr>";
        }
        echo "</table>";
      } else {
        echo "No attendance records found.";
      }
    } else {
      echo "Query execution failed: " . mysqli_error($conn);
    }
  }
?>