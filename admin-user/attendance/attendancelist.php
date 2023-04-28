<?php
session_start();
error_reporting(0);
include_once '../include/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.5.1.js" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" />
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
        $(document).ready(function () {
            $('#example').DataTable({
                dom: 'Bfrtip',
                pageLength: 10,
               "processing": true,
            });
        });
    </script>
</head>

<body class="items-center bg-zinc-100">
    <div>
        <?php
        include('../include/sidebar.php');
        ?>
        <div class="px-2 py-2">
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
                                    Attendance List
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <section class="">
            <div class="items-center px-8 mx-auto lg:px-56 md:px-12 bg-zinc-100">
            <div class="text-3xl font-semibold text-center pb-4 text-sky-800"> Facility Attendance list</div>
                <div class="w-full mb-8 overflow-hidden ">
                    <div class="w-full overflow-x-auto ">
                        <table id="example" class="w-full border  ">
                            <thead>
                                <tr class="font-semibold tracking-wide text-left text-white uppercase bg-pink-600 border-b border-gray-500 text-md">
                                    <th class=" whitespace-nowrap ">ID</th>
                                    <th class=" whitespace-nowrap ">NAME</th>
                                    <th class=" whitespace-nowrap ">DEPARTMENT</th>
                                    <th class=" whitespace-nowrap ">Country</th>
                                    <th class=" whitespace-nowrap ">STATE</th>
                                    <th class=" whitespace-nowrap ">CITY</th>
                                    <th class=" whitespace-nowrap ">Facility NAME</th>
                                    <th class=" whitespace-nowrap ">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result ="SELECT * FROM `employee_details` WHERE branchname ='" . $_SESSION['branchname'] . "' ";
                                $row = mysqli_query($conn,$result);
                             
                                while ($post = mysqli_fetch_assoc($row)) {
                                ?>
                                        <tr >
                                            <td class="  border-b border-r border-slate-400"><?php echo $post['id']; ?>
                                            </td>
                                            <td class="  border-b border-r border-slate-400">
                                                <?php echo $post['name']; ?></td>
                                            <td class="  border-b border-r border-slate-400">
                                                <?php echo $post['department']; ?></td>
                                                <td class="  border-b border-r border-slate-400">
                                                <?php echo $post['country']; ?></td>
                                                <td class="  border-b border-r border-slate-400">
                                                <?php echo $post['state']; ?></td>
                                            <td class="  border-b border-r border-slate-400">
                                                <?php echo $post['city']; ?></td>
                                            <td class="  border-b border-r border-slate-400">
                                                <?php echo $post['branchname']; ?></td>
                                  
                                            <?php echo ("<td class='border-r border-b  whitespace-nowrap  border-slate-400 ... '><center>
                                <a href=\"attendanceedit.php?edit=$post[id]\" class='inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap border rounded-md shadow-sm border-sky-700 bg-sky-800 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500'>Edit</a> 
                                 </center></td>") ?>
                                 <!-- <a href=\"attendancedelete.php?del= $post[id]\" class='inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-red-500 border border-red-800 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500'>Delete</a> -->
                                        </tr>
                                        <!-- function for today's date -->
                                    <?php } ?>
                                    <!-- while ended here -->
                            </tbody>
                        </table>

                        </div>
                    </div>
                </div>
        </section>
    </div>



</body>

</html>