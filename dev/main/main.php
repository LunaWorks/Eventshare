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

class Main {


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


 // Egy látogató is hozzáférhet ezekhez a tartalmakhoz.

  public function Friends(){
	  include("tabs\ize.php");

  }

  public function Mainstuff(){
	include("tabs\mainstuffs.php");

}

  public function Anotherstuff(){

  include("tabs\posts.php");
  }
  
  public function Contact(){

  include("tabs\contact.php");
  }

    public function Shop(){

  include("tabs\shop.php");
  }
  
     public function Rate(){

  include("tabs/rate.php");
  }
  public function About(){

  include("tabs/about.php");


}




  // A felhasználóhoz tartozó file-ok.
  public function newFriend(){
    include("profile\getfriends.php");
  }

  public function Profile(){
	include("profile\profile.php");

  }

public function newNotes(){
	include("profile\usernote.php");

}

public function newList(){
	include("profile\list.php");

}
	  public function Update(){

  include("profile\apdejt.php");

    }

public function ownthings(){

  include("profile\own\own.php");


}

public function Eventshares(){

  include("profile/asd/event.php");


}


// Az Adminhoz tartozó file-ok.
	  public function users(){
	  include("profile\usersdata.php");

  }


}


  $m = new Main();

  if(isset($_GET['oldal'])){

	if($_GET['oldal']=='Mainstuff') $m->Mainstuff();
	if($_GET['oldal']=='ownthings')  $m->ownthings();
	if($_GET['oldal']=='users')  $m->users();
	if($_GET['oldal']=='newNotes')  $m->newNotes();
	if($_GET['oldal']=='newList')  $m->newList();
	if($_GET['oldal']=='Anotherstuff')  $m->Anotherstuff();
	if($_GET['oldal']=='Friends')  $m->Friends();
	if($_GET['oldal']=='newFriend')  $m->newFriend();
	if($_GET['oldal']=='Profile')  $m->Profile();
	if($_GET['oldal']=='contact')  $m->Contact();
    if($_GET['oldal']=='shop')  $m->Shop();
	if($_GET['oldal']=='events')  $m->Eventshares();
	if($_GET['oldal']=='rank')  $m->Rate();
	if($_GET['oldal']=='about')  $m->About();

	} else
	echo $m->Mainstuff();
	


  ?>
