<?php
	// Utilizamos session_destroy para fazer logout à sessão iniciada e voltamos ao início
	session_start();
	session_destroy();
	echo "<script>window.location='index.php'</script>";
?>