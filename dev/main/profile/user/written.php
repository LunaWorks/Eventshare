<?php
include_once("mydb.php");

function saveData($tartalom){
	$conn = MyDB::getConnection();


	$id = $_POST['szerzoknek'];
	$login_tym = date('Y-m-d H:i:s');
	$usersid = $_SESSION['logged_in']['id'];
	$sql = "INSERT INTO message (usersid,date,what,otherid)
	VALUES ('$usersid','$tartalom','$login_tym','$id')";

	$result = $conn->query($sql);

	if($result === true){
		echo "Az adatok modosítva lettek!";
	} else {
		var_dump($result);
	}

}

if(isset($_POST['save'])){
	saveData($_POST['tartalom']);

}


function getSzerzo() {
	$conn = MyDB::getConnection();
	$conn->set_charset("utf8");

	$id = $_SESSION['logged_in']['id'];
	$sql = "SELECT * FROM users WHERE legitimacy = 'diak' AND id <>'$id' ORDER BY name";

	$result = $conn->query($sql);
	$szerzo = [];

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$szerzo[] = $row;
		}
	}

	return $szerzo;
}

$szerzo = getSzerzo();
?>


<p>Írj üzenetet az ismerősnek!</p></br>
<form method="post" action="" >
	<select name="szerzoknek">
		<?php foreach ($szerzo as $szerz ) {  ?>
			<option value="<?php echo $szerz['id']; ?>"><?php echo $szerz['username']; ?></option>
			<?php } ?>
		</select>

		<input type="text" name="tartalom" />
		<input type="submit" name="save" />
	</form>
