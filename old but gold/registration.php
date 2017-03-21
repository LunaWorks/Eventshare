
<!DOCTYPE html>
<html>
<head>
	<title>Felhasznalo 21</title>
	<meta charset="UTF-8" />

</head>
<body>

  <center>

    <div class="container">
      <!-- Trigger the modal with a button -->

      <!-- Modal -->
      <form action="" method="POST">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <form>
            <div class="modal-header" style="padding:35px 50px;">
              <h4><span class="glyphicon glyphicon-lock"></span>Regisztrálás</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div class="form-group">
                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Teljesnév:</label>
                <input type="text" class="form-control"  name="name" id="usrname" placeholder="Írd be a felhasználóneved" required>
              </div>
                <div class="form-group">
                  <label for="usrname"><span class="glyphicon glyphicon-user"></span> Felhasználónév:</label>
                  <input type="text" class="form-control"  name="username" id="usrname" placeholder="Írd be a felhasználóneved" required>
                </div>
                <div class="form-group">
                  <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Jelszó:</label>
                  <input type="password" class="form-control" name="password" id="psw" placeholder="Írd be a jelszavadat" required>
                </div>
                <div class="form-group">
                  <label for="username"><span class="glyphicon glyphicon-eye-open" name="age" placeholder="írd be a korodat!"></span> Kor:</label>
                  <input type="text" class="form-control" name="age" placeholder="Írd be a korodat" required>
                </div>

                  <button type="submit" class="btn btn-success btn-block" name="regin"><span class="glyphicon glyphicon-off"></span> Regisztrálás</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Vissza</button>
              <p>Már be vagy beregisztrálva? <a href="#">Belépés!</a></p>
            </div>
      </div>
    </form>

    </div>

  </center>
  </form>
</div>
</body>
</html>
