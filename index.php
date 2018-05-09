<head>
    <!-- Meter a página em UTF-8 para que os sinais não apareçam com caracteres esquisitos -->
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Index</title>
    
    <link href="css/style.css" rel="stylesheet" type="text/css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script>
        function openNavLogin() {
            document.getElementById("loginForm").style.width = "250px";
            document.getElementById("indexStart").style.marginRight = "450px";
            document.getElementById('loginForm').style.display = "block";
            document.getElementById('registerForm').style.display = "none";
        }
        function openNavRegister() {
            document.getElementById("loginForm").style.width = "250px";
            document.getElementById("indexStart").style.marginRight = "450px";
            document.getElementById('loginForm').style.display = "none";
            document.getElementById('registerForm').style.display = "block";
        }
        function closeNav() {
            document.getElementById("loginForm").style.width = "0";
            document.getElementById("registerForm").style.width = "0";
            document.getElementById("indexStart").style.marginRight= "0";
            document.getElementById('loginForm').style.display = "none";
            document.getElementById('registerForm').style.display = "none";
        }
    </script>
</head>
<body id="indexBody">
    <!-- Seve para chamar as páginas do register e do login sem precisar de fazer refresh -->
    <?php
        include_once('register.php');
        include_once('login.php');
    ?>
    <section id="indexStart">
        <div class="container" id="indexContainer" style="overflow: hidden;" align="center">
            <h1>MoviesDB</h1>
            <p>This is a website where you can search information about movies and cinema</p>
            <button type="button" class="btn" style="margin-right: 4%" onClick="openNavLogin()">Sign In</button>
            <button type="button" class="btn" style="margin-left: 4%" onClick="openNavRegister()">Sign Up</button>
        </div>
    </section>
</body>