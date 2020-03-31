//====================== Payements Eleves==========================
<?php 

	include('../../Layout/header.php');
	include('CRUD.php');

	echo'<div class="content">
	    <div class="col-sm-2 sidenav">';
        // menu gauche
	echo'</div>
		<div class="col-sm-10 text-left">';
   echo' <div class="col-sm-6 text-left">';
	echo'<h2>Payement des eleves</h2>';

    	echo'<table  class="table table-hover table-responsive">';
	echo'<thead>
		<tr>
		 <tr>
		<a href="eleve.php"><button type="button" class="btn btn-primary" >  Ajouter
		</button></a></th> 
		</tr>
		 <tr>
		   <th>N°</th>
		   <th>Nom Eleve</th>
		   <th>Prenom Eleve</th>
		   <th>Date payement</th>
		   <th>Montant</th>
		   <th>Paye</th>
		   <th>Reste</th>
		   <th>Nom payeur</th>
		   <th colspan="2">Action</th>
		 </tr>
		</thead>';
	echo'<tbody id="table_verif">';
			$i=1;
			while($l=pg_fetch_assoc($liste2)){
		echo'<tr>
		   <td>'.$i.'</td>
		   <td>'.$l['nom_el'].'</td>
		   <td>'.$l['prenom_el'].'</td>
		   <td>'.$l['date_pay'].'</td>
		   <td>'.$l['montant_p'].'</td>
		   <td>'.$l['paye'].'</td>
		   <td>'.$l['reste'].'</td>
		   <td>'.$l['nom_p'].'</td>';
	      echo'<td><a href="modifier.php?id_pay='.$l['id_pay'].
		   '&nom_el='.$l['nom_el'].
		   '&niveau='.$l['niveau'].'">
		 <button class="btn btn-success"><span class="glyphicon glyphicon-pencil"><span 		    			 class="glyphicon glyphicon-file"></button></td>
		   <td><a href="supprimer.php?id_cl='.$l['id_cl'].
			'&nom_cl='.$l['nom_cl'].
			'&niveau='.$l['niveau'].'">
		<button class="btn btn-danger">
		<span class="glyphicon glyphicon-trash"></button></a></td>
		</tr>';
		 $i++;
	    }
	echo'</tbody>';
	echo'</table>
	</div>';
   
	echo'</div>
      </div>
    </div>
   </div>';
   	include('../../Layout/footer.php');
   	
?>

