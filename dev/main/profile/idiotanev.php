<?php
$conn = kapcsolodas();
	echo "<h2>Új feljegyzés készítése</h2><br />";

				
			?>
		
			<fieldset>
			<form method='POST' action="">
	
				<input type='hidden' name='oldal' value='felvetel'></br>
				<table>
				<tr>
				<td>
				Feljegyzés
				<input type='text' name='descreption' required></br></br>
				</td>
				</tr>
			
				<tr>
				<td>
				Kategória:
					<select name="category" required>
						<option value="Sport">Sport</option>
						<option value="School">School</option>
						<option value="Family">Family</option>
						<option value="Friends">Friends</option>
						<option value="Events">Events</option>
						<option value="Meetings">Meetings</option>
						<option value="Travel">Travel</option>

						
					</select>




					</td>
				</tr>

				<tr>
				<td>
				<input type='submit' value='Új feljegyzés' name='felvetel' />
				</td>
						</tr>
						</table>
			</form>
			
			</fieldset>
			<?php
			
	
if(isset($_POST['felvetel'])){
	
		$cim = $_SESSION['logged_in']['id'];
		$stilus = $_POST['category'];
		$rankozas = $_POST['descreption'];
		$date =	date('Y-m-d H:i:s');

			
			$query = "INSERT INTO notes
			(userid,category,descreption,sharedate)
			VALUES(
				'$cim',
				'$stilus',
				'$rankozas' ,
				'$date'
				  )";

	if ($conn->query($query) === TRUE) {
	echo "Új feljegyzés született!";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
} 
	} else 

	 $conn->close();
	 ?>