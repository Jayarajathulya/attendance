<?php
error_reporting(0);
session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" sizes="96x96" href="logo.png">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.3.1/css/dataTables.dateTime.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>
    <script src="//cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.3.1/js/dataTables.dateTime.min.js"></script>
    <title>Intercom details</title>
    <style>
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

        /* .pagination .page-item .page-link {
        color: #0C4A6E;
    }

    .pagination .page-item.active .page-link {
        background-color: #0C4A6E;
        color: #ffff;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-item.active .page-link:focus {
        background-color: #0C4A6E;
    }

    .pagination .page-item.active .page-link:hover {
        background-color: gray;
    } */
        .dataTables_filter {
            transform: translatey(-40px);
        }

        table.dataTable td {
            font-size: 18px;
            font-weight: normal;
            font-weight: 500;
            font-style: normal;
        }
    </style>

</head>

<body class="items-center bg-zinc-100">
<?php
        include('../include/superusersidebar.php')
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
                                Intercom Details
                            </a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="relative py-3 mx-auto text-center sm:w-96">
            <span class="text-3xl font-semibold text-center pb-4 text-sky-800">Intercom Details</span>
        </div>

        <div class="px-36">
            <div class="grid grid-cols-1 gap-4 ">
                <table id="customersTable" class="text-sm text-left border-b text-black  border-collapse border border-slate-400 display cell-border  hover nowrap order-column  row-border stripe  dt[-head|-body]-right...">
                    <thead class="text-xs uppercase text-gray-50 bg-sky-900 ">
                        <tr>
                            <th scope="col" class="w-6 border-r px-6 py-4 border-slate-400 ...">id</th>
                            <th scope="col" class="w-6 border-r px-6 py-4 border-slate-400 ...">tower name</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">floor</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">roomno</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">phone</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">state</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">city</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">facility name</th>
                            <th scope="col" class="border-r px-6 py-4 border-slate-400 ...">facility code</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
        <script>
            $(document).ready(function() {

                var table = $('#customersTable').DataTable({
                    dom: 'Bfrtip',
                    pageLength: 10,
                    "processing": true,
                    "ajax": "display.php",
                    "columns": [{
                            data: "id"
                        },
                        {
                            data: "tower"
                        },
                        {
                            data: "floor"
                        },
                        {
                            data: "roomno"
                        },
                        {
                            data: "phone"
                        },
                        {
                            data: "state"
                        },
                        {
                            data: "city"
                        },
                        {
                            data: "branchname"
                        },
                        {
                            data: "branchcode"
                        }
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
            });
        </script>
</body>

</html>