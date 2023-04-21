<?php
error_reporting(0);
include('../include/config.php');

if(isset($_POST['add'])){
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $branchname=$_POST['branchname'];
    $towername=$_POST['towername'];
    $floor=$_POST['floor'];
    $office_client=$_POST['office_client'];
    $room=$_POST['room'];
// update user intercom_wifi
$sql = "Insert into masterfacility (country,state,city,branchname,towername,floor,office_client,room) values ('$country','$state','$city','$branchname','$towername','$floor','$office_client','$room')";
if ($result = mysqli_query($conn,$sql)) {
    echo "<script type='text/javascript'>alert('Data inserted successfully!!');location='masterfacility.php'; </script>";


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
    <title>Masterfacility</title>
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
                                Master Facility Add
                            </a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="flex flex-col flex-auto flex-shrink-0  antialiased text-black bg-zinc-100 ">

            <div class="h-full w-6/12 mt-8 mx-auto">
                <div class="flex justify-center text-3xl font-semibold text-center pb-4 text-sky-800">Master Facility
                    Add</div>
                <div class="h-2 bg-pink-400 rounded-t-md"></div>

                <form class="min-w-full p-10 bg-white rounded-lg shadow-xl xl:px-10" method="post" action="">


                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="mb-5">
                            <label for="country" class="block mb-2 text-sm font-medium text-gray-900 ">Country</label>

                            <input type="text" name="country" id="country" placeholder="Country"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">




                        </div>
                        <div class="mb-5">
                            <label for="state" class="block mb-2 text-sm font-medium text-gray-900 ">State
                            </label>

                            <input type="text" name="state" type="text" placeholder="State"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                id="state">


                        </div>

                    </div>


                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                        <div class="mb-5">
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 ">City</label>

                            <input type="text" name="city" id="city" placeholder="City"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">




                        </div>
                        <div class="mb-5">
                            <label for="branchname" class="block mb-2 text-sm font-medium text-gray-900 ">Branch Name
                            </label>

                            <input type="text" name="branchname" id="branchname" placeholder="Branch Name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">


                        </div>

                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

                        <div class="mb-5">
                            <label class="block mb-2  text-sm font-medium text-gray-900 ">Tower</label>
                            <input type="text" name="towername" id="towername" required placeholder="Tower Name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                        </div>

                        <div class="mb-5">
                            <label for="floor" class="block mb-2 text-sm font-medium text-gray-900 ">Floor</label>

                            <input type="text" name="floor" id="floor" required placeholder="Floor"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">

                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">


                        <div class="mb-5">
                            <label for="floor" class="block mb-2 text-sm font-medium text-gray-900 ">Client / Ofiice /
                                Client NS</label>

                            <input type="text" name="office_client" id="office_client" required
                                placeholder="Client / Ofiice / Client NS"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">

                        </div>
                        <div class="mb-5">
                            <label for="room" class="block mb-2 text-sm font-medium text-gray-900 "> Room
                            </label>

                            <input type="text" name="room" id="room" required placeholder="Room"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">


                        </div>
                    </div>

                    <div class="grid grid-cols-1 ">
                        <div class="flex items-baseline justify-center ">

                            <input type="submit" name="add" value="submit"
                                class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600 "></input >
                        </div>
                    </div>
                </form>
            </div>
</body>

</html>