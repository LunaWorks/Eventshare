<?php 
  function friendRequest(){
      $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sharebase";
 

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    } 
    

  $conn->set_charset("utf8");

    $id = $_SESSION['logged_in']['id'];
    $sql = "SELECT * FROM users,friends WHERE othersid = '$id'  AND users.id = friends.usersid ";
    
    $result = $conn->query($sql);
    $friends = [];
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $friends[] = $row;
    
      }
    } 
          
    return $friends;
  }
  
  $friends = friendRequest();
	
   function getMessages(){
      $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sharebase";
 

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    } 
    

  $conn->set_charset("utf8");

    $id = $_SESSION['logged_in']['id'];
    $sql = "SELECT COUNT(*) as 'allmail' FROM message WHERE message.otherid = '$id'";
    
    $result = $conn->query($sql);
    $messages = [];
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $messages[] = $row;
    
      }
    } 
          
    return $messages;
  }

  $messages = getMessages();

  function getFriends(){
      $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sharebase";
 

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    } 
    

  $conn->set_charset("utf8");

    $id = $_SESSION['logged_in']['id'];
    $sql = "SELECT COUNT(*) as 'allreq' FROM friends WHERE friends.othersid = '$id' AND friends.accepted = 0";
    
    $result = $conn->query($sql);
    $friendsreq = [];
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $friendsreq[] = $row;
    
      }
    } 
          
    return $friendsreq;
  }

  $friendsreq = getFriends();
  
    function accepted(){
     $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sharebase";
 

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    } 
    

  $conn->set_charset("utf8");

    $id = $_POST['permissionID'];
    $myid = $_SESSION['logged_in']['id'];

    $sql = "UPDATE friends set accepted = '1' WHERE '$id' = friends.usersid    AND '$myid' = friends.othersid";

    $result = $conn->query($sql);

    if ($result === true){
		adminLog();
      ?>   
		
      <div class="w3-panel w3-green w3-round">
        <h2>Ismerős jelőlés elfogadása</h2>
      <i class="glyphicon glyphicon-ok">  </i>

  </div>
   <?php
    } else {
      echo "Hiba!";
    }

  }
  
  
function adminLog() {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sharebase";
  $conn = new mysqli($servername, $username, $password, $dbname);
	$conn->query("set names utf8");
		$id = $_SESSION['logged_in']['id'];
  $sql = "INSERT INTO  adminlog (userid,descreption,whendate) VALUES ('$id','Új ismerőse lett',now()";
  $result = $conn->query($sql);
  if($result === TRUE){
  } else {
	  echo "HIBA!";

  }


}

  function refused(){
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

    $sql = "DELETE FROM friends WHERE friends.othersid = '$userid'";

    $result = $conn->query($sql);

    if ($result === true){

      ?>   
      <div class="w3-panel w3-red w3-round">
      <h2>Kérelem elutasítása</h2>
	  <h2><a href="http://localhost/eventshare/dev/index.php?oldal=Anotherstuff" />Rendben</h2>
      <i class="glyphicon glyphicon-ok"> </i>


  </div>
   <?php
    } else {
      echo "Hiba!";
    }

  }
  
  	function Msn(){
		  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sharebase";
 

  $conn = new mysqli($servername, $username, $password, $dbname);
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
	
	function messageDel(){
     $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sharebase";
 

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    } 
    

  $conn->set_charset("utf8");


	$id = $_POST['id'];

    $sql = "DELETE FROM message WHERE '$id' = id";
	$result = $conn->query($sql);
    if ($result === true){

      ?>   
      <div class="w3-panel w3-red w3-round">
      <h2>Üzenet törölve!</h2>
	  <h2><a href="http://localhost/eventshare/dev/index.php?oldal=Anotherstuff" />Rendben</h2>


  </div>
   <?php
    } else {
      echo "Hiba!".$sql;
    }

  }
  if(isset($_POST['delete'])){
      messageDel();
  }

  if(isset($_POST['accept'])){
      accepted();
  }
   if(isset($_POST['nope'])){
      refused();
  }
  
?>

<html>
<head>
<meta charset='UTF-8'/>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



  <link rel="shortcut icon" href="http://designshack.net/favicon.ico">
  <link rel="icon" href="http://designshack.net/favicon.ico">
 
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

<style>


.chip img {
    float: left;
    margin: 0 10px 0 -25px;
    height: 96px;
    width: 96px;
    border-radius: 50%;
}




div.scroll {
    width: 1000px;
    height: 500px;
    overflow: auto;
	
}




	#table {
		display: table;
	 	
	 	width: 100%; 
	 	background: #fff;
	 	margin: 0;
	 	box-sizing: border-box;
	

	 }

	 .caption {
	 	display: block;
	 	width: 100%;
	 	background: black;
	 	height: 55px;
	 	padding-left: 10px;
	 	font-size: 20px;
	 	line-height: 55px;
	 	text-shadow: 1px 1px 1px rgba(0,0,0,.3);
	 	box-sizing: border-box;
	 }


	 .header-row {
	 	background: #8b8b8b;

	 }

	#table .row {
		display: table-row;
	}

	.cell {
		display: table-cell;
		
		padding: 6px; 
		border-bottom: 1px solid #e5e5e5;
		text-align: center;
		color: black;
	}




</style>
	<script>
		function ajax(){
		
		var req = new XMLHttpRequest();
		
		req.onreadystatechange = function(){
		
		if(req.readyState == 4 && req.status == 200){
		
		  document.getElementById('friends').innerHTML = req.responseText;
		} 
		}
		req.open('GET','main/tabs/posts.php',true); 
		req.send();
		
		}
		setInterval(function(){ajax()},1000);
	</script>
</head>
<body onload="ajax();">
    <div id="content" class="clearfix">
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4><?php echo $_SESSION['logged_in']['username']; ?></h4>
   
   <nav id="profiletabs">
	  <ul class="clearfix">
  <li class="list-group-item">
  <a href="#section1" class="sel">
     Esemény meghívás
	  </a>
    <span class="badge">0</span>
	 
  </li>
  <li class="list-group-item">
  <a href="#section2">

	Ismerős jelölése
	</a>
	  <?php foreach($friendsreq as $friend){ ?>
	<span class="badge"><?php echo $friend['allreq']; ?></span>
	 <?php } ?>
	 
  </li>
  <li class="list-group-item">
  <a href="#section3">
	Üzenetek
	 </a>
	 <?php foreach($messages as $message){ ?>
	<span class="badge"><?php echo $message['allmail'] ?></span>
	 <?php } ?>

  </li>
</ul>
 </nav>

  <br>
    
    </div>
      <section id="section1">
    <div class="col-sm-9">
		      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">1 min</span>
        <h4>John Doe</h4><br>
        <hr class="w3-clear">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
   
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> &nbsp;Eseményre jelentkezés</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i> &nbsp;Komment küldése</button> 
      </div>



      <hr>

      <h4>Levélírás</h4>
      <form role="form">
        <div class="form-group">
          <textarea class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
	        </div>
	  </section>

	  	       <section id="section2">
             <h4>Barát jelölés</h4>

      <?php  foreach ($friends as $friend) { 
      if($friend['accepted'] == 0){
        ?>
		
 	    <div class="col-sm-9">

			 <div class="scroll">
<div class="chip">    
<div class="w3-container" style="margin-top:10px">
<hr>
<div class="w3-row">
  <div class="w3-col">
     <img src="<?php echo $friend['picture']; ?>" class="w3-circle" style="max-width: 220px;" class="img-responsive">
     
  </div>
   <div class="w3-col">
    <h3 class="w3-text-red" style="padding-bottom:0px;padding-right: 10px"><?php  echo $friend['username'];?></h3>
    </div>
  

                      <form method="POST" action="">
  
            <div class="w3-half">
             <input type="submit" name="accept" class="w3-button w3-green
               w3-section" title="Accept" value="Elfogadás" />
    
            
                   <input type="hidden" name="permissionID" value="<?php echo $friend['usersid']; ?>"/>
              <input type="submit" name="nope" class="w3-button w3-red w3-section" title="Decline" value="Elutasítás" ></input>
            </div> 
            </div>

            </form>

 
<hr>
</div>
  
	      </div>
		      </div>
			   </div>

	
          <?php  
        }
          }?>


		  </section>
		   <section id="section3">
		      	    <div class="col-sm-12">
  <div class="caption">Üzenetek</div>	
<div id="table" >
	<div class="header-row row">
    <span class="cell primary">kategoria</span>
    <span class="cell">Feljegyzés tartalma</span>
     <span class="cell">megosztás dátuma</span>

</div>

  <?php  
	foreach($mymsn as $note){
  
  ?>
  <div class="row">
    <span class="cell primary" data-label="Vehicle"><?php echo $note["username"]?></span>
    <span class="cell" data-label="Exterior"><?php echo $note["date"]?></span>
     <span class="cell" data-label="Interior"><?php echo $note["what"]?></span>
     <span class="cell" data-label="Engine">		  
	 <form method="POST" action="">
		<input type='hidden' name='id' value=<?php echo $note['id']; ?> />
        <input type="submit" class="material-icons button delete" name="delete" value="Törlés" onclick="myFunction()"/>
		</form>
</span>
 </div>
 
 
<?php } 
	
	
 ?>
  </div>
	  </section>
    </div>
  </div>
  </div>



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