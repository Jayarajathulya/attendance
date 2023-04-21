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
    $branch = $_POST['facility'];
    $branchcode = $_POST['branchcode'];


    $sql="select * from wifi13 where tower ='$tower' and floor ='$floor' and place ='$place' ";

    $res=mysqli_query($conn,$sql);
    
    if (mysqli_num_rows($res) > 0) {
      
      $row = mysqli_fetch_assoc($res);
      if($tower==isset($row['tower']) && $floor==isset($row['floor']) && $place==isset($row['place']))
      {
        echo "<script type='text/javascript'>alert('Data Already Exists!!');location='wifi_facility_office_add.php'; </script>";
      }
      }
    else{
    //do your insert code here or do something (run your code)
    $sql = "INSERT INTO wifi13 (floor,place,tower,wifipassword,state,city,branch,branchcode) VALUES ('$floor','$place','$tower','$wifipassword','$state','$city','$branch','$branchcode')";
    $res=mysqli_query($conn,$sql);
    echo "<script type='text/javascript'>alert('Data Inserted successfully!!');location='wifi_facility_office_list.php'; </script>";
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
        include('../include/superusersidebar.php')
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
                            <label class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Tower</label>
                            <input type="Text" name="tower" placeholder="Tower"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                required>
                            <label class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Floor</label>
                            <input type="Text" name="floor" placeholder="Floor"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                required>
                            <label class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Place</label>
                            <select name="place" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                <option>Select place</option>
                                <?php
                                        $sql = mysqli_query($conn, "select distinct place from wifi13");
                                        while ($rw = mysqli_fetch_assoc($sql)) {
                                        ?>
                                        <option value="<?php echo htmlentities($rw['place']); ?>">
                                            <?php echo htmlentities($rw['place']); ?></option>
                                        <?php
                                        }
                                        ?>
                            </select>
                        
                            <label class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Wifi Password</label>
                            <input type="Text" name="wifipassword" placeholder="Wifipassword"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                required>
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