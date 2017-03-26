<?php
include_once("mydb.php");

function rate(){
  //Ha form lefut, illesze be az adatokat az adatbázisba.
  $conn = MyDB::getConnection();
  $conn->query("set names utf8");
  $id = $_SESSION['logged_in']['id'];
  $rate = $_POST['rating'];
  $opinion = $_POST['opinion'];
  $sql = "INSERT INTO rating (userid,rate,opinion,datetime)
  VALUES ('$id','$rate', '$opinion',now())";
  $result = $conn->query($sql);
  if ($result === TRUE){
    echo "Értékelés elküldve!";
    echo "<a href='index.php?oldal=rate'>Vissza az üzenetíráshoz</a>";
    exit;
  } else {
    echo "HIBA!" . var_dump($sql);
  }
}

if(isset($_POST['bekuld'])){
  rate();
}

function getRates() {

  $conn = MyDB::getConnection();
  $conn->query("set names utf8");

  $sql = "SELECT * FROM rating,users WHERE rating.userid = users.id ORDER BY username ASC ";

  $result = $conn->query($sql);
  $rates = [];

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $rates[] = $row;
    }
  }

  return $rates;

}
$rates = getRates();


?>
<head>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <style>
  /* Carousel */

  #quote-carousel {
    padding: 0 10px 30px 10px;
    margin-top: 30px;
    /* Control buttons  */
    /* Previous button  */
    /* Next button  */
    /* Changes the position of the indicators */
    /* Changes the color of the indicators */
  }
  #quote-carousel .carousel-control {
    background: none;
    color: #CACACA;
    font-size: 2.3em;
    text-shadow: none;
    margin-top: 30px;
  }
  #quote-carousel .carousel-control.left {
    left: -60px;
  }
  #quote-carousel .carousel-control.right {
    right: -60px;
  }
  #quote-carousel .carousel-indicators {
    right: 50%;
    top: auto;
    bottom: 0px;
    margin-right: -19px;
  }
  #quote-carousel .carousel-indicators li {
    width: 50px;
    height: 50px;
    margin: 5px;
    cursor: pointer;
    border: 4px solid #CCC;
    border-radius: 50px;
    opacity: 0.4;
    overflow: hidden;
    transition: all 0.4s;
  }
  #quote-carousel .carousel-indicators .active {
    background: #333333;
    width: 128px;
    height: 128px;
    border-radius: 100px;
    border-color: #f33;
    opacity: 1;
    overflow: hidden;
  }
  .carousel-inner {
    min-height: 300px;
  }
  .item blockquote {
    border-left: none;
    margin: 0;
  }
  .item blockquote p:before {
    content: "\f10d";
    font-family: 'Fontawesome';
    float: left;
    margin-right: 10px;
  }

  </style>

</head>
<div class="container">
  <div class="row">

    <div class="col-md-12" data-wow-delay="0.2s">

      <div class="carousel slide" data-ride="carousel" id="quote-carousel">
        <!-- Bottom Carousel Indicators -->

        <ol class="carousel-indicators">

          <?php  $j = 0;?>
          <?php foreach($rates as $getrate){


            ?>

            <li data-target="#quote-carousel" data-slide-to="<?php echo getrate['id'];?>" mg class="img-responsive " src="<?php echo $getrate['picture']; ?>" alt="" width='400' height='400'>
            </li>
            <?php


          }
          ?>

        </ol>


        <!-- Carousel Slides / Quotes -->
        <div class="carousel-inner text-center">
          <?php foreach($rates as $rate){
            if($j > 0){ ?>
              <div class="item">

                <blockquote>
                  <div class="row">

                    <div class="col-sm-8 col-sm-offset-2">

                      <p><?php echo $rate['opinion']; ?></p>
                      <small><?php echo $rate['username']; ?></small>

                    </div>
                  </div>
                </blockquote>

              </div>
              <?php

            } else if($j == 0) {?>
              <div class="item-active">

                <blockquote>
                  <div class="row">

                    <div class="col-sm-8 col-sm-offset-2">

                      <p><?php echo $rate['opinion']; ?></p>
                      <small><?php echo $rate['username']; ?></small>

                    </div>
                  </div>
                </blockquote>

              </div>
              <?php
            }
            $j++;

          }?>


        </div>

        <!-- Carousel Buttons Next/Prev -->
        <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
      </div>
    </div>
  </div>
</div>
<hr class="divider"/>

<div class="container">

  <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="panel-title">Oldal értékelése</div>
      </div>
      <div class="panel-body" >
        <form method="post" action="">
          <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />


          <form  class="form-horizontal" method="post" >
            <?php if(isset($_SESSION['logged_in'])){ ?>
              <div id="div_id_username" class="form-group required">
                <label for="id_username" class="control-label col-md-4  requiredField"> Username<span class="asteriskField">*</span> </label>
                <div class="controls col-md-8 ">
                  <input class="input-md  textinput textInput form-control" id="id_username" value="<?php echo $_SESSION['logged_in']['username']; ?>" maxlength="30" name="username" placeholder="Choose your username" style="margin-bottom: 10px" type="text" disabled />
                </div>
              </div>
              <?php } else { ?>
                <div id="div_id_username" class="form-group required">
                  <label for="id_username" class="control-label col-md-4  requiredField"> Username<span class="asteriskField">*</span> </label>
                  <div class="controls col-md-8 ">
                    <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="username" placeholder="Choose your username" style="margin-bottom: 10px" type="text" />
                  </div>
                </div>
                <?php } ?>


                <div id="div_id_number" class="form-group required">
                  <label for="id_number" class="control-label col-md-4  requiredField"><span class="asteriskField">Értékelés</span> </label>
                  <div class="controls col-md-8 ">


                    <select name="rating" class="input-md  textinput textInput form-control">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>


                  </div>
                </div>
                <div id="div_id_location" class="form-group required">
                  <label for="id_location" class="control-label col-md-4  requiredField"><span class="asteriskField">Vélemény</span> </label>
                  <div class="controls col-md-8 ">
                    <input name="opinion" class="input-md textinput textInput form-control" id="id_location" name="location" placeholder="Írd le a véleményed" style="margin-bottom: 10px" type="text" />
                  </div>
                </div>

                <div class="form-group">
                  <div class="aab controls col-md-4 "></div>
                  <div class="controls col-md-8 ">
                    <input type="submit" name="bekuld" value="Beküldés" class="btn btn-default" />
                  </div>
                </div>

              </form>

            </form>
          </div>
        </div>
      </div>
    </div>






  </div>
