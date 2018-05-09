<?php 
    // Vai buscar o id do utilizador que tem a sessão iniciada
    session_start();
    if (!isset($_SESSION['ut_id'])){
		// Se o não conseguir buscar o id somos automaticamente direcionados para a página de Início
		echo "<script>window.location='index.php';</script>";
    }
    include('DataAccess.php');

    if(!isset($_POST['go'])){
        header("Location:home.php");
    }
    $aVar = mysqli_connect('localhost','root','','projetopw');
    $search_sql = mysqli_query($aVar, "SELECT * FROM utilizadores WHERE ut_name like '%".$_POST['search']."%'");
    if(mysqli_num_rows($search_sql) != 0){
        $search_rs=mysqli_fetch_assoc($search_sql);
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
            <a href="home.php">HOME</a>
            <a href="perfil.php">PROFILE</a>
            <a href="#contact">TV-SERIES</a>
            <a href="#about">NEWS</a>
            <a href="#about">GENRES</a>
            <a href="#about">A-Z LIST</a>
            <a href="logout.php">LOGOUT</a>
        </div>
    </section>
    <script>
        function showProfile(){
            document.getElementById('searchresults').style.display = "none";
            document.getElementById('profileUser').style.display = "block";
        }
    </script>
    <section id="searchresults" style="display: block;">
        <h3>Search Results</h3>
        <?php 
            if(mysqli_num_rows($search_sql) != 0)
            {
                do{ ?>
                    <h4><?php echo $search_rs['ut_name']; ?></h4>
                    <h4><?php echo   "<a onclick='showProfile()'><image id='showImage' src='".$search_rs['ut_image']."'></image></a>"; ?></h4>
                <?php } while($search_rs=mysqli_fetch_assoc($search_sql));
            }
            else echo "<h4>No results found</h4>";
        ?>
    </section>
    <section id="profileUser" style="display: none;">
        <div class="container" style="width:80%;">
            <div class="image">
                <?php
                    if(mysqli_num_rows($search_sql) != 0)
                    {
                        echo "<image id='imageProfile' src='".$search_rs['ut_image']."'></image>";
                    }
                    else echo "<h4>No results found</h4>";
                ?>
            </div>
            <div class="profileInfo" id="personalInfo">
                <?php
                    if(mysqli_num_rows($search_sql) != 0)
                    {
                    echo "<h4>Name: ".$search_rs['ut_name']."</h4>
                        <h4>Gender: ".$search_rs['ut_gender']."</h4>";
                    }
                    else echo "<h4>No results found</h4>";
                ?>
            </div>
            <div class="profileAbout" id="additionalInfo">
                <?php
                    if(mysqli_num_rows($search_sql) != 0)
                    {
                        if($search_rs['ut_about'] != null)
                        {
                            echo "<h4>About: ".$search_rs['ut_about']."</h4>";
                        }
                        else echo "<h4>About: This person didn't wrote about him.</h4>";
                    }
                    else echo "<h4>No results found</h4>";
                ?>
            </div>
        </div>
    </section>
</body>