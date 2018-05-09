<?php
// Vai buscar o id do utilizador que tem a sessão iniciada
session_start();
if (!isset($_SESSION['ut_id'])){
		// Se o não conseguir buscar o id somos automaticamente direcionados para a página de Início
		echo "<script>window.location='index.php';</script>";
	}
?>
<!-- Meter a página em UTF-8 para que os sinais não apareçam com caracteres esquisitos -->
<meta charset ="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="ironman.png" type="image/png" />
<link href="css/style.css" rel="stylesheet" type="text/css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body>
    <?php include_once('searchBar.php') ?>

	<section id="menu">
		<div class="topnav" id="myTopnav">
			<a href="home.php" class="active">HOME</a>
			<a href="perfil.php">PROFILE</a>
			<a href="#contact">TV-SERIES</a>
			<a href="#about">NEWS</a>
			<a href="#about">GENRES</a>
			<a href="#about">A-Z LIST</a>
			<a href="logout.php">LOGOUT</a>
		</div>
	</section>
</body>