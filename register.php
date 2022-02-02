<?php 
	session_start();
    /* Recebendo os dados do formulário */
	$name = $_POST['name'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$nameArray = explode(' ', $name);
	$fname = $nameArray[0];
	
	$_SESSION['name'] = $name;
	$_SESSION['fname'] = $fname;
	$_SESSION['city'] = $city;
	$_SESSION['email'] = $email;
	$_SESSION['phone'] = $phone;
	header("location:cadastro.php");
?>