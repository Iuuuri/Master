<head>
    <!-- Meter a página em UTF-8 para que os sinais não apareçam com caracteres esquisitos -->
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <section id="loginForm" style='display: none;'>
		<div class="container" id="Login" style="width: 35%; overflow: hidden;">
			<div style="width: 100%; float: left;" id="Login">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<form method='post' action='verifyLogin.php'>
					<h1 align="center">Login</h1>
					<div style="width:100%; margin-top: 10%;">
					    <p class="loginParagraph">E-mail: <input class="loginInput" type="Text" name="email" required></p>
					</div>
					<div style="width:100%; margin-top: 5%;">
                    <p class="loginParagraph2">Password: <input class="loginInput" type="password" name="password" id="password2" required></p>
					</div>
					<div style="width: 100%; margin-top: 15%;" align="center">
                        <!--<button type="button" class="btn" id="login" name="login">Login</button>-->
                        <input class="medium button" type="submit" value="Login" id="login" name="login">
					</div>
				</form>
			</div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
