
<?php 
session_start();
error_reporting(0);
include('../include/config.php');
include('../include/script.php');
if(isset($_POST['submit'])){
    $empid = $_POST['empid'];
    $empname = $_POST['empname'];
    $department=$_POST['department'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $branchname= $_POST['branchname'];
    $country= $_POST['country'];
    $username= $_POST['username'];
    $password= $_POST['password'];
    $role= $_POST['role'];

    $sql="select * from `admin_registration` where empid='$empid' and empname ='$empname' and department ='$department' and country='$country' and state='$state' and city='$city' and branchname ='$branchname' and username ='$username' and password='$password' and role ='$role' ";

    $res=mysqli_query($conn,$sql);
    
    if (mysqli_num_rows($res) > 0) {
      
      $row = mysqli_fetch_assoc($res);
      if($empid==isset($row['empid'])  && $branchname==isset($row['branchname']) && $username==isset($row['username']) )
      {
        echo "<script type='text/javascript'>alert('Data Already Exists!!');location='adminregistration.php'; </script>";
      }
      }
    else{
    //do your insert code here or do something (run your code)
    $sql = "INSERT INTO `admin_registration` (empid,empname,department,state,city,branchname,country,username,password,role) VALUES ('$empid','$empname','$department','$state','$city','$branchname','$country','$username','$password','$role')";
    $res=mysqli_query($conn,$sql);
    echo "<script type='text/javascript'>alert('Data Inserted successfully!!');location='adminregistration.php'; </script>";
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
            <div class="flex justify-center text-3xl font-semibold text-center pb-4 text-sky-800">Admin Registration</div>
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
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Emp ID</label>
                        <input type="text" name="empid" placeholder="Enter Empid" 
                            class="mb-2 mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                    <div class="mb-5">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Emp Name</label>
                        <input type="Text" name="empname" placeholder="Enter Empname"
                            class="mb-2 mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                
                    </div>
                    <div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                   
                            
                                <div class="mb-5">
                                <label class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                        <input type="email" name="username" placeholder="Enter Mail Id"
                            class="mb-2 mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>
                                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                        <input type="password" name="password" placeholder="Enter Password"
                            class="mb-2 mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    
                            <div class="mb-5">
                            <label for="department" class="block mb-2 text-sm font-medium text-gray-900 ">Department
                            </label>

                            <select name="department"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                                <option value="">Select department</option>
                                <option value="Admin">Admin</option>
                            </select>
                            </div>
                            <div class="mb-5">
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 ">Role
                            </label>

                            <select name="role"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                                <option value="">Select Role</option>
                                <option value="user">user</option>
                                <option value="superuser">superuser</option>
                            </select>
                            </div>
                    </div>
                    <div class="grid grid-cols-1 ">
                         
                    <div class="flex items-baseline justify-center ">
                            <button type="submit" name="submit"
                                class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">SAVE</button>
                        </div>
                    </div>
                    </div>
            
                </form>
            </div>

</body>

</html>
     