<?php
// Vai buscar o id do utilizador que tem a sessão iniciada
session_start();
if (!isset($_SESSION['ut_id'])){
		// Se o não conseguir buscar o id somos automaticamente direcionados para a página de Início
		echo "<script>window.location='index.php';</script>";
    }
    else{
        if(isset($_POST['botaoSave']))
        {
            $ut_id = $_SESSION['ut_id'];
            $ut_name = $_POST['name'];
            $ut_gender = $_POST['gender'];
            $ut_about = $_POST['about'];
            include_once('DataAccess.php');
            $da = new DataAccess();
            // Aqui chamamos a função de editar o perfil de utilizador
            $da->saveBasicProfile($ut_id, $ut_name, $ut_gender, $ut_about);
            echo "<script>alert('Basic profile edited with success')</script>";
        }
        else if(isset($_POST['changePic']))
        {
            $ut_id = $_SESSION['ut_id'];
            $ut_image = "usersImages/".$_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'],"usersImages/".$_FILES['file']['name']);
            include_once('DataAccess.php');
            $da = new DataAccess();
            // Aqui chamamos a função de editar o perfil de utilizador
            $da->changePicture($ut_id, $ut_image);    
        }
        else  if(isset($_POST['botaoSave2']))
        {
            $ut_id = $_SESSION['ut_id'];
            $ut_email = $_POST['email'];
            $ut_birthday = $_POST['birthday'];
            $oldPass = md5($_POST['oldPass']);
            $newPass = md5($_POST['newPass']);
            include_once('DataAccess.php');
            $da = new DataAccess();
            // Aqui chamamos a função de editar o perfil de utilizador
            $res = $da->editAdvancedProfile($ut_id, $ut_email, $ut_birthday, $oldPass, $newPass);
            if ($res == true){
				// Se a password antiga estiver errada vai aparecer a seguinte mensagem
				echo "<script>alert('Old password is wrong')</script>";				
			}else{
				// Se estiver tudo correto vai aparecer a seguinte mensagem
				echo "<script>alert('Profile edited with success')</script>";
			}
        }
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
            <a href="perfil.php" class="active">PROFILE</a>
            <a href="#contact">TV-SERIES</a>
            <a href="#about">NEWS</a>
            <a href="#about">GENRES</a>
            <a href="#about">A-Z LIST</a>
            <a href="logout.php">LOGOUT</a>
        </div>
    </section>
    <script>
        function allowEditProfile(){
            document.getElementById('personalInfo').style.display = "none";
            document.getElementById('additionalInfo').style.display = "none";
            document.getElementById('edit').style.display = "none";
            document.getElementById('saveProfile').style.display = "block";
            document.getElementById('editPersonalInfo').style.display = "block";
            document.getElementById('change').style.display = "block";
        }

        function advancedEdit(){
            document.getElementById('editPersonalInfo').style.display = "none";
            document.getElementById('personalInfo').style.display = "none";
            document.getElementById('additionalInfo').style.display = "none";
            document.getElementById('personalInfo2').style.display = "block";
            document.getElementById('editAdvancedInfo').style.display = "none";
            document.getElementById('edit2').style.display = "block";
            document.getElementById('edit').style.display = "none";
            document.getElementById('advanced').classList.add('active');
            document.getElementById("basic").classList.remove('active');
        }

        function allowEditProfile2(){
            document.getElementById('editPersonalInfo').style.display = "none";
            document.getElementById('personalInfo').style.display = "none";
            document.getElementById('additionalInfo').style.display = "none";
            document.getElementById('editAdvancedInfo').style.display = "block";
            document.getElementById('personalInfo2').style.display = "none";
            document.getElementById('edit2').style.display = "none";
            document.getElementById('saveProfile2').style.display = "block";
            document.getElementById('advanced').classList.add('active');
            document.getElementById("basic").classList.remove('active');
        }

        function basicEdit(){
            document.getElementById('personalInfo2').style.display = "none";
            document.getElementById('editAdvancedInfo').style.display = "none";
            document.getElementById('editPersonalInfo').style.display = "none";
            document.getElementById('personalInfo').style.display = "block";
            document.getElementById('edit').style.display = "block";
            document.getElementById('edit2').style.display = "none";
            document.getElementById('basic').classList.add('active');
            document.getElementById("advanced").classList.remove('active');
        }
        
        function validarFormulario(){
            var email = document.getElementById('Email');
            var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;				
            
            if (!filter.test(email.value)) {
                alert('E-mail inválido');
                email.focus();
                return false;
            }else{
                return true;
            }
            
            return false;

            if (document.getElementById('newPass').value == document.getElementById('newPass2').value)
                return true;
            else{
                alert('As passwords não coincidem');
                return false;				
            }
        }

    </script>
    <section id="miniMenu">
        <div class="mininav" id="miniNav">
            <a onClick="basicEdit()" id="basic" style="cursor: pointer;" class='active'>Basic Edit</a>
            <a onClick="advancedEdit()" style="cursor: pointer;" id="advanced">Advanced Edit</a>
        </div>
    </section>
    <section id="profile" style="display: block";>
        <div class="container" style="width:80%;">
            <div class="editProfile" style="display:block; " id="edit"><image src="image/edit.png" style="height: 30px; width: 30px; cursor: pointer;" alt="Edit Profile" onclick="allowEditProfile()"></div>
            <div class="editProfile" style="display:none; " id="edit2"><image src="image/edit.png" style="height: 30px; width: 30px; cursor: pointer;" alt="Edit Profile" onclick="allowEditProfile2()"></div>
            <div class="image">
                <?php
				    $ut_id = $_SESSION['ut_id'];
                    include_once('DataAccess.php');
                    $da = new DataAccess();
                    $res = $da->getUtilizador($ut_id);
                    $row = mysqli_fetch_object($res);
                    echo "<image id='imageProfile' src='$row->ut_image'></image>";
                ?>
            </div>
            <div class="profileInfo" id="editPersonalInfo" style="display: none;">
                <?php
				    $ut_id = $_SESSION['ut_id'];
                    include_once('DataAccess.php');
                    $da = new DataAccess();
                    // Aqui vamos buscar as informações do utilizador que tem a sessão iniciada
                    $res = $da->getUtilizador($ut_id);
                    $row = mysqli_fetch_object($res);
                    // Basic profile
                    echo "
                        <form method='post' action='perfil.php'>
                            <input class='medium button' type='image' src='image/save.png' alt='submit' value='Editar' name='botaoSave' style='height: 30px; width: 30px; cursor: pointer; display:none; float:right; margin-top:0;' id='saveProfile'/>
                            <h4>Name: <input type='text' value='$row->ut_name' maxlength='40' name='name' id='name' required/></h4>
                            <h4>Gender: <div style='width:40%; margin-top: 1em;' align='center'>"; ?>
                            <input type='radio'  name='gender' <?php echo ($row->ut_gender=='Male')?'checked':'' ?> value='Male'><p>Male</p><br>
                            </div>
                            <div style='width:40%;' align='center'>
                                <input type='radio'  name='gender' <?php echo ($row->ut_gender=='Female')?'checked':'' ?>  value='Female'><p>Female</p><br>
                            </div></h4>
                            <?php
                            echo "<h4 class='profileAbout'>About: <input type='text' maxlength='250' value='$row->ut_about' name='about' id='about' /></h4></form>";
                            //Image
                            echo"<h4>Change Image</h4><form action='' method='post' enctype='multipart/form-data'>
                                    <input class='chooseFile' type='file' name='file'>
                                    <input style='margin-top:7em; margin-right:7em;' type='submit' name='changePic'>
                                </form>";
                ?>
            </div>
            <div class="profileInfo" id="editAdvancedInfo" style="display: none;">
                <?php
				    $ut_id = $_SESSION['ut_id'];
                    include_once('DataAccess.php');
                    $da = new DataAccess();
                    // Aqui vamos buscar as informações do utilizador que tem a sessão iniciada
                    $res = $da->getUtilizador($ut_id);
                    $row = mysqli_fetch_object($res);
                    // Advanced profile
                    echo "
                        <form method='post' action='perfil.php'>
                            <input class='medium button' type='image' src='image/save.png' alt='submit' value='Editar' onclick='return validarFormulario()' name='botaoSave2' style='height: 30px; width: 30px; cursor: pointer; display:none; float:right; margin-top:0;' id='saveProfile2'/>
                            <h4>Email: <input type='text' value='$row->ut_email' maxlength='50' name='email' id='email' required/></h4>
                            <h4>Birthday: <input id='birthday' type='date' name='birthday' value='$row->ut_birthday' required></h4>
                            <h4>Password: <input type='password' maxlength='100' name='oldPass' id='oldPass'/></h4>
                            <h4>New Password: <input type='password' maxlength='100' name='newPass' id='newPass'/></h4>
                            <h4>Repeat Password: <input type='password' maxlength='100' name='newPass2' id='newPass2'/></h4>
                        </form>";
                ?>
            </div>
            <div class="profileInfo" id="personalInfo2" style="display:none;">
                <?php
				    $ut_id = $_SESSION['ut_id'];
                    include_once('DataAccess.php');
                    $da = new DataAccess();
                    // Aqui vamos buscar as informações do utilizador que tem a sessão iniciada
                    $res = $da->getUtilizador($ut_id);
                    $row = mysqli_fetch_object($res);
                    echo "<h4>Email: $row->ut_email</h4>
                        <h4>Birthday: $row->ut_birthday</h4>";
                ?>
            </div>
            <div class="profileInfo" id="personalInfo">
                <?php
				    $ut_id = $_SESSION['ut_id'];
                    include_once('DataAccess.php');
                    $da = new DataAccess();
                    // Aqui vamos buscar as informações do utilizador que tem a sessão iniciada
                    $res = $da->getUtilizador($ut_id);
                    $row = mysqli_fetch_object($res);
                    echo "<h4>Name: $row->ut_name</h4>
                        <h4>Gender: $row->ut_gender</h4>";
                ?>
            </div>
            <div class="profileAbout" id="additionalInfo">
                <?php
				    $ut_id = $_SESSION['ut_id'];
                    include_once('DataAccess.php');
                    $da = new DataAccess();
                    // Aqui vamos buscar as informações do utilizador que tem a sessão iniciada
                    $res = $da->getUtilizador($ut_id);
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