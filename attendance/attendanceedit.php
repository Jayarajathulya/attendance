<?php
session_start();
error_reporting(1);
include('../include/config.php');


if (count($_POST) > 0) {
    $sql = "UPDATE employee_details set name='" . $_POST['name'] . "',department='" . $_POST['department'] . "' ,tower='".$_POST['tower']."',floor='".$_POST['floor']."',room='".$_POST['room']."',  facility='" . $_POST['facility'] . "' ,branchcode='" . $_POST['branchcode'] . "' WHERE id='" . $_GET['edit'] . "'";
    // $message = "Record Modified Successfully";
    
    if ($result = mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>alert('Data updated successfully!!');location='attendancelist.php'; </script>";
   

        // echo "$sql";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
$result = mysqli_query($conn, "SELECT * FROM employee_details WHERE id='" . $_GET['edit'] . "'");
$row = mysqli_fetch_array($result);



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
             include('../include/sidebar.php');          
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
                class="relative flex flex-col justify-center w-full h-full py-6 overflow-hidden antialiased text-gray-800 sm:py-12">
                <div class="relative py-3 mx-auto text-center sm:w-96">
                    <span class="text-3xl font-semibold text-center pb-4 text-sky-800">Attendance Edit</span>
                    <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                        <div class="h-2 bg-pink-400 rounded-t-md"></div>
                        <div class="px-8 py-7 ">
                            <form action="" method="post">
                                <input type="hidden" name="id">
                                <label cclass="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                <input type="Text" name="name" placeholder="Enter Empname"
                                    value="<?php echo $row['name']?>" required
                                    class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <div>
                                    <label for="department"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Department
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
                                <div>
                                    <div>
                                        <label for="tower" class="block mb-2 mt-2 text-sm font-medium text-gray-900 ">Tower
                                        </label>

                                        <input name="tower" type="text"
                                            class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            id="department" value="<?php echo $row['tower']?>">
                                    </div>
                                </div>

                                <div>
                                    <div>
                                        <label for="floor" class="block mb-2 text-sm font-medium text-gray-900 ">Floor
                                        </label>

                                        <input name="floor" type="text" readonly="readonly"
                                            class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                            id="department" value="<?php echo $row['floor']?>">
                                    </div>
                                </div>


                                <div>
                                    <label for="room"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Room</label>

                                    <input name="room" id="branch_city" readonly="readonly"
                                        class="mt-3 mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                        value="<?php echo $row['room'] ?>">




                                </div>
                                <div>
                                    <label for="facility" class="block mb-2 text-sm font-medium text-gray-900 ">Facility
                                    </label>

                                    <input name="facility" id="branch_name" readonly="readonly"
                                        class=" mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                        value="<?php echo $row['facility'] ?>">


                                </div>
                                <div>
                                    <label for="branchcode" class="block mb-2 text-sm font-medium text-gray-900 ">Branch
                                        Code
                                    </label>

                                    <input name="branchcode" id="branch_code" readonly="readonly"
                                        class=" mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                        value="<?php echo $row['branchcode'] ?>">


                                </div>
                                <div class="flex items-baseline justify-center ">
                                    <button type="submit" name="submit"
                                        class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>

    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

</body>

</html>
<?php ?>