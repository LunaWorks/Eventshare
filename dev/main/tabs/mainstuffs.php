
<?php

        function countAll() {

        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'sharebase';


        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->query("set names utf8");



        $sql = "SELECT COUNT(*) as 'all' FROM users WHERE legitimacy = 'diak' ";
        $result = $conn->query($sql);
        $usernumber = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $usernumber[] = $row;

            }
        }


    return $usernumber;
    }
    $usernumber = countAll();

	 function getAvg() {

        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'sharebase';


        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->query("set names utf8");



        $sql = "SELECT AVG(rate) as 'average' FROM rating ";
        $result = $conn->query($sql);
        $avg = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $avg[] = $row;

            }
        }


    return $avg;
    }
    $avg = getAvg();
	
     function getUserAble() {

        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'sharebase';


        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->query("set names utf8");



        $sql = "SELECT COUNT(id) as 'able' FROM users WHERE loggedin = 1 AND legitimacy = 'diak';";
        $result = $conn->query($sql);
        $ables = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $ables[] = $row;

            }
        }


    return $ables;
    }
    $ables = getUserAble();
		function getNews() {

		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'sharebase';


		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn->query("set names utf8");



		$sql = "SELECT * FROM news order by id DESC";
		$result = $conn->query($sql);
		$news = [];

		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		    	$news[] = $row;

		    }
		}


	return $news;
	}
	$news = getNews();

    function getVisits() {

        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'sharebase';


        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->query("set names utf8");



        $sql = "SELECT COUNT(*) as 'visit' FROM adminlog WHERE descreption LIKE 'Bejelentkezett'";
        $result = $conn->query($sql);
        $visits = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $visits[] = $row;

            }
        }


    return $visits;
    }
    $visits = getVisits();

?>
 </br>
 <head>
<style>
    #panel {
    display: none;
}
  /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px;}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 8000px) {
      .row.content {height: auto;} 
    }

</style>

<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideDown("slow");
         $('#flip').hide(); 
		
		}); 
});



</script>

</head>
 <div class="container-fluid text-center">
  <div class="row content" style="width:2000px;" >
    <div class="col-sm-2 sidenav"   style="overflow:scroll;">

 <div class="header">
   Mai hírek
   </div>
   
	<?php foreach($news as $new){ ?>
       <div class="w3-card-4 w3-margin w3-white">
       <?php if($new['image'] != ""){ ?>
    <img src="<?php echo $new['image'];?>"  style="width:100%"/>
    <?php } ?>

    <div class="w3-container w3-padding-8">
      <h2><b><?php echo $new['name'];?></b></h2>
      <h5><span class="w3-opacity"><?php echo $new['time'];?></span></h5>
    </div>

    <div class="w3-container" >
      <p id="panel" style="text-align:justify;"><?php echo $new['descreption'];?></p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-button w3-padding-large w3-white w3-border" id="flip"><b>READ MORE »</b></button></p>
        </div>
      </div>
    </div>
  </div>
	<?php } ?>

    </div>


    <div class="col-sm-10 text-left">

	         <section id="contact-section" class="contact-section section" style="padding:0px;margin-right:700px">
            <h2 class="section-title">Üdvözlet</h2>
            <div class="intro">
			 <p>Ha még új vagy az oldalon, és szeretnéd kipróbálni, itt van rá a lehetőség!</p>
    
                <div class="dialog">
                    <p>.</p>
                    <p><strong>Lehetőségek:</strong></p>
                    <ul class="list-unstyled service-list" style="color:black;font-size:25px;padding-right:0;">
                        <li><i class="fa fa-check" aria-hidden="true"></i>Bármit fel tudsz jegyezni, és azt megosztani másokkal</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>Teendő listát a napjaidról</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>Feljegyezni bizonyos eseményeket</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>Ismerősök felvétele és annak üzenet írása</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>pontokat gyűjteni és más eseményekre való belépés</li>
              
				   </ul>
         <!--//social-->
                </div><!--//diaplog-->
            </div><!--//intro-->

        </section><!--//section-->

		 <section class="module" style="padding-right:1000px">
                    <div class="container-fluid container-custom">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4>Az oldalról:</h4>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <!-- Counter-->
                                    <div class="col-xs-6">
                                        <div class="counter">
                                        <?php  foreach($usernumber as $all){ ?>
                                            <h2 class="counter-number"><span class="counter-timer" data-from="0" data-to="12000"><?php echo $all['all']; ?></span></h2>
                                            <?php } ?>
                                            <div class="counter-title">Összes felhasználó</div>
                                        </div>
                                    </div>
                                    <!-- Counter end-->
                                    <!-- Counter-->
                                    <div class="col-xs-6">
                                        <div class="counter">
                                        <?php  foreach($visits as $visit){ ?>
                                            <h2 class="counter-number"><span class="counter-timer" data-from="0" data-to="8"><?php echo $visit['visit']; ?></span></h2>
                                            <?php } ?>
                                            <div class="counter-title">Látogatotság </div>
                                        </div>
                                    </div>
                                    <!-- Counter end-->
                                    <!-- Counter-->

                                    <div class="col-xs-6">
                                        <div class="counter">
										      <?php  foreach($avg as $rating){ ?>
                                            <h2 class="counter-number"><span class="counter-timer" data-from="0" data-to="18">10/<?php echo round($rating['average']*10)/10; ?></span></h2>
                                             <?php } ?>
											<div class="counter-title">Oldal értékelése</div>
                                        </div>
                                    </div>
									 <div class="col-xs-6">
                                        <div class="counter">
										      <?php  foreach($ables as $able){ ?>
                                            <h2 class="counter-number"><span class="counter-timer" data-from="0" data-to="18"><?php echo $able['able']; ?></span></h2>
                                             <?php } ?>
											<div class="counter-title">Bejelentkezett felhasználók az oldalon</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

 




    </div>
  </div>
</div>

