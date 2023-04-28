<?php
session_start();
error_reporting(0);
include('../include/config.php');
include('../include/sidebar.php');?>
<?php
    if ($conn->connect_error){
        die("connection error");
    }
    else{
        echo "";
    }	
 ?>
<html lang="en">

<head>
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<?php
            include('../include/superusersidebar.php');
            ?>
<div class="h-full mx-auto bg-zinc-100">
        <div class=" px-2 py-2 ">
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
                                Today Attendance
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
    <div class="flex flex-col flex-auto flex-shrink-0 min-h-screen antialiased text-black bg-zinc-100">

        <div
            class="relative flex flex-col justify-center w-full h-full py-6 overflow-hidden antialiased text-gray-800 sm:py-12">
            <div class="relative py-3 mx-auto text-center ">

                <div  class="text-3xl font-semibold text-center pb-4 text-sky-800">Today Attendance</div>
            </div>
<div class="px-20 py-30">
            <div class="relative shadow-md sm:rounded-lg grid gap-8 grid-row-2">
                <table  class=" text-left text-gray-500 dark:text-gray-400 border-collapse border border-slate-400 ...">
                    <thead class=" uppercase bg-pink-600 text-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">Id</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">Name</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">department</th>
                         
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">State</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">City</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">Facility</th>
                            <!-- <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">Branchcode</th> -->
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">Date</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">Attendance</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
	      date_default_timezone_set('Asia/Kolkata');
	       $date = date("Y-m-d");
           $Today = date("d-m-Y", strtotime($date));
          ?>
                        <?php 
//select database
$sql="SELECT * FROM `attendance_taken` WHERE    attendance LIKE '%absent%' AND date='$Today' ORDER BY id ASC ";
$record = mysqli_query($conn,$sql);
while($post=mysqli_fetch_assoc($record)) { 
   ?>
                        <tr>
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['id']; ?></td>
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['name']; ?></td>
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['department']; ?></td>
          
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['state']; ?></td>
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['city']; ?></td>
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['branchname']; ?></td>
                            <!-- <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['branchcode']; ?></td> -->
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['date']; ?></td>
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['attendance']; ?></td>

                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <table  class=" text-left text-gray-500 dark:text-gray-400 border-collapse border border-slate-400 ...">
                    <thead class="uppercase bg-pink-600 text-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">Id</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">Name</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">department</th>
                
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">State</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">City</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">Facility</th>
                            <!-- <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">Branchcode</th> -->
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">Date</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">Attendance</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
	      date_default_timezone_set('Asia/Kolkata');
	       $date = date("Y-m-d");
           $Today = date("d-m-Y", strtotime($date));
          ?>
                        <?php 
//select database
$sql="SELECT * FROM `attendance_taken` WHERE  attendance LIKE '%off%' AND date='$Today' ORDER BY id ASC ";
$record = mysqli_query($conn,$sql);
while($post=mysqli_fetch_assoc($record)) { 
   ?>
                        <tr>
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['id']; ?></td>
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['name']; ?></td>
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['department']; ?></td>
                       
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['state']; ?></td>
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['city']; ?></td>
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['branchname']; ?></td>
                            <!-- <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['branchcode']; ?></td> -->
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['date']; ?></td>
                            <td class="border-r border-b px-6 py-4 border-slate-400 ..."><?php echo $post['attendance']; ?></td>

                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            </div> 
        </div>
        
    </div>
</div>
</div>
</html>