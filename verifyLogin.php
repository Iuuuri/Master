<!-- Meter a codificação em utf 8 -->
<meta charset="utf-8">
<?php
if (isset($_POST['login'])){
		//tentar efetuar login
		$email = $_POST['email'];
		$pwd = md5($_POST['password']); //md5 serve para encriptar a password
		include_once('DataAccess.php');
		$da = new DataAccess();
		$res = $da->login($email, $pwd);
		//echo $pwd;
		if (mysqli_num_rows($res) > 0) {
			$row = mysqli_fetch_object($res);
			session_start();
			$_SESSION['ut_id'] = $row->ut_id;
			// Se o email e a password forem encontrados na base de dados o login será efetuado com sucesso
			echo "<script>alert('Login Succeded!'); window.location='home.php'</script>";
		}else{	
			// Se o email e a password não forem encontrados na base de dados o login não será feito com sucesso
			echo "<script>alert('Login Failed'); window.location='index.php'</script>";
		}
	}
?>