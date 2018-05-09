<?php
	if (isset($_POST['btRegister'])){
		//registar novo utilizador
		$name = $_POST['name'];
		$email = $_POST['email'];
        $password = md5($_POST['password']);
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $image = 'https://d30y9cdsu7xlg0.cloudfront.net/png/17241-200.png';
        $about = "";
		include_once('DataAccess.php');
		$da = new DataAccess();
		$da->inserirUtilizador($name, $email, $password, $gender, $birthday, $image, $about);
		// Se o utilizador for registado com sucesso vamos ser automaticamente direcionados para o início
		echo "<script>alert('Utilizador registado com sucesso'); window.location='index.php'</script>";
	}
?>
<head>
    <!-- Meter a página em UTF-8 para que os sinais não apareçam com caracteres esquisitos -->
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>
    
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <section id="registerForm" style='display: none;'>
        <div class="container" id="Register" style="width: 35%; overflow: hidden;">
            <div style="width: 100%; float: left;" id="Register">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <form method='post' action='index.php'>
                    <h1 align="center">Register</h1>
					<div style="width:100%; margin-top: 10%;">
						<p class="registerParagraph1">Name: <input class="loginInput" type="Text" name="name" id="name" required></p>
					</div>
					<div style="width:100%; margin-top: 5%;">
                        <p class="loginParagraph">E-mail: <input class="loginInput" type="Text" name="email" id="email" required>
					</div>
					<div style="width:100%; margin-top: 5%;">
                        <p class="registerParagraph2">Password: <input class="loginInput" type="password" name="password" id="password" required>
					</div>
					<div style="width:100%; margin-top: 5%;">
                        <p class="registerParagraph3">Repeat Pass: <input class="loginInput" type="password" name="password1" id="password1" required>
					</div>
                    <div style="width:40%; float: left; margin-top: 5%;" align="center">
                        <input type="radio" name="gender" value="Male"><p>Male</p><br>
                    </div>
                    <div style="width:40%; float: right; margin-top: 5%;" align="center">
                        <input type="radio" name="gender" value="Female"><p>Female</p><br>
                    </div>
                    <div style="width:100%; margin-top: 5%; margin-left:3%" align="center">
                        <input id="birthday" type="date" name="birthday">
                    </div>
					<div style='width:100%; margin-top:10%;' align="center">
						 <!--Ao clicarmos no botão Registar o programa vão ver se as passwords estão coincidem e vai ver se o email está de forma correta -->
                        <!--<button type="button" class="btn" id="btRegister" name="register" onclick='return validarFormulario()'>Register</button>-->
                        <input class='button' type='submit' value='Registar' name='btRegister' id='btRegister' onclick='return validarFormulario()'>
                    </div>
                </form>
                <script>
                    // Vai verificar se o email está bem inserido
                    function validarFormulario(){
                    var email = document.getElementById('email');
                    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;				
                    
                    if (!filter.test(email.value)) {
                        alert('Wrong Email');
                        email.focus();
                        return false;
                        }
                        //alert('email ok');				
                        //validar as password
                        var pwd1 = document.getElementById('password');
                        var pwd2 = document.getElementById('password1');
                        
                        if (pwd1 == pwd2 && pwd1 != ""){
                            //alert('tudo ok');
                            return true;						
                        }else{
                            alert('Wrong Password');
                            pwd1.focus();
                            return false;
                        }						
                    }					
                    return false;
                </script>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>