<?php
session_start();
error_reporting(1);
include('../include/config.php');
$result = mysqli_query($conn, "SELECT * FROM employee_details WHERE id='" . $_GET['edit'] . "'");
$row = mysqli_fetch_array($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $department = $_POST['department'];
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
    echo "<script type='text/javascript'>alert('Data Already Exists!!');location='attendancelist.php'; </script>";
  }
  }
else{
//do your insert code here or do something (run your code)
$sql = "UPDATE employee_details set name='" . $_POST['name'] . "',department='" . $_POST['department'] . "' , country='" . $_POST['country'] . "' ,state='" . $_POST['state'] . "' ,city='" . $_POST['city'] . "' ,branchname='" . $_POST['branchname'] . "' WHERE id='" . $_GET['edit'] . "'";
$res=mysqli_query($conn,$sql);
echo "<script type='text/javascript'>alert('Data Updated successfully!!');location='attendancelist.php'; </script>";
}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>attendance-edit</title>
    <link rel="icon" href="https://athulyahomecare.com/lp/images/fav.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
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
    <div class="h-full mx-auto bg-zinc-100">
        <div class="px-2 py-2">
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
                                <a href="#"
                                    class="ml-4 text-sm font-medium text-pink-500 hover:scale-95 hover:text-sky-900"
                                    aria-current="page">
                                    Attendance Edit
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div
                class="relative flex flex-col justify-center w-full h-full overflow-hidden antialiased text-gray-800 ">
                <div class="relative  mx-auto text-center sm:w-96">
                    <span class="text-3xl font-semibold text-center pb-4 text-sky-800">Attendance Edit</span>
                    <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                        <div class="h-2 bg-pink-400 rounded-t-md"></div>
                        <div class="px-8 py-3 ">
                            <form action="" method="post">
                                <input type="hidden" name="id">
                                <div>
                                    <label for="country" class="block mb-1 mt-1 text-sm font-medium text-gray-900 ">Country
                                       
                                    </label>

                                    <input name="country" id="branch_code" readonly="readonly"
                                        class="  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                        value="<?php echo $row['country'] ?>">


                                </div>
                                <div>
                                <label for="state" class="block mb-1 mt-1 text-sm font-medium text-gray-900 ">State 
                                </label>

                            <input name="state" id="state"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    value="<?php echo $row  ['state']?>" readonly>
                                </input>

                            </div>
                            <div>
                                <label for="city" class="block mb-1 mt-1 text-sm font-medium text-gray-900 ">City 
                                </label>

                                <input name="city" id="city"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    value="<?php echo $row  ['city']?>" readonly>
                                </input>

                            </div>
                                <div>
                                    <label for="branchname" class="block mb-1 mt-1 text-sm font-medium text-gray-900 ">Branchname
                                    </label>

                                    <input name="branchname" id="branch_name" readonly="readonly"
                                        class="  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                        value="<?php echo $row['branchname'] ?>">


                                </div>
                              
                                <label cclass="block mb-1 text-sm font-medium text-gray-900 ">Name</label>
                                <input type="Text" name="name" placeholder="Enter Empname"
                                    value="<?php echo $row['name']?>" required
                                    class="mb-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <div>
                                    <label for="department"
                                        class="block mb-1 text-sm font-medium text-gray-900 ">Department
                                    </label>

                                    <select name="department" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 ">
                                        <option value="<?php echo $row['department'] ?>">
                                            <?php echo $row['department'] ?></option>

                                        <?php $sql = mysqli_query($conn, "select departmentname from masterdepartment");

                                    while ($rw = mysqli_fetch_assoc($sql)) {
                                    ?>

                                        <option value="<?php echo $rw['departmentname']; ?>">
                                            <?php echo $rw['departmentname']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>


                                    </select>

                                </div>
                          
                                <div class="flex items-baseline justify-center ">
                                    <button type="submit" name="update"
                                        class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php ?>