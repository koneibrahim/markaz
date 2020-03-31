<?php
	include('../../Layout/header.php');
	include('CRUD.php');
	
echo '  <div class="row content">
	    <div class="col-sm-2 sidenav">';
	    	$som2=pg_fetch_assoc($somdep);
	    	$som3=$som2['s'];
	    echo'<div class="well">
	    		<h5 class="centre"><b>Totaux des depenses</b></h5>
        			<p class="centre"><b>'.number_format($som2['s'], 0, ',', ' ').' FCFA</b></p>';
        	$av1=pg_fetch_assoc($arv);
	    	$av2=$av1['mnt_p'];
	    	$cp=pg_fetch_assoc($compare);
	    	$cp2=$cp['somme'];
	    			if($av2 > 0){
        	echo'
        			<p class="centre">
        			<a id="bj"  class="alert-link">
			    <button class="btn btn-success" data-toggle="aj_b" title="Etat des payements">
			    <span class="glyphicon glyphicon-list-alt"></button></a>
        			</p>';
        			}
        			else{
        	echo'
        			<p class="centre">
        			<a id="#"  class="alert-link">
			    <button class="btn btn-danger" data-toggle="aj_b" title="La liste est vide">
			    <span class="glyphicon glyphicon-list-alt"></button></a>
        			</p>';
        			}
        	echo'<br>';
        	if($av2 > 0 && $cp2 > 0){
		echo' <a id="daj">
		   <button class="btn btn-warning" data-toggle="aj_b" title="Faire un payement">
        	 Payement <span class="glyphicon glyphicon-usd"></button></a>
		   ';
		   	}
		   	else if($av2 > 0 && $cp2 == 0){
		echo' <a id="#">
		   <button class="btn btn-success" data-toggle="aj_b" title="Les depenses ont été rembourser">
        	 Payement <span class="glyphicon glyphicon-usd"></button></a>
		   ';
		   	}
		   else {
		echo' <a id="daj">
		   <button class="btn btn-danger" data-toggle="aj_b" title="Faire un payement">
        	 Payement <span class="glyphicon glyphicon-usd"></button></a>
		   ';
		   }
	 	echo'</div>';
echo '</div>
	    <div class="col-sm-8 text-left">';
	echo '   <h2>Liste des Depenses</h2>
  	           
  		<table  class="table table-hover table-responsive">';
  		$t=2;
echo'	<thead>';
	echo'<tr>';
	echo'<th class="droite" colspan="6">';
	echo'<a href="../html2pdf_v4.03/examples/exemple00.php?t_pt2=div" target="_blank">
		   <button class="badd" data-toggle="aj_b" title="Imprimer"><span class="glyphicon glyphicon-print">
		   </button></a></th>';
	echo' <tr>';
	echo'<th class="droite" colspan="8"><a id="ajout" >
		<button class="badd"><span class="glyphicon glyphicon-plus">
		 <span class="glyphicon glyphicon-file"></button>
		 </a></th>';
	echo' </tr>';
	echo' <tr>
		   <th>N°</th>
		   <th>Date</th>
		   <th>Motif</th>
		   <th>Prix</th>
		   <th>Véhicule</th>
		   <th>Action</th>
		 </tr>
	    </thead>';
echo'	<tbody id="table_verif">';
		$i=1;
		while($l=pg_fetch_assoc($depv2)){
			//$voir= date('d-m-Y',$l['date_dv']);
echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['date_dv'].'</td>
		   <td>'.$l['motif'].'</td>
		   <td>'.$l['prix'].'<b><sup> FCFA</sup></b></td>
		   <td>'.$l['no_mlle'].'</td>';
		echo'   <td><a href="depmod.php?id_dv='.$l['id_dv'].
		   '&date_dv='.$l['date_dv'].
		   '&prix='.$l['prix'].
		   '&no_mlle='.$l['no_mlle'].
		   '&motif='.$l['motif'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>
		   <span class="glyphicon glyphicon-file"></span>
		   </button></a></td>';
		echo' </tr>';
		 $i++;
	    }
echo ' </tbody>';
echo'  </table>
	</div>';
	
	
	//====================== Modal_ajout =================
		echo '<div class="modal fade" id="ajout_Modal" role="dialog">
    		<div class="modal-dialog">';
echo ' <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Enregistrement Depense</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post" action="depvehi.php">
           <input type="hidden" name="ams" value="DV">
           <input type="hidden" name="matri" value="'.$n_m2.'">
           <input type="hidden" name="n_m" value="'.$n_m.'">
           <input type="hidden" name="mm" value="'.$mm.'">
           <input type="hidden" name="id_v2" value="'.$id_v2.'">
	       <div class="form-group">
		   <label class="control-label for="cont">Date</label>
		    
		   <input type="text" class="form-control" id="cont" value="'.date('d-m-Y').'" readonly>
	    </div>';

echo'     <div class="form-group">
		 <label class="control-label  for="qte">Motif:</label>
		 <input type="text" class="form-control" id="qte" value="" name="motif" placeholder="ex. péage..." >
		 </div>';

echo'      <div class="form-group">
		 <label class="control-label  for="date">Montant:</label>
		<input type="text" class="form-control" id="date" value="" name="prix" >
	    </div>';
	    echo'<div class="form-group">
		 <label class="control-label  for="date">Vehicule &nbsp;</label>
		 
		<label><select name="no_mlle">';
			while($v=pg_fetch_assoc($voiture3)){

				   echo '<option value="'.$v['no_mlle'].'" selected>'.$v['no_mlle'].' '.$v['marque'].'</option>';
				}
		echo '</select>
			 </label>';
		 
echo'    </div>';
echo'	<button type="submit" class="btn btn-primary btn-block" name="valider" value="Valider">
		<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;&nbsp;Valider</button>
		</form>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span> Annuler</button>';
		echo'   </div>
			 </div>
			 </div>
			 </div> ';

		//====================== Modal_End_ajout =====================

	
	
	//====================== Modal_dep_veh =================
		echo '<div class="modal fade" id="da_Modal" role="dialog">
    		<div class="modal-dialog">';
echo ' <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Remboursement <span class="glyphicon glyphicon-usd"></span></h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post" action="depvehi.php">
           <input type="hidden" name="ams" value="TD">
           <input type="hidden" name="somme" value="'.$som3.'">

	       <div class="form-group">
		   <label class="control-label for="cont">Totaux depense</label>
		    
	<input type="text" class="form-control" id="cont" value="'.number_format($som3, 0, ',', ' ').' FCFA" readonly>
	    </div>';

echo'     <div class="form-group">
		 <label class="control-label  for="qte">Montant reçu:</label>
		 <input type="text" class="form-control" id="qte" value="" name="mp" >
		 </div>

		<button type="submit" class="btn btn-primary btn-block" name="valider" value="Valider">
		<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;&nbsp;Valider</button>
		</form>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span> Annuler</button>';
		echo'   </div>
			 </div>
			 </div>
			 </div> ';

		//====================== Modal_End =====================

		//====================== Modal list =====================
		echo '<div class="modal fade" id="b_Modal" role="dialog">
    <div class="modal-dialog">';
echo ' <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Etat des Payements <span class="glyphicon glyphicon-list-alt"></span> </h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">';
         		echo'<table class="table-hover table-responsive">';
         		echo'
         			<thead>';
         			echo'<tr>
         			  <th>N°</th>
         			  <th>Date du payement</th>
         			  <th>Montant payé</th>';
         			echo'<tr>';
         		echo'</thead>';
         		echo'<tbody>';
         		$i=1;
         		while($k=pg_fetch_assoc($archives)){
         			echo'<tr class="centre">';
         			echo'<td><b>'.$i.'</b></td>';
         			echo'<td><b>'.$k['date_p'].'</b></td>';
         			echo'<td><b>'.$k['mnt_p'].'<sup>FCFA</sup></b></td>';
         			echo'</tr>';
         		$i++;
         		}
         		echo'</tbody>';
         		echo'</table>';
         echo'</div>';
		echo' <div class="modal-footer">
			<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span> Annuler</button>';
		echo'   </div>
			 </div>
			 </div>
			 </div> ';
			 //====================================
	
echo'<div class="col-sm-2 sidenav">';
echo'<div class="well">
			<input class="form-control" id="verif" type="text" placeholder="Search..">';
echo'	 </div>';
echo' </div>
</div>';
	include('../../Layout/footer.php');
?>
