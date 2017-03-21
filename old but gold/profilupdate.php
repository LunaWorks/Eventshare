<?php
	session_start(); // $_SESSION tomb inicializalasa

	if (!isset($_SESSION['logged_in'])) {
		header('Location: index.php');
	}

	function updateUser($id,$name) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "sharebase";

		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn->query("set names utf8");
		$sql = "UPDATE users SET name='$name' WHERE id=$id";
		return ($conn->query($sql) === TRUE);
	}

	function savePicture($id,$picture) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "sharebase";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "UPDATE users SET picture='$picture' WHERE id=$id";
		return ($conn->query($sql) === TRUE);
	}

	if (isset($_POST['name']) && !empty(trim($_POST['name'])) && isset($_POST['modosit'])) {
		if (updateUser($_SESSION['logged_in']['id'],$_POST['name'])) {
			$_SESSION['logged_in']['name'] = $_POST['name'];
			header('Location: index.php');
		} else {
			echo "Hiba az adatok frissitesekor. Probald ujra!";
		}
	} elseif (isset($_POST['megse'])) {
		header('Location: index.php?valami=profile');
	}


	if (isset($_POST['image_submit'])) {
		$target_dir = "kepek/";
		$target_file = $target_dir . basename($_FILES["picture"]["name"]);

		if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
			savePicture($_SESSION['logged_in']['id'],$target_file);
			$_SESSION['logged_in']['picture'] = $target_file;
    } else {
        echo "Hiba tortent a kep feltoltese soran. Probald ujra.";
    }

	}

?>
