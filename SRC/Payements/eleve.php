<?php 

	$id_el		=$_REQUEST['id_el'];
	
//====================== Payements Eleves==========================
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
	echo'<h2>Liste de payement des eleves</h2>';

    	echo'<table  class="table table-hover table-responsive">';
	echo'<thead>
		<tr>
		    
		 <tr>
		 <tr>
		   <th>N°</th>
		   <th>Nom Eleve</th>
		   <th>Prenom Eleve</th>
		   <th>Classe</th>
		   <th>Total Montant payé</th>
		 </tr>
		</thead>';
	echo'<tbody id="table_verif">';
			$i=1;
			while($l=pg_fetch_assoc($liste2)){
		echo'<tr>
		   <td>'.$i.'</td>
		   <td><b><a class="a1" href="eajouter.php?id_el='.$l['id_el'].
		   '&nom_el='.$l['nom_el'].
		   '&prenom_el='.$l['prenom_el'].'"></b>'.$l['nom_el'].'<a/></td>
		   <td>'.$l['prenom_el'].'</td>
		   <td>'.$l['niveau'].'</td>
		   <td>'.$l['montant_p'].'</td>';
		echo'</tr>';
		 $i++;
	    }
	echo'</tbody>';
	echo'</table>
	</div>';

	include('../../Layout/footer.php');
?>
	


