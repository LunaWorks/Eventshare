<?php
include_once("mydb.php");

function s(){

  $conn = MyDB::getConnection();
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $conn->set_charset("utf8");

  return $conn;

}









$conn = s();
echo "<h2>Új Blog feljegyzés</h2><br />";


?>

<fieldset>

  <form method="post" enctype="multipart/form-data">
    <input type='hidden' name='oldal' value='felvetel'></br>
    <table>
      <tr>
        <td>
          Feljegyzés:
        </td>
      </tr>
      <td>
        <input type='text' name='descreption' required></br></br>
      </td>
    </tr>

    <tr>
      <td>
        Kategória:
        <select name="category" required>
          <option value=""></option>
          <option value="Sport">Sport</option>
          <option value="School">School</option>
          <option value="Family">Family</option>
          <option value="Friends">Friends</option>
          <option value="Events">Events</option>
          <option value="Meetings">Meetings</option>
          <option value="Travel">Travel</option>


        </select>




      </td>
    </tr>
    <tr>
      <td>
        Kép hozzácsatolása:

        <div class="panel-group">
          <input type="file"  name="image">
          <input type='submit' value='Új feljegyzés' name='felvasetel' />

        </div>
      </td>
    </tr>

    <tr>
      <td>
        <input type='submit' value='Új feljegyzés' name='felvetel' />
      </form>

    </td>
  </tr>
</table>


</fieldset>
<?php

if(isset($_POST['felvasetel'])){
  echo $_FILES["fileToUpload"]["tmp_name"];
  $target_name = $_SESSION['logged_in']['username']."".substr(basename($_FILES["fileToUpload"]["name"]),-4);
  $target_file = "blogpictures/".$target_name ;
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" && $imageFileType != "JPG") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
      echo $check["mime"];
    }
  }

  $cim = $_SESSION['logged_in']['id'];
  $stilus = $_POST['category'];
  $rankozas = $_POST['descreption'];
  $date =	date('Y-m-d H:i:s');


  $query = "INSERT INTO notes
  (userid,category,descreption,sharedate,picture)
  VALUES(
    '$cim',
    '$stilus',
    '$rankozas' ,
    '$date',
    '$target_file'
  )";

  if ($conn->query($query) === TRUE) {
    echo "Új feljegyzés született!";
  } else {
    echo "Error: " . $query . "<br>" . $conn->error;
  }

  $useid = $_SESSION['logged_in']['id'];


  $query = "INSERT INTO adminlog
  (userid,descreption)
  VALUES (
    '$useid',
    'Új bejegyzést tett'
  )";

  if ($conn->query($query) === TRUE) {
  } else {
    echo "Error: " . $query . "<br>" . $conn->error;
  }




  $conn->close();
}
?>
