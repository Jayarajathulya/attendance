<?php 
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <title>Document</title>
</head>

<body>



    <div class="w-full mx-auto border-b bg-sky-900 2xl:max-w-full">
        <div x-data="{ open: false }" class="relative flex flex-col w-full p-5 mx-auto bg-sky-900 md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="grid justify-items-center">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-pink-500 focus:outline-none focus:text-pink-500 md:hidden">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col items-center flex-grow hidden md:pb-0 md:flex md:justify-center md:flex-row">
                <!-- <a class="px-2 py-2 text-sm text-white lg:px-6 md:px-3 hover:text-blue-600" href="#">
                    Home
                </a>
                <a class="px-2 py-2 text-sm text-white lg:px-6 md:px-3 hover:text-blue-600" href="#">
                    Products
                </a> -->


                <div class="order-last md:order-none" x-data="{ openMobileMenu: false}" x-on:click.away="openMobileMenu = false">
                    <div class="relative">
                        <nav class="relative flex items-center justify-between w-full sm:h-10">
                            <div class="flex items-center justify-between space-x-4">
                                <div class="space-x-4" x-on:click="openMobileMenu = !openMobileMenu">
                                    <!-- <button type="button" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm text-left text-white md:w-auto md:inline md:mt-0 hover:text-blue-600 focus:outline-none focus:shadow-outline" id="main-menu" aria-label="Main menu" aria-haspopup="true">
                                        <span>
                                            Flyout menu
                                        </span>
                                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform rotate-0 md:-mt-1">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button> -->

                                    <button id="main-menu" aria-label="Main menu" aria-haspopup="true" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-pink-600 border border-pink-700 rounded-md shadow-sm hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h9.75m4.5-4.5v12m0 0l-3.75-3.75M17.25 21L21 17.25" />
                                        </svg>
                                        <span class="my-2">Menu</span>
                                    </button>
                                </div>
                                <div class="gap-4">
                                    <img class="bg-white rounded-lg" src="https://res.cloudinary.com/drywqd3hf/image/upload/v1675425966/care_1_vroxw3.png" alt="logo" />
                                </div>
                            </div>
                        </nav>
                    </div>



                    <div x-on:click="openMobileMenu = false" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" :class="{'translate-y-0 shadow-md duration-150': openMobileMenu, '-translate-y-full': ! openMobileMenu}" class="fixed inset-0 top-0 z-40 h-screen overflow-y-auto transition origin-top transform -translate-y-full">
                        <div class="relative overflow-hidden bg-pink-500 shadow-xl lg:bg-transparent" role="menu" aria-orientation="vertical" aria-labelledby="main-menu">
                            <div class="bg-sky-800 lg:border-t fon">
                                <div class="grid px-4 py-6 mx-auto sm:grid-cols-2 2xl:max-w-7xl gap-y-6 sm:gap-8 sm:px-6 sm:py-8 lg:grid-cols-4 lg:px-8 lg:py-12 xl:py-16">
                                    <div class="grid grid-cols-1 gap-3 p-2 lg:p-0">
                                        <div>
                                            <div class="relative grid gap-6 px-5 py-6 shadow-xl cursor-pointer sm:gap-8 sm:p-8 ">
                                                <h3 class="text-xl font-medium text-pink-500">
                                                    Attendance
                                                </h3>
                                                <a href="../attendance/attendanceentry.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white hover:text-sky-900">
                                                    <div class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 text-white w-7 group-hover:text-sky-800 md hydrated" width="32" height="32" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M7 9h10V7H7v2Zm11 14q-2.075 0-3.538-1.463T13 18q0-2.075 1.463-3.538T18 13q2.075 0 3.538 1.463T23 18q0 2.075-1.463 3.538T18 23Zm-.5-2h1v-2.5H21v-1h-2.5V15h-1v2.5H15v1h2.5V21ZM3 21V3h18v8.7q-.725-.35-1.463-.525T18 11q-.275 0-.513.013t-.487.062V11H7v2h6.1q-.425.425-.787.925T11.675 15H7v2h4.075q-.05.25-.063.488T11 18q0 .825.15 1.538T11.675 21H3Z" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="font-sans text-base font-semibold text-pink-500 ">
                                                            Attendance Entry
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            ipsum reversus ab viral inferno, nam rick grimes malum cerebro.
                                                        </p>
                                                    </div>
                                                </a>
                                                <a href="../attendance/attendanceregistration.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white">
                                                    <div class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white group-hover:text-sky-800 md hydrated" width="32" height="32" viewBox="0 0 512 512">
                                                            <path fill="currentColor" d="m168.8 32.89l-32.6 32.53l21.3 21.17L190 54.08zm33.9 33.96l-9.9 9.91l123 123.04l9.9-9.9zm159.4 18.06c-3.7 0-7.4.1-10.9.3c-31.9 1.78-56.7 11.76-78.3 26.39l65.5 65.6c3.5 7.3 52 96.2 65.5 123.3c-9.7-6.4-123.4-65.4-123.4-65.4l-15.3-15.2v140.3c23.9-14.6 50.1-27.7 83.6-31.2c37.5-4 83.5 4.3 144.2 33.1V118.7c-51.7-22.99-93.3-32.89-127.2-33.69c-1.3 0-2.5-.11-3.7-.1zm-230.8 1.03C100.4 88.93 63.44 99 19.05 118.7v243.4C79.85 333.3 125.8 325 163.3 329c33 5.2 58.1 15.8 83.6 31.2V201.6c-38.6-38.5-77.1-77.1-115.6-115.66zm48.8 3.55l-9.9 9.89l123 123.02l9.9-9.9zM336 205.1l-27.5 27.5l55.1 27.6zM143.8 346.7c-32 .3-71.85 9.8-124.75 36v42.5c60.8-28.8 106.75-37.1 144.25-33.1c18.6 2 34.9 6.9 49.8 13.3c-4.7 6.1-9.3 13.3-13.9 21.7h117.2c-6-8.2-11.8-15.4-17.7-21.6c15-6.5 31.4-11.4 50.1-13.4c37.5-4 83.5 4.3 144.2 33.1v-42.5c-53.1-26.3-93.1-35.9-125.2-36h-3.1c-4.8.1-9.4.4-13.9.9c-34 3.6-59.6 18-85.6 34.4c-5.7-.8-13-1.8-18.3-.9c-27.2-16.2-58.2-30.4-85.5-33.5c-5.6-.6-11.5-.9-17.6-.9z" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="text-base font-medium text-pink-500">
                                                            Attendance Registration.
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            Interviews, tutorials and more
                                                        </p>
                                                    </div>
                                                </a>
                                                <a href="../attendance/attendancelist.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white">
                                                    <div class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white group-hover:text-sky-800 md hydrated" width="32" height="32" width="32" height="32" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M16 14q-1.25 0-2.125-.875T13 11q0-1.25.875-2.125T16 8q1.25 0 2.125.875T19 11q0 1.25-.875 2.125T16 14Zm-6 6v-1.9q0-.525.25-1t.7-.75q1.125-.675 2.388-1.012T16 15q1.4 0 2.663.338t2.387 1.012q.45.275.7.75t.25 1V20H10Zm2.15-2h7.7q-.875-.5-1.85-.75T16 17q-1.025 0-2 .25t-1.85.75ZM16 12q.425 0 .713-.288T17 11q0-.425-.288-.713T16 10q-.425 0-.713.288T15 11q0 .425.288.713T16 12Zm0-1Zm0 7ZM3 14v-2h8v2H3Zm0-8V4h12v2H3Zm8.1 4H3V8h9q-.35.425-.563.925T11.1 10Z" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="text-base font-medium text-pink-500">
                                                            Attendance List
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            Interviews, tutorials and more
                                                        </p>
                                                    </div>
                                                </a>
                                                <a href="../attendance/attendancereport.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white">
                                                    <div class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white group-hover:text-sky-800 md hydrated" width="32" height="32" viewBox="0 0 24 24">
                                                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                                <path d="M8 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h5.697M18 12V7a2 2 0 0 0-2-2h-2" />
                                                                <path d="M8 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v0a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2zm0 6h4m-4 4h3m3 2.5a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0-5 0m4.5 2L21 22" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="text-base font-medium text-pink-500">
                                                            Attendance Report
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            Interviews, tutorials and more
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-3 p-2 shadow-xl lg:p-0 ">
                                        <div>
                                            <div class="relative grid gap-6 px-5 py-6 sm:gap-8 sm:p-8">
                                                <h3 class="text-xl font-medium text-pink-500">
                                                    WIFI
                                                </h3>
                                                <a href="../wifi/wifi_facility_add.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white">
                                                    <div class="">
                                                       
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white group-hover:text-sky-800 md hydrated"  width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M18 18h-2q-.425 0-.713-.288T15 17q0-.425.288-.713T16 16h2v-2q0-.425.288-.713T19 13q.425 0 .713.288T20 14v2h2q.425 0 .713.288T23 17q0 .425-.288.713T22 18h-2v2q0 .425-.288.713T19 21q-.425 0-.713-.288T18 20v-2Zm-6.7 2.3L.725 9.725q-.3-.3-.3-.725t.325-.7q2.275-2.125 5.225-3.212T12 4q3.05 0 6.025 1.088T23.25 8.3q.3.275.313.7t-.288.725l-1.7 1.7q-.525-.25-1.1-.388t-1.2-.162L21.1 9.05q-1.975-1.5-4.3-2.275T12 6q-2.475 0-4.8.775T2.9 9.05l9.1 9.1l.875-.875q.025.625.163 1.2t.387 1.1l-.725.725q-.3.3-.7.3t-.7-.3Zm.7-8.225Z"/></svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="text-base font-medium text-pink-500">
                                                            Facility Add wifi
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            Interviews, tutorials and more
                                                        </p>
                                                    </div>
                                                </a>
                                                <a href="../wifi/wifi_facility_list.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white">
                                                    <div class="">
                                                    <svg  class="w-6 h-6 text-white group-hover:text-sky-800 md hydrated"  xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16"><path fill="currentColor" d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0h-13zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1zm9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0l-.396-.396zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/></svg>
                                                       
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="text-base font-medium text-pink-500">
                                                             Facility Wifi List
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            Trending designs to inspire you
                                                        </p>
                                                    </div>
                                                </a>
                                              
                                                <a href="../wifi/wifi_facility.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white">
                                                    <div class="">
                                                       
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white group-hover:text-sky-800 md hydrated"   width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M12 20.575q-.2 0-.375-.062T11.3 20.3L.7 9.7q-.3-.3-.288-.712T.725 8.3Q3.05 6.2 5.95 5.1T12 4q3.15 0 6.05 1.1t5.225 3.2q.3.275.313.688T23.3 9.7L12.7 20.3q-.15.15-.325.213t-.375.062Z"/></svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="text-base font-medium text-pink-500">
                                                            Facility Wifi Details
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            Interviews, tutorials and more
                                                        </p>
                                                    </div>
                                                </a>
                                                <a href="../wifi/wifi_facility_office_add.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white">
                                                    <div class="">
                                                       
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white group-hover:text-sky-800 md hydrated"  width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M18 18h-2q-.425 0-.713-.288T15 17q0-.425.288-.713T16 16h2v-2q0-.425.288-.713T19 13q.425 0 .713.288T20 14v2h2q.425 0 .713.288T23 17q0 .425-.288.713T22 18h-2v2q0 .425-.288.713T19 21q-.425 0-.713-.288T18 20v-2Zm-6.7 2.3L.725 9.725q-.3-.3-.3-.725t.325-.7q2.275-2.125 5.225-3.212T12 4q3.05 0 6.025 1.088T23.25 8.3q.3.275.313.7t-.288.725l-1.7 1.7q-.525-.25-1.1-.388t-1.2-.162L21.1 9.05q-1.975-1.5-4.3-2.275T12 6q-2.475 0-4.8.775T2.9 9.05l9.1 9.1l.875-.875q.025.625.163 1.2t.387 1.1l-.725.725q-.3.3-.7.3t-.7-.3Zm.7-8.225Z"/></svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="text-base font-medium text-pink-500">
                                                            Office Add wifi
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            Interviews, tutorials and more
                                                        </p>
                                                    </div>
                                                </a>
                                                <a href="../wifi/wifi_facility_office_list.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white">
                                                    <div class="">
                                                    <svg  class="w-6 h-6 text-white group-hover:text-sky-800 md hydrated"  xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16"><path fill="currentColor" d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0h-13zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1zm9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0l-.396-.396zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/></svg>
                                                       
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="text-base font-medium text-pink-500">
                                                             Office wifi List 
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            Trending designs to inspire you
                                                        </p>
                                                    </div>
                                                </a>
                                              
                                                <!-- <a href="../wifi/test.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white">
                                                    <div class="">
                                                       
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white group-hover:text-sky-800 md hydrated"  width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M18 18h-2q-.425 0-.713-.288T15 17q0-.425.288-.713T16 16h2v-2q0-.425.288-.713T19 13q.425 0 .713.288T20 14v2h2q.425 0 .713.288T23 17q0 .425-.288.713T22 18h-2v2q0 .425-.288.713T19 21q-.425 0-.713-.288T18 20v-2Zm-6.7 2.3L.725 9.725q-.3-.3-.3-.725t.325-.7q2.275-2.125 5.225-3.212T12 4q3.05 0 6.025 1.088T23.25 8.3q.3.275.313.7t-.288.725l-1.7 1.7q-.525-.25-1.1-.388t-1.2-.162L21.1 9.05q-1.975-1.5-4.3-2.275T12 6q-2.475 0-4.8.775T2.9 9.05l9.1 9.1l.875-.875q.025.625.163 1.2t.387 1.1l-.725.725q-.3.3-.7.3t-.7-.3Zm.7-8.225Z"/></svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="text-base font-medium text-pink-500">
                                                            Datatable
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            Interviews, tutorials and more
                                                        </p>
                                                    </div>
                                                </a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-3 p-2 shadow-xl lg:p-0 ">
                                        <div>
                                            <div class="relative grid gap-6 px-5 py-6 sm:gap-8 sm:p-8">
                                                <h3 class="text-xl font-medium text-pink-500">
                                                   INTERCOM DETAILS
                                                </h3>
                                                <a href="../Intercom/facilityintercom.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white">
                                                    <div class="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="w-6 h-6 text-white group-hover:text-sky-800 md hydrated"  viewBox="0 0 24 24"><path fill="currentColor" d="M17 19h2V5h-2v14ZM7 14q.425 0 .713-.288T8 13q0-.425-.288-.713T7 12q-.425 0-.713.288T6 13q0 .425.288.713T7 14Zm0 3q.425 0 .713-.288T8 16q0-.425-.288-.713T7 15q-.425 0-.713.288T6 16q0 .425.288.713T7 17Zm-1-6h8V7H6v4Zm4 3q.425 0 .713-.288T11 13q0-.425-.288-.713T10 12q-.425 0-.713.288T9 13q0 .425.288.713T10 14Zm0 3q.425 0 .713-.288T11 16q0-.425-.288-.713T10 15q-.425 0-.713.288T9 16q0 .425.288.713T10 17Zm3-3q.425 0 .713-.288T14 13q0-.425-.288-.713T13 12q-.425 0-.713.288T12 13q0 .425.288.713T13 14Zm0 3q.425 0 .713-.288T14 16q0-.425-.288-.713T13 15q-.425 0-.713.288T12 16q0 .425.288.713T13 17Zm4 4q-.575 0-1.012-.275T15.275 20H5q-.825 0-1.413-.588T3 18V6q0-.825.588-1.413T5 4h10.275q.275-.45.713-.725T17 3h2q.825 0 1.413.588T21 5v14q0 .825-.588 1.413T19 21h-2Z"/></svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="text-base font-medium text-pink-500">
                                                            Intercom Home
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            Trending designs to inspire you
                                                        </p>
                                                    </div>
                                                </a>
                                                <a href="../Intercom/facilityintercomadd.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white">
                                                    <div class="">
                                                       
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white group-hover:text-sky-800 md hydrated"    width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m9.367 3.312l.86 2.027c.374.883.166 1.922-.514 2.568L7.818 9.705c.117 1.076.479 2.135 1.085 3.178a8.678 8.678 0 0 0 2.27 2.594l2.276-.759c.863-.287 1.802.043 2.33.82l1.233 1.81c.615.904.504 2.15-.259 2.917l-.817.82c-.814.818-1.977 1.114-3.052.779c-2.54-.792-4.873-3.144-7.003-7.054c-2.133-3.916-2.886-7.239-2.258-9.968c.264-1.148 1.081-2.063 2.149-2.404l1.076-.344c1.009-.322 2.087.199 2.519 1.218Zm7.781-1.31l.102-.006a.75.75 0 0 1 .743.648l.007.102V6h3.252a.75.75 0 0 1 .743.649l.007.102a.75.75 0 0 1-.648.743l-.102.007H18v3.248a.75.75 0 0 1-.648.743l-.102.007a.75.75 0 0 1-.743-.648l-.007-.102V7.5h-3.252a.75.75 0 0 1-.743-.647l-.007-.102a.75.75 0 0 1 .649-.743L13.248 6H16.5V2.745a.75.75 0 0 1 .648-.743l.102-.007l-.102.007Z"/></svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="text-base font-medium text-pink-500">
                                                            Intercom Entry
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            Interviews, tutorials and more
                                                        </p>
                                                    </div>
                                                </a>
                                                <a href="../Intercom/facilityintercomlist.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white">
                                                    <div class="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white group-hover:text-sky-800 md hydrated"  width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M2 21q-.825 0-1.413-.588T0 19V5q0-.825.588-1.413T2 3h20q.825 0 1.413.588T24 5v14q0 .825-.588 1.413T22 21H2Zm7-7q1.25 0 2.125-.875T12 11q0-1.25-.875-2.125T9 8q-1.25 0-2.125.875T6 11q0 1.25.875 2.125T9 14Zm10 4l2-2l-1.5-2h-1.65q-.15-.45-.25-.963T17.5 12q0-.525.1-1.012t.25-.988h1.65L21 8l-2-2q-1.35 1.05-2.175 2.663T16 12q0 1.725.825 3.338T19 18ZM2.1 19h13.8q-1.05-1.875-2.9-2.938T9 15q-2.15 0-4 1.063T2.1 19Z"/></svg>
                                                        
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="text-base font-medium text-pink-500">
                                                            Intercom list
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            Interviews, tutorials and more
                                                        </p>
                                                    </div>
                                                </a>
                                              
                                                <a href="../superuser/masterdepartment.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white">
                                                    <div class="">
                                                       
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white group-hover:text-sky-800 md hydrated"    width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m9.367 3.312l.86 2.027c.374.883.166 1.922-.514 2.568L7.818 9.705c.117 1.076.479 2.135 1.085 3.178a8.678 8.678 0 0 0 2.27 2.594l2.276-.759c.863-.287 1.802.043 2.33.82l1.233 1.81c.615.904.504 2.15-.259 2.917l-.817.82c-.814.818-1.977 1.114-3.052.779c-2.54-.792-4.873-3.144-7.003-7.054c-2.133-3.916-2.886-7.239-2.258-9.968c.264-1.148 1.081-2.063 2.149-2.404l1.076-.344c1.009-.322 2.087.199 2.519 1.218Zm7.781-1.31l.102-.006a.75.75 0 0 1 .743.648l.007.102V6h3.252a.75.75 0 0 1 .743.649l.007.102a.75.75 0 0 1-.648.743l-.102.007H18v3.248a.75.75 0 0 1-.648.743l-.102.007a.75.75 0 0 1-.743-.648l-.007-.102V7.5h-3.252a.75.75 0 0 1-.743-.647l-.007-.102a.75.75 0 0 1 .649-.743L13.248 6H16.5V2.745a.75.75 0 0 1 .648-.743l.102-.007l-.102.007Z"/></svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="text-base font-medium text-pink-500">
                                                            Master Department
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            Interviews, tutorials and more
                                                        </p>
                                                    </div>
                                                </a>
                                                <a href="../superuser/masterfacility.php" class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl group hover:bg-white">
                                                    <div class="">
                                                       
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white group-hover:text-sky-800 md hydrated"    width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m9.367 3.312l.86 2.027c.374.883.166 1.922-.514 2.568L7.818 9.705c.117 1.076.479 2.135 1.085 3.178a8.678 8.678 0 0 0 2.27 2.594l2.276-.759c.863-.287 1.802.043 2.33.82l1.233 1.81c.615.904.504 2.15-.259 2.917l-.817.82c-.814.818-1.977 1.114-3.052.779c-2.54-.792-4.873-3.144-7.003-7.054c-2.133-3.916-2.886-7.239-2.258-9.968c.264-1.148 1.081-2.063 2.149-2.404l1.076-.344c1.009-.322 2.087.199 2.519 1.218Zm7.781-1.31l.102-.006a.75.75 0 0 1 .743.648l.007.102V6h3.252a.75.75 0 0 1 .743.649l.007.102a.75.75 0 0 1-.648.743l-.102.007H18v3.248a.75.75 0 0 1-.648.743l-.102.007a.75.75 0 0 1-.743-.648l-.007-.102V7.5h-3.252a.75.75 0 0 1-.743-.647l-.007-.102a.75.75 0 0 1 .649-.743L13.248 6H16.5V2.745a.75.75 0 0 1 .648-.743l.102-.007l-.102.007Z"/></svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <p class="text-base font-medium text-pink-500">
                                                            Master Facility
                                                        </p>
                                                        <p class="mt-1 text-lg text-white group-hover:text-sky-800">
                                                            Interviews, tutorials and more
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="grid grid-cols-1 gap-3 p-2 lg:p-0 bg-gray-50 rounded-2xl">
                                        <div class="grid items-start h-full gap-6 px-5 py-6 sm:gap-8 sm:p-8">
                                            <h3 class="text-base font-medium text-blue-400">
                                                Getting started
                                            </h3>
                                            <div class="space-y-2">
                                                <a href="#" class="flex items-start text-sm font-medium transition duration-150 ease-in-out rounded-lg hover:text-sky-800">
                                                    Explore design work
                                                </a>
                                                <a href="#" class="flex items-start text-sm text-white transition duration-150 ease-in-out rounded-lg hover:text-sky-800">
                                                    Register
                                                </a>
                                                <a href="#" class="flex items-start text-sm text-white transition duration-150 ease-in-out rounded-lg hover:text-sky-800">
                                                    Adding users
                                                </a>
                                                <a href="#" class="flex items-start text-sm text-white transition duration-150 ease-in-out rounded-lg hover:text-sky-800">
                                                    Video Tutorials
                                                </a>
                                                <a href="#" class="flex items-start text-sm text-white transition duration-150 ease-in-out rounded-lg hover:text-sky-800">
                                                    Libraries and SDKs
                                                </a>
                                                <a href="#" class="inline-flex items-start text-sm text-white transition duration-150 ease-in-out rounded-lg hover:text-sky-800">
                                                    Adding Plugins
                                                </a>
                                                <a href="#" class="inline-flex items-start text-sm text-white transition duration-150 ease-in-out rounded-lg hover:text-sky-800">
                                                    Dashboard templates
                                                </a>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <!-- <div class="w-full px-4 mx-auto 2xl:max-w-7xl sm:px-6 bg-gray-50 lg:px-8">
                                <div class="grid justify-between w-full grid-cols-1 px-4 py-5 mx-auto 2xl:max-w-7xl sm:px-6 lg:px-8 md:grid-cols-2">
                                    <div class="items-center space-y-3 lg:space-y-0 lg:space-x-3 lg:inline-flex">
                                        <a href="#" class="flex items-center p-3 text-base font-medium text-pink-500 rounded-md lg:-m-3 hover:bg-gray-100">
                                            <ion-icon class="w-6 h-6 md hydrated" name="cash-outline" role="img" aria-label="cash outline"></ion-icon>
                                            <span class="ml-3">
                                                Pricing
                                            </span>
                                        </a>
                                        <a href="#" class="flex items-center p-3 text-base font-medium text-pink-500 rounded-md lg:-m-3 hover:bg-gray-100">
                                            <ion-icon class="w-6 h-6 md hydrated" name="play-outline" role="img" aria-label="play outline"></ion-icon>
                                            <span class="ml-3">
                                                Tutorials
                                            </span>
                                        </a>
                                    </div>

                                    <div class="justify-end lg:ml-auto">
                                        <a href="#" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-pink-500 bg-black rounded-full group focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 hover:bg-gray-700 active:bg-gray-800 active:text-pink-500 focus-visible:outline-black">
                                            Contact Sales
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- <a class="px-2 py-2 text-sm text-white lg:px-6 md:px-3 hover:text-blue-600" href="#">
                    Pricing
                </a> -->
                <div class="inline-flex items-center gap-2 list-none lg:ml-auto">

                    <p class="mr-3 text-xl font-semibold text-white">Welcome,<?php echo $_SESSION['empname']; ?></p>

                    <!-- <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-pink-500 bg-black rounded-full group focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 hover:bg-gray-700 active:bg-gray-800 active:text-pink-500 focus-visible:outline-black">
                        Sign up
                    </button> -->
                    <a href="../logout.php" class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-pink-600 border border-pink-700 rounded-md shadow-sm hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500" data-rounded="rounded-md" data-primary="blue-600" data-primary-reset="{}">
                        Log out
                    </a>
                </div>
            </nav>
        </div>
    </div>
</body>

</html>