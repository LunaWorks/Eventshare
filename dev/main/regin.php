<?php
$lol = null;
function registerUser($namereg,$usernamereg,$password,$agereg){
 //Ha form lefut, illesze be az adatokat az adatbázisba.
 $servername = "localhost";
 $connUser = "root";
 $connPass = "";
 $dbname = "sharebase";

 $conn = new mysqli($servername, $connUser, $connPass, $dbname);
 $login_tym = date('Y-m-d H:i:s');
 	$conn->query("set names utf8");
 $sql = "INSERT INTO users (name, username, password, age, legitimacy,logindate,available)
            VALUES ('$namereg', '$usernamereg', '".md5($passwordreg)."', '$agereg','diak','$login_tym','0')";
    $lol = $conn->query($sql);
 return ($lol === TRUE);
 }
 if (isset($_POST['namereg']) && !empty(trim($_POST['nameregreg']))
		&& isset($_POST['usernamereg']) && !empty(trim($_POST['usernameregr']))
		&& isset($_POST['passwordreg']) && !empty(trim($_POST['passwordreg']))
    && isset($_POST['agereg']) && !empty(trim($_POST['agereg'])))  {

      $try = registerUser($_POST['namereg'],$_POST['usernamereg'],$_POST['passwordreg'],$_POST['agereg']);
		if ($try) {
			echo 'Fiok letrehozva, <a href="index.php">jelentkezz be</a>.';
		} else {
			echo 'Valami hiba tortent, probald ujra!';
		}
	}

?>
