<?php

	$id_p	        =$_REQUEST['id_p'];
	$nom		=$_REQUEST['nom'];
	$prenom		=$_REQUEST['prenom'];

	include('../../Layout/header.php');
	include('CRUD.php');

	echo'<div class="content">
	    <div class="col-sm-2 sidenav">';
        // menu gauche
	echo'</div>
	    <div class="col-sm-10 text-left">';
	echo'<h2>Liste des personnels</h2>';
    		echo'<table  class="table table-hover table-responsive">';
	echo'<thead>
		<tr>
		 <tr>
		<button type="button" class="btn btn-primary" data-toggle="modal" 
		data-target="#myModal">  Ajouter
		</button></a></th> 
		</tr>
		 <tr>
		   <th>N°</th>
		   <th>Nom</th>
		   <th>Prenom</th>
		   <th>Categorie</th>
		   <th>Adresse</th>
		   <th>Telephone 1</th>
		   <th>Telephone 2</th>
		   <th>Salaire</th>
		   <th>Classe</th>
		   <th colspan="2">Action</th>
		 </tr>
		</thead>';
	echo'<tbody id="table_verif">';
			$i=1;
			while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td>'.$i.'</td>
		   <td>'.$l['nom'].'</td>
		   <td>'.$l['prenom'].'</td>
		   <td>'.$l['categ'].'</td>
		   <td>'.$l['adresse'].'</td>
		   <td>'.$l['tel1'].'</td>
		   <td>'.$l['tel2'].'</td>
		   <td>'.$l['salaire'].'</td>
		   <td>'.$l['niveau'].'</td>';
	      echo'<td><a href="modifier.php?id_p='.$l['id_p'].
		   '&nom='.$l['nom'].
		   '&prenom='.$l['prenom'].
		   '&categ='.$l['categ'].
		   '&tel1='.$l['tel1'].
		   '&tel2='.$l['tel2'].
		   '&salaire='.$l['salaire'].
		   '&niveau='.$l['niveau'].'">
		 <button class="btn btn-success"><span class="glyphicon glyphicon-pencil">
		<span	 class="glyphicon glyphicon-file"></button></td>
		   <td><a href="supprimer.php?id_p='.$l['id_p'].
		   '&nom='.$l['nom'].
		   '&prenom='.$l['prenom'].
		   '&categ='.$l['categ'].
		   '&tel1='.$l['tel1'].
		   '&tel2='.$l['tel2'].
		   '&salaire='.$l['salaire'].
		   '&niveau='.$l['niveau'].'">
		<button class="btn btn-danger">
		<span class="glyphicon glyphicon-trash"></button></a></td>
		</tr>';
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
		  <h4 class="modal-title">Ajouter une personnel</h4>
		  <button type="button" class="close" data-dismiss="modal">×</button>
		  </div>
		<div class="modal-body">
		<form  role="form" method="post" action="index.php">
		<input type="hidden" name="ams" value="A">';
	echo'<div class="form-group">
		 <label class="control-label  for="no">Nom  &nbsp;&nbsp;&nbsp;</label>
		 <label><input type="text" class="form-control" id="no" placeholder="Ex: Abdoullahi ben Massoud"
		   name="nom" ></label>
		 </div>';
	echo'<div class="form-group">
		   <label class="control-label for="pre">Prenom &nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;</label>
		   <label><input type="text" class="form-control" id="pre" placeholder="Ex: Niveau 5"
		   name="prenom" ></label>
	    </div>';
	echo'<div class="form-group">
		 <label class="control-label  for="date">Categorie &nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<label><select name="categ">';
			echo '<option value="Grand dent" selected>Professeur</option>';
			echo '<option value="Petit dent" >Gardien</option>';
			echo '<option value="Petit dent" >Medcin</option>';
		echo'</select>
		</label>
	    </div>';
	echo'<div class="form-group">
		   <label class="control-label for="ad">Adresse &nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;</label>
		   <label><input type="text" class="form-control" id="ad" placeholder="Ex: Niveau 5"
		   name="adresse" ></label>
	    </div>';
	echo'<div class="form-group">
		   <label class="control-label for="te1">Telephone 1 &nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;</label>
		   <label><input type="text" class="form-control" id="te1" placeholder="Ex: Niveau 5"
		   name="tel1" ></label>
	    </div>';
	echo'<div class="form-group">
		   <label class="control-label for="te2">Telephone 2 &nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;</label>
		   <label><input type="text" class="form-control" id="te2" placeholder="Ex: Niveau 5"
		   name="tel2" ></label>
	    </div>';
	echo'<div class="form-group">
		   <label class="control-label for="sal">Salaire &nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;</label>
		   <label><input type="text" class="form-control" id="sal" placeholder="Ex: Niveau 5"
		   name="salaire" ></label>
	    </div>';
	echo '<div class="form-group">
		<label class="control-label  for="s">Niveau Classe &nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</label>
		<label><select name="id_cl">';
		while($v=pg_fetch_assoc($classe)){
			echo '<option value="'.$v['id_cl'].'" selected>'.$v['id_cl'].' '.$v['nom_cl'].'
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
	<h4>Suppresion du personnel</h4>
	</div>
	<div class="modal-body" style="padding:40px 50px;">
		<form  role="form" method="post" action="index.php">
		<input type="hidden" name="ams" value="S">
		<input type="hidden" name="id_p" value="'.$id_p.'">';
		echo '<h2>Voulez-vous supprimer la classe<b class="rouge">'.$nom.'('.$prenom.')</b> ?</h2>
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
	
