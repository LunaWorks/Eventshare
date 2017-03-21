<?php
session_start();

if (isset($_POST['logout'])) {
	   $servername = "localhost";
 $connUser = "root";
 $connPass = "";
 $dbname = "sharebase";

		$userid =  $_SESSION['logged_in']['id'];

 $conn = new mysqli($servername, $connUser, $connPass, $dbname);
 	$conn->query("set names utf8");
	 $login_tym = date('Y-m-d H:i:s');
 $sql = "UPDATE users SET  lastsign = '$login_tym' WHERE  id = '$userid'";
    $lol = $conn->query($sql);

	loggedout();
  unset($_SESSION['logged_in']);
  setcookie('felhasznalo','',0);
  setcookie('jelszo','',0);
  header('Location: index.php');

}
  function loggedout() {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sharebase";
  $conn = new mysqli($servername, $username, $password, $dbname);
	$conn->query("set names utf8");
		$id = $_SESSION['logged_in']['id'];
  $sql = "UPDATE users SET loggedin = '0' WHERE id = '$id'";
  $result = $conn->query($sql);
  if($result === TRUE){
  } else {
	  echo "HIBA!";

  }


}

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

    function Logging() {

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'sharebase';

    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->query("set names utf8");


    $sql = "SELECT * FROM users,adminlog where users.legitimacy  = 'diak' AND users.id = adminlog.userid";
    $result = $conn->query($sql);
    $log = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $log[] = $row;
        }
    }

    return $log;
  }
  $log = Logging();

   function Rendezes() {

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'sharebase';

    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->query("set names utf8");

    $option = $_POST['option'];

    $sql = "SELECT * FROM users,adminlog where users.legitimacy  = 'diak' AND users.id = adminlog.userid $option";
    $result = $conn->query($sql);
    $log = [];

    if ($result->num_rows > 0) {
                     ?><table border="3px">
    <thead>
      <th>Profikép</th>
      <th>Felhasználóneve</th>
      <th>Tevékenysége</th>
    </thead>
    <tbody>

   <?php

        while($log = $result->fetch_assoc()) {

    echo "<tr>";
          echo "<td>";
             echo '<img src="' .$log['picture']. '" width="50px" heigth="50px">';
         echo "</td>";

            echo "<td>";
             echo $log['username'];
         echo "</td>";
         echo "<td>";
             echo $log['descreption'];
         echo "</td>";

      echo "</tr>";

        echo "</tbody>";
  



        }

        echo "</table>";
    } 
      
 
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

			 if($result === TRUE){
				 header("location:#userslist");
			 }
         }
     }

        function Search() {

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'sharebase';

    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->query("set names utf8");

    $search = $_POST['searching'];

    $sql = "SELECT * FROM users,adminlog where users.legitimacy  = 'diak' AND users.id = adminlog.userid AND username LIKE '%$search%' OR descreption  LIKE '%$search%'  ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
                     ?><table border="3px">
    <thead>
      <th>Profikép</th>
      <th>Felhasználóneve</th>
      <th>Tevékenysége</th>
    </thead>
    <tbody>

   <?php

        while($log = $result->fetch_assoc()) {

    echo "<tr>";
          echo "<td>";
             echo '<img src="' .$log['picture']. '" width="50px" heigth="50px">';
         echo "</td>";

            echo "<td>";
             echo $log['username'];
         echo "</td>";
         echo "<td>";
             echo $log['descreption'];
         echo "</td>";

      echo "</tr>";

        echo "</tbody>";
  



        }

        echo "</table>";
    } else {
      echo "Nincs találat a következőre: ".$search;
    }
      
 
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

       if($result === TRUE){
         header("location:#userslist");
       }
         }
     }





  	 function getAll() {

  		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'sharebase';

		$conn = new mysqli($servername, $username, $password, $dbname);
		 $conn->set_charset("utf8");

		$id = $_SESSION['logged_in']['id'];
		$sql = "SELECT * FROM users,notes WHERE  userid <>'$id' AND users.id = notes.userid ORDER BY descreption";

		$result = $conn->query($sql);
		$szerzo = [];

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	$szerzo[] = $row;
	    }
	}

		return $szerzo;
	}

	$users = getAll();

 function addCustoms(){

  $conn = kapcsolodasUsers();
	
	
  $color = $_POST['color'];
  $rating = $_POST['rating'];
  $price = $_POST['price'];
   $name = $_POST['name'];

  $sql = "INSERT INTO shop (colors,cost,rating,name) VALUES ('$color','$price','$rating','$name');";

  $result = $conn->query($sql);

  if ($result === true){
    ?>
    <div class="container">
    <div class="alert alert-success alert-dismissable" style="margin-right: 920px;">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
      <strong>Bolt új kellékkel feltöltve!</strong>
    </div>
    </div>
    <?php
  } else {
    echo "Hiba!";
  }


 $conn->close();
  }
  error_reporting(0);
   function addNews(){

  $conn = kapcsolodasUsers();
  
  $target_name = basename($_FILES["image"]["name"]);
$target_file = "kepek/".$target_name ;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);

// Check file size
if ($_FILES["image"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}


// Allow certain file formats
if($imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "jpg") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    } else {
        echo "Sorry, there was an error uploading your file.";
		echo $check["mime"];
    }
}
	
	
  $color = $_POST['newsname'];
  $rating = $_POST['descreption'];

  $sql = "INSERT INTO news (name,descreption,image,time) VALUES ('$color','$rating','$target_file',NOW());";

  $result = $conn->query($sql);

  if ($result === true){
    ?>
    <div class="container">
    <div class="alert alert-success alert-dismissable" style="margin-right: 920px;">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
      <strong>Új hír beküldve!</strong>
    </div>
    </div>
    <?php
  } else {
    echo "Hiba!";
  }


 $conn->close();
  }
if(isset($_POST['newsbtn'])){
	addNews();
}



?>
<!DOCTYPE html>
<html>

	<head>
		<?php include("main/head.php"); ?>
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

.navbar-login
{
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}
.message-item {
margin-bottom: 25px;
margin-left: 40px;
position: relative;
}
.message-item .message-inner {
background: #fff;
border: 1px solid #ddd;
border-radius: 3px;
padding: 10px;
position: relative;
}
.message-item .message-inner:before {
border-right: 10px solid #ddd;
border-style: solid;
border-width: 10px;
color: rgba(0,0,0,0);
content: "";
display: block;
height: 0;
position: absolute;
left: -20px;
top: 6px;
width: 0;
}
.message-item .message-inner:after {
border-right: 10px solid #fff;
border-style: solid;
border-width: 10px;
color: rgba(0,0,0,0);
content: "";
display: block;
height: 0;
position: absolute;
left: -18px;
top: 6px;
width: 0;
}
.message-item:before {
background: #fff;
border-radius: 2px;
bottom: -30px;
box-shadow: 0 0 3px rgba(0,0,0,0.2);
content: "";
height: 100%;
left: -30px;
position: absolute;
width: 3px;
}
.message-item:after {
background: #fff;
border: 2px solid #ccc;
border-radius: 50%;
box-shadow: 0 0 5px rgba(0,0,0,0.1);
content: "";
height: 15px;
left: -36px;
position: absolute;
top: 10px;
width: 15px;
}
.clearfix:before, .clearfix:after {
content: " ";
display: table;
}
.message-item .message-head {
border-bottom: 1px solid #eee;
margin-bottom: 8px;
padding-bottom: 8px;
}
.message-item .message-head .avatar {
margin-right: 20px;
}
.message-item .message-head .user-detail {
overflow: hidden;
}
.message-item .message-head .user-detail h5 {
font-size: 16px;
font-weight: bold;
margin: 0;
}
.message-item .message-head .post-meta {
float: left;
padding: 0 15px 0 0;
}
.message-item .message-head .post-meta >div {
color: #333;
font-weight: bold;
text-align: right;
}
.post-meta > div {
color: #777;
font-size: 12px;
line-height: 22px;
}
.message-item .message-head .post-meta >div {
color: #333;
font-weight: bold;
text-align: right;
}
.post-meta > div {
color: #777;
font-size: 12px;
line-height: 22px;
}
img {
 min-height: 40px;
 max-height: 40px;
}


article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
ol, ul { list-style: none; }

input, textarea { 
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: none; 
}



#topbar {
  background: #4f4a41;
  padding: 10px 0 10px 0;
  text-align: center;
  height: 36px;
  overflow: hidden;
  -webkit-transition: height 0.5s linear;
  -moz-transition: height 0.5s linear;
  transition: height 0.5s linear;
}
#topbar a {
  color: #fff;
  font-size:1.3em;
  line-height: 1.25em;
  text-decoration: none;
  opacity: 0.5;
  font-weight: bold;
}
#topbar a:hover {
  opacity: 1;
}



a:hover { text-decoration: underline; }

.center { display: block; text-align: center; }

/** page structure **/
#w {
  display: block;
  width: 750px;
  margin: 0 auto;
  padding-top: 30px;
  padding-bottom: 45px;
}

#content {
  display: block;
  width: 100%;
  background: #fff;
  padding: 25px 20px;
  padding-bottom: 35px;
  -webkit-box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
  -moz-box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
}

#userphoto {
  display: block;
  float: right;
  margin-left: 10px;
  margin-bottom: 8px;
}
#userphoto img {
  display: block;
  padding: 2px;
  background: #fff;
  -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.4);
  -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.4);
  box-shadow: 0 1px 3px rgba(0,0,0,0.4);
}


/** profile nav links **/
#profiletabs {
  display: block;
  margin-bottom: 4px;
  height: 50px;
}

#profiletabs ul { list-style: none; display: block; width: 70%; height: 50px; }
#profiletabls ul li { float: left; }
#profiletabs ul li a { 
  display: block;
  float: left;
  padding: 8px 11px;
  font-size: 1.2em;
  font-weight: bold;
  background: #eae8db;
  color: #666;
  margin-right: 7px;
  border: 1px solid #fff;
  -webkit-border-radius: 5px;
  -webkit-border-bottom-left-radius: 0;
  -moz-border-radius: 5px;
  -moz-border-radius-bottomleft: 0;
  border-radius: 5px;
  border-bottom-left-radius: 0;
}
#profiletabs ul li a:hover {
  text-decoration: none;
  background: #dad7c2;
  color: #565656;
}

#profiletabs ul li a.sel {
  background: #fff;
  border-color: #d1cdb5;
}


/** profile content sections **/
.hidden {
  display: none;
}

.activity {
  border-bottom: 1px solid #d6d1af;
  padding-bottom: 4px;
}

.setting {
  display: block;
  font-weight: normal;
  padding: 7px 3px;
  border-top: 1px solid #d6d1af;
  margin-bottom: 5px;
}
.setting span {
  float: left; 
  width: 250px;
  font-weight: bold;
}
.setting span img { 
  cursor: pointer;
}


#friendslist {
  display: block;
  font-size: 1.1em;
  font-weight: bold;
}
#friendslist li { line-height: 30px; }
#friendslist li a {
  float: left;
  height: 30px;
  padding: 3px 6px;
  line-height: 22px;
   margin-right: 15px;
  border: 1px solid #c9d8b8;
}

#friendslist li a img { float: left; margin-right: 5px; }

/** clearfix **/
.clearfix:after { content: "."; display: block; clear: both; visibility: hidden; line-height: 0; height: 0; }
.clearfix { display: inline-block; }
 
html[xmlns] .clearfix { display: block; }
* html .clearfix { height: 1%; }



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
    background: #64e0ef;
    height: 55px;
    padding-left: 10px;
    color: #fff;
    font-size: 20px;
    line-height: 55px;
    text-shadow: 1px 1px 1px rgba(0,0,0,.3);
    box-sizing: border-box;
   }


   .header-row {
    background: #8b8b8b;
    color: #fff;

   }

  .row {
    display: table-row;
  }

  .cell {
    display: table-cell;
    
    padding: 6px; 
    border-bottom: 1px solid #e5e5e5;
    text-align: center;
  }

  .primary {
    text-align: left;
  }


  input[type="radio"],
  input[type="checkbox"]{
    display: none;
  }


  @media only screen and (max-width: 760px)  {



    #table {
      display: block;
      margin: 44px 0 0 0;
    }

    .caption {
      position: fixed;
      top: 0;
      text-align: center;
      height: 44px;
      line-height: 44px;
      z-index: 5;
      border-bottom: 2px solid #999;
    }

    .row { 
      position: relative;
      display: block;
      border-bottom: 1px solid #ccc; 

    }

    .header-row {
      display: none;
    }
    
    .cell { 
      display: block;

      border: none;
      position: relative;
      height: 45px;
      line-height: 45px;
      text-align: left;
    }

    .primary:after {
      content: "";
      display: block;
      position: absolute;
      right:20px;
      top:18px;
      z-index: 2;
      width: 0; 
      height: 0; 
      border-top: 10px solid transparent;
      border-bottom: 10px solid transparent; 
      border-right:10px solid #ccc;

    }

    .cell:nth-of-type(n+2) { 
      display: none; 
    }


    input[type="radio"],
    input[type="checkbox"] {
      display: block;
      position: absolute;
      z-index: 1;
      width: 99%;
      height: 100%;
      opacity: 0;
    }
    
    input[type="radio"]:checked,
    input[type="checkbox"]:checked {
      z-index: -1;
    }

    input[type="radio"]:checked ~ .cell,
    input[type="checkbox"]:checked ~ .cell {
      display: block;

      border-bottom: 1px solid #eee; 
    }

    input[type="radio"]:checked ~ .cell:nth-of-type(n+2),
    input[type="checkbox"]:checked ~ .cell:nth-of-type(n+2) {
      
      background: #e0e0e0;
    }

    input[type="radio"]:checked ~ .cell:nth-of-type(n+2):before,
    input[type="checkbox"]:checked ~ .cell:nth-of-type(n+2):before {
      content: attr(data-label);

      display: inline-block;
      width: 60px;
      background: #999;
      border-radius: 10px;
      height: 20px;
      margin-right: 10px;
      font-size: 12px;
      line-height: 20px;
      text-align: center;
      color: white;

    }

    input[type="radio"]:checked ~ .primary,
    input[type="checkbox"]:checked ~ .primary  {
      border-bottom: 2px solid #999;
    }

    input[type="radio"]:checked ~ .primary:after,
    input[type="checkbox"]:checked ~ .primary:after {
      position: absolute;
      right:18px;
      top:22px;
      border-right: 10px solid transparent;
      border-left: 10px solid transparent; 
      border-top:10px solid #ccc;
      z-index: 2;
    }
  }
  body{
	  background-color: white;
  }
		</style>
	</head>

	<body>
<ul class="nav nav-tabs">
  <li class=""><a href="#home" data-toggle="tab" aria-expanded="false">Főoldal</a></li>
  <li class="disbled"><a href="#userslist" data-toggle="tab" aria-expanded="true">Felhasználók</a></li>
  <li class="disbled"><a href="#messages" data-toggle="tab" aria-expanded="true">Üzenetek</a></li>
   <li class="disbled"><a href="#messages" data-toggle="tab" aria-expanded="true">Hírek</a></li>
    <li class="disbled"><a href="#messages" data-toggle="tab" aria-expanded="true">Bolt</a></li>

  <li class="dropdown open">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
      Teendő <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="#writeto" data-toggle="tab">Hír feltöltés</a></li>
			  <li><a href="#sharestore" data-toggle="tab">Bolt feltöltés</a></li>
      <li class="divider"></li>
      <li><a href="#dropdown2" data-toggle="tab">teendőlisták</a></li>
    <li><a href="#dropdown2" data-toggle="tab">események</a></li>
	<li><a href="#d" data-toggle="tab">kiírások</a></li>
	</ul>
  </li>
  <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong><?php echo $_SESSION['logged_in']['username']; ?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><?php echo $_SESSION['logged_in']['name']; ?></p>
                                        <p class="text-left small">(Bejelentkezve)</p>
                                        <p class="text-left">
                                            <a class="btn btn-primary btn-block btn-sm">Beállítások</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
										<form method="POST" action="">
                                        <input type="submit" name="logout" class="btn btn-danger btn-block btn-sm" value="kijelentkezés" />
                                        </form>
										</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
</ul>

<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="home">
  <form method="POST" action="" class="form-horizontal">
  <fieldset>
 <legend style="text-align:center">      <p>Felhasználok tevékenység naplója:</p></legend>
       <div class="form-group">

      <label for="inputEmail" class="col-lg-2 control-label">Keresés:</label>
      <div class="col-lg-2">
        <input type="text" name="searching" class="form-control" id="inputEmail" placeholder="Felhasználóra keresés...." required>
      </div>

      <div class="col-lg-1" style="padding-top:9px">
        <button type="submit" name="search" class="btn btn-primary">Keresés</button>
     </div>
      </div>
      </form>
      </br>



  <form method="POST" action="" class="form-horizontal">
        <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Rendezés beállítása:</label>
      <div class="col-lg-1">
        <select class="form-control" name="option">
          <option value="ORDER BY username ASC">ABC sorrend</option>
          <option value="ORDER BY username DESC">ABC visszafelé</option>
           <option value="">idő szerint</option>
       </form>
</select>  

      </div>
      <div class="col-lg-1" style="padding-top:9px">
        <button type="submit" name="rendez" class="btn btn-primary">Rendezés</button>
     </div>
    </div>
    
    </legend>

    </br>
    <section id="activity">
     <?php if(isset($_POST['rendez'])){

        Rendezes();

      } else if(isset($_POST['search'])){
        
          Search();
} else{ ?>
   <table border="3px">
    <thead>
      <th>Profikép</th>
      <th>Felhasználóneve</th>
      <th>Tevékenysége</th>
    </thead>
    <tbody>

   <?php


$felhasznalok = getUsers();

  foreach ($log as $loging) {


    echo "<tr>";
          echo "<td>";
             echo '<img src="' .$loging['picture']. '" width="50px" heigth="50px">';
         echo "</td>";

            echo "<td>";
             echo $loging['username'];
         echo "</td>";
         echo "<td>";
             echo $loging['descreption'];
         echo "</td>";

      echo "</tr>";

        echo "</tbody>";
  }


         echo "</table>";

    
}



  ?>
   </section>

  </fieldset>
   
      
    
  </div>
  <div class="tab-pane fade " id="s">
    <p>Felhasználok tevékenység naplója:</p>
  </div>
  <div class="tab-pane fade" id="dropdown1">
    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
  </div>
  <div class="tab-pane fade" id="messages">
   <div class="container">
	<div class="row">
		<h2>Üzenetek</h2>
	</div>
    <div class="qa-message-list" id="wallmessages">
    	<?php foreach($users as $user){?>
    				<div class="message-item" id="m16">
						<div class="message-inner">
							<div class="message-head clearfix">
								<div class="avatar pull-left"><a href="./index.php?qa=user&qa_1=Oleg+Kolesnichenko"><img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png"></a></div>
								<div class="user-detail">
									<h5 class="handle"><?php echo $user['category'];?></h5>
									<div class="post-meta">
										<div class="asker-meta">
											<span class="qa-message-what"> </span>
											<span class="qa-message-when">
												<span class="qa-message-when-data"><?php echo $user['sharedate']; ?></span>
											</span>
											<span class="qa-message-who">
												<span class="qa-message-who-pad">by </span>
												<span class="qa-message-who-data"><a href="./index.php?qa=user&qa_1=Oleg+Kolesnichenko"><?php echo $user['name']; ?></a></span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="qa-message-content">
								<?php echo $user['descreption'];?>
							</div>
					</div></div>
					<?php } ?>


</div>
</div>
</div>
   <div class="tab-pane fade" id="userslist">
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

			  if($felhasznalo['available'] == 0) echo "<img src='http://m.cdn.blog.hu/mi/mindenuruguay/image/1_16.jpg'  width='64px' heigth='64px'";
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
  </div>


	  <div class="tab-pane fade" id="writeto">
  <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data"> 
  <fieldset>
    <legend style="text-align:center">Hír feltöltése</legend>
	
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">hír címe:</label>
      <div class="col-lg-2">
        <input type="text" name="newsname" class="form-control" id="inputEmail" placeholder="Hír neve...." required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">tartalma:</label>

	  <div class="col-md-3 wow fadeInRight animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
				<textarea name="descreption" class="form-control textarea-box" placeholder="A hír tartalma" id="message" style="resize:none;height:150px"></textarea>
			</div>

    </div>
	 <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Kép hozzácsatolása:</label>
	    <div class="col-lg-2">
        <input type="file" name="image" class="form-control" >
		
      </div>

    </div>


	   <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" name="newsbtn" class="btn btn-primary">Hír Feltöltése</button>
		 </div>
      </div>

  </fieldset>
</form>
  </div>

	<div class="tab-pane fade" id="sharestore">



<?php
if(isset($_POST['do'])){

addCustoms();
}


?>
<form method="POST" action="" class="form-horizontal">
  <fieldset>
    <legend style="text-align:center">Bolt feltöltése</legend>
	
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Szín választék:</label>
      <div class="col-lg-2">
        <input type="color" name="color" value="">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Neve:</label>
	    <div class="col-lg-2">
        <input type="text" name="name" class="form-control" id="inputEmail" placeholder="Szín neve" required>
      </div>

    </div>
	 <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Ára:</label>
	    <div class="col-lg-2">
        <input type="number" name="price" class="form-control" id="inputEmail" placeholder="Ár beírása" step="20" min="10" max="5000" required>
      </div>

    </div>


	  <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Csillagozása:</label>
      <div class="col-lg-2">
        <select class="form-control" name="rating">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
	  <option>6</option>
		   <option>7</option>
		 <option>8</option>
  <option>9</option>
		   <option>10</option>
        </select>


      </div>
    </div>
	   <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" name="do" class="btn btn-primary">Bolt Feltöltése</button>
		 </div>
      </div>

  </fieldset>
</form>

</div>
</div>
   </div>
	</body>
</html>
