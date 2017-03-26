<?php
include_once("mydb.php");


if(isset($_SESSION['logged_in'])){
  function watch(){

    $conn = MyDB::getConnection();

    $userid = $_SESSION['logged_in']['id'];
    $usernot = $_SESSION['logged_in']['notification'];

    $sql = "UPDATE users set notification = notification - 1  WHERE id = '$userid'";

    $result = $conn->query($sql);

    if ($result === true){
    } else {
      echo "Hiba!";
    }

  }

  if(isset($_POST['view'])){
    watch();
  }

  function getnotific() {

    $conn = MyDB::getConnection();
    $conn->query("set names utf8");
    $name = $_SESSION['logged_in']['id'];


    $sql = "SELECT * FROM users where legitimacy  = 'diak' AND id = '$name'";
    $result = $conn->query($sql);
    $felhasznalo = [];

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $felhasznalo[] = $row;

      }
    }


    return $felhasznalo;
  }
  $felhasznalo = getnotific();

  function getAll() {

    $conn = MyDB::getConnection();
    $conn->query("set names utf8");
    $name = $_SESSION['logged_in']['id'];


    $sql = "SELECT COUNT(*)as 'allnotification' FROM message WHERE message.otherid = '$name' OR '$name' IN ( SELECT othersid FROM friends)";
    $result = $conn->query($sql);
    $all = [];

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $all[] = $row;

      }
    }


    return $all;
  }
  $all = getAll();


}

?>
<script>
function ajax(){

  var req = new XMLHttpRequest();

  req.onreadystatechange = function(){

    if(req.readyState == 4 && req.status == 200){

      document.getElementById('notification').innerHTML = req.responseText;
    }
  }
  req.open('GET','main/index.php',true);
  req.send();

}
setInterval(function(){ajax()},1000);
</script>
<div class="jumbotron" style="margin:-50px" onload="ajax();">
  <div class=""><h1>EventShare</h1></div>
</div>
<?php if(isset($_SESSION['logged_in'])){
  foreach ($felhasznalo as $user) {

    ?>

    <nav class="navbar navbar-inverse" style="margin:0px;background-color:<?php echo $user['custom'];?>;">
      <?php  }
    } else { ?>
      <nav class="navbar navbar-inverse" style="margin:0px">
        <?php } ?>
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#"></a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="index.php">Főoldal</a>
            </li>
            <li id="second"><a href="index.php?oldal=contact">Kapcsolat</a></li>

          </li>
          <?php if (isset($_SESSION['logged_in'])){?>
            <li><a href="index.php?oldal=Anotherstuff">Értesítések</a></li>
            <li id="first"><a href="index.php?oldal=Friends">Ismerősök bejegyzései</a></li>
            <li id="first"><a href="index.php?oldal=shop">Share vásárlás</a></li>
            <li id="second"><a href="index.php?oldal=rank">Oldal értékelése</a>
              <?php } else if (!isset($_SESSION['logged_in'])){

                ?>	  <li id="second"><a href="index.php?oldal=about">Oldal leírása</a></li><?php
              } ?>
              <form class="navbar-form navbar-right">



              </form>
            </ul>
            <div class="col-md-2 col-md-offset-0">
              <form action="https://google.com/search" method="get" class="search-form">
                <div class="form-group has-feedback">
                  <label for="search" class="sr-only">Keresés...</label>
                  <input type="text" class="form-control" name="q" placeholder="Keresés..."/>
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </form>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <?php if (!isset($_SESSION['logged_in'])){?>

                <li><a id="regigomb"><span class="glyphicon glyphicon-log-in"></span> Regisztrálás</span></a></li>
                <li><a id="myBtn"><span class="glyphicon glyphicon-user"></span> Bejelentkezés</span></a></li>

                <?php
              } else if($_SESSION['logged_in']['available'] == 0) {
                ?>

                <li><a  id="regigomb"><span class="glyphicon glyphicon-log-in">Regisztrálás</span></a></li>
                <li><a  id="myBtn"><span class="glyphicon glyphicon-user"></span> Bejelentkezés</span></a></li>

                <?php
              } else {
                ?>
                <nav class="w3-sidenav w3-white w3-animate-right" style="display:none;right:0;z-index:3;height:180px" id="rightMenu">
                  <a href="javascript:void(0)" onclick="closeRightMenu()"
                  class="w3-closenav w3-large">Close &times;</a>
                  <a href="index.php?oldal=Profile">Profil oldal és létrehozások</a>
                  <a href="index.php?oldal=ownthings">Saját tároló</a>
                  <a href="index.php?oldal=events">Események</a>
                  <hr>
                  <a href="index.php?oldal=events">Profil beállítások</a>
                  <a href="">
                    <form method="POST" action="">
                      <button type="submit" name="logout" class="hidden-xs">KIjelentkezés</button>
                    </form>
                  </a>
                </nav>
                <div class="w3-overlay w3-animate-opacity"
                onclick="closeRightMenu()" style="cursor:pointer" id="myOverlay"></div>
                <form method="POST" action="">
                  <header class="w3-container">
                    <div>
                    </div>

                    <?php
                    foreach ($all as $allnot) {
                      ?> <div class=" w3-dropdown-hover"   id="notification"> <?php
                      echo '<a href="index.php?oldal=Anotherstuff"  data-placement="bottom"> <span class="w3-badge w3-right w3-small w3-red">'. $allnot['allnotification'].'</span>
                      <span class="fa fa-envelope" aria-hidden="true" style="font-size:30px;"></span>
                      </a>';
                      ?></div><?php

                      ?> <div class=" w3-dropdown-hover" id="notification">  <?php
                      echo '<a href="index.php?oldal=events"  data-placement="bottom"   class="badge1" name="view"> <span class="w3-badge w3-right w3-small w3-red"></span>
                      <span class="glyphicon glyphicon-bell" style="font-size:30px;"></span>
                      </a>';

                    }
                    ?>

                  </div>
                  <span class="w3-opennav w3-xlarge" onclick="openRightMenu()">
                  </form>
                  <?php

                  echo '<a href="#">'.'<img class="profpic" src="' . $_SESSION['logged_in']['picture']. '">'.$_SESSION['logged_in']['username'].'</a>'.'</br>';
                  echo "<div class='logged'>(Bejelentkezve)</div>";
                }  ?>
              </span>
            </header>

          </div>
        </ul>
      </nav>
      <script>
      $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
      });
      </script>

      <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
          <div class="item active">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('https://binary.edu.my/web/wp-content/uploads/2015/12/The-First-Few-Weeks-Of-University-Life.jpg');"></div>
            <div class="carousel-caption">
            </br>
            <h3>iskolai jegyezetek és fontos események!</h3>
          </div>
        </div>
        <div class="item">
          <!-- Set the second background image using inline CSS below. -->
          <div class="fill" style="background-image:url('http://www.sayidy.net/sites/default/files/main/articles/organizing_a_group.jpg');" ></div>
          <div class="carousel-caption">
            <h3>Barátaiddal események létrehozása</h3>
          </div>
        </div>
        <div class="item">
          <!-- Set the third background image using inline CSS below. -->
          <div class="fill" style="background-image:url('http://hellomagyarok.hu/assets/media/pages/1500/lista1.jpg');"></div>
          <div class="carousel-caption">
            <h3>Teendő lista</h3>
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
      </a>
    </header>
