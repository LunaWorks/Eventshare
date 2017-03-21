<?php	
function kapcs(){
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "shareitems";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    } 
  $conn->set_charset("utf8");
  
  return $conn;
  
  }
  

	$conn = kapcs();
	echo "<h2>Új lista készítése</h2><br />";
	
	

			?>
			<button type="button" class="btn btn-default btn-lg" id="todo"><span class="glyphicon glyphicon-log-in"></span> todo list</span></button>

			<fieldset>
			<form method='POST' action="">
	
				<input type='hidden' name='oldal' value='felvetel'></br>
				<table>
				<tr>
				<td>
				Feljegyzés
				<input type='text' name='list' required>
				</br></br>
				</td>
				</tr>

				<tr>
				<td>
				<input type='submit' value='Új lista' name='felvetel' />
				</td>
						</tr>
						</table>
			</form>
			
			</fieldset>
			<?php
			
	
if(isset($_POST['felvetel'])){
	
		$cim = $_SESSION['logged_in']['id'];
		$stilus = $_POST['list'];
		$date =	date('Y-m-d H:i:s');

			
			$query = "INSERT INTO activitylist
			(userid,list,sharedate)
			VALUES(
				'$cim',
				'$stilus',
				'$date'
				  )";

	if ($conn->query($query) === TRUE) {
	echo "Új lista született!";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
} 
	} else {

	 $conn->close();
	}
	 ?>