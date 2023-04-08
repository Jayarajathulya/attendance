<?php
session_start();
error_reporting(0);
include('../include/config.php');
include('../include/script.php');
if (isset($_POST['add'])) {
    $floor = $_POST['floor'];
    $room = $_POST['room'];
    $tower = $_POST['tower'];    
    $phone = $_POST['phone'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $branchname = $_POST['branchname'];
    $branchcode = $_POST['branchcode'];


    $sql = "INSERT INTO `intercom` (floor,roomno,tower,phone,state,city,branchname,branchcode) VALUES (' $floor','$room', '$tower','$phone','$state','$city','$branchname','$branchcode')";

    
    if ($result = mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>alert('Data Inserted successfully!!');location='facilityintercomlist.php'; </script>";
    
    
        // echo "$sql";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   
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
                                    Intercom Entry
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    
        <div class="relative py-3 mx-auto text-center sm:w-96">
            <span class="text-3xl font-semibold text-center pb-4 text-sky-800">Facility Add Intercom</span>
            <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                <div class="h-2 bg-pink-400 rounded-t-md"></div>
                <div class="px-8 py-7 ">
                    <form action="" method="post">
                        <input type="hidden" name="id">
                        <div>
                        <label class="block mb-2  text-sm font-medium text-gray-900 ">Tower</label>
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
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Floor</label>

                                <select name="floor" id="floor" onChange="getCat1(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>



                            </div>
                            <div >
                                <label for="room" class="block mb-2 text-sm font-medium text-gray-900 ">Room
                                </label>

                                <select name="room" id="room" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>

                            </div>

                           
                        <label class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Phone</label>
                        <input type="Text" name="phone" required placeholder="Phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
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
                            <label for="facility" class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Branch Name
                            </label>

                            <input readonly name="branchname" id="facility" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" value="<?php echo $_SESSION['facility'] ?>" />
                        </div>
                        <div>
                            <label for="place" class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Branch Code
                            </label>

                            <input readonly name="branchcode" id="branch_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5" value="<?php echo $_SESSION['branchcode'] ?>" />

                            <div class="flex items-baseline justify-center ">
                                <button type="submit" name="add" class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">Add Details</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
</body>

</html>