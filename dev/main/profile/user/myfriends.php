  <?php
  function kapcsolodasUsers(){

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sharebase";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    }
  $conn->set_charset("utf8");

  return $conn;

  }

  function getUsers() {

		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'sharebase';


		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn->query("set names utf8");

		$id = $_SESSION['logged_in']['id'];

		$sql = "SELECT * FROM users WHERE users.id <> '$id' AND legitimacy = 'diak' AND users.id NOT IN (SELECT othersid FROM friends WHERE '$id' = friends.usersid AND users.id = friends.othersid OR '$id' = friends.othersid  AND users.id = friends.usersid ) AND  users.id NOT IN (SELECT usersid FROM friends WHERE '$id' = friends.usersid AND users.id = friends.othersid OR '$id' = friends.othersid  AND users.id = friends.usersid ) ;";
		$result = $conn->query($sql);
		$felhasznalok = [];

		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		    	$felhasznalok[] = $row;
		    }
		}

		return $felhasznalok;
	}

	function addFriend(){

		$conn = kapcsolodasUsers();

		$userid = $_POST['userid'];
		$own = $_SESSION['logged_in']['id'];

		$sql = "INSERT INTO friends (othersid,usersid,date) VALUES('$userid','$own',now())";

		$result = $conn->query($sql);

		if ($result === true){
			?>
			<div class="container">
			<div class="alert alert-success alert-dismissable" style="margin-right: 920px;">
			 <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
				<strong>Ismerős kérelem elküldve!</strong>
			</div>
			</div>
			<?php
		} else {
			echo "Hiba!";
		}
	}

		function Improve(){

		$conn = kapcsolodasUsers();

		$own = $_SESSION['logged_in']['id'];

		$sql = "UPDATE users set sharepoint = sharepoint + 10 WHERE id = '$own'";

		$result = $conn->query($sql);

		if ($result === true){
			?>
			<div class="container">
			<div class="alert alert-success alert-dismissable" style="margin-right: 920px;">
			 <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
				<strong>+10 sharepoint</strong>
			</div>
			</div>
			<?php
		} else {
			echo "Hiba!";
		}

	}

	function imp(){

		$conn = kapcsolodasUsers();

		$userid = $_POST['userid'];

		$sql = "UPDATE users set notification = notification + 1 WHERE id = '$userid'";

		$result = $conn->query($sql);

		if ($result === true){

		} else {
			echo "Hiba!";
		}

	}

	  function getName() {

		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'sharebase';


		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn->query("set names utf8");

		$name = $_POST['names'];
		$age1 = $_POST['agemin'];
		$agemax = $_POST['agemax'];

		$sql = "SELECT * FROM users where legitimacy  = 'diak' AND username LIKE '%$name%' OR name LIKE '%$name%' OR  age BETWEEN '$age1' AND '$agemax' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    while($felhasznalo = $result->fetch_assoc()) {
		    	?>
				  	 <form action="" method="post">
<div class="chip">

	  <a href="#" title="Adatlap" data-toggle="popover" data-trigger="hover" data-content="Elérhetőség: <?php if($felhasznalo['loggedin'] == 1) echo "Elérhető"; else echo "Nem elérhető"; ?>
						Utolsó bejelentkezés: <?php echo $felhasznalo['lastsign']; ?>
						Teljesnév: <?php echo $felhasznalo['name']; ?>
						Kora bejelentkezés: <?php echo $felhasznalo['age']; ?>
						Megosztások száma:<?php echo $felhasznalo['sharepoint']; ?>">
						<img src="<?php echo $felhasznalo['picture']; ?>">
					<?php echo  $felhasznalo['username']; ?> </a>

					  <button type="submit" value="Üzenet írása">Üzenet írása</button>

	      <input type="hidden" name="userid" value="<?php echo $felhasznalo['id']; ?>"/>

	   <button type="submit" id="add" name="add" value="Felhasználó felvétele"  class="w3-btn w3-green">Felvétel</button>

 </div>
 </form>
				<?php
		    }
		} else {

			echo "nincs találat!";
		}


	}


	if(isset($_POST['add'])){
		addFriend();
		Improve();
		imp();
	}


  ?>
<html>
<head>
<style>
.chip {
    display: inline-block;
    padding: 0 25px;
    height: 96px;
    font-size: 18px;
    line-height: 96px;
    border-radius: 250px;
    background-color: #f1f1f1;
}

.chip img {
    float: left;
    margin: 0 10px 0 -25px;
    height: 96px;
    width: 96px;
    border-radius: 50%;
}

.chip button{

	 width: 120px;
	  height: 60px;
	  line-height: 0px;

}
.closebtn {
    padding-left: 10px;
    color: #888;
    font-weight: bold;
    float: right;
    font-size: 20px;
    cursor: pointer;
}

.closebtn:hover {
    color: #000;
}
div.scroll {
    width: 500px;
    height: 500px;
    overflow: auto;

}

.filter{

	text-align: right;
input{
	


}


</style>
</head>
<body>
	   <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>
<div class="scroll">
<?php
$felhasznalok = getUsers();

	if(isset($_POST['dofilter'])){

	getName();

	} else {


	foreach ($felhasznalok as $felhasznalo) {

?>
		  	 <form action="" method="post">
<div class="chip">

	  <a href="#" title="Adatlap" data-toggle="popover" data-trigger="hover" data-content="Elérhetőség: <?php if($felhasznalo['loggedin'] == 1) echo "Elérhető"; else echo "Nem elérhető"; ?>
						Utolsó bejelentkezés: <?php echo $felhasznalo['lastsign']; ?>
						Teljesnév: <?php echo $felhasznalo['name']; ?>
						Kora bejelentkezés: <?php echo $felhasznalo['age']; ?>
						Megosztások száma:<?php echo $felhasznalo['sharepoint']; ?>">
						<img src="<?php echo $felhasznalo['picture']; ?>">
					<?php echo  $felhasznalo['username']; ?> </a>

					  <button type="submit" value="Üzenet írása">Üzenet írása</button>

	      <input type="hidden" name="userid" value="<?php echo $felhasznalo['id']; ?>"/>

	   <button type="submit" id="add" name="add" value="Felhasználó felvétele"  class="w3-btn w3-green">Felvétel</button>

 </div>
 </form>

	<?php }
	}


	?>

 </div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6">
     Szűrés
    </div>



<form method="POST" action="">
</br></br>
<input type="text" name="names" onkeyup="getName()" placeholder="Keress névre.." />
</br>
<input type="number" name="agemin" onkeyup="getName()" placeholder="Minimum kor" />
</br>
<input type="number" name="agemax" onkeyup="getName()" placeholder="Maximum kor" />
</br>
<input type="submit" name="dofilter" value="Szűrés" />
</form>
</div>
  </div>
</body>
</html>
