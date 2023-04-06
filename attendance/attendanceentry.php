<?php
session_start();
error_reporting(0);
include_once '../include/config.php';
date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d");
$ThisDate = date("d-m-Y", strtotime($date));
$result = mysqli_query($conn, "SELECT date FROM `attendance_taken` WHERE branchcode ='" . $_SESSION['branchcode'] . "' AND date = '$ThisDate' ");
$row = mysqli_fetch_array($result);
$total = $row[0];
$today = strval($total);
if ($total == $ThisDate) {
    header("Location:todayreport.php");

?>
<?php

} else {
?>
    <?php
    $result = mysqli_query($conn, "select count(1) FROM employee_details where branchcode ='" . $_SESSION['branchcode'] . "'");
    $row = mysqli_fetch_array($result);
    $total = $row[0];

    if (isset($_POST['submit'])) {
        for ($i = 0; $i < $total; $i++) {
            $id = $_POST['id'][$i];
            $name = $_POST['name'][$i];
            $departmentname = $_POST['departmentname'][$i];
            $tower = $_POST['tower'][$i];
            $date = $_POST['date'][$i];
            $attendance = $_POST['attendance'][$i];
            $branchcode = $_POST['branchcode'][$i];
                $sql = "INSERT INTO `attendance_taken`(`id`, `name`,`departmentname`,`branchcode`, `tower`,`date`, `attendance`) VALUES ('$id','$name','$departmentname','$branchcode','$tower','$date','$attendance')";
                $result = mysqli_query($conn, $sql);
                $sql = rtrim($sql, ",");
                header("Location:todayreport.php");
                
        }
    }
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
            <div class="items-center px-8 py-12 mx-auto lg:px-16 md:px-12 lg:py-24 bg-zinc-100">
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
                                        Attendance Entry
                                    </a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
                <section class="container p-6 mx-auto font-medium ">

                    <div class="w-full mb-8 overflow-hidden bg-white rounded-lg shadow-lg">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full border border-separate rounded-t-lg border-spacing-1">
                                <thead class="p-6">
                                    <tr class="font-semibold tracking-wide text-left text-white uppercase bg-pink-600 border-b border-gray-500 text-md">
                                        <th class="px-4 py-3 whitespace-nowrap ">ID</th>
                                        <th class="px-4 py-3 whitespace-nowrap ">NAME</th>
                                        <th class="px-4 py-3 whitespace-nowrap ">DEPARTMENT</th>
                                        <th class="px-4 py-3 whitespace-nowrap ">TOWER NAME</th>
                                        <th class="px-4 py-3 whitespace-nowrap ">STATE</th>
                                        <!-- <th class="px-4 py-3 whitespace-nowrap ">CITY</th> -->
                                        <!-- <th class="px-4 py-3 whitespace-nowrap ">Facility</th> -->
                                        <th class="px-4 py-3 whitespace-nowrap ">BRANCH CODE</th>
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

                                    $total_pages_sql = "SELECT COUNT(*) FROM employee_details";
                                    $result = mysqli_query($conn, $total_pages_sql);
                                    $total_rows = mysqli_fetch_array($result)[0];
                                    $total_pages = ceil($total_rows / $no_of_records_per_page);


                                    $sql = "SELECT * FROM employee_details WHERE branchcode ='" . $_SESSION['branchcode'] . "' LIMIT $offset, $no_of_records_per_page ";
                                    // $sql = "SELECT * FROM employee_details LIMIT 10 ";
                                    // $sql = "SELECT * FROM `employee_details` WHERE branchcode ='" . $_SESSION['branchcode'] . "' LIMIT $offset, $no_of_records_per_page";
                                    $record = mysqli_query($conn, $sql);
                                    $$counter = 1;
                                    while ($post = mysqli_fetch_assoc($record)) {
                                    ?>
                                        <form action="" method="post">
                                            <input type="hidden" value="<?php echo $total; ?>" name="numbers" />
                                            <input type="hidden" value="<?php echo $post['empid']; ?>" name="empid[]" />
                                            <input type="hidden" value="<?php echo $post['name']; ?>" name="name[]" />
                                            <input type="hidden" value="<?php echo $post['department']; ?>" name="departmentname[]" />
                                            <input type="hidden" value="<?php echo $post['branchcode']; ?>" name="branchcode[]" />
                                            <input type="hidden" value="<?php echo $post['tower']; ?>" name="tower[]" />
                                            <tr class="bg-white border-b border-separate hover:bg-sky-100 ">
                                                <td class="border-r border-b px-6 py-4 border-slate-400 ...">
                                                    <?php echo $post['id']; ?>
                                                </td>
                                                <td class="border-r border-b px-6 py-4 border-slate-400   ...">
                                                    <?php echo $post['name']; ?></td>
                                                <td class="border-r border-b px-6 py-4 border-slate-400 ...">
                                                    <?php echo $post['department']; ?></td>
                                                <td class="border-r border-b px-6 py-4 border-slate-400 ...">
                                                    <?php echo $post['tower']; ?></td>
                                                <td class="border-r border-b px-6 py-4 border-slate-400 ...">
                                                    <?php echo $post['state']; ?></td>
                                                <td class="border-r border-b px-6 py-4 border-slate-400 ...">
                                                    <?php echo $post['branchcode']; ?></td>
                                                <!-- <td class="border-r border-b px-6 py-4 border-slate-400 ...">
                                    <?php echo $post['city']; ?></td>
                                    <td class="border-r border-b px-6 py-4 border-slate-400 ...">
                                    <?php echo $post['facility']; ?></td> -->
                                                <?php echo "<td class='border-r border-b px-6 py-4 border-slate-400 ...'><label><input type='radio' id='mycode' name='attendance[$counter]' value='Absent' class='accent-red-600'>Absent &nbsp &nbsp &nbsp &nbsp </label>
                            <label><input type='radio' name='attendance[$counter]' id='mycode1' value='Off'>Off</label></td>" ?>
                                            </tr>
                                            <!-- function for today's date -->
                                            <?php
                                            date_default_timezone_set('Asia/Kolkata');
                                            $date = date("Y-m-d");
                                            $ThisDate = date("d-m-Y", strtotime($date));
                                            ?>
                                            <input type="hidden" value="<?php echo $ThisDate; ?>" name="date[]" />
                                        <?php $counter++;
                                    } ?>
                                        <!-- while ended here -->
                                </tbody>
                            </table>
                            <div class="flex items-baseline justify-center ">
                                <button type="submit" name="submit" class="px-6 py-2 mt-4 mb-8 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">Submit</button>
                            </div>
                        </div>


                        <!-- <form action="" method="post"> -->

                    <?php } ?>
                    </table>
                    <div class="container p-6 mx-auto ">
                        <nav aria-label="Page navigation example">
                            <ul class="inline-flex -space-x-px">
                                <li class="px-3 py-2 ml-0 leading-tight text-white bg-pink-600 border rounded-l-lg -border-gray-300 hover:bg-gray-100 hover:text-gray-700 "><a href="?pageno=1">First</a></li>
                                <li class="bg-sky-900 border border-gray-300 text-gray-100 hover:bg-gray-100 hover:text-gray-700 leading-tight py-2 px-3  <?php if ($pageno <= 1) {
                                                                                                                                                                echo 'disabled';
                                                                                                                                                            } ?>">
                                    <a href="<?php if ($pageno <= 1) {
                                                    echo '#';
                                                } else {
                                                    echo "?pageno=" . ($pageno - 1);
                                                } ?>">Prev</a>
                                </li>
                                <li class="bg-sky-900 border border-gray-300 text-gray-100 hover:bg-gray-100 hover:text-gray-700 leading-tight py-2 px-3  <?php if ($pageno >= $total_pages) {
                                                                                                                                                                echo 'disabled';
                                                                                                                                                            } ?>">
                                    <a href="<?php if ($pageno >= $total_pages) {
                                                    echo '#';
                                                } else {
                                                    echo "?pageno=" . ($pageno + 1);
                                                } ?>">Next</a>
                                </li>
                                <li class="px-3 py-2 leading-tight text-white bg-pink-600 border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700"><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                            </ul>
                        </nav>


                    </div>
                    </div>
            </div>
            </section>
        </div>


        <script>
            const moveTR = (ev) => {
                const EL_tr = ev.currentTarget.closest("tr");
                const sel = EL_tr.closest("table").id === "table1" ? "#table2" : "#table1";
                document.querySelector(sel + " tbody").append(EL_tr);
            };
            document.querySelectorAll("input")
                .forEach(EL => EL.addEventListener("click", moveTR));
        </script>

    </body>

    </html>