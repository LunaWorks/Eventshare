
<?php
  include("dbhandler.php");
  //Adatbázis kapcsolat
  $dbHandler = new DbHandler("localhost","root","");
  $dbHandler->connect();

  $dbHandler->select_db("sharebase");
  $jegyzetek = $dbHandler->selectAll("users");

  $dbHandler->select_db("shareitems");
  $masik = $dbHandler->selectAll("notes");

  while($row = mysqli_fetch_array($masik)){

       $name = $row['category'];
       $username = $row['descreption'];
       $pass = $row['sharedate'];


       echo "<ul>";
           echo "<li>" ."Kategória: ".$name."</li>";
       echo "</ul>";
       echo "<ul>";
           echo "<li>" ."leírás: ".$username."</li>";
       echo "</ul>";
       echo "<ul>";
           echo "<li>"."megosztás dátuma: ".$pass."</li>";
       echo "</ul>";

  while($row = mysqli_fetch_array($jegyzetek)){
       $name = $row['name'];
       $username = $row['username'];
       $pass = $row['password'];
       $able = $row['available'];
       $log = $row['logindate'];

       echo "<ul>";
           echo "<li>" ."Felhasználónév: ".$name."</li>";
       echo "</ul>";
       echo "<ul>";
           echo "<li>" ."Felhasználónév: ".$username."</li>";
       echo "</ul>";
       echo "<ul>";
           echo "<li>"."Jelszó: ".$pass."</li>";
       echo "</ul>";
       echo "<ul>";
           echo "<li>"."Elérhetőség: ".$able."</li>";
       echo "</ul>";
       echo "<ul>";
           echo "<li>"."Bejentkezés dátuma: ".$log."</li>";
       echo "</ul>";

   }
}



 ?>
