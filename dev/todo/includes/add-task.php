<?php 

	require("connect.php");
	$task = $_POST['task'];
	$date = date('Y-m-d');
	$time = date('H:i:s');


	$query = "SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time'";
	
	$result = $conn->query($query);
	
		if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	$asd = $row['task'];
			
	    }
	}

	$conn->close();
	
function felvetel(){
			require("connect.php");
	$task = $_POST['task'];
	$date = date('Y-m-d');
	$time = date('H:i:s');
		$sql = "INSERT INTO tasks (task,date,time) VALUES ('$task', '$date', '$time')";
		$result = $conn->query($sql);
		
		if($result === true){
			echo "Felvéve!";
		}else {
			echo "Failed!";
		}

}
	echo '<li><span>'.$task.'</span><img id="'.$date.'" class="delete-button" width="10px" src="images/close.svg" /></li>';
	?>