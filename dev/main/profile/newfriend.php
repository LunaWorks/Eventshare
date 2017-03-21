<?php
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
?>
  