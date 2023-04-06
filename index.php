<?php
error_reporting(0);
session_start();
include_once './include/config.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password =  $_POST['password'];
    if (!empty($username) || !empty($password)) {
        $ret = mysqli_query($conn, "SELECT * FROM admin_registration WHERE username='" . $_POST['username'] . "' and password='" . $_POST['password'] . "'");
        $num = mysqli_fetch_array($ret);

        $_SESSION['empname'] = $num['empname'];        
        $_SESSION['state'] = $num['state'];
        $_SESSION['city'] = $num['city'];
        $_SESSION['facility'] = $num['facility'];        
        $_SESSION['branchcode'] = $num['branchcode'];
        $_SESSION['role'] = $num['role'];

        if ($_SESSION['role'] == 'superuser') {

            header("Location:./attendance/attendancelist.php");
            // echo "<script type='text/javascript'>alert('Attendance Inserted Successfully....!')location='./attendance/attendancehome.php';</script>";
        } else if ($_SESSION['role'] == 'user') {
            header("Location:./ipphone/iphome.php");
        } else {
            $errorMsg = "incorrect username or password";
        }
    } else {
        $errorMsg = "Username and Password is required";
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>

</head>

<body>
    <div class="bg-white ">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url(https://athulyahomecare.com/images/4661500_2473674.jpg)">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div>
                        <h2 class="text-2xl font-bold text-white sm:text-3xl"><span class="ai-attachment"></span>Attendence/WIFI/Landline Phone </h2>

                        <p class="max-w-xl mt-3 text-gray-300">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. In
                            autem ipsa, nulla laboriosam dolores, repellendus perferendis libero suscipit nam temporibus
                            molestiae
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <div class="flex justify-center mx-auto">
                            <img class="" src="https://res.cloudinary.com/drywqd3hf/image/upload/v1675425966/care_1_vroxw3.png" alt="">
                        </div>

                        <p class="mt-3 text-gray-500 >Sign in to access your account"></p>
                    </div>

                    <div class="mt-8">
                        <form action="" method="post">
                            <div>
                                <label for="email" class="block mb-2 text-sm text-gray-600 ">Email Address</label>
                                <input type="Text" name="username" placeholder="Enter Empid" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>

                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600 ">Password</label>
                                    <a href="#" class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline">Forgot password?</a>
                                </div>

                                <input type="password" name="password" id="password" placeholder="Your Password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>

                            <div class="mt-6">
                                <button type="submit" name="submit" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-blue-700 rounded-lg hover:bg-blue-800 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                    Login In
                                </button>
                            </div>

                        </form>

                        <p class="mt-6 text-sm text-center text-gray-400">Don&#x27;t have an account yet? <a href="#" class="text-blue-500 focus:outline-none focus:underline hover:underline">Sign up</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>