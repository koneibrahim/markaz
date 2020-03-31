<?php

	include('../../Layout/header.php');
	include('CRUD.php');

	echo'<div class="content">
	    <div class="col-sm-2 sidenav">';
        // menu gauche
	echo'</div>
	    <div class="col-sm-10 text-left">';
	echo'<h2>Gestion des  achats</h2>';
					
    	echo'<table  class="table table-hover table-responsive">';
	echo'<thead>';
          	echo'<tr>';
          	echo'<th >
          	<a id="ajout"><button class="btn btn-primary"><span class="glyphicon glyphicon-file"></span>
          	<span class="glyphicon glyphicon-plus"></span></button></a>
          	</th>';
          	echo' </tr>';
          	echo' <tr>';
          	echo' <th>N°</th>';
          	echo' <th>Date</th>';
          	echo' <th>Libellé</th>';
          	echo' <th>Fournisseur</th>';
          	echo' <th>Contact</th>';
          	echo' <th colspan="3" class="centre">Action</th>';
          	echo' </tr>';
          	echo' </thead>';
          	
          	$i = 1;
          	//echo' <tbody id="table_verif">';
          	while($ligne=pg_fetch_assoc($listeac)) {
          						
          echo' <td>'.$i.'</td>';
          echo' <td>'.$ligne['date_ac'].'</td>';
          echo' <td>'.$ligne['libele'].'</td>';
          echo' <td>'.$ligne['prenom_f'].' '.$ligne['nom_f'].'</td>';
          echo' <td>'.$ligne['contact'].'</td>';
          echo' <td>
          <a href="achat.php?id_ac='.$ligne['id_ac'].
			'&libele='.$ligne['libele'].
			'&id_fo='.$ligne['id_fo'].
			'&date_ac='.$ligne['date_ac'].'">
          <button class="btn badd"><b>détail</b></button></a>
          </td>';
          		//if($ligne['etat']==0){
          echo' <td><a id="mod" href="Amodifier.php?id_ac='.$ligne['id_ac'].
			'&libele='.$ligne['libele'].
			'&id_fo='.$ligne['id_fo'].
			'&date_ac='.$ligne['date_ac'].'">
			<button class="btn btn-success"><span class="glyphicon glyphicon-file"></span>
          	<span class="glyphicon glyphicon-pencil"></span></button></a></td>';
          echo' <td><a href="Asupprimer.php?id_ac='.$ligne['id_ac'].
			'&libele='.$ligne['libele'].
			'&id_fo='.$ligne['id_fo'].
			'&date_ac='.$ligne['date_ac'].'">
		<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
			</td>';
			//}
				//else{
		//echo' <td colspan="2" class="verte centre"><b>Validé!!!</b></td>';
				//}
          	echo' </tr>';
          	$i++;
          	}
          echo'</tbody>';
          echo'</table>';
          echo'</div>';
//===================== <!-- Modal -Ajouter-> ==========================
	   
	echo'<div class="modal fade" id="ajout_Modal" role="dialog">
		<div class="modal-dialog">
	      <div class="modal-content">
		<div class="modal-header">
		  <h4 class="modal-title">Faire un achat</h4>
		  <button type="button" class="close" data-dismiss="modal">×</button>
		  </div>
		<div class="modal-body">
		<form  role="form" method="post" action="index.php">
		<input type="hidden" name="ams" value="AA">';
          	
	echo'<div class="form-group">
		<label class="control-label for="mat">Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><label>
		<input type="text" class="form-control" id="mat"  name="date_ac" 
		value="'.date('d/m/Y').'" title="Désactiver" disabled >
		</label>
	</div>';
           
	echo'<div class="form-group">
		<label class="control-label for="mat">Libellé &nbsp;</label>
		<label>
		<input type="text" class="form-control" id="mat" name="libele" 
		placeholder="ex. produit informatique">
		</label>
	</div>'; 
	echo'<div class="form-group">
		 <label class="control-label  for="f">Fournisseur &nbsp;&nbsp;&nbsp;</label>
		<label><select name="id_fo" >';
			   while ($ligne=pg_fetch_assoc($lfournisseur)) {
      	echo'<option value="'.$ligne['id_fo'].'">'.$ligne['prenom_f'].'  '.$ligne['nom_f'].'</option>';
      		}
		echo '</select></label>
		<label class="control-label  for="f">&nbsp;&nbsp;
		<a id="n_aj" title="Nouveau Fournisseur"><button type="button" class="btn btn-success">
		<span class="glyphicon glyphicon-plus"></span></button></a></label>
	    </div>';
	echo'<button type="submit" class="btn btn-primary btn-block" name="valider" value="Ajouter">
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
    </div>';
   echo'</div>';
   	
//====================== <!-- Modal_fournisseur --> =====================================
	   
	echo'<div class="modal fade" id="n_ajout" role="dialog">
	<div class="modal-dialog">';
          echo'<div class="modal-content ">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-plus"></span> Ajout Fournisseur</h4>
        </div>';
        echo'<div class="modal-body" style="padding:40px 50px;">
          <form class="form-horizontal " role="form" action="index.php" method="post">';
          echo'<input type="hidden" name="ams" value="AF">';
          	
          	echo'<div class="form-group">
	<label class="control-label for="mat">Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><label>
	<input type="text" class="form-control" id="mat"  name="date" value="'.date('d/m/Y').'" disabled >
	</label>
		
	    </div>';
	echo'     <div class="form-group">
		<label class="control-label for="pre">Prenom &nbsp;</label>
		<label>
		<input type="text" class="form-control" id="pre" placeholder="ex. Boubacar" name="prenom_f" >
		</label>
	</div>';
	echo'<div class="form-group">
		<label class="control-label for="nm">Nom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><label>
		<input type="text" class="form-control" id="nm"  name="nom_f" placeholder="ex. Samaké" >
		</label>
	</div>';
	echo'<div class="form-group" >
		<label class="control-label for="ad">Adresse &nbsp;</label>
		<label>
		<input type="text" class="form-control" id="ad" placeholder="ex. Kati" name="adresse" >
		</label>
	</div>';
	echo'<div class="form-group">
		<label class="control-label for="con">Contact  &nbsp;</label>
		<label>
		<input type="text" class="form-control" id="con"  name="contact" >
		</label>
	</div>
	<button type="submit" class="btn btn-success btn-block" name="valider" value="Ajouter">
	<span class="glyphicon glyphicon-ok"></span> Ajouter</button>
	</form>
	</div>';
	echo'<div class="modal-footer">
		<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
		<span class="glyphicon glyphicon-remove"></span> Annuler</button>
		</div>
		</div>
		 
	    </div>
	  </div> 
	</div>';
	echo'</div>';
				
	include'../../Layout/footer.php';
				
?>


