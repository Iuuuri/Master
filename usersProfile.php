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
            <a href="perfil.php" class="active">PROFILE</a>
            <a href="#contact">TV-SERIES</a>
            <a href="#about">NEWS</a>
            <a href="#about">GENRES</a>
            <a href="#about">A-Z LIST</a>
            <a href="logout.php">LOGOUT</a>
        </div>
    </section>
    <section id="profileUser" style="display: block;">
        <div class="container" style="width:80%;">
            <div class="image">
                <?php
                    include_once('DataAccess.php');
                    $da = new DataAccess();
                    $res = $da->getUsers();
                    $row = mysqli_fetch_object($res);
                    echo "<image id='imageProfile' src='$row->ut_image'></image>";
                ?>
            </div>
        <div class="profileInfo" id="personalInfo">
            <?php
                include_once('DataAccess.php');
                $da = new DataAccess();
                // Aqui vamos buscar as informações do utilizador que tem a sessão iniciada
                $res = $da->getUsers();
                $row = mysqli_fetch_object($res);
                echo "<h4>Name: $row->ut_name</h4>
                    <h4>Gender: $row->ut_gender</h4>";
            ?>
        </div>
        <div class="profileAbout" id="additionalInfo">
                <?php
                    include_once('DataAccess.php');
                    $da = new DataAccess();
                    // Aqui vamos buscar as informações do utilizador que tem a sessão iniciada
                    $res = $da->getUsers();
                    $row = mysqli_fetch_object($res);
                    if($row->ut_about != null)
                    {
                        echo "<h4>About: $row->ut_about</h4>";
                    }
                    else echo "<h4>About: This person didn't wrote about him.</h4>";
                ?>
            </div>
        </div>
    </section>
</body>