<?php
session_start();
error_reporting(0);
include('../include/config.php');
if(isset($_POST['add'])){
    $floor = $_POST['floor'];
    $place =$_POST['place'];
    $tower =$_POST['tower'];
    $wifipassword = $_POST['wifipassword'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $branch = $_POST['branch'];
    $branchcode = $_POST['branchcode'];
    $sql = "INSERT INTO wifi13 (floor,place,tower,wifipassword,state,city,branch,branchcode) VALUES ('$floor','$place','$tower','$wifipassword','$state','$city','$branch','$branchcode')";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo "<script type='text/javascript'>alert('Data inserted successfully!!');location='wifi_facility_office_list.php'; </script>";

     } else {
        echo "<script type='text/javascript'>alert('Error = Data inserted faild!!');location='wifi_facility_office_list.php'; </script>";
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

</head>

<body class="items-center bg-zinc-100">
    <?php
             include('../include/sidebar.php');          
            ?>
    <div class=" px-2 py-2 ">
        <div class="justify-center w-full mx-auto bg-white">
            <nav class="flex py-3 border-y" aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="#"
                                class="inline-flex items-center text-sm font-medium duration-200 text-sky-800 hover:text-sky-900 hover:scale-95">
                                <ion-icon class="flex-shrink-0 w-4 h-4 md hydrated" name="home-outline" role="img"
                                    aria-label="home outline"></ion-icon>
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
                            <a href="#" class="ml-4 text-sm font-medium text-pink-500 hover:scale-95 hover:text-sky-900"
                                aria-current="page">
                                Office Add Wifi
                            </a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div
            class="relative flex flex-col justify-center w-full h-full  overflow-hidden antialiased text-gray-800 ">
            <div class="relative py-2 mx-auto text-center sm:w-96">
                <span class="text-3xl font-semibold text-center pb-4 text-sky-800">Office Add wifi</span>
                <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                    <div class="h-2 bg-pink-400 rounded-t-md"></div>
                    <div class="px-8 py-7 ">
                        <form action="" method="post">
                            <input type="hidden" name="id">
                            <label class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Floor</label>
                            <input type="Text" name="floor" placeholder="Floor"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                required>
                            <label class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Place</label>
                            <select name="place" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                <option>Select place</option>
                                <option <?php if($res['place']=="Reception"){echo"selected";} ?>>Reception</option>
                                <option <?php if($res['place']=="Conference"){echo"selected";} ?>>Conference</option>
                                <option <?php if($res['place']=="Kitchen"){echo"selected";} ?>>Kitchen</option>
                                <option <?php if($res['place']=="Canteen"){echo"selected";} ?>>Canteen</option>
                                <option <?php if($res['place']=="Physiotherapy"){echo"selected";} ?>>Physiotherapy</option>
                                <option <?php if($res['place']=="Activity"){echo"selected";} ?>>Activity</option>
                                <option <?php if($res['place']=="Library"){echo"selected";} ?>>Library</option>
                                <option <?php if($res['place']=="Counciling"){echo"selected";} ?>>Counciling</option>
                                <option <?php if($res['place']=="Discussion"){echo"selected";} ?>>Discussion</option>
                                <option <?php if($res['place']=="Office"){echo"selected";} ?>>Office</option>
                                <option <?php if($res['place']=="Corridor"){echo"selected";} ?>>Corridor</option>
                                <option <?php if($res['place']=="Pallavaram"){echo"selected";} ?>>Pharmacy</option>
                            </select>
                            <label class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Tower Name</label>
                            <input type="Text" name="tower" placeholder="Tower"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                required>
                            <label class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Wifi Password</label>
                            <input type="Text" name="wifipassword" placeholder="Wifipassword"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                required>
                                <div>
                                <label for="state" class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">State Name
                                </label>

                            <input name="state" id="state"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    value="<?php echo $_SESSION['state']?>" readonly>
                                </input>

                            </div>
                            <div>
                                <label for="city" class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">City Name
                                </label>

                                <input name="city" id="city"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    value="<?php echo $_SESSION['city']?>" readonly>
                                </input>

                            </div>
                            <div>
                                <label for="facility" class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Facility
                                    Name
                                </label>

                                <input name="branch" id="branch"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    value="<?php echo $_SESSION['facility']?>" readonly>
                                </input>

                            </div>
                            <div>
                                <label for="place" class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Facility Code
                                </label>

                                <input name="branchcode" id="branch_code"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
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