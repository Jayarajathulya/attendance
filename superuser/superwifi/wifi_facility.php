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
    <title>wifi</title>
    <link rel="icon" href="https://athulyahomecare.com/lp/images/fav.ico" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="items-center bg-zinc-100" >
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
                                    Facility Wifi Details
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
   
    <div class="flex flex-col flex-auto flex-shrink-0  antialiased text-black bg-zinc-100 ">
 
            <div class="h-full w-6/12 mt-14 mx-auto">
            <div class="flex justify-center text-3xl font-semibold text-center pb-4 text-sky-800">Wifi And Intercom Details</div>
                <div class="h-2 bg-pink-400 rounded-t-md"></div>

                <form class="min-w-full p-10 bg-white rounded-lg shadow-xl xl:px-10" method="post" action="">
                  

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <input type="hidden" name="id">
                                <div class="mb-5">
                                <label for="country"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Country</label>

                                <select name="country" id="country" onChange="getBrncode0(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Country</option>
                                    <?php
                                    $sql = mysqli_query($conn, "select distinct country from masterfacility");
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
                                <label for="city"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">City</label>

                                <select name="city" id="city" onChange="getBrncode2(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>



                            </div>
                    <div class="mb-5">
                                <label for="branchname" class="block mb-2 text-sm font-medium text-gray-900 ">Branch Name
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
                        <select name="towername" onChange="chat(this.value);" id="towername" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                                    <option value="">Select Subcategory</option>

                                    </select>
                                    </div>
                    </div>
                    <div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                   
                                    <div class="mb-5">
                                <label for="floor"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Floor</label>

                                <select name="floor" id="floor" onChange="chat1(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>
                                </div>
                                
                                <div class="mb-5">
                                <label for="floor"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Client / Ofiice / Client NS</label>

                                <select name="office_client" id="office_client" onChange="chat2(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>
                                </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="mb-5">
                                <label for="room" class="block mb-2 text-sm font-medium text-gray-900 "> Room/Name 
                                </label>

                                <select name="room" id="room"  onChange="chat3(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>

                            </div>
                            <div class="mb-5">
                                <label for="wifiname" class="block mb-2 text-sm font-medium text-gray-900">WI-FI Name
                                </label>

                                <input type="text" name="wifiname" id="wifiname"   placeholder="Wifi Name" readonly="readonly"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <!-- <option value="">Select Subcategory</option> -->
                                <!-- </select> -->
                            </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                         <div class="mb-5">
                                <label for="Password" class="block mb-2 text-sm font-medium text-gray-900 ">WI-FI Password
                                </label>
                                <input type="text" name="wifipassword" id="wifipassword"   placeholder="Wifi Password" readonly="readonly"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <!-- <option value="">Select Subcategory</option>
                                </select> -->
                            </div>
                    
                            <div class="mb-5">
                                <label for="intercom" class="block mb-2 text-sm font-medium text-gray-900 "> Intercom Number
                                </label>

                                <input type="text" name="intercom" id="intercom"   placeholder="Intercom Number" readonly="readonly"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <!-- <option value="">Select Subcategory</option>
                                </select> -->
                            </div>
                            
                    </div>
                    </div>
                    <!-- <div id="mycode1">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="mb-5">
                        <label class="block mb-2  text-sm font-medium text-gray-900 ">Tower</label>
                        <select name="tower" onChange="chat(this.value);" id="tower" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                                    <option value="">Select Subcategory</option>

                                    </select>
                                    </div>
                                    <div class="mb-5">
                                <label for="floor"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Floor</label>

                                <select name="floor" id="floor" onChange="chat1(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>



                            </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="mb-5">
                    <label for="office" class="block mb-2 text-sm font-medium text-gray-900 ">Office
                                </label>

                                <select name="office" id="office"  onChange="getCat2(this.value);"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>

                            </div>
                            <div class="mb-5">
                                <label for="wifiname" class="block mb-2 text-sm font-medium text-gray-900 ">WI-FI Name
                                </label>

                                <input type="text" name="wifiname" id="wifiname" placeholder="Wi-Fi Name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                </input>
                            </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                         <div class="mb-5">
                                <label for="Password" class="block mb-2 text-sm font-medium text-gray-900 ">WI-FI Password
                                </label>

                                <input name="wifipassword" id="password" placeholder="Wi-Fi Password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                </input>
                            </div>
                    
                            <div class="mb-5">
                                <label for="intercom" class="block mb-2 text-sm font-medium text-gray-900 "> Intercom Number
                                </label>

                                <input type="text" name="intercom" id="intercom" placeholder="Intercom Number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                </input>
                            </div>
                            
                    </div>
                    </div> -->
                </form>
            </div>

</body>
<!-- <script>
//     function checkAll(e) {
//   if (e.hasClass('allFirst'))
//     $('.first').prop('checked', true);
//   else
//     $('.second').prop('checked', true);
// }
   
</script> -->

<!-- <script>
    function loaded() {
        document.getElementById("mycode1").style.display = "none";
    }
    </script>
    <script>
    function text(x) {
        if (x == 0) document.getElementById("mycode").style.display = "block";
        else document.getElementById("mycode").style.display = "none";
        if (x == 1) document.getElementById("mycode1").style.display = "block";
        else document.getElementById("mycode1").style.display = "none";
        return;
   
    }
    </script> -->
</html>
     <!-- <div class="relative flex flex-col justify-center overflow-hidden antialiased text-gray-800 sm:py-7">
                <div class="relative  mx-auto text-center ">
                    <span class="text-3xl font-semibold text-center pb-4 text-sky-800">WIFI PASSWORD</span>
                    <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                        <div class="h-2 bg-pink-400 rounded-t-md"></div>
                        <div class="px-8 py-2 ">
                            <div class="flex-col space-y-2">
                                <form action="" method="post">
                                <input type="hidden" name="id">
                                <div class="mb-5">
                                <label for="country"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Country</label>

                                <select name="country" id="country" onChange="getBrncode2(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>



                            </div>
                                <div class="mb-5">
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

                            <div class="mb-5">
                                <label for="city"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">City</label>

                                <select name="city" id="branch_city" onChange="getBrncode2(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>



                            </div>
                            <div class="mb-5">
                                <label for="facility" class="block mb-2 text-sm font-medium text-gray-900 ">Facility
                                </label>

                                <select name="facility" id="branch_name" onChange="getBrncode3(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>

                            </div>
                            </div>
                            <div class="mb-5">
                                <label for="branchcode" class="block mb-2 text-sm font-medium text-gray-900 ">Branch
                                    Code
                                </label>

                                <select name="branchcode" id="branch_code" onChange="chat0(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>
                  
                            </div>
                                <div class="mb-2">
                                <div class="flex items-center mr-8">
                                    <input id="" type="radio" value="" name="inline-radio-groups" checked class=" first w-4 h-4 text-pink-600 bg-gray-100 border-gray-300 focus:ring-pink-500 dark:focus:ring-pink-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Room</label>
                                </div>
                                <div class="flex items-center mr-8 ">
                                    <input id="inline-2-radio" type="radio" value="" name="inline-radio-groups" onclick="document.location.href='wifi_facility_office.php'" class=" second w-4 h-4 text-pink-600 bg-gray-100 border-gray-300 focus:ring-pink-500 dark:focus:ring-pink-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inline-2-radio" class=" ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Office</label>
                                </div>
                            </div>

                            <div class="mb-5">
                        <label class="block mb-2  text-sm font-medium text-gray-900 ">Tower</label>
                        <select name="tower" onChange="chat(this.value);" id="tower" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                                    <option value="">Select Subcategory</option>

                                    </select>
                                    </div>
                                    <div class="mb-5">
                                <label for="floor"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Floor</label>

                                <select name="floor" id="floor" onChange="chat1(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>



                            </div>
                            <div class="mb-5">
                                <label for="room" class="block mb-2 text-sm font-medium text-gray-900 ">Client Room
                                </label>

                                <select name="room" id="roomno"  onChange="chat2(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>

                            </div>
                            <div class="mb-5">
                                <label for="wifiname" class="block mb-2 text-sm font-medium text-gray-900 ">WI-FI Name
                                </label>

                                <select name="wifiname" id="wifiname" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                
                                    <div class="mb-5">
                                <label for="Password" class="block mb-2 text-sm font-medium text-gray-900 ">WI-FI Password
                                </label>

                                <select name="wifipassword" id="password" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                            </form>
                    
                        </div>
                    </div>
                </div>
            </div>
            <div>
    </div> -->