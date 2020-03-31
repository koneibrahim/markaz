<?php
	
	$id_pay		=$_REQUEST['id_pay'];
	$id_el		=$_REQUEST['id_el'];
	$id_d		=$_REQUEST['id_d'];
	$montant_p	=$_REQUEST['montant_p'];
	$nom_p		=$_REQUEST['nom_p'];
	$tel_p		=$_REQUEST['tel_p'];
					
	
	include('../../Layout/header.php');
	include('CRUD.php');
	//include('mois.php');
					
	echo'<div class="row content">
	    <div class="col-sm-2 sidenav">';
		
	echo'</div>
	    <div class="col-sm-8 text-left">';
	echo'<h2>Liste de payement de &nbsp; &nbsp; '.$nom_el.' '.$prenom_el.'</h2>';

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
		   <th>Montant</th>
		   <th>Nom payeur</th>
		   <th>Tel payeur</th>
		   <th colspan="3">Action</th>
		 </tr>
		</thead>';
	echo'<tbody id="table_verif">';
			$i=1;
			while($l=pg_fetch_assoc($elpaye)){
		echo'<tr>
		   <td>'.$i.'</td>
		   <td>'.$l['date_pay'].'</td>
		   <td>'.$l['mois'].'</td>
		   <td>'.$l['montant_p'].'</td>
		   <td>'.$l['nom_p'].'</td>
		   <td>'.$l['tel_p'].'</td>';
	      echo'<td><a href="emodifier.php?id_pay='.$l['id_pay'].
			'&id_el='.$l['id_el'].
			'&id_d='.$l['id_d'].
			'&montant_p='.$l['montant_p'].
			'&nom_p='.$l['nom_p'].
			'&tel_p='.$l['tel_p'].'">
		 <button class="btn btn-success"><span class="glyphicon glyphicon-pencil"><span 		    			 class="glyphicon glyphicon-file"></button></td>
		   <td><a href="esupprimer.php?id_pay='.$l['id_pay'].
			'&id_el='.$l['id_el'].
			'&date_pay='.$l['date_pay'].
			'&montant_p='.$l['montant_p'].
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
		  <h4 class="modal-title">Faire payement eleve </h4>
		  <button type="button" class="close" data-dismiss="modal">×</button>
		  </div>
		<div class="modal-body">
		<form  role="form" method="post" action="eajouter.php">
		<input type="hidden" name="ams" value="A">
		<input type="hidden" name="id_el" value="'.$id_el.'">';
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
	while($v=pg_fetch_assoc($calendrier)){
	echo '<option value="'.$v['id_d'].'" selected>'.$v['mois'].'</option>';
		} 
	echo '</select>
		 </div>
	    </div>';
	echo'<div class="form-group">
		 <label class="control-label  for="mont">Montant &nbsp;&nbsp;&nbsp;</label>
		 <label><input type="text" class="form-control" id="mont" placeholder="Ex: 30000"
		   name="montant_p" ></label>
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
		
//=========== Modal Supprimer================

	echo '<div class="modal fade" id="vs_Modal" role="dialog">
	<div class="modal-dialog">';
	echo'<div class="modal-content">
	<div class="modal-header" style="padding:35px 50px;">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4>Suppresion du payement de '.$nom_el.'</h4>
	</div>
	<div class="modal-body" style="padding:40px 50px;">
		<form  role="form" method="post" action="index.php">
		<input type="hidden" name="ams" value="S">
		<input type="hidden" name="id_pay" value="'.$id_pay.'">
		<input type="hidden" name="id_el" value="'.$id_el.'">
		<input type="hidden" name="id_d" value="'.$id_d.'">';
		echo '<h2>Voulez-vous supprimer le payement<b class="rouge">'.$nom_el.'('.$mois.')</b> ?</h2>
		
		<button type="submit" class="btn btn-danger btn-block" name="valider" value="Supprimer">
		<span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;Supprimer
		</button>
		</form>
		</div>';
		echo'<div class="modal-footer">
			<button type="submit" class="btn btn-primary btn-default pull-left" data-dismiss="modal">
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
	


