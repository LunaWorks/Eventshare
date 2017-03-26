<?php
include_once("mydb.php");

function updateUser($id,$name,$newpass) {

	$old = $_POST['oldpass'];

	$conn = MyDB::getConnection();
	$conn->query("set names utf8");
	$sql = "UPDATE users SET name='$name',password= md5('$newpass') WHERE id='$id'";
	return ($conn->query($sql) === TRUE);
}

function savePicture($id,$picture) {
	$conn = MyDB::getConnection();
	$sql = "UPDATE users SET picture='$picture' WHERE id=$id";
	return ($conn->query($sql) === TRUE);
}
if(isset($_POST['modosit'])){
	$valid = $_POST['oldpass'];
	if (isset($_POST['name']) && isset($_POST['oldpass']) && isset($_POST['newpass']) && !empty(trim($_POST['newpass'])) &&!empty(trim($_POST['oldpass'])) && !empty(trim($_POST['name'])) && (md5($valid) == $_SESSION['logged_in']['password'])) {
		if (updateUser($_SESSION['logged_in']['id'],$_POST['name'],$_POST['newpass'])) {
			$_SESSION['logged_in']['name'] = $_POST['name'];
			echo "frissitve!";
		} else {
			echo "Hiba az adatok frissitesekor. Probald ujra!";
		}
	}
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
