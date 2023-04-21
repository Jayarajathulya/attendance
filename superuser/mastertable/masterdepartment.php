<?php
session_start();
error_reporting(0);
include('../include/config.php');
if (isset($_POST['add'])) {
    $department = $_POST['department'];

    // $sql = "INSERT INTO `masterdepartment` (departmentname) VALUES ('$department')";

        
    // if (($result = mysqli_query($conn, $sql)) ) {
    //     echo "<script type='text/javascript'>alert('Data Inserted successfully!!');location='masterdepartment.php'; </script>";
    
    
    //     // echo "$sql";
    // } else {
    //        echo "<script type='text/javascript'>alert('Data Insertion failed!!');location='masterdepartment.php'; </script>";
    // }
    
    
$sql="select * from masterdepartment where departmentname='$department' ;";

$res=mysqli_query($conn,$sql);

if (mysqli_num_rows($res) > 0) {
  
  $row = mysqli_fetch_assoc($res);
  if($department==isset($row['departmentname']))
  {
    echo "<script type='text/javascript'>alert('Data Already Exists!!');location='masterdepartment.php'; </script>";
  }
  }
else{
//do your insert code here or do something (run your code)
$sql = "INSERT INTO masterdepartment (departmentname) VALUES ('$department')";
$res=mysqli_query($conn,$sql);
echo "<script type='text/javascript'>alert('Data Inserted successfully!!');location='masterdepartment.php'; </script>";
}
 
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>

<body class="items-center bg-zinc-100">
    <?php
    include('../include/superusersidebar.php');
?>    
    <div class="py-2 px-2">
            <div class="justify-center w-full mx-auto bg-white">
                <nav class="flex py-3 border-y" aria-label="Breadcrumb">
                    <ol role="list" class="flex items-center space-x-4">
                        <li>
                            <div class="flex items-center">
                                <a href="#" class="inline-flex items-center text-sm font-medium duration-200 text-sky-800 hover:text-sky-900 hover:scale-95">
                                    <ion-icon class="flex-shrink-0 w-4 h-4 md hydrated" name="home-outline" role="img" aria-label="home outline"></ion-icon>
                                    <span class="ml-4">
                                        Home
                                    </span>
                                </a>
                            </div>
                        </li>

                        <li>
                            <div class="flex items-center ">
                                <span class="flex-shrink-0 w-5 h-5 text-gray-300 ">
                                    /
                                </span>
                                <a href="#" class="ml-4 text-sm font-medium text-pink-500 hover:scale-95 hover:text-sky-900" aria-current="page">
                                    Mater Department
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    
        <div class="relative py-3 mx-auto text-center sm:w-96">
            <span class="text-3xl font-semibold text-center pb-4 text-sky-800">Facility Add Department</span>
            <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                <div class="h-2 bg-pink-400 rounded-t-md"></div>
                <div class="px-8 py-7 ">
                    <form action="" method="post" id="form">
                        <input type="hidden" name="id">
                        <label class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Department</label>
                        <input type="Text" name="department" required  placeholder="Enter The Department" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                        <div class="flex items-baseline justify-center ">
                                <button type="submit" name="add" class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">Add Details</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
</body>

</html>