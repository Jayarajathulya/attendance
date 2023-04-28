<?php 
include('../include/config.php');
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="/dist/output.css" rel="stylesheet">
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


<script>
       function getBrncode0 (val) {
        // alert('val');

        $.ajax({
            type: "POST",
            url: "../depentdb0.php",
            data: 'country=' + val,
            success: function(data) {
                console.log(data);
                $("#state").html(data);

            }
        });
    }
    function getBrncode1(val) {
        // alert('val');

        $.ajax({
            type: "POST",
            url: "../depentdb1.php",
            data: 'state=' + val,
            success: function(data) {
                console.log(data);
                $("#city").html(data);

            }
        });
    }

    function getBrncode2(val1) {
        // alert('val');

        $.ajax({
            type: "POST",
            url: "../depentdb2.php",
            data: 'city=' + val1,
            success: function(data1) {
                $("#branchname").html(data1);
                //console.log("d");  
            }
        });
        console.log("this");
    }

    function chat0(val) {

$.ajax({
    type: "POST",
    url: "../tower0.php",
    data: 'branchname=' + val,
    success: function(data) {
        $("#towername").html(data);

    }
});
}

            function chat(val) {

                $.ajax({
                    type: "POST",
                    url: "../tower1.php",
                    data: 'towername=' + val,
                    success: function(data) {
                        $("#floor").html(data);

                    }
                });
            }
            

            function chat1(val1) {
        // alert('val');

        $.ajax({
            type: "POST",
            url: "../tower2.php",
            data: 'floor=' + val1,
            success: function(data1) {
                $("#office_client").html(data1); 
            }
        });
        console.log("this");
    }

    function chat2(val1) {
        // alert('val');

        $.ajax({
            type: "POST",
            url: "../tower3.php",
            data: 'office_client=' + val1,
            success: function(data1) {
                $("#room").html(data1); 
            }
        });
        console.log("this");
    }
            </script>


<script>
    function chat3(val) {
        $.ajax({
            type: "POST",
            url: "../tower4.php",
            data: 'room=' + val,
            success: function(data) {
                var wifiData = JSON.parse(data);
                $("#wifiname").val(wifiData[0]); 
                $("#wifipassword").val(wifiData[1]); 
                $("#intercom").val(wifiData[2]); 
            }
        });
    }
</script>
</head>
<body>
<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>

            <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>
