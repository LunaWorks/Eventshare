<body data-spy="scroll" data-target="#myScrollspy" data-offset="20" >
<div class="container">
  <div class="row">
<section id="features" style="color:white" style="float:left">
	
			   <nav class="col-sm-3" id="myScrollspy">
      <ul class="nav nav-pills nav-stacked">
     			<div class="container">

					<header class="text-center margin-bottom-60">
						<h2>Oldal leírása</h2>
						<p class="lead font-lato">Itt az oldal minden egyes fontos működés leírását találhatod és a használatára egy útmutatót is adtunk!</p>
						<hr />
					</header>


  <div class="list-group" style="padding-right:570px;">
  <ol>
    <a href="#section1" class="list-group-item" id="showblog">
      <h4 class="list-group-item-heading"><li>Blog írás</li></h4>
    
    </a>
    <a href="#section2" class="list-group-item">
      <h4 class="list-group-item-heading"><li>Teendőlista készítése</li></h4>

    </a>
    <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading"><li>Imserős felvétele</li></h4>
    </a>
	 <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading"><li>Esemény létrehozása</li></h4>
    </a>
	 <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading"><li>Saját tároló használata</li></h4>
    </a>
	</ol>
  </div>
  			
				</div>
      </ul>
    </nav>
 

  </div>
</div>
  <script>
         $(document).ready(function(){
             $("#showblog").click(function(){
             $('#blog').modal('show');
         });
      });
    </script>
              <div class="modal fade" id="blog" tabindex="-1" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:black">
           <h4 class="modal-title">Blog írás</h4>
          <button type="button" class="close"  aria-hidden="true" >&times;</button>
        
    </div>
      <div class="modal-body"  style="overflow:scroll;">
          <p style="font-weight: bold">Hogyan kell blog kiíratást készíteni?</p>   
          <p style="text-align:justify;">
            A blog kiíráshoz be kell jelentkeznünk és a következő lépéseket kell tudnunk:
            <ol style="font-style: italic; ">
              <li>A felhasználó névre kell kattintani</li>
              <li>Új tevékenység</li>
              <li>Blog kiírás</li>


            </ol>
            Miután megtettük idáig a lépéseket Ez a kinézet fogad minket:
            </p></br>
            <img src="tutorial/blog.png" width="580px" height="400px">

            <ul>
              <li>A feljegyzés témája</li>
              <li>Tartalma</li>
              <li>Kép hozzácsatolása (nem szükséges)</li>
              <li>Dátum hozzácsatolása (automatikus)</li>


            </ul>


          </p>    



      </div>    
    </div>
  </div>
</div>


</body>
