<?php

if(isset($_SESSION['logged_in'])){

?>
<div class="container">
<div class="col-lg-6 col-sm-6">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="<?php echo $_SESSION['logged_in']['picture'] ?>">
        </div>
        <div class="useravatar">
		<a data-toggle="collapse" href="#collapse1"><img src="<?php echo $_SESSION['logged_in']['picture'] ?>" height="150px" width="110px"></a>
        </div>
        <div class="card-info"> <span class="card-title"><?php echo '<a href="index.php?s=update">'.$_SESSION['logged_in']['name'].'</a>'?></span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Új feljegyzés</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">új teendőlista</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Ismerős felvétele</div>
            </button>
        </div>
		  <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Beállítások</div>
            </button>
        </div>
		  <div class="btn-group" role="group">
            <button type="submit" class="btn btn-default" name="logout" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Kijelentkezés</div>
            </button>
        </div>	
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
			  <h3>This is tab 1</h3>
        </div>
        <div class="tab-pane fade in" id="tab2">
          <h1>Adat modósítás</h1>
        <form action="" method="post">
           <label for="email">Teljesnév modósítás:</label>
          <input type="text" name="name" value="<?php echo $_SESSION['logged_in']['name'] ?>" />
          </br></br>
          <label for="email">Jelszó modósítás:</label>
          <input type="text" name="password" placeholder="add meg új jelszavad" >
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
		</div>
        <div class="tab-pane fade in" id="tab3">
          <h3><?php
		  
		  	echo "Bejelentkezés Dátuma: " .$_SESSION['logged_in']['logindate'];
      echo "</br>";
      echo "Korod: " .$_SESSION['logged_in']['age'];
        echo "</br>";
      echo "Posztok száma: " .$_SESSION['logged_in']['share'];
		  ?></h3>
        </div>
      </div>
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
  } else {
    echo "JELENTKEZZ BE!";
  }

  }
  