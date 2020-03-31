<?php

    $id_v2=$_REQUEST['id_v2'];
    $n_m=$_REQUEST['n_m'];
    $mm=$_REQUEST['mm'];
	include('../../Layout/header.php');
	include('CRUD.php');
			if($id_v2){
			echo '  <div class="row content">
	    <div class="col-sm-2 sidenav">';
echo '</div>
	    <div class="col-sm-8 text-left">';
			echo '<h2>Ajout de pneu au véhicule '.$mm.' '.$n_m.'</h2>';
echo '   <form  class="form-horizontal" method="post" action="/SRC/Vehicules/verif.php">';
		echo '<input type="hidden" name="ams" value="A">';
		echo '<input type="hidden" name="n_m" value="'.$n_m.'">';
		echo '<input type="hidden" name="mm" value="'.$mm.'">';
echo '    <div class="form-group">
		 <label class="control-label col-sm-2" for="cont">Motif:</label>
		 <div class="col-sm-3">
		   <input type="text" class="form-control" id="cont" placeholder="motif de la depense"
		   name="description" value="">
		 </div>
	    </div>';
echo '    <div class="form-group">
		 <label class="control-label col-sm-2" for="qte">Date:</label>
		 <div class="col-sm-3">          
		   <input type="text" class="form-control" id="qte" value="'.date('d-m-y').'" name="date_d">
		 </div>
    		 </div>';
echo '    <div class="form-group">
		 <label class="control-label col-sm-2" for="pneu">Pneu:</label>
		 <div class="col-sm-3">
			 <select name="np">';	
	while($v=pg_fetch_assoc($pneu)){
					echo '<option value="'.$v['no_p'].'" selected>'.$v['no_p'].' '.$v['marque'].'</option>';
	} 
	echo '</select>
		 </div>
	    </div>';
echo '   <div class="form-group">        
		 <div class="col-sm-offset-2 col-sm-10">
		   <button type="reset" class="btn btn-danger" name="valider" value="Annuler"><span class="glyphicon glyphicon-remove"></button>
		   <button type="submit" class="btn btn-primary" name="valider" value="Ajouter"><span class="glyphicon glyphicon-ok"></button>
		 </div>
		 </div>
    </div>
    <div class="col-sm-2 sidenav">';
echo' </div>
</div>';
	include('../../Layout/footer.php');
		} else
			{ 
echo '  <div class="row content">
	    <div class="col-sm-2 sidenav">';
echo '</div>
	    <div class="col-sm-8 text-left">';
			echo '   <h2>Nouveau Depense</h2>';
		
echo '   <form  class="form-horizontal" method="post" action="index.php">';
		echo '<input type="hidden" name="ams" value="A">';
echo '    <div class="form-group">
		 <label class="control-label col-sm-2" for="cont">Motif:</label>
		 <div class="col-sm-3">
		   <input type="text" class="form-control" id="cont" placeholder="motif de la depense"
		   name="description" value="">
		 </div>
	    </div>';
echo '    <div class="form-group">
		 <label class="control-label col-sm-2" for="qte">Date:</label>
		 <div class="col-sm-3">          
		   <input type="text" class="form-control" id="qte" value="'.date('d-m-y').'" name="date_d">
		 </div>
    		 </div>';
echo '    <div class="form-group">
		 <label class="control-label col-sm-2" for="pneu">Pneu:</label>
		 <div class="col-sm-3">
			 <select name="np">';	
	while($v=pg_fetch_assoc($pneu)){
					echo '<option value="'.$v['no_p'].'" selected>'.$v['no_p'].' '.$v['marque'].'</option>';
	} 
	echo '</select>
		 </div>
	    </div>';
echo '    <div class="form-group">
		 <label class="control-label col-sm-2" for="vehicule">Véhicule:</label>
		 <div class="col-sm-3">
		   <select name="no_mlle">';
			while($v=pg_fetch_assoc($voiture)){
				   echo '<option value="'.$v['no_mlle'].'" selected>'.$v['no_mlle'].' '.$v['marque'].'</option>';
			}
	echo '</select>
		 </div>
	    </div>';
echo '   <div class="form-group">        
		 <div class="col-sm-offset-2 col-sm-10">
		   <button type="reset" class="btn btn-danger" name="valider" value="Annuler"><span class="glyphicon glyphicon-remove"></button>
		   <button type="submit" class="btn btn-primary" name="valider" value="Ajouter"><span class="glyphicon glyphicon-ok"></button>
		 </div>
		 </div>
    </div>
    <div class="col-sm-2 sidenav">';
echo' </div>
</div>';
	include('../../Layout/footer.php'); }
?>
