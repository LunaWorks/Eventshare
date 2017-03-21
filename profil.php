<?php
	session_start(); // $_SESSION tomb inicializalasa

	if (!isset($_SESSION['logged_in'])) {
		header('Location: index.php');
	}

	if (isset($_POST['logout'])) {
		unset($_SESSION['logged_in']);
		setcookie('felhasznalo','',0);
		setcookie('jelszo','',0);
		header('Location: index.php');
	}

?>
<!DOCTYPE html>
<head>
	<title>ShareSite</title>
	<meta charset="utf-8">
		<style type='text/css'>

		body{
			background-color: grey;
		}

		body > *{

			background-color: #7FFFD4;
		}
		</style>
		
</head>
<html>
<body>


	<div class="container">

  <div class="panel-group">
   <h1><?php
		echo 'Hello <a href="profilupdate.php">'.$_SESSION['logged_in']['name'].'</a>';
		?>
	</h1>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1"><img src="<?php echo $_SESSION['logged_in']['picture'] ?>" height="184px" width="184px"></a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
						<h2><a href="index.php">Vissza</a></h2>
					</div>
						<form action="" method="post">
							<input type="submit" class="btn btn-primary btn-md"  name="logout" value="Kijelentkezes"></input>
						</form>
      </div>
    </div>
  </div>
</div>

	</form>
</body>
</html>
