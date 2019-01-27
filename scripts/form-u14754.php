<?php
	// repair
	$username="";
	$password="";

    //khoi dong bo nho session
	session_start();
	if (isset($_POST["username"])) {
		$username = $_POST["username"];	
	}
	if (isset($_POST["password"])) {
		$password = $_POST["password"];
	}
	// ket noi databse
	include("../config.php");

	//bat dau xy ly
	$_log = $_POST["u14755-4"];
	echo $_log;
	if ($_log == "login") { 
		// bat dau xu ly dang nhap
		$red = mysqli_query($con,'SELECT * FROM login WHERE username="'.$username.'" AND password="'.$password.'"');
		$row = mysqli_num_rows($red);
		if ($row>0) {
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			$_SESSION["loginstatus"] = 'login connect';
			header("location: ../index.php"); 
		} else {
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			$_SESSION["loginstatus"] = 'login fail';
			header("location: ../index.php");
		}
	}
	if ($_log == "logout") {
		// bat dau xu ly dang xuat
		session_destroy();
		session_unset();
		// tro ve trang chu
		header("location: ../index.php");
	}
?>