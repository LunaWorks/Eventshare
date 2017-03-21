<?php

function kapcsolodas(){
  
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
  
  function kapcsolodasUser(){
  
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
  
  
  

			  




class Main{
	
  public function Head(){
    echo "<meta charset='UTF-8'/>";
    echo "<title>Sharesite</title>";
    echo "<link rel='stylesheet' href='style.css'";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";

  }
  public function Ubody(){
    echo "<body>";
  }

  public function Dbody(){
    echo "</body>";
  }

  public function Content(){

    echo "";


    }
	
	
function getUsers() {
		$conn = kapcsolodas();
	 $conn->query("set names utf8");

	 $sql = "SELECT * FROM users ";

	 $result = $conn->query($sql);
	 $Users = [];

	 if ($result->num_rows > 0) {
			 while($row = $result->fe432stch_assoc()) {
				 $Users[] = $row;
			 }
	 }

	 return $Users;

 }


  public function Friends(){
	  function getUsersName() {
		$conn = kapcsolodas();
	 $conn->query("set names utf8");

	 $sql = "SELECT username FROM users JOIN notes ON users.id = notes.userid GROUP BY username ";

	 $result = $conn->query($sql);
	 $getmessages = [];

	 if ($result->num_rows > 0) {
			 while($row = $result->fe432stch_assoc()) {
				 $getmessages[] = $row;
			 }
	 }

	 return $getmessages;

 }


	//$getmessages = getUsersName();

	 
    $conn = kapcsolodas();

  echo "<h2>Adatok listázása</h2><br />";

    ?>



<table class="container">
 <thead>
 <tr>
  <th><td>id</td></th>
  <th><td>Neve</td></th>
  <th><td>Kategória</td></th>
  <th><td>Leírás</td></th>
  <th><td>Megosztás dátuma</td></th>

 </tr>
</thead>
</table>




  <?php
    $sql = "SELECT * FROM notes";
    $result = $conn->query($sql);
    $i = 1;

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        ?>
<table class="container">

        <tbody>
		<tr>
        <td><?php echo $i?></td>
		<td><?php echo $row["userid"]?></td>
        <td><?php echo $row["category"]?></td>
        <td><?php echo $row["descreption"]?></td>
        <td><?php echo $row["sharedate"]?></td>
           <td>
        <i class="material-icons button edit">edit</i>
        <i class="material-icons button delete">delete</i>
      </td>
		</tr>
	</tbody>
	  </table>

      <?php

      $i++;
      }
    } else {
      echo "Nincs találat!";
    }
	
 echo "<h2>Adatok listázása újból...</h2><br />";

?>


<table class="container">
 <thead>
 <tr>
  <th><td>id</td></th>
  <th><td>Kategória</td></th>
  <th><td>Leírás</td></th>
  <th><td>Megosztás dátuma</td></th>
  

 </tr>
</thead>
</table>
<?php
  
    $sql = "SELECT * FROM activitylist";
    $result = $conn->query($sql);
    $i = 1;

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        ?>
	<table class="container">
        <tbody>
		<tr>
        <td><?php echo $i?></td>
        <td><?php echo $row["userid"]?></td>
        <td><?php echo $row["list"]?></td>
        <td><?php echo $row["sharedate"]?></td>
        <td><a href='index.php?oldal=torles' onclick="myFunction()">törlés</a></td>
        <td><a href='index.php?oldal=modositas' onclick="myFunction2()">modosítás</a></td>
		</tr>
		<tbody>
		</table>
      <?php

      $i++;
      }
    } else {
      echo "Nincs találat!";
    }

  $conn->close(); 
  
  }

  public function Mainstuff(){
 ?>
  <div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Üdvözlet!</h1>
	  <h3>Az oldal leírása:</h3>
	  <p>Bármit fel tudsz jegyezni, és azt megosztani másokkal!</p>
	  
	 <p>Ha még új vagy az oldalon, és szeretnéd kipróbálni, itt van rá a lehetőség!</p>
	 
      <hr>
      <h3>A bemutatóra nyomj rá!</h3>
      <p>TUTORIAL</p>
    </div>
  </div>
</div>
<?php

}

  public function Anotherstuff(){
?>	  
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>John's Blog</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Home</a></li>
        <li><a href="#section2">Friends</a></li>
        <li><a href="#section3">Family</a></li>
        <li><a href="#section3">Photos</a></li>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>

    <div class="col-sm-9">
      <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2>I Love Food</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27, 2015.</h5>
      <h5><span class="label label-danger">Food</span> <span class="label label-primary">Ipsum</span></h5><br>
      <p>Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <br><br>
      
      <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2>Officially Blogging</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, Sep 24, 2015.</h5>
      <h5><span class="label label-success">Lorem</span></h5><br>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <hr>

      <h4>Leave a Comment:</h4>
      <form role="form">
        <div class="form-group">
          <textarea class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <br><br>
      
      <p><span class="badge">2</span> Comments:</p><br>
      
      <div class="row">
        <div class="col-sm-2 text-center">
          <img src="kepek/bandmember.jpg" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>Anja <small>Sep 29, 2015, 9:12 PM</small></h4>
          <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <br>
        </div>
        <div class="col-sm-2 text-center">
          <img src="kepek/bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
          <h4>John Row <small>Sep 25, 2015, 8:25 PM</small></h4>
          <p>I am so happy for you man! Finally. I am looking forward to read about your trendy life. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          <br>
          <p><span class="badge">1</span> Comment:</p><br>
          <div class="row">
            <div class="col-sm-2 text-center">
              <img src="kepek/bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
            </div>
            <div class="col-xs-10">
              <h4>Nested Bro <small>Sep 25, 2015, 8:28 PM</small></h4>
              <p>Me too! WOW!</p>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

	  
	  
  
<?php
  }


  public function newFriend(){
    if(isset($_POST['add'])) {

      $conn = kapcsolodasUser();


            $id = $_POST['userid'];

            
            
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
       <table border="3px" class="container">
    <thead>
      <th>Név</th>
      <th>felhasználónév</th>
      <th>elérhetőség</th>
      <th>bejelentkezés dátuma</th>
      <th>Profil kép</th>
      <th></th>
      <th></th>

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
          echo "<th>";
                      
                        if($able == 1)
{
    echo "<button style=\"background-color: green;\">Green</button>";
}
  if($able == 0){
    echo "<button style=\"background-color: red;\">Red</button>";
  }

         echo "</th>";
          echo "<th>";
    ?>
        <form action="" method="post">
      <input type="hidden" name="userid" value="<?php echo $id ?>"/>
         <div class="w3-section">
        <button type="submit" id="add" name="add" value="Felhasználó felvétele"  class="w3-btn w3-green">Felvétel</button>
      </div>
    </div>
    </form>

    <?php
         echo "</th>";
        echo "</tr>";
         echo "</table>";

}
  }

  public function Profile(){

if(isset($_SESSION['logged_in'])){

?>

    <div class="container">
    <div class="panel-group"> 
     <h1><?php
      echo 'Hello <a href="index.php?s=update">'.$_SESSION['logged_in']['name'].'</a>';
      ?>
    </h1>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse1"><img src="<?php echo $_SESSION['logged_in']['picture'] ?>" height="184px" width="184px"></a>
          </h4>
          </div>
		  
        <div id="collapse1" class="panel-collapse collapse">
              <form action="" method="post">
                <?php if($_SESSION['logged_in']['username'] == 'admin') {?>
                  <a href="index.php?m=users"><input type="button" class="btn btn-primary btn-md"  name="userList" value="Felhasználók"/></a>
                  <?php } ?>
                <input type="submit" class="btn btn-primary btn-md"  name="logout" value="Kijelentkezes"></input>
				<a href="index.php?k=newNotes"><input type="button"  class="btn btn-primary btn-md" value="Új feljegyzés"></input></a>
				<a href="index.php?x=newList"><input type="button"  class="btn btn-primary btn-md" value="Új teendőlista"></input></a>
        <a href="index.php?lol=newFriend"><input type="button"  class="btn btn-primary btn-md" value="Ismerős felvétele"></input></a>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <?php



    echo  "Szia! " .$_SESSION['logged_in']['username'];
    echo "</br>";
    echo "Bejelentkezés Dátuma: " .$_SESSION['logged_in']['logindate'];
      echo "</br>";
      echo "Korod: " .$_SESSION['logged_in']['age'];
        echo "</br>";
      echo "Posztok száma: " .$_SESSION['logged_in']['share'];

    ?>
    <?php
  } else {
    echo "JELENTKEZZ BE!";
  }

  }
  
public function newNotes(){
	
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
}

public function newList(){
	
	
	$conn = kapcsolodas();
	echo "<h2>Új lista készítése</h2><br />";
	
		
	 include("Todolist.php");


			?>
<div id="myDIV" class="header">
  <h2>My To Do List</h2>
  <input type="text" id="myInput" placeholder="Title...">
  <span onclick="newElement()" class="addBtn">Add</span>
</div>
<ul id="myUL">
  <li>Hit the gym</li>
  <li class="checked">Pay bills</li>
  <li>Meet George</li>
  <li>Buy eggs</li>
  <li>Read a book</li>
  <li>Organize office</li>
</ul>

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
	} else 

	 $conn->close();
}

  
 


  public function users(){
	  
	    if(isset($_POST['delete'])) {

  		$conn = kapcsolodasUser();



            $id = $_POST['userid'];


            $sql = "UPDATE users SET available = '0' WHERE id = '$id'";

             mysqli_query($conn, mysqli_real_escape_string($conn, $sql));

             $result = $conn->query($sql);
         }

 	if(isset($_POST['delete'])) {
 		if($_POST['userstatus'] == 0){

		$conn = kapcsolodasUser();


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
  }


  public function Update(){

?>
      <div class="container">
      <h1>Adat modósítás</h1>
        <form action="profilupdate.php" method="post">
           <label for="email">Teljesnév modósítás:</label>
          <input type="text" name="name" value="<?php echo $_SESSION['logged_in']['name'] ?>"></input>
          </br></br>
          <label for="email">Jelszó modósítás:</label>
          <input type="text" name="password" placeholder="add meg új jelszavad" ></input>
            </br></br>
          <label for="email">Jelszó újból megadása:</label>
          <input type="text" name="checkpass" placeholder="add meg újból!" />
          </br></br>
          <input type="submit" name="megse"  class="btn btn-primary btn-md" value="Mégse"></input>
          <input type="submit" name="modosit"  class="btn btn-primary btn-md" value="Modositas mentese"></input>
        </form>
        <br />


        <img src="<?php echo $_SESSION['logged_in']['picture'] ?>" class="img-circle" height="184px" width="184px">

        <?php if(isset($_SESSION['logged_in']['legitimacy']) == 'diak'){  ?>
       <form action="profilupdate.php" method="post" enctype="multipart/form-data">
         <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">Valassz ki egy kepet profilkent:</div>
            <div class="panel-body"><input type="file" class="btn btn-primary btn-md" name="picture"></div>
          </div>

            <input type="submit" value="Kep feltoltes"  class="btn btn-primary btn-md" name="image_submit">
        </form>
      </div>

<?php
      }
    }
 }

  
  $m = new Main();

  $m->Head();
  $m->Ubody();
  $m->Content();
  $m->Dbody();

  if(isset($_GET['oldal'])){

   echo $m->Friends();
  } elseif(isset($_GET['valami'])) {

   echo  $m->Profile();
  }elseif(isset($_GET['s'])) {
   echo $m->Update();
 }elseif(isset($_GET['m'])) {
   echo $m->users();
 }elseif(isset($_GET['k'])) {
   echo $m->newNotes();
 }elseif(isset($_GET['x'])) {
   echo $m->newList();
  }elseif(isset($_GET['a'])) {
   echo $m->Anotherstuff();
  }elseif(isset($_GET['lol'])) {
   echo $m->newFriend();
  }else {
   echo $m->Mainstuff();
  }





  ?>
