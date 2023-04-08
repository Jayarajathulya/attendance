<?php 
session_start();
error_reporting(0);
include('../include/config.php');
include('../include/script.php');
?>
<?php
if(isset($_POST['search'])) {
        // $facility =$_POST['facility'];
        // $status = $_POST['status'];
        // $floor = $_POST['floor'];
        $roomno = $_POST['room'];
        $wifipassword = $_POST['wifipassword']; 
        $tower = $_POST['tower'];      
        $result= mysqli_query($conn,"SELECT * FROM wifi1 
        WHERE branchcode ='". $_SESSION['branchcode'] ."' AND roomno= '". $_POST['room'] ."'AND floor= '". $_POST['floor'] ."'AND tower= '". $_POST['tower'] ."'");
        $res = mysqli_fetch_array($result);
            $fac=$res['facility'];
            $stat=$res['status'];
            $flo=$res['floor'];
            $room=$res['roomno'];    
            $tower=$res['tower'];          
            $wifi=$res['wifipassword'];

}   
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wifi</title>
    <link rel="icon" href="https://athulyahomecare.com/lp/images/fav.ico" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="items-center bg-zinc-100">
<?php

include('../include/sidebar.php');
        
        ?>
<div class=" px-2 py-2">
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
                                    Facility Wifi Details
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        <div class="relative flex flex-col justify-center overflow-hidden antialiased text-gray-800 sm:py-7">
                <div class="relative  mx-auto text-center sm:w-96">
                    <span class="text-3xl font-semibold text-center pb-4 text-sky-800">WIFI PASSWORD</span>
                    <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                        <div class="h-2 bg-pink-400 rounded-t-md"></div>
                        <div class="px-8 py-2 ">
                          <form action="" method="post">
                            <div class="flex-col space-y-2">
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
                                <label for="facility" class="block mb-1 text-sm font-medium text-gray-900 ">Facility Name
                                </label>

                                <input name="facility" id="facility"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    value="<?php echo $_SESSION['facility']?>" readonly>
                                </input>

                            </div>
                            <div>
                                <label for="place" class="block mb-1 text-sm font-medium text-gray-900 ">Facility Code
                                </label>

                                <input name="branchcode" id="branch_code"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    value="<?php echo $_SESSION['branchcode']?>" readonly>

                                </input>

                            </div>
                                <div class="flex mt-1 mb-1">
                                <div class="flex items-center mr-8">
                                    <input id="" type="radio" value="" name="inline-radio-groups" checked class=" first w-4 h-4 text-pink-600 bg-gray-100 border-gray-300 focus:ring-pink-500 dark:focus:ring-pink-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Room</label>
                                </div>
                                <div class="flex items-center mr-8 ">
                                    <input id="inline-2-radio" type="radio" value="" name="inline-radio-groups" onclick="document.location.href='wifi_facility_office.php'" class=" second w-4 h-4 text-pink-600 bg-gray-100 border-gray-300 focus:ring-pink-500 dark:focus:ring-pink-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inline-2-radio" class=" ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Office</label>
                                </div>
                            </div>

                            <div>
                        <label class="block mb-1  text-sm font-medium text-gray-900 ">Tower</label>
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
                                    class="block mb-1 text-sm font-medium text-gray-900 ">Floor</label>

                                <select name="floor" id="floor" onChange="getCat1(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>



                            </div>
                            <div >
                                <label for="room" class="block mb-1 text-sm font-medium text-gray-900 ">Room
                                </label>

                                <select name="room" id="room" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>

                            </div>

                                    <div class="mt-1" > 
                                    <label class="block mb-1 text-sm font-medium text-gray-900 ">Password</label>
                                    <input type="text"  name="wifipassword" readonly placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" value="<?php echo $wifi ?>">                           
                                    </div>
                                    <div class="flex items-baseline justify-center ">
                                 <button type="submit"  name="search" class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600 " onclick="document.getElementById('mycode').style.display = 'block';">Sumbit</button>
                            </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
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

</html>
