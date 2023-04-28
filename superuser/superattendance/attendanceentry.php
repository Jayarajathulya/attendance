<?php
session_start();
error_reporting(0);
include_once '../include/config.php';
include_once '../include/script.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body class="items-center bg-zinc-100">
    <div>
        <?php include('../include/superusersidebar.php'); ?>
        <div class="px-2 py-2 ">
            <div class="justify-center w-full mx-auto bg-white">
                <nav class="flex py-4 border-y" aria-label="Breadcrumb">
                    <!-- Breadcrumb navigation code here -->
                </nav>
            </div>
            <section class="container mx-auto font-medium ">
                <form action="" method="post">
                    <div class="m-4 flex gap-4 mb-10">
                        <div class="flex">
                            <label for="country" class="block pt-3 mr-2  text-sm font-medium text-gray-900 ">Country
                            </label>

                            <select name="country" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-52 p-2.5"
                                id="country" onChange="getBrncode0(this.value);">
                                <option value="">Select Country</option>
                                <?php

                                      

                                        $sql = mysqli_query($conn, "select distinct country from masterfacility");
                                        while ($rw = mysqli_fetch_assoc($sql)) {
                                        ?>
                                <option value="<?php echo htmlentities($rw['country']); ?>">
                                    <?php echo htmlentities($rw['country']); ?></option>
                                <?php
                                        }
                                        ?>
                            </select>
                        </div>
                        <div class="flex">
                            <label for="state" class="block pt-3 mr-2  text-sm font-medium text-gray-900 ">State
                            </label>

                            <select name="state" id="state" onChange="getBrncode1(this.value);" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-52 p-2.5">
                                <option value="">Select State</option>
                            </select>

                        </div>
                        <div class="flex">
                            <label for="city" class="block pt-3 mr-2  text-sm font-medium text-gray-900 ">City</label>

                            <select name="city" id="city" onChange="getBrncode2(this.value);" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-52 p-2.5">
                                <option value="">Select City</option>
                            </select>

                        </div>
                        <div class="flex">
                            <label for="branchname" class="block pt-3 mr-2  text-sm font-medium text-gray-900 ">Branch
                                Name
                            </label>

                            <select name="branchname" id="branchname" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-52 p-2.5">
                                <option value="">Select Branchname</option>
                            </select>

                        </div>
                        <div class="flex">
                            <label class="block pt-3 mr-2  text-sm font-medium text-gray-900 ">Date</label>
                            <input type='date' id='date' name="date" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-52 p-2.5">
                        </div>
                        <div class="">
                            <button type="submit" name="filter" id="filterBtn" 
                                class="px-6 py-2  text-white bg-pink-500 rounded-md hover:bg-pink-600 ">Filter</button>
                        </div>
                    </div>
                    </form>
                    <div class="text-3xl font-semibold text-center pb-4  text-sky-800">All Facility Attendance</div>
                    <div class="w-full mb-8 overflow-hidden">
                        <div class="w-full">
                            <table
                                class="w-full bg-white rounded-lg shadow-lg border border-separate rounded-t-lg border-spacing-1 overflow-x-auto">
                                <thead class="text-xs uppercase text-gray-50 bg-sky-900 ">
                                    <th class="px-4 py-3 whitespace-nowrap ">ID</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">NAME</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">DEPARTMENT</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">COUNTRY</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">STATE</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">CITY</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">FACILITY</th>
                                    <th class="px-4 py-3 whitespace-nowrap ">ACTION</th>
                                </thead>
                                <tbody id="attendanceList">
                                    <?php
                                    $res = mysqli_query($conn, "SELECT * FROM employee_details");
                                    $counter = 1;
                                    while ($post = mysqli_fetch_assoc($res)) {
                                    ?>

                                    <tr class="bg-white border-b border-separate hover:bg-sky-100 ">
                                        <td class="border-r border-b px-6 py-4 border-slate-400 ...">
                                            <?php echo $post['id']; ?>
                                        </td>
                                        <td
                                            class="border-r border-b px-6 py-4 whitespace-nowrap border-slate-400   ...">
                                            <?php echo $post['name']; ?></td>
                                        <td class="border-r border-b px-6 py-4 whitespace-nowrap border-slate-400 ...">
                                            <?php echo $post['department']; ?></td>
                                        <td class="border-r border-b px-6 py-4 border-slate-400 ...">
                                            <?php echo $post['country']; ?></td>
                                        <td class="border-r border-b px-6 py-4 border-slate-400 ...">
                                            <?php echo $post['state']; ?></td>
                                        <td class="border-r border-b px-6 py-4 border-slate-400 ...">
                                            <?php echo $post['city']; ?></td>
                                        <td class="border-r border-b px-6 py-4 border-slate-400 ...">
                                            <?php echo $post['branchname']; ?></td>

                                        <?php echo "<td class='border-r border-b px-6 py-4 whitespace-nowrap border-slate-400 ...'><label><input type='radio' id='mycode' name='attendance[$counter]' value='Absent' class='accent-red-600'>Absent &nbsp  </label><label><input type='radio' name='attendance[$counter]' id='mycode1' value='Off'>Off</label></td>" ?>
                                    </tr>
                                    <?php $counter++;
                                    } ?>
                                </tbody>
                            </table>
                            <div class="flex items-baseline justify-center">
                                <button type="submit" name="submit"
                                    class="px-6 py-2 mt-4 text-white bg-pink-500 rounded-md hover:bg-pink-600">Submit</button>
                            </div>
                        </div>
                    </div>

            </section>
        </div>
    </div>
</body>

</html>

