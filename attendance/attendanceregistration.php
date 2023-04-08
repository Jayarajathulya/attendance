<?php

error_reporting(0);
session_start();
include_once '../include/config.php';
include_once '../include/script.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $tower = $_POST['tower'];
    $floor = $_POST['floor'];
    $room = $_POST['room'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $facility = $_POST['facility'];
    $branchcode = $_POST['branchcode'];
    $sql = mysqli_query($conn,"INSERT INTO employee_details (name,department,tower,floor,room,state,city,facility,branchcode) VALUES ('$name','$department','$tower','$floor','$room','$state','$city','$facility','$branchcode')");
    
    
            if ($sql) {
               echo "<script type='text/javascript'>alert('Data inserted successfully!!');location='attendancelist.php'; </script>";

            } else {
               echo "<script type='text/javascript'>alert('Error = Data inserted faild!!');location='attendancelist.php'; </script>";
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
    <script src="./vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                },
                screens: {
                    ss: "320px",
                    // => @media (min-width: 640px) { ... }

                    sm: "375px",
                    sl: "425px",

                    md: "768px",
                    // => @media (min-width: 768px) { ... }

                    lg: "1024px",
                    // => @media (min-width: 1024px) { ... }

                    xl: "1280px",
                    // => @media (min-width: 1280px) { ... }

                    desktop: "1440px",
                    // => @media (min-width: 1536px) { ... }
                },
            },
            container: {
                padding: {
                    DEFAULT: "1rem",
                    sm: "2rem",
                    lg: "4rem",
                    xl: "5rem",
                    "2xl": "6rem",
                },
            },
        }
    </script>

    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" />
   
</head>

<body class="items-center bg-zinc-100">
    <?php
    include('../include/sidebar.php');
    ?>
    <div class="h-full mx-auto bg-zinc-100">
        <div class="items-center px-2 py-2  bg-zinc-100">
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
                                    Attendance registration
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="relative flex flex-col justify-center overflow-hidden antialiased text-gray-800 ">
                <div class="relative  mx-auto text-center sm:w-96">
                    <span class="text-3xl font-semibold text-center pb-4 text-sky-800"> Attendance Registration</span>
                    <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                        <div class="h-2 bg-pink-400 rounded-t-md"></div>
                        <div class="px-8 py-3">
                            <form action="" method="post">
                                <input type="hidden" name="id">

                                <label class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                <input type="text" name="name" placeholder="Enter Name" required class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <div>
                                    <label for="department" class="block mb-2 text-sm font-medium text-gray-900 ">Department
                                    </label>

                                    <select name="department"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                                    <option value="">Select Department</option>

                                        <?php $sql = mysqli_query($conn, "select departmentname from masterdepartment");

                                        while ($rw = mysqli_fetch_assoc($sql)) {
                                        ?>

                                            <option value="<?php echo $rw['departmentname']; ?>">
                                                <?php echo $rw['departmentname']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>


                                    </select>

                                </div>
                                <div>
                        <label class="block mb-2  text-sm font-medium text-gray-900 ">Tower</label>
                        <select name="tower" onChange="getCat(this.value);" id="tower" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                                    <option value="">Select Tower</option>

                                        <?php $sql = mysqli_query($conn, "select distinct tower from masterfacility");

                                        while ($rw = mysqli_fetch_assoc($sql)) {
                                        ?>

                                            <option value="<?php echo $rw['tower']; ?>">
                                                <?php echo $rw['tower']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div >
                                <label for="floor"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Floor</label>

                                <select name="floor" id="floor" onChange="getCat1(this.value);" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>



                            </div>
                            <div >
                                <label for="room" class="block mb-2 text-sm font-medium text-gray-900 ">Room
                                </label>

                                <select name="room" id="room"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>

                            </div>
                            <div>
                                <label for="state" class="block mb-1 mt-1 text-sm font-medium text-gray-900 ">State Name
                                </label>

                            <input name="state" id="state"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    value="<?php echo $_SESSION['state']?>" readonly>
                                </input>

                            </div>
                            <div>
                                <label for="city" class="block mb-1 mt-1 text-sm font-medium text-gray-900 ">City Name
                                </label>

                                <input name="city" id="city"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    value="<?php echo $_SESSION['city']?>" readonly>
                                </input>

                            </div>
                                <div>
                                    <label for="facility" class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Branch Name
                                    </label>

                                    <input readonly name="facility" id="facility" value="<?php echo $_SESSION['facility'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">


                                    </input>

                                </div>
                                <div>
                                    <label for="place" class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Branch Code
                                    </label>

                                    <input readonly name="branchcode" id="branch_code" value="<?php echo $_SESSION['branchcode'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">


                                    </input>

                                </div>

                                <div class="flex items-baseline justify-center ">
                                    <button type="submit" name="submit" class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



</body>

</html>