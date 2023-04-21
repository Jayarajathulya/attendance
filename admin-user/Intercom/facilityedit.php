<?php
session_start();
error_reporting(0);
include('../include/config.php');
$result = mysqli_query($conn,"SELECT * FROM intercom WHERE id ='".$_GET['edit']."'");
$res = mysqli_fetch_array($result);


if (count($_POST) > 0) {
   $phone = $_POST['phone'];
   $tower = $_POST['tower'];
   $floor = $_POST['floor'];
   $roomno = $_POST['roomno'];
 
   // update user data
   $sql = "UPDATE intercom SET phone= '$phone', tower= '$tower', floor= '$floor', roomno= '$roomno' WHERE id ='".$_GET['edit']."'  ";
  
     
   if ($result = mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'>alert('Data updated successfully!!');location='facilityintercomlist.php'; </script>";


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
            <span class="text-3xl font-semibold text-center pb-4 text-sky-800">Facility Edit Intercom</span>
            <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                <div  class="h-2 bg-pink-400 rounded-t-md"></div>
                <div class="px-8 py-7 ">
                    <form action="" method="post">
                        <div>
                            <input type="hidden" name="id" >
                            <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Tower</label>
                                <input type="text" name="tower" placeholder="Tower" required
                                   class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="<?php echo $res["tower"]?>" >
                                    </div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Floor</label>
                        <input type="text" name="floor" placeholder="Floor"
                           class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="<?php echo $res["floor"];?>" required>
                            </div>
                            <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Roomno</label>
                            <input type="text" name="roomno" placeholder="Roomno"
                               class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="<?php echo $res["roomno"]?>"required>
                                </div>
                                <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 ">Phone</label>
                                <input type="text" name="phone" placeholder="Phone" required
                                   class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="<?php echo $res["phone"]?>" >
                                    </div>
                                
                                    <div>
                                <label cclass="block mb-2 text-sm font-medium text-gray-900 ">Branch Name</label>
                                <input type="text" name="branchname" placeholder="branchname"
                                   class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="<?php echo $res["branchname"]?>" readonly>
                                    </div>
                                    <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Branch Code</label>
                                    <input type="text" name="branchcode" placeholder="branchcode"
                                   class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="<?php echo $res["branchcode"]?>" readonly>
                                    </div>
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
