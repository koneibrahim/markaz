<?php
	$id_dep		=$_REQUEST['id_dep'];
	$motif	    	=$_REQUEST['motif'];
	$date_dep  	=$_REQUEST['date_dep'];
	$montant      	=$_REQUEST['montant'];

	include('../../Layout/header.php');
	include('CRUD.php');
	
	/*    echo'
	    <div class="dropdown">
   	    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Tri des depenses
    	       <span class="caret"></span></button>
	    <ul class="dropdown-menu">
	      <li><a href="index1.php?tri=1">Janvier</a></li>
	      <li><a href="index1.php?tri=2">Février</a></li>
	      <li><a href="index1.php?tri=3">Mars</a></li>
	      <li><a href="index1.php?tri=4">Avril</a></li>
	      <li><a href="index1.php?tri=5">Mai</a></li>
	      <li><a href="index1.php?tri=6">Juin</a></li>
	      <li><a href="index1.php?tri=7">Juillet</a></li>
	      <li><a href="index1.php?tri=8">Août</a></li>
	      <li><a href="index1.php?tri=9">Septembre</a></li>
	      <li><a href="index1.php?tri=10">Octobre</a></li>
	      <li><a href="index1.php?tri=11">Novembre</a></li>
	      <li><a href="index1.php?tri=12">Décembre</a></li>
	      <li><a class="disabled">'.date('Y').'</a></li>
	    </ul>
  	    </div>';

  	    echo'<br>';

  	echo'<div class="dropdown">
   	    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Autres depenses
    	       <span class="caret"></span></button>
	    <ul class="dropdown-menu">
	      <li><a href="depvehi.php">Divers</a></li>
	      <li><a href="pont.php?t_pt=San Pedro">Pesage San Pedro</a></li>
	      <li><a href="pont.php?t_pt=Dakar">Pesage Dakar</a></li>
	      <li><a href="pont.php?t_pt=Mali">Pesage Mali</a></li>
	    </ul>
  	    </div>';
	echo'</div>';
*/
//=============================================

	echo'<div class="content">
	    <div class="col-sm-2 sidenav">';
        // menu gauche
	echo'</div>
	    <div class="col-sm-10 text-left">';
	echo'<h2>Gestion des depenses</h2>';
	echo'<table  class="table table-hover table-responsive">';
	echo'<thead>
		 <tr>
		<button type="button" class="btn btn-primary" data-toggle="modal" 
		data-target="#myModal">  Ajouter
		</button></a></th> 
		</tr>
		 <tr>
		   <th>N°</th>
		   <th>Motif</th>
		   <th>Date depense</th>
		   <th>Montant</th>
		   <th class="centre" colspan="2">Action</th>
		 </tr>
	    </thead>';
	echo'<tbody id="table_verif">';
		$i=1;
		while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td>'.$i.'</td>
		   <td>'.$l['motif'].'</td>
		   <td>'.$l['date_dep'].'</td>
		   <td>'.$l['montant'].'</td>
		   <td><a href="modifier.php?id_dep='.$l['id_dep'].
		   '&motif='.$l['motif'].
		   '&date_dep='.$l['date_dep'].
		   '&montant='.$l['montant'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil">
			<span class="glyphicon glyphicon-file"></button></a></td>
		   <td><a href="supprimer.php?id_dep='.$l['id_dep'].
		   '&motif='.$l['motif'].
		   '&date_dep='.$l['date_dep'].
		   '&montant='.$l['montant'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
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
		<h4 class="modal-title">Faire une depense</h4>
		<button type="button" class="close" data-dismiss="modal">×</button>
	</div>
	<!-- Modal body -->
	<div class="modal-body">
		<form  role="form" method="post" action="index.php">
		<input type="hidden" name="ams" value="A">';
	echo'<div class="form-group">
		<label class="control-label  for="mot">Motif &nbsp;&nbsp;&nbsp;</label>
		<label><input type="text" class="form-control" id="mot" placeholder="Ex: Bic Riz"
		name="motif" ></label>
		</div>';
	echo'<div class="form-group">
		<label class="control-label for="dt">Date depense &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</label>
		<label><input type="date" class="form-control" id="dt" placeholder="Ex: 01/01/2020"
		name="date_dep"  value="'.$date_dep.'"   </label>
		</div>';
	echo'<div class="form-group">
		<label class="control-label for="mont">Montant &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</label>
		<label><input type="text" class="form-control" id="mont" placeholder="Ex 100000"
		name="montant" ></label>
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
// =============== Modal Modifier =================

	echo'<div class="modal fade" id="vm_Modal" role="dialog">
	<div class="modal-dialog">';
	echo'<div class="modal-content">
	<div class="modal-header" style="padding:35px 50px;">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4>Modification de la classe</h4>
	</div>
	<div class="modal-body" style="padding:40px 50px;">
		<form  role="form" method="post" action="index.php">
		<input type="hidden" name="ams" value="M">
		<input type="hidden" name="id_dep" value="'.$id_dep.'">';
	echo'<div class="form-group">
		<label class="control-label for="mot">Motif&nbsp;
		</label>
		<label><input type="text" class="form-control" id="mot" name="motif" value="'.$motif.'">
		</label>
	</div>';
	echo'<div class="form-group">
		<label class="control-label for="dt">Date depense &nbsp;
		</label>
		<label><input type="text" class="form-control" id="dt" name="date_dep" value="'.$date_dep.'">
		</label>
	</div>';
	echo'<div class="form-group">
		<label class="control-label  for="mont">Montant &nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;
		</label>
		<label><input type="text" class="form-control" id="mont" name="montant" value="'.$montant.'">
		</label>
		</div>
		<button type="submit" class="btn btn-primary btn-block" name="valider" value="Modifier">
		<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Modifier
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
	

