<?php
session_start();
error_reporting(0);
include('../include/config.php');
$userid= $_GET['edit'];
$result = mysqli_query($conn,"select * FROM intercom_wifi WHERE id='$userid'");
$res = mysqli_fetch_array($result);

$country=$res['country'];
$state=$res['state'];
$city=$res['city'];
$branchname=$res['branchname'];
$towername=$res['towername'];
$floor=$res['floor'];
$office_client=$res['office_client'];
$room=$res['room'];
$intercom=$res['intercom'];
$wifi_name=$res['wifiname'];
$wifipassword=$res['wifipassword'];


if(isset($_POST['update']))
{
   
$towername = $_POST['towername'];
$floor = $_POST['floor'];
$room = $_POST['room'];
$office_client=$_POST['office_client']; 
$intercom=$_POST['intercom'];
$wifiname = $_POST['wifiname'];
$wifipassword = $_POST['wifipassword'];



$sql="select * from intercom_wifi where  branchname='$branchname' and towername ='$towername' and floor ='$floor' and office_client ='$office_client' and room ='$room' and wifiname ='$wifiname' and wifipassword ='$wifipassword' and intercom ='$intercom'";

$res=mysqli_query($conn,$sql);

if (mysqli_num_rows($res) > 0) {
  
  $row = mysqli_fetch_assoc($res);
  if($branchname==isset($row['branchname']) && $towername==isset($row['towername']) && $floor==isset($row['floor']) && $office_client==isset($row['office_client']) && $room==isset($row['room']) && $wifiname==isset($row['wifiname']) && $wifipassword==isset($row['wifipassword']) && $intercom==isset($row['intercom']))
  {
    echo "<script type='text/javascript'>alert('Data Already Exists!!');location='list_wifi.php'; </script>";
  }
  }
else{
//do your insert code here or do something (run your code)
$sql = "UPDATE intercom_wifi SET  towername='$towername',floor='$floor',room='$room',office_client='$office_client',intercom='$intercom',wifiname='$wifiname',wifipassword='$wifipassword',modified_user='". $_SESSION['empname']."' WHERE id='$userid'";
$res=mysqli_query($conn,$sql);
echo "<script type='text/javascript'>alert('Data Updated successfully!!');location='list_wifi.php'; </script>";
}

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
                                    Facility Wifi Edit
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
   
    <div class="flex flex-col flex-auto flex-shrink-0  antialiased text-black bg-zinc-100 ">
 
            <div class="h-full w-6/12 mt-8 mx-auto">
            <div class="flex justify-center text-3xl font-semibold text-center pb-4 text-sky-800">WIFI PASSWORD EDIT</div>
                <div class="h-2 bg-pink-400 rounded-t-md"></div>

                <form class="min-w-full p-10 bg-white rounded-lg shadow-xl xl:px-10" method="post" action="">
                  

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <input type="hidden" name="id">
                                <div class="mb-5">
                                <label for="country"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Country</label>

                                <input type="text" name="country" id="country" readonly="readonly" value="<?php echo $res['country'];?>" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                 
</input>



                            </div>
                                <div class="mb-5">
                                    <label for="state" class="block mb-2 text-sm font-medium text-gray-900 ">State
                                    </label>

                                    <input type="text" name="state" type="text" value="<?php echo $res['state'];?>" readonly="readonly"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        id="state" >
                                    
                              
</input>
                                </div>

                    </div>


                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        
                    <div class="mb-5">
                                <label for="city"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">City</label>

                                <input type="text" name="city" id="city" value="<?php echo $res['city'];?>" readonly="readonly"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                
</input>



                            </div>
                    <div class="mb-5">
                                <label for="facility" class="block mb-2 text-sm font-medium text-gray-900 ">Facility Name
                                </label>

                                <input type="text" name="branchname" id="branchname" value="<?php echo $res['branchname'];?>" readonly="readonly"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                
</input>

                            </div>
                        
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                  
                            <div class="mb-5">
                        <label class="block mb-2  text-sm font-medium text-gray-900 ">Tower</label>
                        <input type="text" name="towername"  id="towername" value="<?php echo $res['towername'];?>" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
</input>
                                    </div>
                    </div>
                    <div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                   
                                    <div class="mb-5">
                                <label for="floor"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Floor</label>

                                <input type="text" name="floor" id="floor"   value="<?php echo $res['floor'];?>" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                
</input>
                                </div>
                                
                                <div class="mb-5">
                                <label for="floor"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Client / Ofiice / Client NS</label>

                                <input type="text" name="office_client" id="office_client" value="<?php echo $res['office_client'];?>" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                
</input>
                                </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="mb-5">
                                <label for="room" class="block mb-2 text-sm font-medium text-gray-900 "> Room 
                                </label>

                                <input type="text" name="room" id="room"  value="<?php echo $res['room'];?>" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                
</input>

                            </div>
                            <div class="mb-5">
                                <label for="wifiname" class="block mb-2 text-sm font-medium text-gray-900 ">WI-FI Name
                                </label>

                                <input type="text" name="wifiname" id="wifiname"   placeholder="Wifi Name"  value="<?php echo $res['wifiname'];?>" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                
</input>
                            </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                         <div class="mb-5">
                                <label for="Password" class="block mb-2 text-sm font-medium text-gray-900 ">WI-FI Password
                                </label>
                                <input type="text" name="wifipassword" id="wifipassword"   placeholder="Wifi Password"  value="<?php echo $res['wifipassword'];?>" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                
</input>
                            </div>
                    
                            <div class="mb-5">
                                <label for="intercom" class="block mb-2 text-sm font-medium text-gray-900 "> Intercom Number
                                </label>

                                <input type="text" name="intercom" id="intercom"   placeholder="Intercom"  value="<?php echo $res['intercom'];?>" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                
</input>
                            </div>
                            
                    </div>
                    <div class="grid grid-cols-1 ">
                    <div class="flex items-baseline justify-center ">

<button name="update"
    class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">UPDATE</button>
</div>
</div>
                </form>
            </div>
</body>

</html>