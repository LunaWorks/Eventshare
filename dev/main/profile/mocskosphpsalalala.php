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



    include("dbhandler.php");
    //Adatbázis kapcsolat
    $dbHandler = new DbHandler("localhost","root","");
    $dbHandler->connect();
  	$dbHandler->query("set names utf8");
    $dbHandler->select_db("sharebase");
    $jegyzetek = $dbHandler->selectAll("users");
	
		   echo "<h3>Felhasználok</h3>";

	    while($row = mysqli_fetch_array($jegyzetek)){ 
		?>
       <table border="3px">
		<thead>
			<th>Név</th>
			<th>felhasználónév</th>
			<th>elérhetőség</th>
			<th>bejelentkezés dátuma</th>
			<th>Profil kép</th>
		</thead>
		
		<?php
		

		 $id = $row['id'];
         $name = $row['name'];
         $username = $row['username'];
         $pass = $row['password'];
         $able = $row['available'];
         $log = $row['logindate'];
		 $picture = $row['picture'];
		echo "<tr>";
        echo "<th>";
             echo $name;
         echo "</th>";
            echo "<th>";
             echo $username;
         echo "</th>";
         echo "<th>";
             if($able == 1) echo "Elérhető";
			 
			  if($able == 0) echo "Nem elérhető";
         echo "</th>";
         echo "<th>";
             echo $log;
         echo "</th>";
		  echo "<th>";
             echo '<img src="' . $picture. '" width="64px" heigth="64px">';
         echo "</th>";
		 		echo "</tr>";
         echo "</table>";
		
	
?>
		<form action="" method="post">
			<input type="hidden" name="userid" value="<?php echo $id ?>"/>
			<input type="hidden" name="userstatus" value="<?php echo $able ?>"/>
			<input type="submit" id="delete" name="delete" value="felfüggeszt" />
		</form>
     
<?php
		}
  ?>