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

		$sql = "SELECT * FROM users where legitimacy  = 'diak' AND id <> '$id' ";
		$result = $conn->query($sql);
		$felhasznalok = [];

		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		    	$felhasznalok[] = $row;
		    }
		}

		return $felhasznalok;
	}

	  
	    if(isset($_POST['delete'])) {

  		$conn = kapcsolodasUsers();



            $id = $_POST['userid'];


            $sql = "UPDATE users SET available = '0' WHERE id = '$id'";

             mysqli_query($conn, mysqli_real_escape_string($conn, $sql));

             $result = $conn->query($sql);
         }

 	if(isset($_POST['delete'])) {
 		if($_POST['userstatus'] == 0){

		$conn = kapcsolodasUsers();


            $id = $_POST['userid'];


            $sql = "UPDATE users SET available = '1' WHERE id = '$id'";

             mysqli_query($conn, mysqli_real_escape_string($conn, $sql));

             $result = $conn->query($sql);
         }
     }


	 ?>
	 <table border="3px">
		<thead>
			<th>Név</th>
			<th>felhasználónév</th>
			<th>Felfüggesztés</th>
			<th>bejelentkezés dátuma</th>
			<th>Profil kép</th>
				<th></th>
		</thead>
		<tbody>
	 <?php
$felhasznalok = getUsers();

	foreach ($felhasznalok as $felhasznalo) {

		
		echo "<tr>";
        echo "<td>";
             echo $felhasznalo['name'];
         echo "</td>";
            echo "<td>";
             echo $felhasznalo['username'];
         echo "</td>";
         echo "<td>";
             if($felhasznalo['available'] == 1) echo "Nincs felfüggesztve";
			 
			  if($felhasznalo['available'] == 0)echo "<img src='http://m.cdn.blog.hu/mi/mindenuruguay/image/1_16.jpg'  width='64px' heigth='64px'";
         echo "</td>";
         echo "<td>";
             echo $felhasznalo['logindate'];
         echo "</td>";
		  echo "<td>";
             echo '<img src="' . $felhasznalo['picture']. '" width="64px" heigth="64px">';
         echo "</td>";
		   echo "<td>";
	
?>
		<form action="" method="post">
			<input type="hidden" name="userid" value="<?php echo $felhasznalo['id'] ?>"/>
			<input type="hidden" name="userstatus" value="<?php echo $felhasznalo['available'] ?>"/>
			<input type="submit" id="delete" name="delete" value="felfüggeszt" />
		</form>
     
<?php
  echo "</td>";
  		echo "</tr>";
		 
				echo "</tbody>";
	}

		
         echo "</table>";

		
  ?>
  	<head>
		<meta charset='utf-8'>

		<style type='text/css'>

			table {
			border-collapse: collapse;
			width: 80%;
			}

			table thead {
			text-align: left;
				border-bottom: 1px solid #ddd;
			}

			th, td {
			padding: 8px;
			text-align: left;
			}

			td img {
				border-radius: 6px;
				box-shadow: 0px 0px 6px 2px silver;
			}

			tr:hover {
				background-color:#f5f5f5
			}

			#red{
				color:red;
		}

			#green{
				color:green;
			}
			
			input{
				
				width:100px;
				
			}



		</style>
	</head>
