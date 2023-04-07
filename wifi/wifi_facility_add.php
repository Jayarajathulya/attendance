<?php
session_start();
error_reporting(0);
include('../include/config.php');
if(isset($_POST['add'])){
    $floor = $_POST['floor'];
    $roomno =$_POST['roomno'];
    $tower =$_POST['tower'];
    $wifipassword = $_POST['wifipassword'];
    $facility = $_POST['facility'];
    $branchcode = $_POST['branchcode'];
    $sql = "INSERT INTO wifi1 (floor,roomno,tower,wifipassword,facility,branchcode) VALUES ('$floor','$roomno','$tower','$wifipassword','$facility','$branchcode')";
    $result = mysqli_query($conn,$sql);
    header('location:wifi_facility_list.php');
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

</head>

<body class="items-center bg-zinc-100">
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
                                    Facility Wifi Add
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
                </div>
  
    <div
        class="relative flex flex-col justify-center w-full h-full py-6 mb-14 overflow-hidden antialiased text-gray-800 sm:py-12">
        <div class="relative py-3 mx-auto text-center sm:w-96">
            <span class="text-3xl font-semibold text-center pb-4 text-sky-800">Facility Add wifi</span>
            <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                <div class="h-2 bg-pink-400 rounded-t-md"></div>
                <div class="px-8 py-7 ">
                    <form action="" method="post">
                        <input type="hidden" name="id">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Floor</label>
                        <input type="Text" name="floor" placeholder="Floor"
                            class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" required>
                        <label class="block mb-2 text-sm font-medium text-gray-900 " >Roomno</label>
                        <input type="Text" name="roomno" placeholder="Roomno"
                            class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" required>
                            <label class="block mb-2 text-sm font-medium text-gray-900 " >Tower Name</label>
                        <input type="Text" name="tower" placeholder="Tower"
                            class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" required>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Wifi Password</label>
                        <input type="Text" name="wifipassword" placeholder="Password" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" required>

                            <div>
                                <label for="facility" class="block mb-2 text-sm font-medium text-gray-900 ">Facility Name
                                </label>

                                <input name="facility" id="facility"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    value="<?php echo $_SESSION['facility']?>" readonly>
                                </input>

                            </div>
                            <div>
                                <label for="place" class="block mb-2 text-sm font-medium text-gray-900 ">Facility Code
                                </label>

                                <input name="branchcode" id="branch_code"
                                    class="bg-gray-50 border border-gray-300 mb-2 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    value="<?php echo $_SESSION['branchcode']?>" readonly>

                                </input>

                            </div>


                            <div class="flex items-baseline justify-center ">
                                <button type="submit" name="add"
                                    class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">ADD
                                    ONE</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
</body>

</html>