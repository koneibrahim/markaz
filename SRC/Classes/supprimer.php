<?php

	$id_cl	        =$_REQUEST['id_cl'];
	$nom_cl		=$_REQUEST['nom_cl'];
	$niveau		=$_REQUEST['niveau'];

	include('../../Layout/header.php');
	include('CRUD.php');

	echo'<div class="content">
	    <div class="col-sm-2 sidenav">';
        // menu gauche
	echo'</div>
	    <div class="col-sm-10 text-left">';
	echo'<h2>Gestion des  classes</h2>';

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
		   <th>Nom Classe</th>
		   <th>Niveau</th>
		   <th colspan="2">Action</th>
		 </tr>
		</thead>';
	echo'<tbody id="table_verif">';
			$i=1;
			while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td>'.$i.'</td>
		   <td>'.$l['nom_cl'].'</td>
		   <td>'.$l['niveau'].'</td>';
	      echo'<td><a href="modifier.php?id_cl='.$l['id_cl'].
		   '&nom_cl='.$l['nom_cl'].
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
//========= <!--Modal Ajouter =======>
 
	  echo'<div class="modal fade" id="myModal">
	    <div class="modal-dialog">
	      <div class="modal-content">
		<div class="modal-header">
		  <h4 class="modal-title">Ajouter une classe</h4>
		  <button type="button" class="close" data-dismiss="modal">×</button>
		  </div>
		<div class="modal-body">
		<form  role="form" method="post" action="index.php">
		<input type="hidden" name="ams" value="A">';
	echo'<div class="form-group">
		 <label class="control-label  for="mr">Nom Classe &nbsp;&nbsp;&nbsp;</label>
		 <label><input type="text" class="form-control" id="mr" placeholder="Ex: Abdoullahi ben Massoud"
		   name="nom_cl" ></label>
		 </div>';
	echo'<div class="form-group">
		   <label class="control-label for="niv">Niveau &nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;</label>
		   <label><input type="text" class="form-control" id="niv" placeholder="Ex: Niveau 5"
		   name="niveau" ></label>
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
	<h4>Suppresion classe</h4>
	</div>
	<div class="modal-body" style="padding:40px 50px;">
		<form  role="form" method="post" action="index.php">
		<input type="hidden" name="ams" value="S">
		<input type="hidden" name="id_cl" value="'.$id_cl.'">';
		echo '<h2>Voulez-vous supprimer la classe<b class="rouge">'.$niveau.'('.$nom_cl.')</b> ?</h2>
		
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
	


