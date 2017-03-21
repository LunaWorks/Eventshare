
<?php

session_start();
// Kezdő oldal.

if (isset($_POST['logout'])) {
  unset($_SESSION['logged_in']);
  setcookie('felhasznalo','',0);
  setcookie('jelszo','',0);
  header('Location: index.php');
}



function getUser($name) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sharebase";

  $conn = new mysqli($servername, $username, $password, $dbname);
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
                    echo "bejelentkezve!";
                    break;
                  case 'admin':
                    header('Location: admin.php');
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
