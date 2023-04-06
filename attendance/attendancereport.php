<?php
error_reporting(0);
session_start();
include '../include/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance records</title>
    <!-- Datatable CSS -->
    <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <!-- <link href='https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js' rel='stylesheet' type='text/css'> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js">
    </script>


   



    <!-- jQuery UI CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">


    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <!-- jQuery UI JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <!-- Datatable JS -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- buttons -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>







    <script>
        $(document).ready(function() {

            // Datapicker 

            $(".datepicker").datepicker({
                "dateFormat": "dd-mm-yy",
                changeYear: true
            });

            // DataTable
            var dataTable = $('#empTable').DataTable({
                dom: 'Bfrtip',
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'searching': true, // Set false to Remove default Search Control
                'ajax': {
                    'url': 'ajaxfile.php',
                    'data': function(data) {
                        // Read values
                        var from_date = $('#search_fromdate').val();
                        var to_date = $('#search_todate').val();

                        // Append to data
                        data.searchByFromdate = from_date;
                        data.searchByTodate = to_date;
                    }
                },
                'columns': [{
                        data: 'name'
                    },
                    {
                        data: 'departmentname'
                    },                       
                    {
                        data: 'tower'
                    },
                    {
                        data: 'floor'
                    },
                    {
                        data: 'room'
                    },
                    {
                        data: 'branchcode'
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'attendance'
                    },
                ],
                buttons: [{
                        extend: 'copy',
                        className: 'btn '
                    },
                    {
                        extend: 'csv',
                        className: 'btn '
                    },
                    {
                        extend: 'excel',
                        className: 'btn '
                    },
                    {
                        extend: 'pdf',
                        className: 'btn '
                    },
                    {
                        extend: 'print',
                        className: 'btn '
                    }
                ],
                drawCallback: function() {
                    $("input[type='search']").attr("id", "searchBox").attr("placeholder", "Search...");
                }
            });

            // Search button
            $('#btn_search').click(function() {
                dataTable.draw();
            });

        });
    </script>
    <style>
        #searchBox {
            padding: 5px;
            margin-top: 6px;
            font-size: 14px;
            border: 2px solid;
            border-color: skyblue;
            border-radius: 2px;
            width: 259px;
        }

        #searchBox:hover {

            box-shadow: 0px 1px 4px 2px skyblue;
        }

        #searchBox:focus {
            box-shadow: 0px 1px 4px 2px skyblue;
            outline: none;
        }

        #searchBox::placeholder {
            padding-left: 4px;
        }

        .dataTables_filter {
            transform: translatey(-40px);
        }

        .btn {
            color: #ffff;
            background-color: rgb(236, 72, 153) !important;
            box-shadow: 0px 2px 5px gray;
            padding: 5px 10px;
        }

        .btn:hover {
            color: #ffff;
            background-color: #0C4A6E !important;
            box-shadow: 0px 5px 10px #0C4A6E !important;
        }

        table.dataTable td {
            font-size: 18px;
            font-weight: normal;
            font-weight: 500;
            font-style: normal;
        }
    </style>
</head>

<body>

    <div>
        <?php
        include('../include/sidebar.php')
        ?>


        <section>
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
                                        Attendance Report
                                    </a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>

                <div>

                    <div class="relative py-3 mx-auto text-center sm:w-96">
                        <span class="text-2xl font-semibold ">Attendance Report</span>
                        <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                            <div class="h-2 bg-pink-400 rounded-t-md"></div>
                            <div class="px-8 py-6 ">
                                <!-- <form action="" method=""> -->
                                <label class="block my-3 font-semibold text-gray-800 text-md">From</label>
                                <input type='text' readonly id='search_fromdate' placeholder='From date' class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none datepicker">

                                <label class="block my-3 font-semibold text-gray-800 text-md">To</label>
                                <input type='text' readonly id='search_todate' placeholder='To date' class="w-full px-4 py-2 rounded-lg bg-zinc-100 focus:outline-none datepicker">

                                <button type="submit" name="submit" id="btn_search" class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">Filter</button>

                                <!-- </form> -->

                            </div>

                        </div>
                    </div>

                    <div class="">
                        <div class="">
                            <table id='empTable' class="text-sm text-left border-b text-black  border-collapse border border-slate-400 display cell-border  hover nowrap order-column  row-border stripe  dt[-head|-body]-right...">
                                <thead class="text-xs uppercase text-gray-50 bg-sky-900 ">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 border-r border-slate-400 ">name</th>
                                        <th scope="col" class="px-6 py-4 border-r border-slate-400 ">Departmentname</th>
                                        <th scope="col" class="px-6 py-4 border-r border-slate-400 ">TOWER NAME</th>
                                        <th scope="col" class="px-6 py-4 border-r border-slate-400 ">FLOOR</th>
                                        <th scope="col" class="px-6 py-4 border-r border-slate-400 ">ROOM</th>
                                        <th scope="col" class="px-6 py-4 border-r border-slate-400 ">branchcode</th>
                                        <th scope="col" class="px-6 py-4 border-r border-slate-400 ">date</th>
                                        <th scope="col" class="px-6 py-4 border-r border-slate-400 ">attendance</th>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>



            </div>
        </section>





    </div>

</body>

</html>