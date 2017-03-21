  <?php
  
  
    function connection(){
  
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
  	  function getUsersName() {
		$conn = kapcsolodas();
	 $conn->query("set names utf8");

	 $sql = "SELECT username FROM users JOIN notes ON users.id = notes.userid GROUP BY username ";

	 $result = $conn->query($sql);
	 $getmessages = [];

	 if ($result->num_rows > 0) {
			 while($row = $result->fetch_assoc()) {
				 $getmessages[] = $row;
			 }
	 }

	 return $getmessages;

 }
 


	//$getmessages = getUsersName();

	 
   $conn = connection();
 

  echo "<h2 style='color:white'>Ismerősök bejegyzései</h2><br />";
    $id = $_SESSION['logged_in']['id'];
    $sql = "SELECT username,users.picture,descreption,sharedate FROM friends,users,notes WHERE accepted = 1 AND friends.usersid = '$id' AND friends.othersid = users.id  AND users.id = notes.userid OR friends.othersid = '$id' AND friends.usersid = users.id ANd users.id = notes.userid";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        ?>
	
    
       <div class="w3-container w3-card-2 w3-white w3-round w3-margin" style="width:30%;"><br>
        <img src="<?php echo $row['picture']; ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:20%;">
        <span class="w3-right w3-opacity"><?php echo $row['sharedate']; ?></span>
        <h4><?php echo $row['username']; ?></h4><br>
        <hr class="w3-clear">
        <p><?php echo $row['descreption']; ?></p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="<?php echo $row['picture']; ?>"  style="width:100%" class="w3-margin-bottom">
            </div>

        </div>
      </div>


      <?php
      }
    } else {
      echo "<p style='text-align:center;color:white'>Nincsenek Ismerőseid által feljegyzett tartalmak!</p>";
    }

  $conn->close(); 
  

  ?>
