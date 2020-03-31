<?php
	
	$id_p		=$_REQUEST['id_p'];
	$id_pa		=$_REQUEST['id_pa'];
	$nom		=$_REQUEST['nom'];
	$prenom		=$_REQUEST['prenom'];
	$paye		=$_REQUEST['paye'];
	include('../../Layout/header.php');
	include('CRUD.php');
					
	echo'<div class="row content">
	    <div class="col-sm-2 sidenav">';
		
	echo'</div>
	    <div class="col-sm-8 text-left">';
	echo'<h2>Liste de payement personnel &nbsp;  '.$nom.' '.$prenom.'</h2>';

   	echo'<table  class="table table-hover table-responsive">';
	echo'<thead>
		<tr>
		<button type="button" class="btn btn-primary" data-toggle="modal" 
		data-target="#myModal">  Ajouter
		</button></a></th> 
		</tr>
		 <tr>
		   <th>N°</th>
		   <th>Date payement</th>
		   <th>Mois</th>
		   <th>Payé</th>
		   <th>Nom payeur</th>
		   <th>Téléphone payeur</th>
		   <th colspan="3">Action</th>
		 </tr>
		</thead>';
	echo'<tbody id="table_verif">';
			$i=1;
			while($l=pg_fetch_assoc($perpaye)){
		echo'<tr>
		   <td>'.$i.'</td>
		   <td>'.$l['date_pa'].'</td>
		   <td>'.$l['mois'].'</td>
		   <td>'.$l['paye'].'</td>
		   <td>'.$l['nom_p'].'</td>
		   <td>'.$l['tel_p'].'</td>';
	      echo'<td><a href="pmodifier.php?id_pa='.$l['id_pa'].
			'&id_p='.$l['id_p'].
			'&id_d='.$l['id_d'].
			'&nom='.$l['nom'].
			'&prenom='.$l['prenom'].
			'&mois='.$l['mois'].
			'&paye='.$l['paye'].
			'&nom_p='.$l['nom_p'].
			'&tel_p='.$l['tel_p'].'">
		 <button class="btn btn-success"><span class="glyphicon glyphicon-pencil"><span 		    			 class="glyphicon glyphicon-file"></button></td>
		   <td><a href="psupprimer.php?id_pa='.$l['id_pa'].
			'&id_p='.$l['id_p'].
			'&id_d='.$l['id_d'].
			'&nom='.$l['nom'].
			'&prenom='.$l['prenom'].
			'&mois='.$l['mois'].
			'&paye='.$l['paye'].
			'&nom_p='.$l['nom_p'].
			'&tel_p='.$l['tel_p'].'">
		<button class="btn btn-danger">
		<span class="glyphicon glyphicon-trash"></button></a></td>';
		echo'<td><a href="impression.php?id_pay='.$ligne['id_pay'].
			'&id_el='.$l['id_el'].
			'&date_pay='.$l['date_pay'].
			'&montant_p='.$l['montant_p'].
			'&nom_p='.$l['nom_p'].
			'&tel_p='.$l['tel_p'].'">
			<button class="btn btn-primary" title="Facture">
			<span class="glyphicon  glyphicon-print"></span>
          			</span></button></a></td>';
		echo'</tr>';
		 $i++;
	    }
	echo'</tbody>';
	echo'</table>
	</div>';

//========= <!--Modal Ajouter =======>
   
	  echo'<div class="modal fade" id="myModal">
	    <div class="modal-dialog">
	      <div class="modal-content">
		<div class="modal-header">
		  <h4 class="modal-title">Faire payement personnel '.$nom.' '.$prenom.'</h4>
		  <button type="button" class="close" data-dismiss="modal">×</button>
		  </div>
		<div class="modal-body">
		<form  role="form" method="post" action="pajouter.php">
		<input type="hidden" name="ams" value="PA">
		<input type="hidden" name="id_p" value="'.$id_p.'">';
	echo'<div class="form-group">
		 <label class="control-label  for="mr">Date payement &nbsp;&nbsp;&nbsp;&nbsp;</label>
		<label><input type="text" class="form-control" id="mr" value="'.date('d/m/Y').'" 
		name="date_pay" readonly >
		</label>
		 </div>';
	echo '    <div class="form-group">
		 <label class="control-label col-sm-2" for="m">Mois:</label>
		 <div class="col-sm-3">
			 <select name="id_d">';	
	while($v=pg_fetch_assoc($calendp)){
	echo '<option value="'.$v['id_d'].'" selected>'.$v['mois'].'</option>';
		} 
	echo '</select>
		 </div>
	    </div>';
	echo'<div class="form-group">
		 <label class="control-label  for="pay">Paye &nbsp;&nbsp;&nbsp;</label>
		 <label><input type="text" class="form-control" id="pay" placeholder="Ex: 30000"
		   name="paye" ></label>
		 </div>';
	echo'<div class="form-group">
		 <label class="control-label  for="nom">Nom payeur &nbsp;&nbsp;&nbsp;</label>
		 <label><input type="text" class="form-control" id="nom" placeholder="Ex: Moussa Coulibaly"
		   name="nom_p" ></label>
		 </div>';
	echo'<div class="form-group">
		 <label class="control-label  for="tel">Contact payeur &nbsp;&nbsp;&nbsp;</label>
		 <label><input type="text" class="form-control" id="tel" placeholder="Ex: 77885544"
		   name="tel_p" ></label>
		 </div>
		<button type="submit" class="btn btn-primary btn-block" name="valider" value="Ajouter">
		<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Ajouter
		</button>';
	echo'<div class="modal-footer">
		<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
		<span class="glyphicon glyphicon-remove"></span> Annuler
		</button>';
		echo'</div>
	     </div>
	    </div>
	  </div> ';
	echo'</div>
      </div>
    </div>
   </div>';
		
	include('../../Layout/footer.php');
?>
	


