
<?php
session_start();
error_reporting(0);
include_once '../include/config.php';
$result = mysqli_query($conn, "SELECT * FROM wifi13 WHERE branchcode ='" . $_SESSION['branchcode'] . "' ");
$row = mysqli_fetch_array($result);




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body class="bg-zinc-100">
    <div>
        <?php
        include('../include/sidebar.php');
        ?>
        <div class="items-center px-8 mx-auto lg:px-16 md:px-12 lg:py-24 bg-zinc-100">
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
                                    Office Wifi List
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <section class="">
            <div class="items-center px-8 mx-auto lg:px-16 md:px-12 bg-zinc-100">
            <div class="text-3xl font-semibold text-center pb-4"> Office Wifi list</div>
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full border border-separate rounded-t-lg border-spacing-1">
                            <thead>
                                <tr class="font-semibold tracking-wide text-left text-white uppercase bg-pink-600 border-b border-gray-500 text-md">
                                    <th class="px-4 py-3 whitespace-nowrap ">ID</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">FLOOR</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">PLACE</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">TOWER</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">PASSWORD</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">Facility NAME</th>    
                                    <th class="px-4 py-3 whitespace-nowrap ">Facility CODE</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">ACTION</th>
                            
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (isset($_GET['pageno'])) {
                                    $pageno = $_GET['pageno'];
                                } else {
                                    $pageno = 1;
                                }
                                $no_of_records_per_page = 10;
                                $offset = ($pageno - 1) * $no_of_records_per_page;


                                $total_pages_sql = "SELECT COUNT(*) FROM wifi13 WHERE branchcode ='" . $_SESSION['branchcode'] . "'";
                                $result = mysqli_query($conn, $total_pages_sql);
                                $total_rows = mysqli_fetch_array($result)[0];
                                $total_pages = ceil($total_rows / $no_of_records_per_page);



                                $sql = "SELECT * FROM wifi13 WHERE branchcode ='" . $_SESSION['branchcode'] . "' LIMIT $offset, $no_of_records_per_page ";
                                // $sql = "SELECT * FROM wifi1";
                                $record = mysqli_query($conn, $sql);

                                $$counter = 1;
                                while ($post = mysqli_fetch_assoc($record)) {
                                ?>
                                        <tr class="bg-white border-b hover:bg-sky-100">
                                            <td class="px-6 py-4 border-b border-r border-slate-400"><?php echo $post['id']; ?>
                                            </td>
                                            <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['floor']; ?></td>
                                            <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['place']; ?></td>
                                                <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['tower']; ?></td>
                                            <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['wifipassword']; ?></td>
                                            <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['branch']; ?></td>
                                            <td class="px-6 py-4 border-b border-r border-slate-400">
                                                <?php echo $post['branchcode']; ?></td>
                                            <?php echo ("<td class='border-r border-b px-6 py-4 border-slate-400 ...'>
                                <a href=\"wifi_facility_office_edit.php?edit=$post[id]\" class='inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap border rounded-md shadow-sm border-sky-700 bg-sky-800 hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500'>Edit</a> 
                                <a href=\"wifi_facility_office_delete.php?del= $post[id]\" class='inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-red-500 border border-red-800 rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500'>Delete</a> </td>") ?>

                                        </tr>
                                        <!-- function for today's date -->
                                    <?php } ?>
                                    <!-- while ended here -->
                            </tbody>
                        </table>
                        <div class="container p-6 mx-auto ">

                            <nav aria-label="Page navigation example">
                                <ul class="inline-flex -space-x-px">

                                    <li ><a class="px-3 py-2 ml-0 leading-tight text-white bg-pink-600 border rounded-l-lg -border-gray-300 hover:bg-gray-100 hover:text-gray-700 " href="?pageno=1">First</a></li>
                                    <li>
                                        <a  class="bg-sky-900 border border-gray-300 text-gray-100 hover:bg-gray-100 hover:text-gray-700 leading-tight py-2 px-3  <?php if ($pageno <= 1) {
                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                } ?>" href="<?php if ($pageno <= 1) {
                                                        echo '#';
                                                    } else {
                                                        echo "?pageno=" . ($pageno - 1);
                                                    } ?>">Prev</a>
                                    </li>
                                    <li >
                                        <a class="bg-sky-900 border border-gray-300 text-gray-100 hover:bg-gray-100 hover:text-gray-700 leading-tight py-2 px-3  <?php if ($pageno >= $total_pages) {
                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                } ?>" href="<?php if ($pageno >= $total_pages) {
                                                        echo '#';
                                                    } else {
                                                        echo "?pageno=" . ($pageno + 1);
                                                    } ?>">Next</a>
                                    </li>
                                    <li ><a class="px-3 py-2 leading-tight text-white bg-pink-600 border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                                </ul>
                            </nav>


                        </div>
                    </div>
                </div>
        </section>
    </div>



</body>

</html>