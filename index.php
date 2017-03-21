	<?php include("log-reg.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="footer, address, phone, icons" />

	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<style>
.footer-distributed{
    background-color: black;
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
    box-sizing: border-box;
	width: 100%;
	text-align: left;
	font: bold 16px sans-serif;

	padding: 55px 50px;
	margin-top: 80px;
}

.footer-distributed .footer-left,
.footer-distributed .footer-center,
.footer-distributed .footer-right{
	display: inline-block;
	vertical-align: top;
}

/* Footer left */

.footer-distributed .footer-left{
	width: 30%;
}

/* The company logo */

.footer-distributed h3{
	color:  #ffffff;
	font: normal 36px 'Cookie', cursive;
	margin: 0;
}

.footer-distributed h3 span{
	color:  #ffffff;
}

/* Footer links */

.footer-distributed .footer-links{
	color:  #ffffff;
	margin: 20px 0 12px;
	padding: 0;
}

.footer-distributed .footer-links a{
	display:inline-block;
	line-height: 1.8;
	text-decoration: none;
	color:  inherit;
}

.footer-distributed .footer-company-name{
	color:  #8f9296;
	font-size: 14px;
	font-weight: normal;
	margin: 0;
}

/* Footer Center */

.footer-distributed .footer-center{
	width: 45%;
}

.footer-distributed .footer-center i{
	background-color:  #33383b;
	color: #ffffff;
	font-size: 25px;
	width: 38px;
	height: 38px;
	border-radius: 50%;
	text-align: center;
	line-height: 42px;
	margin: 10px 15px;
	vertical-align: middle;
}

.footer-distributed .footer-center i.fa-envelope{
	font-size: 17px;
	line-height: 38px;
}

.footer-distributed .footer-center p{
	display: inline-block;
	color: #ffffff;
	vertical-align: middle;
	margin:0;
}

.footer-distributed .footer-center p span{
	display:block;
	font-weight: normal;
	font-size:14px;
	line-height:2;
}

.footer-distributed .footer-center p a{
	color:  #5383d3;
	text-decoration: none;;
}


/* Footer Right */

.footer-distributed .footer-right{
	width: 20%;
}

.footer-distributed .footer-company-about{
	line-height: 20px;
	color:  #000000;
	font-size: 13px;
	font-weight: normal;
	margin: 0;
}

.footer-distributed .footer-company-about span{
	display: block;
	color:  #000000;
	font-size: 14px;
	font-weight: bold;
	margin-bottom: 20px;
}

.footer-distributed .footer-icons{
	margin-top: 25px;
}

.footer-distributed .footer-icons a{
	display: inline-block;
	width: 35px;
	height: 35px;
	cursor: pointer;
	background-color:  #33383b;
	border-radius: 2px;

	font-size: 20px;
	color: #ffffff;
	text-align: center;
	line-height: 35px;

	margin-right: 3px;
	margin-bottom: 5px;
}

/* If you don't want the footer to be responsive, remove these media queries */

@media (max-width: 880px) {

	.footer-distributed{
		font: bold 14px sans-serif;
	}

	.footer-distributed .footer-left,
	.footer-distributed .footer-center,
	.footer-distributed .footer-right{
		display: block;
		width: 100%;
		margin-bottom: 40px;
		text-align: center;
	}

	.footer-distributed .footer-center i{
		margin-left: 0;
	}

}

h1{
	
	background-color:white;
	margin-top: 1000px;
}
#myCarousel{
	
	padding-top: 100px;
	
}
input[type=text], input[type=password] {
  display: block;
  margin: 10px 0;
}

</style>
<script>
function myFunction() {
    var x;
    if (confirm("Szeretnéd az adatot törölni?") == true) {
        x = "igen!";
    } else {
        x = "nem!";
    }
    document.getElementById("demo").innerHTML = x;
}

function myFunction2() {
    var x;
    if (confirm("Szeretnéd az adatot modósítani?") == true) {
        x = "igen!";
    } else {
        x = "nem!";
    }
    document.getElementById("demo").innerHTML = x;
}

</script>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});

$(document).ready(function(){
    $("#regigomb").click(function(){
        $("#regi").modal();
    });
});

$(document).ready(function(){
    $("#load").click(function(){
        $("#loading").modal();
		
    });
});


</script>
<script>
// ----- Setup: add dummy password text field and add toggle button
$('input[type=password]').each(function(){
  var el = $(this), elPH = el.attr("placeholder");
  
  el.addClass("offPage").before('<input type="text" class="passText" placeholder="' + elPH + '" />');
});

$('form').append('<small><a href="#" class="togglePassText">Toggle Password Visibility</a></small>');


// ----- keep text in sync
$('input[type=password]').keyup(function(){
  var elText = $(this).val();
  $('.passText').val(elText);
});
$('.passText').keyup(function(){
  var elText = $(this).val();
  $('input[type=password]').val(elText);
});

// ----- Toggle button functions
$('a.togglePassText').click(function(e){

  $('input[type=password], .passText').toggleClass("offPage");

  // -- prevent any default actions
  e.preventDefault();

});
</script>

 <!-- Menu bar való együtt mozgás-->
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
 
 <!-- Custom CSS -->
   <link href="carousel.css" rel="stylesheet">
    <link href="tableformat.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
</head>
<body>
  <div class="w3-top">
  <h1>Üdvözöllek a ShareSite-on!</h1>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Főoldal</a></li>
        <ul class="dropdown-menu">
          <li><a href="#">Események és emlékeztetők tárolása</a></li>
        </ul>
      </li>
      <li><a href="index.php?oldal=ismerosok">Ismerősök bejegyzései</a></li>
	  <li><a href="index.php?oldal=kapcsolat">Kapcsolat</a></li>
	  <li><a href="index.php?a=another">Bemutató és érdekességek</a></li>
    <form class="navbar-form navbar-left">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Keresés...">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit">
          <i class="glyphicon glyphicon-search"></i>
        </button>
      </div>
    </div>
  </form>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php if (!isset($_SESSION['logged_in'])){?>
      <li><button type="button"  class="btn btn-default btn-lg" id="regigomb"><span class="glyphicon glyphicon-log-in"></span> Regisztrálás</span></button></li>
      <li><button type="button"   class="btn btn-default btn-lg" id="myBtn"><span class="glyphicon glyphicon-user"></span> Bejelentkezés</span></button></li>

    <?php
  } else if($_SESSION['logged_in']['available'] == 0) {
    ?>

    <li><button type="button" class="btn btn-default btn-lg" id="regigomb"><span class="glyphicon glyphicon-log-in"></span> Regisztrálás</span></button></li>
      <li><button type="button"   class="btn btn-default btn-lg" id="myBtn"><span class="glyphicon glyphicon-user"></span> Bejelentkezés</span></button></li>

	  <?php
  } else {
    ?>
<nav class="w3-sidenav w3-white w3-animate-right" style="display:none;right:0;z-index:3" id="rightMenu">
  <a href="javascript:void(0)" onclick="closeRightMenu()"
  class="w3-closenav w3-large">Close &times;</a>
  <a href="#"></a>
  <a href="index.php?valami=profile">Profil oldal</a>
  <a href="#">Újabb jegyzetek felvétele</a>
  <a href="#">Ismerősök listája</a>
  <a href="#">Kijelentkezés</a>
</nav>
<div class="w3-overlay w3-animate-opacity" 
onclick="closeRightMenu()" style="cursor:pointer" id="myOverlay"></div>

<header class="w3-container">
  <span class="w3-opennav w3-xlarge" onclick="openRightMenu()"><?php 
		echo '<a href="#">'.'<img src="' . $_SESSION['logged_in']['picture']. '" width="40px" heigth="40px">'.$_SESSION['logged_in']['name'].'</a>'.'</li>';
      }
    ?></span>

</header>



</div>

    </ul>
  </div>

</nav>
</div>

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
                   <h2>iskolai jegyezetek és fontos események!</h2>
               </div>
           </div>
           <div class="item">
               <!-- Set the second background image using inline CSS below. -->
               <div class="fill" style="background-image:url('http://www.sayidy.net/sites/default/files/main/articles/organizing_a_group.jpg');" ></div>
               <div class="carousel-caption">
                   <h2>Barátaiddal események létrehozása</h2>
               </div>
           </div>
           <div class="item">
               <!-- Set the third background image using inline CSS below. -->
               <div class="fill" style="background-image:url('http://hellomagyarok.hu/assets/media/pages/1500/lista1.jpg');"></div>
               <div class="carousel-caption">
                   <h2></h2>
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
        <?PHP  include("pages.php"); ?>
   <footer class="footer-distributed">

			<div class="footer-left">
<div class="row"><span class="hidden-xs">
				<h3><span></span><a href="http://scf.edu/library"> <img src="http://lgimages.s3.amazonaws.com/data/imagemanager/22114/scf_libraries180x70.jpg"</span></h3></a>



				<p class="footer-links">
					<a href="http://discover.linccweb.org/primo_library/libweb/action/myAccountMenu.do?vid=FLCC1500">Your Account</a><p></p>
					·
					<a href="http://www.libsurveys.com/loader.php?id=117">Feedback</a><p></p>
					·
					<a href="http://www.linccweb.org/Linking.aspx">LINCCweb Links</a><p></p>
					·
					<a href="mailto:LibrarySuggestionBox@scf.edu">Suggestion Box</a><p></p>
					·
				
					<a href="http://libguides.scf.edu/c.php?g=119436&p=779092">Image Attribution</a>
				</p>

			
                </span>
			</div>
            </div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Hours: <a href="http://libguides.scf.edu/c.php?g=102813&p=710449">Bradenton</a> | <a href="http://libguides.scf.edu/c.php?g=102813&p=710461">Venice</a> | <a href="http://libguides.scf.edu/c.php?g=102813&p=710462">Lakewood Ranch</a> </span>
                    <a href="http://www.scf.edu/AboutSCF/Locations/default.asp">Maps</a></p>
				</div>

			<div>
<i class="fa fa-phone"></i>
<p><span>Bradenton Library : 941-752-5305</span><br>
                </div>
                
                <div>
                    <i class="fa fa-phone"></i>
                    <p><span>Venice Library : 941-408-1435</span></br>
                </div>
                
                <div>
                     <i class="fa fa-phone"></i>
                    <p><span>Lakewood Ranch : 941- 363-7250</span></p>
</div>

                <div>
                    <i class="fa fa-mobile"></i>
                    <p><span>Text: (941) 270-9643 | Twitter: @SCFLibraries</span></p>
                    
                </div>




				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="http://www.askalibrarian.org/vrl_intro.php?library=FLCC1500">Ask A Librarian</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
                </br>
                </br>
                </br>
                <div class="row"><span class="hidden-xs">
					<span><h3>További elérhetőség:</span></h3><p></p>
					<h4><font color="white">Az oldalt meg is lehet találni különböző feljegyzésekben.
				</p>
                </div>
                </span>

				<div class="footer-icons">

					<a href="https://www.facebook.com/statecollegeoffloridalibraries/" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com/scflibraries" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.instagram.com/scf_libraries/" target="_blank"><i class="fa fa-instagram"></i></a>
					<a href="https://www.pinterest.com/scflibraries/" target="_blank"><i class="fa fa-pinterest"></i></a>
                    <a href="https://www.linkedin.com/in/state-college-of-florida-libraries-a3a91a111" target="_blank"><i class="fa fa-linkedin"></i></a>
                    <a href="https://www.youtube.com/user/SCFLibrary" target="_blank" > <i class="fa fa-youtube"></i></a>
                    
                    </br>
                </br>
                    
                    
                   <font><h4>Készítette: <br>Rápolthy Bálint © 2017</h4></font>


<div><div><div>
				</div>

			</div>

		</footer>

 <script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Script a hit -->
<script>
$('.carousel').carousel({
    interval: 3000 //kép menetének sebessége
})
</script>
  <script>
function openRightMenu() {
	 document.getElementById("myOverlay").style.display = "block";
    document.getElementById("rightMenu").style.display = "block";
}
function closeRightMenu() {
	 document.getElementById("myOverlay").style.display = "none";
	
    document.getElementById("rightMenu").style.display = "none";
}
</script>
     
</body>
</html>
	