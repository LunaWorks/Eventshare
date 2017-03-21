<?php


function addEvents(){

  $conn = kapcsolodasUsers();

  $startingtime = $_POST['startingtime'];
  $endingtime = $_POST['endingtime'];
  $descreption = $_POST['descreption'];
  $place = $_POST['place'];
  $who = $_POST['who'];
  $userid = $_SESSION['logged_in']['id'];

  $sql = "INSERT INTO celendarevents (userid,who,descreption,place,startingtime,endingtime) VALUES ('$userid','$who','$descreption','$place','$startingtime','$endingtime');";

  $result = $conn->query($sql);

  if ($result === true){
    ?>
    <div class="container">
    <div class="alert alert-success alert-dismissable" style="margin-right: 920px;">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
      <strong>Esemény létrehozva!</strong>
    </div>
    </div>
    <?php
  } else {
    echo "Hiba!";
  }


$userid = $_SESSION['logged_in']['id'];


  $query = "INSERT INTO adminlog
  (userid,descreption)
  VALUES (
    '$userid',
    'Új Eseményt hozott létre'
      )";

if ($conn->query($query) === TRUE) {
} else {
echo "Error: " . $query . "<br>" . $conn->error;
}

 $conn->close();
  }


  



if(isset($_POST['do'])){

addEvents();
}


?>
<form method="POST" action="" class="form-horizontal">
  <fieldset>
    <legend>Esemény létrehozása</legend>
	 <span class="help-block">Akiket megjelölsz rajta, látják, hogy eseményt hoztál létre.(Nem kötelező)</span>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Kivel:</label>
      <div class="col-lg-4">
        <input type="text" name="who" class="form-control" id="inputEmail" placeholder="Kivel szándékozol menni?">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Hol:</label>
	    <div class="col-lg-4">
        <input type="text" name="place" class="form-control" id="inputEmail" placeholder="hol lesz?" required>
      </div>

    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label" >Leírás:</label>
      <div class="col-lg-10">
        <input class="form-control" name="descreption" rows="4" id="textArea" style="margin: 0px -0.84375px 0px 0px; height: 76px; width: 347px;" placeholder="pld: Elmegyünk hegyet mászni és megnézzük ezt meg azt stb.." required /></textarea>
      </div>
    </div>

	 <div class="form-group">
	 <label for="inputPassword" class="col-lg-2 control-label">Mettől:</label>

	   <div class="col-lg-10">
  <input type="date" name="startingtime"   min="1979-12-31" max="2100-12-31" required><br>
   </div>
   </div>
    <div class="form-group">
	 <label for="inputPassword" class="col-lg-2 control-label">Meddig:</label>

	   <div class="col-lg-10">
  <input type="date" name="endingtime"  min="1979-12-31" max="2100-12-31" required><br>
   </div>
   </div>
   

    <div class="form-group">
      <div class="col-lg-8 col-lg-offset-2">
        <button type="submit" name="do" class="btn btn-primary">Esemény létrehozása</button>
		 </div>
      </div>

  </fieldset>
</form>
