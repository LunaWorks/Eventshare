<?php	

function newList(){
	$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sharebase";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    } 
  $conn->set_charset("utf8");
  

	
		$userid = $_SESSION['logged_in']['id'];
		$todo = $_POST['addnewlist'];
		$date =	date('Y-m-d H:i:s');

			
			$query = "INSERT INTO list
			(userid,datetime,todo)
			VALUES(
				'$userid',
				'$date',
				'$todo'
				  )";

	if ($conn->query($query) === TRUE) {
	echo "Új lista született!";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
} 
}

  

	  
	if(isset($_POST['create'])){
		newList();
} 

	echo "<h2>Új lista készítése</h2><br />";
	

			?>
			<html>
			<head>
			<style> 

#panel {
    padding: 50px;
    display: none;
}
</style>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script>
			 <a href="javascript:void(0)" class="w3-dark-grey w3-button w3-hover-black w3-left-align" onclick="document.getElementById('id01').style.display='block'">Új lista <i class="w3-padding-left fa fa-pencil"></i></a>
			</head>
			<body>
			

 <div id="id01" class="w3-modal" style="z-index:4">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-padding w3-red">
       <span onclick="document.getElementById('id01').style.display='none'" class="w3-right w3-xxlarge w3-closebtn"><i class="fa fa-remove"></i></span>
      <h2>Send Mail</h2>
    </div>
    <div class="w3-panel">
      <label>To</label>
      <input class="w3-input w3-border w3-margin-bottom" type="text">
      <label>From</label>
      <input class="w3-input w3-border w3-margin-bottom" type="text">
      <label>Subject</label>
      <input class="w3-input w3-border w3-margin-bottom" type="text">
      <input class="w3-input w3-border w3-margin-bottom" style="height:150px" placeholder="What's on your mind?">
      <div class="w3-section">
        <a class="w3-button w3-red" onclick="document.getElementById('id01').style.display='none'">Cancel  <i class="fa fa-remove"></i></a>
        <a class="w3-button w3-right" onclick="document.getElementById('id01').style.display='none'">Send  <i class="fa fa-paper-plane"></i></a> 
      </div>    
    </div>
  </div>
</div>


			<fieldset>
			<form method='POST' action="">
			
		
			<div id="panel"><?php include("todo/index.php"); ?></div>	<input type='button'  id="flip" name='s' value="Lista" />

			
			</fieldset>
			</body>
			</html>
