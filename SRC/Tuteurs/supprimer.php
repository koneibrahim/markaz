<?php

	$nom_tu		=$_REQUEST['nom_tu'];
	$adresse	=$_REQUEST['adresse'];
	$tel1		=$_REQUEST['tel1'];
	$tel2		=$_REQUEST['tel2'];

	include('../../Layout/header.php');
	include('CRUD.php');

	echo'<div class="content">
	    <div class="col-sm-2 sidenav">';
        // menu gauche
	echo'</div>
	    <div class="col-sm-10 text-left">';
	echo'<h2>Gestion des  Tutuleurs</h2>';

	  echo'<table  class="table table-hover table-responsive">';
	    echo'<thead>
		<tr>
		 	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			Ajouter
			</button></a></th> </tr>
		</tr>
		   <th>N°</th>
		   <th>Nom Tuteur</th>
		   <th>Adresse</th>
		   <th>Telephone 1</th>
		   <th>Telephone 2</th>
		   <th colspan="5">Action</th>
		</tr>
	   </thead>';
	    echo'<tbody id="table_verif">';
		$i=1;
	      while($l=pg_fetch_assoc($liste)){		
		echo'<tr>
			<td>'.$i.'</td>
			<td>'.$l['nom_tu'].'</td>
			<td>'.$l['adresse'].'</td>
			<td>'.$l['tel1'].'</td>
			<td>'.$l['tel2'].'</td>';
	    		echo'<td><a href="modifier.php?id_tu='.$l['id_tu'].
			'&nom_tu='.$l['nom_tu'].
			'&adresse='.$l['adresse'].
			'&tel1='.$l['tel1'].
			'&tel2='.$l['tel2'].'">
			<button class="btn btn-success"><span class="glyphicon glyphicon-pencil"><span 		   				class="glyphicon glyphicon-file"></button></td>
			<td><a href="supprimer.php?id_tu='.$l['id_tu'].
			'&adresse='.$l['adresse'].'">
			<button class="btn btn-danger">
			<span class="glyphicon glyphicon-trash"></button></a></td>
		</tr>';
		 $i++;
		}
	     echo'</tbody>';
	   echo'</table>
	</div>';
							
//===== <!-- Modal Ajouter -->
		 
	echo'<div class="modal fade" id="myModal">
	  <div class="modal-dialog">
		<div class="modal-content">
		   <div class="modal-header" style="padding:35px 50px;">
		    <button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4>Filiation Tutuleur</h4>
        </div>
	<div class="modal-body">
		<form  role="form" method="post" action="index.php">
		<input type="hidden" name="ams" value="A">';
		echo'<div class="form-group">
			 <label class="control-label  for="nm">Nom & Prénom &nbsp;</label>
			 <label><input type="text" class="form-control" id="nm" placeholder="Ex: Karim DAIBY" 
			  name="nom_tu"></label>
		</div>';
		echo'<div class="form-group">
			 <label class="control-label  for="adr">Adresse  &nbsp;&nbsp;&nbsp;</label>
			 <label><input type="text" class="form-control" id="adr" placeholder="Ex: Kati"
			   name="adresse" ></label>
		</div>';
		echo'<div class="form-group">
			 <label class="control-label  for="t1">Tel 1  &nbsp;&nbsp;&nbsp;</label>
			 <label><input type="text" class="form-control" id="t1" placeholder="Ex: 66160123"
			   name="tel1" ></label>
		</div>';
	echo'<div class="form-group">
			 <label class="control-label  for="t2">Tel 2  &nbsp;&nbsp;&nbsp;</label>
			 <label><input type="text" class="form-control" id="t2" placeholder="Ex: 99160123"
			   name="tel2" ></label>
		</div>';
	echo'<div class="modal-footer">
			<button type="submit" class="btn btn-primary btn-block" name="valider" value="Ajouter">
			<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Ajouter</button>
			<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span> Annuler</button>';
		echo'</div>
	     </div>
	    </div>
	  </div> ';
	echo' </div>
      </div>
    </div>
   </div>';
//===========Debut Modal Modifier ===================
			 
	echo'<div class="modal fade" id="vm_Modal" role="dialog">
		<div class="modal-dialog">';
		echo' <div class="modal-content">
		<div class="modal-header" style="padding:35px 50px;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4><span class="glyphicon glyphicon-pencil">';
		echo'<span class="glyphicon glyphicon-user">Modification Tuteur </h4>
	</div>
	<div class="modal-body" style="padding:40px 50px;">
		<form  role="form" method="post" action="index.php">
		<input type="hidden" name="ams" value="M">
		<input type="hidden" name="id_tu" value="'.$id_tu.'">';
		echo'<div class="form-group">
			<label class="control-label for="nt">Non Tuteur &nbsp;
			</label>
			<label><input type="text" class="form-control" id="nt" name="nom_tu" value="'.$nom_tu.'">
			</label>
		</div>';
		echo'<div class="form-group">
			<label class="control-label  for="adr">Adresse &nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</label>
			<label><input type="text" class="form-control" 
			id="adr" name="adresse" value="'.$adresse.'">
			</label>
		</div>';
		echo'<div class="form-group">
			<label class="control-label  for="te1">Tel 1 &nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;
			</label>
			<label><input type="text" class="form-control" id="te1" name="tel1" value="'.$tel1.'">
			</label>
		</div>';
		echo'<div class="form-group">
			<label class="control-label  for="te2">Tel 2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
			</label>
			<label><input type="text" class="form-control" id="te2" name="tel2" value="'.$tel2.'">
			</label>
		</div>';
		echo'<button type="submit" class="btn btn-primary btn-block" name="valider" value="Modifier">
			<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Modifier</button>
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
	echo' </div>
      </div>
    </div>
   </div>';
//=========== Debut Modal Supprimer===================

	echo'<div class="modal fade" id="vs_Modal" role="dialog">
	    <div class="modal-dialog">';
	echo'<div class="modal-content">
	<div class="modal-header" style="padding:35px 50px;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4>Suppresion Tuteur</h4>
	</div>
	<div class="modal-body" style="padding:40px 50px;">
		<form  role="form" method="post" action="index.php">
			<input type="hidden" name="ams" value="S">
			<input type="hidden" name="id_tu" value="'.$id_tu.'">';
			echo '<h2>Voulez-vous supprimer la classe
			<b class="rouge">'.$nom_tu.'('.$adresse.')</b> ?</h2>';
			echo'<button type="submit" class="btn btn-danger btn-block" 
			name="valider" value="Supprimer">
			<span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;Supprimer</button>
		</form>
		</div>
		<div class="modal-footer">
		<button type="submit" class="btn btn-primary btn-default pull-left" data-dismiss="modal">
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
	include('../../Layout/footer.php');
?>
	


