<?php 
session_start();
error_reporting(0);
include('../include/config.php');
?>
<!-- Search -->
<?php
if(isset($_POST['search'])){
        $branch =$_POST['branch'];
        $floor = $_POST['floor'];
        $place = $_POST['place'];
        $tower = $_POST['tower'];
        $wifipassword = $_POST['wifipassword'];       
        $result= mysqli_query($conn, "SELECT branch,floor,place,wifipassword FROM wifi13 WHERE 
         branchcode ='". $_SESSION['branchcode'] ."' AND floor='". $_POST['floor'] ."' AND place='". $_POST['place'] ."'AND tower='". $_POST['tower'] ."' ");
        $res = mysqli_fetch_array($result);
            $bran=$res['branch'];
            $flo=$res['floor'];
            $pla=$res['place'];            
            $wifi=$res['wifipassword'];
}
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
      
      include('../include/sidebar.php');
  
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
                            </div>
                            <div class="mt-1">
                                <label for="place" class="block mb-1 text-sm font-medium text-gray-900 ">Facility Code
                                </label>

                                <input name="branchcode" id="branch_code"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    value="<?php echo $_SESSION['branchcode']?>" readonly>
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
                                    <label class="block mb-1 mt-1 text-sm font-medium text-gray-900 ">Tower Name</label>
                                    <input type="text" name="tower" required placeholder="Tower" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" >                           
                                    </div>
                                    <div>
                                <label class="block mb-1 mt-1 text-sm font-medium text-gray-900 ">Floor Number</label>
                                    
                            <select name="floor"   name="floor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"  >
                                <option  >Select floor</option>
                                <option  <?php if($res['floor']==1){echo"selected";} ?>>1</option>
                                <option  <?php if($res['floor']==2){echo"selected";} ?>>2</option>
                                <option  <?php if($res['floor']==3){echo"selected";} ?>>3</option>
                                <option  <?php if($res['floor']==4){echo"selected";} ?>>4</option>
                                <option  <?php if($res['floor']==5){echo"selected";} ?>>5</option>
                                <option  <?php if($res['floor']==6){echo"selected";} ?>>6</option>                                                                                                                              
                            </select>
                            </div>
                            <div>
                                    <label class="block mb-1 mt-1 text-sm font-medium text-gray-900 ">Place</label>
                                    <select name="place" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" >  
                                <option >Select place</option>         
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
                            </div>
                                    <div  class="mt-1" >
                                    <label class="block mb-1 text-sm font-medium text-gray-900 ">Password</label>
                                    <input type="text" name="wifipassword" readonly placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" value="<?php echo $wifi ?>">                           
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
