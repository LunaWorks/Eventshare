<?php
include_once("mydb.php");

if (isset($_POST['logout'])) {
	$userid =  $_SESSION['logged_in']['id'];

	$conn = MyDB::getConnection();
	$conn->query("set names utf8");
	$login_tym = date('Y-m-d H:i:s');
	$sql = "UPDATE users SET  lastsign = '$login_tym' WHERE  id = '$userid'";
	$lol = $conn->query($sql);

	loggedout();
	toLog();
	unset($_SESSION['logged_in']);
	setcookie('felhasznalo','',0);
	setcookie('jelszo','',0);
	header('Location: index.php');

}


function logged() {
	$conn = MyDB::getConnection();
	$conn->query("set names utf8");
	$name = $_POST['username'];
	$sql = "UPDATE users SET loggedin = '1' WHERE username = '$name'";
	$result = $conn->query($sql);
	if($result === TRUE){
	} else {
		echo "HIBA!";

	}
}

function loggedout() {
	$conn = MyDB::getConnection();
	$conn->query("set names utf8");
	$id = $_SESSION['logged_in']['id'];
	$sql = "UPDATE users SET loggedin = '0' WHERE id = '$id'";
	$result = $conn->query($sql);
	if($result === TRUE){
	} else {
		echo "HIBA!";

	}


}

function toLog() {
	$conn = MyDB::getConnection();
	$conn->query("set names utf8");
	if($_SESSION['logged_in']['legitimacy'] == 'diak'){
		$id = $_SESSION['logged_in']['id'];
		$sql = "INSERT INTO  adminlog (userid,descreption,whendate) VALUES ('$id','Kijelentkezett',now())";
		$result = $conn->query($sql);
		if($result === TRUE){
		} else {
			echo "HIBA!";

		}
	}


}

function toLogging() {
	$conn = MyDB::getConnection();
	$conn->query("set names utf8");
	$id = $_SESSION['logged_in']['id'];
	$sql = "INSERT INTO  adminlog (userid,descreption,whendate) VALUES ('$id','Bejelentkezett',now())";
	$result = $conn->query($sql);
	if($result === TRUE){
	} else {
		echo "HIBA!";

	}


}


function getUser($name) {
	$conn = MyDB::getConnection();
	$conn->query("set names utf8");
	$sql = "SELECT * FROM users where username = '$name' limit 1";
	$result = $conn->query($sql);

	return $result->fetch_assoc();
}


if (
	(isset($_POST['username']) && !empty(trim($_POST['username']))
	&& isset($_POST['password']) && !empty(trim($_POST['password'])))
	||
	(isset($_COOKIE['user']) && isset($_COOKIE['password']))
) {

	if (isset($_COOKIE['user'])) {
		$keresett_felhasznalo = $_COOKIE['user'];
		$keresett_jelszo = $_COOKIE['password'];
	} else {
		$keresett_felhasznalo = $_POST['username'];
		$keresett_jelszo = $_POST['password'];
	}

	$user = getUser($keresett_felhasznalo);

	if ($user) {
		if ($user['password'] == md5($keresett_jelszo)) {
			$_SESSION['logged_in'] = $user;

			if (isset($_POST['rememberme'])) {
				setcookie('user',$_POST['username'], time() + 60*60);
				setcookie('password',$_POST['password'], time() + 60*60);
			}


			if(isset($_POST['login'])){

				if($user['available'] == '1'){
					switch ($user['legitimacy']) {
						case 'diak':
						include("main/profile/greetings.php");
						logged();
						toLogging();
						break;
						case 'admin':
						header("location: admin.php");

						break;
					}
				} else {
					echo "Fel vagy függesztve!";
				}
			}
		} else {
			print "Nem jo a jelszo. Talalgass tovabb!";
		}
	} else {
		echo "Nincs ilyen felhasznalo";
	}

}
