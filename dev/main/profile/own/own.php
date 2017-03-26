
<?php
include_once("mydb.php");

function myEvents(){
	$conn = MyDB::getConnection();
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}


	$conn->set_charset("utf8");
	$id = $_SESSION['logged_in']['id'];
	$sql = "SELECT * FROM celendarevents WHERE userid = '$id'";

	$result = $conn->query($sql);
	$myevents = [];
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$myevents[] = $row;

		}
	}

	return $myevents;
}

$myevents = myEvents();

function mynotes(){
	$conn = MyDB::getConnection();
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}


	$conn->set_charset("utf8");
	$id = $_SESSION['logged_in']['id'];
	$sql = "SELECT * FROM notes WHERE userid = '$id'";

	$result = $conn->query($sql);
	$mynote = [];
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$mynote[] = $row;

		}
	}

	return $mynote;
}
function Msn(){
	$conn = MyDB::getConnection();
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}


	$conn->set_charset("utf8");

	$id = $_SESSION['logged_in']['id'];
	$sql = "SELECT * FROM users,message WHERE otherid = '$id'  AND users.id = message.usersid ";

	$result = $conn->query($sql);
	$mymsn = [];
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$mymsn[] = $row;

		}
	}

	return $mymsn;
}
$mymsn = Msn();


function getName() {

	$conn = MyDB::getConnection();
	$conn->set_charset("utf8");

	$name = $_POST['names'];
	$id = $_SESSION['logged_in']['id'];


	$sql = "SELECT * FROM notes where userid  = '$id' AND category LIKE '%$name%' OR descreption LIKE '%$name%'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($note = $result->fetch_assoc()) {
			?>
			<div class="row">
				<input type="radio" name="expand">
				<span class="cell primary" data-label="Vehicle"><?php echo $note["category"]?></span>
				<span class="cell" data-label="Exterior"><?php echo $note["descreption"]?></span>
				<span class="cell" data-label="Interior"><?php echo $note["sharedate"]?></span>
				<span class="cell" data-label="Engine">
					<form method="POST" action="">
						<input type='hidden' name='id' value=<?php echo $note['userid']; ?> />
						<i class="material-icons button edit">edit</i>
						<input type="submit" class="material-icons button delete" name="delete" value="Törlés" onclick="myFunction()"/>
					</form>
				</span>
			</div>
			<?php
		}
	} else {

		echo "nincs találat!";
	}


}

function myFriends(){

	$conn = MyDB::getConnection();
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}


	$conn->set_charset("utf8");
	$id = $_SESSION['logged_in']['id'];
	$sql = "SELECT * FROM friends,users WHERE accepted = 1 AND friends.usersid = '$id' AND friends.othersid = users.id OR friends.othersid = '$id' AND friends.usersid = users.id;";

	$result = $conn->query($sql);
	$myfriends = [];
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$myfriends[] = $row;

		}
	}

	return $myfriends;
}

$myfriends = myfriends();

function Del(){
	$conn = MyDB::getConnection();
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}


	$conn->set_charset("utf8");


	$id = $_POST['id'];

	$sql = "DELETE FROM notes WHERE '$id' = id";
	$result = $conn->query($sql);
	if ($result === true){

		?>
		<div class="w3-panel w3-red w3-round">
			<h2>Üzenet törölve!</h2>
			<h2><a href="http://localhost/eventshare/dev/index.php?oldal=ownthings" />Rendben</h2>


		</div>
		<?php
	} else {
		echo "Hiba!".$sql;
	}

}
if(isset($_POST['delete'])){
	Del();
}


?>

<head>

	<title>User Profile with Content Tabs - Design Shack Demo</title>
	<link rel="shortcut icon" href="http://designshack.net/favicon.ico">
	<link rel="icon" href="http://designshack.net/favicon.ico">
	<link rel="stylesheet" type="text/css" media="all" href="main/profile/own/css/styles.css">
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<meta charset="UTF-8" />
</head>

<body>


	<div id="w">
		<div id="content" class="clearfix">
			<div id="userphoto"><img src="<?php echo $_SESSION['logged_in']['picture'];   ?>" alt="default avatar" width="150px" height="150px"></div>
			<h2><?php echo $_SESSION['logged_in']['name']; ?></h2>

			<nav id="profiletabs">
				<ul class="clearfix">
					<li><a href="#bio" class="sel">Jegyzetek</a></li>
					<li><a href="#activity">Események</a></li>
					<li><a href="#friends">Ismerősök </a></li>
					<li><a href="#settings">teendők</a></li>
				</ul>
			</nav>

			<section id="bio">
				<p> Keresés: </p>
				<form method="POST" action="">

					<input type="text" name="names" onkeyup="getName()" placeholder="Keress névre.." required />
					<input type="submit" name="search" value="Szûrés" />
				</form>

			</br>
		</br>
	</br>


	<div class="caption" style="background-color: black">Jegyzeteim</div>
	<div id="table">
		<div class="header-row row">
			<span class="cell primary">kategoria</span>
			<span class="cell">Feljegyzés tartalma</span>
			<span class="cell">megosztás dátuma</span>
			<span class="cell">KÉP</span>
			<span class="cell">Törlés</span>
			<span class="cell">Módosítás</span>
		</div>
	</div>

	<?php $mynote = mynotes();
	if(isset($_POST['search'])){
		getName();

	} else {
		foreach($mynote as $note){

			?>

			<div class="row">
				<span class="cell primary" data-label="Vehicle"><?php echo $note["category"]?></span>
				<span class="cell" data-label="Exterior"><?php echo $note["descreption"]?></span>
				<span class="cell" data-label="Interior"><?php echo $note["sharedate"]?></span>
				<span class="cell" data-label="Interior"><img src="<?php echo $note["picture"]?>" width="90px" length="90px" /></span>
				<span class="cell" data-label="Engine">
					<form method="POST" action="">
						<input type='hidden' name='id' value=<?php echo $note['id']; ?> />
					</span>
					<span class="cell" data-label="Engine">
						<i class="material-icons button edit">edit</i>
					</span>
					<span class="cell" data-label="Engine">
						<input type="submit" class="material-icons button delete" name="delete" value="Törlés" onclick="myFunction()"/>
					</span>
				</form>

			</div>

			<?php }
		}

		?>
	</section>

	<section id="activity" class="hidden">
		<p>Most recent actions:</p>

		<div class="main">
			<table class="heavyTable">
				<thead>
					<tr>
						<th>Kezdés</th>
						<th>Befejezés</th>
						<th>Leírás</th>
						<th>Hely</th>
						<th>Megosztás dátuma</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php foreach ($myevents as $myevent ) { ?>


							<td><?php echo $myevent["startingtime"]?></td>
							<td><?php echo $myevent["endingtime"]?></td>
							<td><?php echo $myevent["descreption"]?></td>
							<td><?php echo $myevent["place"]?></td>
							<td><?php echo $myevent["who"]?></td>
							<?php } ?>
						</tr>
						<tbody>
						</table>
					</div>
				</section>

				<section id="friends" class="hidden">
					<p>Friends list:</p>

					<?php foreach($myfriends as $myfriend){ ?>
						<ul id="friendslist" class="clearfix">
							<li><a href="#"><img src="<?php echo $myfriend['picture'] ?>" width="22" height="22"> <?php echo $myfriend['username']; ?></a></li>
						</ul>
						<?php } ?>
					</section>

					<section id="settings" class="hidden">
						<p>Edit your user settings:</p>

						<p class="setting"><span>E-mail Address <img src="main/profile/own/images/edit.png" alt="*Edit*"></span> lolno@gmail.com</p>

						<p class="setting"><span>Language <img src="main/profile/own/images/edit.png" alt="*Edit*"></span> English(US)</p>

						<p class="setting"><span>Profile Status <img src="main/profile/own/images/edit.png" alt="*Edit*"></span> Public</p>

						<p class="setting"><span>Update Frequency <img src="main/profile/own/images/edit.png" alt="*Edit*"></span> Weekly</p>

						<p class="setting"><span>Connected Accounts <img src="main/profile/own/images/edit.png" alt="*Edit*"></span> None</p>
					</section>
				</div><!-- @end #content -->
			</div><!-- @end #w -->
			<script type="text/javascript">
			$(function(){
				$('#profiletabs ul li a').on('click', function(e){
					e.preventDefault();
					var newcontent = $(this).attr('href');

					$('#profiletabs ul li a').removeClass('sel');
					$(this).addClass('sel');

					$('#content section').each(function(){
						if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
					});

					$(newcontent).removeClass('hidden');
				});
			});
			</script>
		</body>
		</html>
