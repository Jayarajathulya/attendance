<?php
error_reporting(0);
session_start();
include('../include/config.php');

if (isset($_POST['submit'])) {

 header("Location:../attendance/attendanceentry.php");
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>

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

<body>
 <?php
    include('../include/sidebar.php');
    ?>
    <div
        class="relative flex flex-col justify-center w-full h-full py-10 overflow-hidden antialiased text-gray-800 sm:py-12">

        <div class="relative py-3 mx-auto text-center sm:w-96">
            <span class="text-2xl font-semibold ">ATTENDANCE DETAILS</span>
            <div class="mt-4 text-left bg-white rounded-lg shadow-xl">
                <div class="h-2 bg-pink-400 rounded-t-md"></div>
                <div class="px-8 py-7 ">
                    <div class="grid justify-center gap-6 mb-6 lg:grid-cols-1 rounded-2xl">
                        <form action="" method="post">

                        <div>
                                <label for="facility" class="block mb-2 text-sm font-medium text-gray-900 ">Branch Name
                                </label>

                                <select name="facility" id="facility" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="<?php echo $_SESSION['facility']?>"><?php echo $_SESSION['facility']?></option>
                                    
                                </select>

                            </div>
                            <div>
                                <label for="place" class="block mb-2 text-sm font-medium text-gray-900 ">Branch Code
                                </label>

                                <select name="branchcode" id="branch_code" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5">
                                    <option value="<?php echo $_SESSION['branchcode']?>"><?php echo $_SESSION['branchcode']?></option>
                                    
                                </select>

                            </div>
                           
                            <div class="grid gap-4 pt-10 place-content-center">
                                <button type="submit"
                                    class="text-white bg-pink-500 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center "
                                    name="submit">Search</button>


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