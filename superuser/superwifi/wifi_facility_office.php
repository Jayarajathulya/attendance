<?php 
session_start();
error_reporting(0);
include('../include/config.php');
include('../include/script.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wifi || office</title>
    <link rel="icon" href="https://athulyahomecare.com/lp/images/fav.ico" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="items-center bg-zinc-100">

<?php
        include('../include/superusersidebar.php')
        ?>
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
                                    Facility - Office Wifi Details
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
  
    <div>
        <div class="relative flex flex-col justify-center overflow-hidden antialiased text-gray-800 sm:py-7">  
                <div class="relative  mx-auto text-center sm:w-96">
                    <span class=" text-3xl font-semibold text-center pb-4 text-sky-800">WIFI PASSWORD</span>
                    <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                        <div class="h-2 bg-pink-400 rounded-t-md"></div>
                        <div class="px-8 py-2 ">
                          <form action="" method="post">
                            <div class="flex-col space-y-2">
                            <div>
                                <div class='mb-2'>
                                    <label for="state" class="block mb-2 text-sm font-medium text-gray-900 ">State
                                    </label>

                                    <select name="state" type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        id="department" onChange="getBrncode1(this.value);">
                                        <option value="">Select Category</option>
                                        <?php

                                      

                                        $sql = mysqli_query($conn, "select distinct branch_state from master_branches");
                                        while ($rw = mysqli_fetch_assoc($sql)) {
                                        ?>
                                        <option value="<?php echo htmlentities($rw['branch_state']); ?>">
                                            <?php echo htmlentities($rw['branch_state']); ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class='mb-2'>
                                <label for="city"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">City</label>

                                <select name="city" id="branch_city" onChange="getBrncode2(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>



                            </div>
                            <div class='mb-2'>
                                <label for="facility" class="block mb-2 text-sm font-medium text-gray-900 ">Facility
                                </label>

                                <select name="facility" id="branch_name" onChange="getBrncode3(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>

                            </div>

                            <div class='mb-2'>
                                <label for="branchcode" class="block mb-2 text-sm font-medium text-gray-900 ">Branch
                                    Code
                                </label>

                                <select name="branchcode" id="branch_code"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>
                  
                            </div>
                            <div class="flex ">
                                <div class="flex items-center  mr-8 ">
                                    <input id="inline-radio" type="radio" value="" name="inline-radio-group" onclick="document.location.href='wifi_facility.php'" class=" first space-y-4 w-4 h-4 text-pink-600 bg-gray-100 border-gray-300 focus:ring-pink-500 dark:focus:ring-pink-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inline-radio" class=" second space-y-4  ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Room</label>
                                </div>                             
                                <div class="flex items-center  mr-8 ">
                                    <input id="inline-2-radio" type="radio" value="" name="inline-radio-group"  checked class=" space-y-4 w-4 h-4 text-pink-600 bg-gray-100 border-gray-300 focus:ring-pink-500 dark:focus:ring-pink-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inline-2-radio" class=" space-y-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 ">Office</label>
                                </div>
                            </div>
                          
                            <div>
                        <label class="block mb-1  text-sm font-medium text-gray-900 ">Tower</label>
                        <select name="tower" onChange="getCat(this.value);" id="tower" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                                    <option value="">Select Tower</option>

                                        <?php $sql = mysqli_query($conn, "select distinct tower from wifi13 where branchcode ='" . $_SESSION['branchcode'] . "'");

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
                                    class="block mb-1 text-sm font-medium text-gray-900 ">Floor</label>

                                <select name="floor" id="floor1" onChange="getCat1(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>



                            </div>
                            <div >
                                <label for="place" class="block mb-1 text-sm font-medium text-gray-900 ">Place
                                </label>

                                <select name="place" id="place"  onChange="getCat2(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>

                            </div>

                
                                    <div class="mt-1">
                                <label for="Password" class="block mb-1 text-sm font-medium text-gray-900 ">Password
                                </label>

                                <select name="wifipassword" id="password1" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
</div>
    </div>
</body>
<script>
    function checkAll(e) {
  if (e.hasClass('allFirst'))
    $('.first').prop('checked', true);
  else
    $('.second').prop('checked', true);
}
   
</script>
