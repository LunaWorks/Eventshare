    <div class="container">
      <h1>Adat modósítás</h1>
        <form action="" method="post">
           <label for="email">Teljesnév modósítás:</label>
          <input type="text" name="name" value="<?php echo $_SESSION['logged_in']['name'] ?>"></input>
          </br></br>
          <label for="email">Jelszó modósítás:</label>
          <input type="text" name="oldpass" placeholder="add meg a régi jelszavadat" ></input>
            </br></br>
          <label for="email">Jelszó újból megadása:</label>
          <input type="text" name="newpass" placeholder="add meg az újat!" />
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
		<?php } ?>