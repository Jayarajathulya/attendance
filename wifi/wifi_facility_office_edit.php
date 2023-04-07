<?php
session_start();
error_reporting(0);
include('../include/config.php');
$userid= $_GET['edit'];
$result = mysqli_query($conn,"SELECT * FROM wifi13 WHERE id='$userid'");
$res = mysqli_fetch_array($result);
$floor=$res['floor'];
$place=$res['place'];
$tower=$res['tower'];
$wifipassword=$res['wifipassword'];
$branch=$res['branch'];
$branchcode=$res['branchcode'];

if(isset($_POST['update']))
{
   $wifipassword = $_POST['wifipassword'];
   $tower = $_POST['tower'];
   // update user wifi1
   $result = mysqli_query($conn,"UPDATE wifi13 SET wifipassword='$wifipassword' , tower='$tower'  WHERE id='$userid'");

   // Redirect to homepage to display updated user in list
   header("Location: wifi_facility_office_list.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <?php
             include('../include/sidebar.php');          
            ?>
    <div
        class="relative flex flex-col justify-center w-full h-full py-6 overflow-hidden antialiased text-gray-800 sm:py-12">
        <div class="relative py-3 mx-auto text-center sm:w-96">
            <span class="text-3xl font-semibold text-center pb-4 text-sky-800">Facility Edit Wi-fi</span>
            <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                <div  class="h-2 bg-pink-400 rounded-t-md"></div>
                <div class="px-8 py-7 ">
                    <form action="" method="post">
                        <label cclass="block mb-2 text-sm font-medium text-gray-900 ">Floor</label>
                        <input type="text" name="floor" 
                           class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="<?php echo $res['floor'];?>"readonly>
                  
                            <label cclass="block mb-2 text-sm font-medium text-gray-900 ">Place</label>
                            <input type="text" name="place" 
                               class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="<?php echo $res["place"]?>"readonly>
                                <label cclass="block mb-2 text-sm font-medium text-gray-900 ">Tower</label>
                            <input type="text" name="tower" placeholder="Tower Name"
                               class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="<?php echo $res["tower"]?>" required>
                                <label cclass="block mb-2 text-sm font-medium text-gray-900 ">Wifipassword</label>
                                <input type="text" name="wifipassword" placeholder="wifipassword" required
                                   class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="<?php echo $res["wifipassword"]?>" >
                                <label cclass="block mb-2 text-sm font-medium text-gray-900 ">Faclity Name</label>
                                <input type="text" name="branch"
                                   class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="<?php echo $res["branch"]?>" readonly>
                                    <label cclass="block mb-2 text-sm font-medium text-gray-900 ">Faclity code</label>
                                <input type="text" name="branchcode"
                                   class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="<?php echo $res["branchcode"]?>" readonly>
                                <div class="flex items-baseline justify-center ">

                                    <button name="update"
                                        class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">UPDATE</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>