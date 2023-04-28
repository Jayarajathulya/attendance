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
                pageLength: 8,
               "processing": true,
            });
        });
    </script>
</head>

<body class="items-center bg-zinc-100">
    <div>
        <?php
        include('../include/superusersidebar.php');
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
            <div class="items-center px-8 mx-auto lg:px-16 md:px-12 bg-zinc-100">
            <div class="text-3xl font-semibold text-center pb-4 text-sky-800"> Facility Wifi and intercom list</div>
                <div class="w-full mb-8 overflow-hidden ">
                    <div class="w-full overflow-x-auto ">
                        <table id="example" class="w-full border  border-spacing-1">
                            <thead>
                                <tr class="font-semibold tracking-wide text-left text-white uppercase bg-pink-600 border-b border-gray-500 text-md">
                                <th class="px-4 py-3 whitespace-nowrap ">ID</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">country</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">state</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">city</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">facility_name</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">towername</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">floor</th>  
                                    <th class="px-4 py-3 whitespace-nowrap ">office_client</th>  
                                    <th class="px-4 py-3 whitespace-nowrap ">room</th>    
                                    <th class="px-4 py-3 whitespace-nowrap ">wifi_name</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">wifipassword</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">intercom_number</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                

                                $sql = "SELECT * FROM intercom_wifi";
                                // $sql = "SELECT * FROM intercom_wifi";
                                $record = mysqli_query($conn, $sql);

                                while ($post = mysqli_fetch_assoc($record)) {
                                ?>
                                        <tr class="bg-white border-b hover:bg-sky-100">
                                            <td class="px-6 py-4 border-b border-r border-slate-400"><?php echo $post['id']; ?>
                                            </td>
                                            <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['country']; ?></td>
                                            <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['state']; ?></td>
                                                <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['city']; ?></td>
                                                <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['branchname']; ?></td>
                                            <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['towername']; ?></td>
                                                <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['floor']; ?></td>
                                                <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['office_client']; ?></td>
                                            <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['room']; ?></td>
                                            <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['wifiname']; ?></td>
                                                <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['wifipassword']; ?></td>
                                                <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['intercom']; ?></td>
                                            <?php echo ("<td class='border-r border-b px-6 py-4 whitespace-nowrap  border-slate-400 ...'>
                                <a href=\"edit_wifi.php?edit=$post[id]\" class='inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap border rounded-md shadow-sm border-sky-700 bg-sky-800 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500'>Edit</a> 
                                <a href=\"wifi_facility_delete.php?del= $post[id]\" class='inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-red-500 border border-red-800 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500'>Delete</a> </td>") ?>

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


