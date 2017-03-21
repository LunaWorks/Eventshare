<?php



if(isset($_SESSION['logged_in'])){
require("profilupdate.php");
?>
<style>



/* Style the input */
input {
  border: none;
  width: 40%;
  padding: 10px;
  float: left;
  font-size: 16px;
}

</style>
<div class="container">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="<?php ?>">
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
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab">&#9998;
                <div class="hidden-xs">új teendőlista</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Ismerős felvétele</div>
            </button>
        </div>
		<div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab5" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Esemény létrehozása</div>
            </button>
        </div>

		  <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab6" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Beállítások</div>
            </button>
        </div>
		  <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab4" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Ismerősnek levélírás</div>
            </button>
        </div>

 </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
			<?php include("user\usernote.php");?>

        </div>
		    <div class="tab-pane fade in" id="tab2">
			<?php include("user\list.php"); ?>
        </div>
		   <div class="tab-pane fade in" id="tab3">
			<?php include("user\myfriends.php"); ?>

        </div>

		<div class="tab-pane fade in" id="tab5">
			<?php include("user\celendar.php"); ?>

        </div>
			 <div class="tab-pane fade in" id="tab4">
			<?php include("user\written.php"); ?>

        </div>

        <div class="tab-pane fade in" id="tab6">
			<?php include("user\options.html"); ?>

        </div>
		

		
		</div>

      </div>
  </div>


    <?php
  } else {
    echo "JELENTKEZZ BE!";
  }
