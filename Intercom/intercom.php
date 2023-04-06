<?php
session_start();
error_reporting(0);
include('../include/config.php');
if (isset($_POST['search'])) {
    $place = $_POST['place'];

    if ($_POST['place'] != "Select Branch") {
        header('location:facilityintercom.php');
    } else {
        header('location:iphome.php');
    }
}

// if(isset($_POST['submit'])){
    //     $office = $_POST['office'];

    //       if($_POST['office'] != "Select Office"){
    //           header('location:corporateip.php');
    //       }
    //       else{
    //         header('location:iphome.php');
    //       }

//   }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ipphone</title>
    
</head>
<body onload="loaded();">
<?php
  if ($_SESSION['roll']=='superuser') {
      include('../include/sidebar.php');
  } elseif ($_SESSION['roll']=='user') {
      include('../include/sidebar2.php');
  }

?>
            <div class="relative flex flex-col justify-center w-full h-full py-10 overflow-hidden antialiased text-gray-800 sm:py-12">
                <div class="relative py-3 mx-auto text-center sm:w-96">
                    <span class="text-2xl font-semibold ">IPPHONE HOME</span>
                    <div class="h-2 mt-2 bg-pink-400 rounded-t-md"></div>
                    <div class="p-4 text-left bg-white rounded-lg shadow-xl ">
                        
                        <!-- <div class="px-8 py-7 ">      -->
        <!-- <input type="radio"  name="inline-radio-group" value="FACILITY"  onclick="text(0)" checked class="w-4 h-4 space-y-4 text-pink-600 bg-gray-100 border-gray-300 first focus:ring-pink-500 dark:focus:ring-pink-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="inline-radio-group" class="ml-1 space-y-10 text-sm font-medium text-gray-900 dark:text-gray-300">Facility</label>
        <input type="radio"  name="inline-radio-group" value="CORPORATE OFFICE" onclick="text(1)" class="w-4 h-4 ml-4 space-y-4 text-pink-600 bg-gray-100 border-gray-300 second focus:ring-pink-500 dark:focus:ring-pink-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"  >
        <label for="inline-radio-group" class="ml-1 space-y-4 text-sm font-medium text-gray-900 dark:text-gray-300">Corporate office</label> -->
    <!-- </div> -->
        <form action="" method="post" id="mycode">
        <div class="mt-2 mb-2">
                                <label for="facility" class="block mb-2 text-sm font-medium text-gray-900 ">Branch Name
                                </label>

                                <input name="facility" id="facility" readonly
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                     value="<?php echo $_SESSION['facility']?>">
                            </div>
                            <div>
                                <label for="place" class="block mb-2 text-sm font-medium text-gray-900 ">Branch Code
                                </label>

                                <input name="branchcode" id="branch_code" readonly
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5"
                                    value="<?php echo $_SESSION['branchcode']?>">
                            </div>
            <div class="flex items-baseline justify-center ">
                                 <button type="submit"  name="search" class="px-6 py-2 mt-4 mb-8 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">SEARCH</button>
                            </div> 
        </form>
        <!-- <form action="" method="post" id="mycode1">
            <div class="ml-6 box2">
            <label class="block mb-2 font-semibold " >Office</label>
            <select name="office"   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-11/12 p-2.5" >

                    <option class="">Select Office</option>
                    <option class="">Ekkatuthangal</option>
                    <option class="">Ashoknagar</option>

                </select>
            </div>          
            <div class="flex items-baseline justify-center ">
                                 <button type="submit"  name="submit" class="px-6 py-2 mt-4 mb-8 text-white bg-pink-500 rounded-md hover:bg-pink-600 ">SEARCH</button>
                            </div>      
                    </form> -->
    </div>
    <!-- <script>
    function loaded() {
        document.getElementById("mycode1").style.display = "none";
    }
    </script>
    <script>
    function text(x) {
        if (x == 0) document.getElementById("mycode").style.display = "block";
        else document.getElementById("mycode").style.display = "none";
        if (x == 1) document.getElementById("mycode1").style.display = "block";
        else document.getElementById("mycode1").style.display = "none";
        return;
    }
    </script> -->
</body>

</html>