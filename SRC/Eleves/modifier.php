<?php

	$id_el	        =$_REQUEST['id_el'];
	$id_tu		=$_REQUEST['id_tu'];
	$id_cl	        =$_REQUEST['id_cl'];
	$nom_el		=$_REQUEST['nom_el'];
	$prenom_el	=$_REQUEST['prenom_el'];
	$date_nais	=$_REQUEST['date_nais'];
	$nom_tu		=$_REQUEST['nom_tu'];
	
	include('../../Layout/header.php');
	include('CRUD.php');

	echo'<div class="content">
	    <div class="col-sm-2 sidenav">';
        // menu gauche
	echo'</div>
	    <div class="col-sm-10 text-left">';
	echo'<h2>Gestion des  eleves</h2>';

    	echo'<table  class="table table-hover table-responsive">';
	echo'<thead>
		<tr>
			<button type="button" class="btn btn-primary" data-toggle="modal" 
			data-target="#myModal">  Ajouter
			</button></a></th> 
		</tr>
		 </tr>
		   <th>N°Matricule</th>
		   <th>Nom Eleve</th>
		   <th>Prénom Eleve</th>
		   <th>Date Naissance</th>
		   <th>Classe niveau</th>
		   <th>Nom Prénom Tuteur</th>
		   <th colspan="9">Action</th>
		 </tr>
	    </thead>';
	echo'<tbody id="table_verif">';
		$i=1;
	  while($l=pg_fetch_assoc($liste)){
	   echo'<tr>
		   <td>'.$i.'-MSAAD</td>
		   <td>'.$l['nom_el'].'</td>
		   <td>'.$l['prenom_el'].'</td>
		   <td>'.$l['date_nais'].'</td>
		   <td>'.$l['niveau'].'-> ' .$l['nom_cl'].'</td>
	      	   <td>'.$l['nom_tu'].'</td>';
	      echo'<td><a href="modifier.php?id_el='.$l['id_el'].
		   '&id_tu='.$l['id_tu'].
		   '&id_cl='.$l['id_cl'].
		   '&nom_el='.$l['nom_el'].
		   '&prenom_el='.$l['prenom_el'].
		   '&date_nais='.$l['date_nais'].
		   '&niveau='.$l['niveau'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil"><span 		           class="glyphicon glyphicon-file"></button></td>
		   <td><a href="supprimer.php?id_el='.$l['id_el'].
		   '&id_tu='.$l['id_tu'].
		   '&nom_el='.$l['nom_el'].
		   '&prenom_el='.$l['prenom_el'].
		   '&date_nais='.$l['date_nais'].
		   '&niveau='.$l['niveau'].'">
		   <button class="btn btn-danger">
		   <span class="glyphicon glyphicon-trash"></button></a></td>';
		echo'<td class="centre" style="width:30%;">';
		echo'<a href="tuteur.php?id_tu='.$ligne['id_tu'].
			'&nom_tu='.$ligne['nom_tu'].
			'&tel1='.$ligne['tel1'].
			'&tel2='.$ligne['tel2'].
			'&adresse='.$ligne['adresse'].'">
			<button class="btn btn-default" title="Détail">
			<span class="glyphicon glyphicon-list-alt"></span>
			</span></button></a>
		</tr>';
		$i++;
	    }
	echo'</tbody>';
	echo'</table>
	</div>';
//=========== <!-- Modal Ajouter -->=============

	echo'<div class="modal fade" id="myModal">
	<div class="modal-dialog">
	  <div class="modal-content">
	  <!-- Modal Header -->
	  <div class="modal-header">
		<h4 class="modal-title">Ajouter un eleve</h4>
		<button type="button" class="close" data-dismiss="modal">×</button>
	</div>
	<!-- Modal body -->
	<div class="modal-body">
		<form  role="form" method="post" action="index.php">
		<input type="hidden" name="ams" value="A">';
	echo'<div class="form-group">
		<label class="control-label  for="nom">Nom Eleve &nbsp;&nbsp;&nbsp;</label>
		<label><input type="text" class="form-control" id="nom" placeholder="Ex: Mohamed"
		name="nom_el" ></label>
		</div>';
	echo'<div class="form-group">
		<label class="control-label for="prenom">Prénom Eleve &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</label>
		<label><input type="text" class="form-control" id="prenom" placeholder="Traore"
		name="prenom_el" ></label>
		</div>';
	echo'<div class="form-group">
		<label class="control-label for="nais">Date naissance &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</label>
		<label><input type="date" class="form-control" id="nais" placeholder="Ex: Niveau 5"
		name="date_nais"  value="'.$date_nais.'"   </label>
		</div>';
	echo '<div class="form-group">
		<label class="control-label  for="c">Tuteur&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 &nbsp;</label>
		<label><select name="id_tu">';
	while($l=pg_fetch_assoc($tuteur)){
	        		if($id_tu==$l['id_tu'])
	        echo '<option value="'.$l['id_tu'].'" selected>'.$l['nom_tu'].'</option>';
	        			else
	        echo '<option value="'.$l['id_tu'].'" >'.$l['nom_tu'].'</option>';
	}
	echo '</select>
		</label>
	    </div>';
	echo '<div class="form-group">
		<label class="control-label  for="s">Niveau Classe &nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</label>
		<label><select name="id_cl">';
		while($v=pg_fetch_assoc($classe)){
			echo '<option value="'.$v['id_cl'].'" selected>'.$v['niveau'].' '.$v['nom_cl'].'
		</option>';  
		}
		echo'</select>
			 </label>
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
	echo' </div>
      </div>
    </div>
   </div>';
		// =============== Modal_Modifier =================

echo '<div class="modal fade" id="vm_Modal" role="dialog">
    <div class="modal-dialog">';
echo ' <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4>Modification eleve</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form  role="form" method="post" action="index.php">
           <input type="hidden" name="ams" value="M">
           <input type="hidden" name="id_el" value="'.$id_el.'">
           <input type="hidden" name="id_tu" value="'.$id_tu.'">
           <input type="hidden" name="id_cl" value="'.$id_cl.'">';
           
	echo'<div class="form-group">
		<label class="control-label for="nom">Nom eleve&nbsp;</label>
		<label><input type="text" class="form-control" id="nom" 
		name="nom_el" value="'.$nom_el.'"></label>
	</div>';
	echo'<div class="form-group">
		<label class="control-label  for="prenom">Prenom eleve &nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<label><input type="text" class="form-control" id="prenom" name="prenom_el" value="'.$prenom_el.'">
		</label>
		 </div>';
	echo'<div class="form-group">
		<label class="control-label  for="date_n">Date naissance&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<label><input type="text" class="form-control" id="date_n" name="date_nais" value="'.$date_nais.'">
		</label>
		 </div>';
	echo'<div class="form-group">
		 <label class="control-label  for="s">Tuteur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</label>
		<label><select name="id_tu">';
		$reql1=pg_query($conn,"SELECT id_tu,nom_tu FROM tuteurs");
			while($v=pg_fetch_assoc($reql1)){
			if($id_tu==$v['id_tu']){
		echo'<option value="'.$v['id_tu'].'" selected>'.$v['nom_tu'].'</option>';
				}else
		echo '<option value="'.$v['id_tu'].'">'.$v['nom_tu'].'</option>';
		}
		echo '</select>
		</label>
	    </div>';
	echo'<div class="form-group">
		 <label class="control-label  for="s">Niveau &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</label>
		<label><select name="id_cl">';
		$reql2=pg_query($conn,"SELECT id_cl,niveau FROM classes");
			while($v=pg_fetch_assoc($reql2)){
		if($id_cl==$v['id_cl']){
		echo'<option value="'.$v['id_cl'].'" selected>'.$v['niveau'].'</option>';
				}else
		echo '<option value="'.$v['id_cl'].'">'.$v['niveau'].'</option>';
		}
		echo '</select>
		</label>
		</div>
		<button type="submit" class="btn btn-primary btn-block" name="valider" value="Modifier">
		<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Modifier
		</button>
		</form>
		</div>';
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
	

