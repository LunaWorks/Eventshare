<?php

function send(){
 //Ha form lefut, illesze be az adatokat az adatbázisba.
 $servername = "localhost";
 $connUser = "root";
 $connPass = "";
 $dbname = "sharebase";

 $conn = new mysqli($servername, $connUser, $connPass, $dbname);
 	$conn->query("set names utf8");
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
 $sql = "INSERT INTO contact (adminid, who, letter, email,subject,date)
            VALUES ('26', '$name','$message', '$subject', '$email',now())";
    $result = $conn->query($sql);
 if ($result === TRUE){
	 echo "Üzenet elküldve!";
	 echo "<a href='index.php?oldal=contact'>Vissza az üzenetíráshoz</a>";
	 	 exit;
 } else {
	 echo "HIBA!" . var_dump($sql);
	 }
 }
 
 if(isset($_POST['submit'])){
	 send();
 }

 ?>
<html>
<head>
<meta charset="UTF-8" />

</head>
<body>
<section class="contact-us" id="contact">
<div class="container">
	
	<!-- SECTION HEADER -->
        <div class="section-header">
		
		<!-- SECTION TITLE -->
		<h2 class="white-text">Kapcsolat a fentartóval</h2>
		
		<!-- SHORT DESCRIPTION ABOUT THE SECTION -->
		<h6 class="white-text">
				Esetleg kérdésed támadt, vagy valami probléma adódott? 
				Írj üzenetet az oldal fentartójának!
				
		</h6>
	</div>
	<!-- / END SECTION HEADER -->
	
	<!-- CONTACT FORM-->
	<div class="row">
		<form method="POST" action="">
			<div class="wow fadeInLeft animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
			<div class="col-lg-4 col-sm-4">
				<input type="text" name="name" placeholder="Your Name" class="form-control input-box" id="name">
			</div>
			<div class="col-lg-4 col-sm-4">
				<input type="email" name="email" placeholder="Your Email" class="form-control input-box" id="email">
			</div>
			<div class="col-lg-4 col-sm-4">
				<input type="text" name="subject" placeholder="Subject" class="form-control input-box" id="subject">
			</div>
			</div>
			
			<div class="col-md-12 wow fadeInRight animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
				<textarea name="message" class="form-control textarea-box" placeholder="Your Message" id="message" style="resize:none;height:150px"></textarea>
			</div>
			<!-- IF MAIL SENT SUCCESSFULLY -->

			<input class="btn btn-primary custom-button wow fadeInLeft animated" name="submit"  type="submit" value="Üzenet küldése" />
		</form>
	</div>
	<!-- / END CONTACT FORM-->
</div> <!-- / END CONTAINER -->
</section> 
</body>
</html>