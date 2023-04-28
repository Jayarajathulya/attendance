<?php

error_reporting(0);
session_start();
include_once '../include/config.php';
include_once '../include/script.php';
if (isset($_POST['submit'])) {

    if(isset($_POST['department'])) {
        $department = $_POST['department'];
        if($department == 'option2') {
            // if 'Others' was selected, use the entered value
            $department = $_POST['department_others'];
        }
    }
    $name = $_POST['name'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $branchname = $_POST['branchname'];



    $sql="select * from employee_details where  name ='$name' and department ='$department' and branchname='$branchname' ";

$res=mysqli_query($conn,$sql);

if (mysqli_num_rows($res) > 0) {
  
  $row = mysqli_fetch_assoc($res);
  if($name==isset($row['name']) && $department==isset($row['department']) && $branchname==isset($row['branchname']))
  {
    echo "<script type='text/javascript'>alert('Data Already Exists!!');location='attendanceregistration.php'; </script>";
  }
  }
else{
//do your insert code here or do something (run your code)
$sql = "INSERT INTO employee_details (country,state,city,branchname,name,department) VALUES ('$country','$state','$city','$branchname','$name','$department')";
$res=mysqli_query($conn,$sql);
echo "<script type='text/javascript'>alert('Data Inserted successfully!!');location='attendanceregistration.php'; </script>";
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

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                },
                screens: {
                    ss: "320px",
                    // => @media (min-width: 640px) { ... }

                    sm: "375px",
                    sl: "425px",

                    md: "768px",
                    // => @media (min-width: 768px) { ... }

                    lg: "1024px",
                    // => @media (min-width: 1024px) { ... }

                    xl: "1280px",
                    // => @media (min-width: 1280px) { ... }

                    desktop: "1440px",
                    // => @media (min-width: 1536px) { ... }
                },
            },
            container: {
                padding: {
                    DEFAULT: "1rem",
                    sm: "2rem",
                    lg: "4rem",
                    xl: "5rem",
                    "2xl": "6rem",
                },
            },
        }
    </script>

    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" />
   
</head>

<body class="items-center bg-zinc-100">
    <?php
    include('../include/superusersidebar.php');
    ?>
        <div class="py-2 px-2">
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
                                   Attendance Registration
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    
        <div class="relative py-3 mx-auto text-center sm:w-96">
            <span class="text-3xl font-semibold text-center pb-4 text-sky-800">Attendance Registration</span>
            <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                <div class="h-2 bg-pink-400 rounded-t-md"></div>
                <div class="px-8 py-7 ">
                <form action="" method="post">
                                <input type="hidden" name="id">
                                
                                <div class='mb-2'>
                                    <label for="country" class="block mb-2 text-sm font-medium text-gray-900 ">Country
                                    </label>

                                    <select name="country" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 "
                                        id="country" onChange="getBrncode0(this.value);">
                                        <option value="">Select Category</option>
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
                                <div class='mb-2'>
                                <label for="state" class="block mb-2 text-sm font-medium text-gray-900 ">State
                                </label>

                                <select name="state" id="state" onChange="getBrncode1(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>
                  
                            </div>
                            <div class='mb-2'>
                                <label for="city"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">City</label>

                                <select name="city" id="city" onChange="getBrncode2(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>

                            </div>
                            <div class='mb-2'>
                                <label for="branchname" class="block mb-2 text-sm font-medium text-gray-900 ">Branch Name
                                </label>

                                <select name="branchname" id="branchname" onChange="getBrncode3(this.value);"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="">Select Subcategory</option>
                                </select>

                            </div>

                                <label class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                <input type="text" name="name" placeholder="Enter Name" required class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <div>
                                    <label for="department" class="block mb-2 text-sm font-medium text-gray-900 ">Department
                                    </label>
                                    <select name="department" required  id="select"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                            <option value="">Select Department</option>

                            <?php $sql = mysqli_query($conn, "select departmentname from masterdepartment");

                                        while ($rw = mysqli_fetch_assoc($sql)) {
                                        ?>

                            <option id="noCheck" value="<?php echo $rw['departmentname']; ?>">
                                <?php echo $rw['departmentname']; ?>
                            </option>
                            <?php
                                        }
                                        ?>
                            <option id="yesCheck" value="option2">Others</option>
                        </select>
                        <div id="input-container" style="display:none;">
                        <label for="input" class="block mb-1 mt-1 text-sm font-medium text-gray-900 ">Others</label>
                        <input type="text" name="department_others" id="input" placeholder="Enter Details" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                    </div>
                    </div>
                  
                                <div class="flex items-baseline justify-center ">
                                    <button type="submit" name="submit" class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">SAVE</button>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>


    <script>
    const select = document.getElementById('select');
    const inputContainer = document.getElementById('input-container');

    select.addEventListener('change', () => {
        if (select.value === 'option2') {
            inputContainer.style.display = 'block';
        } else {
            inputContainer.style.display = 'none';
        }
    });
    </script>
</body>

</html>