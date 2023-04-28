<?php 
session_start();
error_reporting(0);
include('../include/config.php');
include('../include/script.php');
if (isset($_POST['add'])) {

    $floor = $_POST['floor'];
    $room =$_POST['room'];
    $towername =$_POST['towername'];
    $wifiname = $_POST['wifiname'];
    $wifipassword = $_POST['wifipassword'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $branchname = $_POST['branchname'];
    $office_client = $_POST['office_client'];
    $intercom = $_POST['intercom'];
 


    $sql="select * from intercom_wifi where  branchname='$branchname' and towername ='$towername' and floor ='$floor' and office_client ='$office_client' and room ='$room' and wifiname ='$wifiname' and wifipassword ='$wifipassword' and intercom ='$intercom'";

$res=mysqli_query($conn,$sql);

if (mysqli_num_rows($res) > 0) {
  
  $row = mysqli_fetch_assoc($res);
  if($branchname==isset($row['branchname']) && $towername==isset($row['towername']) && $floor==isset($row['floor']) && $office_client==isset($row['office_client']) && $room==isset($row['room']) && $wifiname==isset($row['wifiname']) && $wifipassword==isset($row['wifipassword']) && $intercom==isset($row['intercom']))
  {
    echo "<script type='text/javascript'>alert('Data Already Exists!!');location='add_wifi.php'; </script>";
  }
  }
else{
//do your insert code here or do something (run your code)
$sql = "INSERT INTO intercom_wifi (country,state,city,branchname,towername,floor,office_client,room,intercom,wifiname,wifipassword) VALUES ('$country','$state','$city','$branchname','$towername','$floor','$office_client','$room','$intercom','$wifiname','$wifipassword')";
$res=mysqli_query($conn,$sql);
echo "<script type='text/javascript'>alert('Data Inserted successfully!!');location='add_wifi.php'; </script>";
}

 
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
        include('../include/superusersidebar.php')
        ?>
    <div class=" px-2 py-2">
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
                                Facility Wifi Details
                            </a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>


        <div class="flex flex-col flex-auto flex-shrink-0  antialiased text-black bg-zinc-100 ">
 
 <div class="h-full w-6/12 mt-10 mx-auto">
 <div class="flex justify-center text-3xl font-semibold text-center pb-4 text-sky-800">Add Wifi And
                    Intercom</div>
     <div class="h-2 bg-pink-400 rounded-t-md"></div>

     <form class="min-w-full p-10 bg-white rounded-lg shadow-xl xl:px-10" method="post" action="">


<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
    <div class="mb-5">
        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 ">Country</label>

        <select name="country" id="country" onChange="getBrncode0(this.value);"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
            <option value="">Select Country</option>
            <?php
                $sql = mysqli_query($conn, "select distinct country from intercom_wifi");
                while ($rw = mysqli_fetch_assoc($sql)) {
                    
                ?>
            <option value="<?php echo htmlentities($rw['country']); ?>">
                <?php echo htmlentities($rw['country']); ?></option>
            <?php
                }
                ?>
        </select>



    </div>
    <div class="mb-5">
        <label for="state" class="block mb-2 text-sm font-medium text-gray-900 ">State
        </label>

        <select name="state" type="text"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
            id="state" onChange="getBrncode1(this.value);">
            <option value="">Select Subcategory</option>

        </select>
    </div>

</div>


<div class="grid grid-cols-1 gap-4 md:grid-cols-2">

    <div class="mb-5">
        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 ">City</label>

        <select name="city" id="city" onChange="getBrncode2(this.value);"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
            <option value="">Select Subcategory</option>
        </select>



    </div>
    <div class="mb-5">
        <label for="facility" class="block mb-2 text-sm font-medium text-gray-900 ">Facility Name
        </label>

        <select name="branchname" id="branchname" onChange="chat0(this.value);"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
            <option value="">Select Subcategory</option>
        </select>

    </div>

</div>
<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
    <!-- <div class="mb-5">
            <label for="branchcode" class="block mb-2 text-sm font-medium text-gray-900 ">Branch
                Code
            </label>

            <select  name="branchcode" id="code" onChange="chat0(this.value);" placeholder="Branch Code"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                <option value="">Select Subcategory</option>
            </select>

        </div> -->
    <div class="mb-5">
        <label class="block mb-2  text-sm font-medium text-gray-900 ">Tower</label>
        <select name="towername" onChange="chat(this.value);" id="towername"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
            <option value="">Select Subcategory</option>

        </select>
    </div>
</div>
<div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

        <div class="mb-5">
            <label for="floor" class="block mb-2 text-sm font-medium text-gray-900 ">Floor</label>

            <select name="floor" id="floor" onChange="chat1(this.value);"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                <option value="">Select Subcategory</option>
            </select>
        </div>

        <div class="mb-5">
            <label for="floor" class="block mb-2 text-sm font-medium text-gray-900 ">Client / Ofiice
                / Client NS</label>

            <select name="office_client" id="office_client" onChange="chat2(this.value);"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                <option value="">Select Subcategory</option>
            </select>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div class="mb-5">
            <label for="room" class="block mb-2 text-sm font-medium text-gray-900 "> Room
            </label>

            <select name="room" id="room"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                <option value="">Select Subcategory</option>
            </select>

        </div>
        <div class="mb-5">
            <label for="wifi_name" class="block mb-2 text-sm font-medium text-gray-900 ">WI-FI Name
            </label>

            <input type="text" name="wifiname" id="wifi_name" placeholder="Wifi Name" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
            </input>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div class="mb-5">
            <label for="wifiPassword" class="block mb-2 text-sm font-medium text-gray-900 ">WI-FI
                Password
            </label>
            <input type="text" name="wifipassword" id="wifipassword" placeholder="Wifi password"
                required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
            </input>
        </div>

        <div class="mb-5">
            <label for="intercom" class="block mb-2 text-sm font-medium text-gray-900 "> Intercom
                Number
            </label>

            <input type="text" name="intercom" id="intercom" placeholder="Intercom" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
            </input>
        </div>

    </div>
</div>
<div class="grid grid-cols-1 ">
    <div class="flex items-baseline justify-center ">

        <button name="add"
            class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">ADD</button>
    </div>
</div>
</form>
 </div>

 

</body>

</html>