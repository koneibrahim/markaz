<?php 

	include('../../Layout/header.php');
	include('CRUD.php');

	echo'<div class="content">
	    <div class="col-sm-2 sidenav">';

   	echo'<br>';
  	echo'<div class="dropdown">
   	    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Autres depenses
    	       <span class="caret"></span></button>
	    <ul class="dropdown-menu">
		      <li><a href="personnel.php">Payement Personnels</a></li>
		      <li><a href="eleve.php">Payement Eleves</a></li>
	      </ul>
  	 </div>';

	echo'</div>
		<div class="col-sm-10 text-left">';


	echo'</div>
      </div>
    </div>
   </div>';

	include('../../Layout/footer.php');
?>
	

