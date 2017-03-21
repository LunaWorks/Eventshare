 <?php
	
	 	function colorCustom(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sharebase";
 

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    } 
		

  $conn->set_charset("utf8");

		$id = $_SESSION['logged_in']['id'];
		$sql = "SELECT * FROM shop";
		
		$result = $conn->query($sql);
		$customs = [];
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$customs[] = $row;
		
			}
		} 
					
		return $customs;
	}
	$customs = colorCustom();
	
            function shopping(){

                        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'sharebase';


        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->query("set names utf8");

         $id = $_SESSION['logged_in']['id'];

            $ertek = $_POST['ertek'];



                $sql = "UPDATE users set sharepoint = sharepoint- $ertek WHERE id = '$id'";


                    $result = $conn->query($sql);

                if ($result === true){
                    echo "-".$ertek;
                } else {
                    echo "Hiba!";
                }


        }

        function custom(){

                     $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'sharebase';


        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->query("set names utf8");

        $userid = $_SESSION['logged_in']['id'];
        $color = $_POST['color1'];

        $sql = "UPDATE users set custom = '$color' WHERE id = '$userid'";


        $result = $conn->query($sql);

        if ($result === true){
          echo "<script>
         $(document).ready(function(){
             $('#success').modal('show');
         });
    </script>";

        } else {
            echo "Hiba!";
        }

    }
    if(isset($_POST['buy'])){
      if(($_SESSION['logged_in']['sharepoint'] - $_POST['ertek']) < 0){
        echo "<script>
         $(document).ready(function(){
             $('#thankyouModal').modal('show');
         });
    </script>";
      } else if(($_SESSION['logged_in']['sharepoint']) - $_POST['ertek'] >= 0){

        custom();
        shopping();
      }
    }
    ?>
    <div class="w3-container">


  <div class="w3-card-4" style="width:50%;">
    <header class="w3-container w3-white">
      <h2>Share Vásárló</h2>
    </header>

    <div class="w3-container">

    </div>

    <footer class="w3-container w3-blue">
      <h5><p>Ha már van elegendő pontod, akkor néz körül a bolt kínálatában, és saját tetszésed szerint vásárolj!</p></h5>
    </footer>
  </div>
</div>
<div class="w3-container">
                <div class="row">
                      <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
							<img style="background-color:black;height:150px;width:320px"> 
                            <div class="caption">
                                <h4 class="pull-right">0 sp</h4>
                                <h4>Alapértelmezett
                                </h4>
                            </div>
                            <div class="ratings">
                                        <p>
                                    <span class="glyphicon glyphicon-star"></span>

                                </p>

                            </div>

                        <form method="POST" action="">

                         <input type="hidden" name="ertek" value="0"/>
                         <input type="hidden" name="color1" value="black"/>
                        <input type="submit" name="buy" class="btn btn-primary" value="Alkalmazz" />
                        </form>

                        </div>
                    </div>
					
    
				<?php foreach($customs as $custom){ ?>
                      <div class="col-sm-4 col-lg-4 col-md-4"  >
                        <div class="thumbnail" >
						  <img style="background-color:<?php echo $custom['colors'];  ?>;height:150px;width:320px"> 
							
                            <div class="caption">
                                <h4 class="pull-right"><?php echo $custom['cost']; ?> SP</h4>
                                <h4><?php echo $custom['name']; ?>
                                </h4>
                            </div>
                            <div class="ratings">
                                        <p>
									<?php for($i = 0;$i < $custom['rating'] ;$i++){ ?>
                                    <span class="glyphicon glyphicon-star"></span>
									<?php  } ?>
                                </p>

                            </div>

                        <form method="POST" action="">

                         <input type="hidden" name="ertek" value="<?php  echo $custom['cost']; ?>"/>
                         <input type="hidden" name="color1" value="<?php echo $custom['colors']; ?>"/>
                        <input type="submit" name="buy" class="btn btn-primary" value="Alkalmazz" />
                        </form>

                        </div>
                    </div>

                </div>
				<?php } ?>
				
                  </div>
  
				  
				  
				  <div class="modal fade" id="thankyouModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	</div>
      <div class="modal-body">
          <p>Nincsen megfelelő összeged!</p>
<a href="index.php?oldal=shop">		  
<button type="button" style="color:black">  <p>Rendben</p></button>		  
</a>    
	</div>    
    </div>
  </div>
</div>
			  <div class="modal fade" id="success" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:green">
	  <a href="index.php?oldal=shop">
          <button type="button" class="close"  aria-hidden="true" >&times;</button>
		</a>
	</div>
      <div class="modal-body">
          <p>Sikeres vásárlás!</p>                     
      </div>    
    </div>
  </div>
</div>
