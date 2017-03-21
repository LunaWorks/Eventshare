<DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.modal-header, .close {
    background-color: green;
    color:white !important;
    text-align: center;
    font-size: 30px;
}
.modal-footer {
    background-color: green;
}
input[type=text], input[type=password] {
  display: block;
  margin: 10px 0;
}
</style>
<title>Felhasználó</title>
</head>
<body>
  <div class="container">
    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <form action="" method="post">
        <!-- Modal content-->
        <div class="modal-content">
 
          <div class="modal-header" style="padding:35px 50px;">
            <h4><span class="glyphicon glyphicon-lock"></span> Bejentkezés</h4>
          </div>
          <div class="modal-body" style="padding:40px 50px;">
              <div class="form-group">
                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Felhasználónév:</label>
                <input type="text" class="form-control"  name="username" id="usrname" placeholder="Írd be a felhasználóneved" required>
              </div>
              <div class="form-group">
                <label for="psw"><span class="glyphicon glyphicon-eye-open" ></span> Jelszó:</label>	
                <input type="password" class="form-control" name="password" id="psw"  placeholder="Írd be a jelszavadat" required>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" value="" name="rememberme" /> Emlékezz rám</label>
		
              </div>
                <button type="submit" class="btn btn-success btn-block" name="login"><span class="glyphicon glyphicon-off"></span> Bejelentkezés</button>

          </div>
          <div class="modal-footer">
            <p>Nem vagy még beregisztrálva? <a href="#">Regisztrálás</a></p>
            <p>Elfelejtetted <a href="#">jelszavad?</a></p>
          </div>

    </div>
  </form>

  </div>
    </div>

</body>
</html>
