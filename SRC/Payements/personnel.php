<?php

	$id_p		=$_REQUEST['id_p'];
	//====================== Payements Personnels==========================
	include('../../Layout/header.php');
	include('CRUD.php');

echo'<div class="content">
	    <div class="col-sm-2 sidenav">';

   	echo'<br>';
  	echo'<div class="dropdown">
   	    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Autres depenses
    	       <span class="caret"></span></button>
	    <ul class="dropdown-menu">
		      <li><a href="eleve.php">Payement Eleves</a></li>
		      <li><a href="personnel.php">Payement Personnels</a></li>
	      </ul>
  	 </div>';
	echo'</div>
		<div class="col-sm-10 text-left">';
	echo'<h2>Liste de payement des personnels</h2>';

	echo'<table  class="table table-hover table-responsive">';
	echo'<thead>
		<tr>
	
		 <tr>
		   <th>N°</th>
		   <th>Nom</th>
		   <th>Prenom</th>
		   <th>Catégorie</th>
		 </tr>
		</thead>';
	echo'<tbody id="table_verif">';
			$i=1;
			while($l=pg_fetch_assoc($perso)){
		echo'<tr>
		   <td>'.$i.'</td>
		   <td><b><a class="a1" href="pajouter.php?id_p='.$l['id_p'].
		   '&nom='.$l['nom'].
		   '&prenom='.$l['prenom'].'">
		   </b>'.$l['nom'].'<a/></td>
		   <td>'.$l['prenom'].'</td>
		   <td>'.$l['nom_cat'].'</td>
	  		</tr>';
		 $i++;
	    }
	echo'</tbody>';
	echo'</table>
	</div>';

	include('../../Layout/footer.php');
?>
	

