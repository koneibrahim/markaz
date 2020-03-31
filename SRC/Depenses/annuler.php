<?php
	$date_d=$_REQUEST['date_d'];
	$no_p=$_REQUEST['no_p'];
	$mark_p=$_REQUEST['mark_p'];
	$type_p=$_REQUEST['type_p'];
	$no_mlle=$_REQUEST['no_mlle'];
	include('../../Layout/header.php');
	include('CRUD.php');
echo '  <div class="row content">
	    <div class="col-sm-2 sidenav">';
echo '</div>
	    <div class="col-sm-8 text-left">';
	echo '   <h2>Liste des pertes</h2>
  	           
  		<table  class="table table-hover table-responsive">';
echo'	<thead>
		 <tr>
		   <th>N°</th>
		   <th>Date du perte</th>
           <th>N° Série</th>
		   <th>Marque</th>
		   <th>Type</th>
		   <th>Véhicule</th>
		   <th>Action</th>
		 </tr>
	    </thead>';
echo'	<tbody>';
		$i=1;
		while($l=pg_fetch_assoc($liste2)){
echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['date'].'</td>
		   <td>'.$l['no_p'].'</td>
		   <td>'.$l['marque'].'</td>
		   <td>'.$l['type'].'</td>
		   <td>'.$l['no_mlle'].' '.$l['mark_v'].'</td>
		   <td><a href="annuler.php?date_d='.$l['date'].
		   '&no_p='.$l['no_p'].
		   '&mark_p='.$l['marque'].
		   '&type_p='.$l['type'].
		   '&no_mlle='.$l['no_mlle'].'"><button class="btn btn-primary"><span class="glyphicon glyphicon-remove">
		   </span>Annuler</button></a></td>';
	echo ' </tr>';
		 $i++;
	    }
echo ' </tbody>';
echo'  </table>
	</div>';
echo '<div class="modal fade" id="ds_Modal" role="dialog">
    <div class="modal-dialog">';
echo ' <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Annulation</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form  role="form" method="post" action="pertes.php">';
          echo '<input type="hidden" name="ams" value="AN">';
		echo '<input type="hidden" name="no_p" value="'.$no_p.'">';
		echo '<input type="hidden" name="mark_p" value="'.$mark_p.'">';
		echo '<input type="hidden" name="type_p" value="'.$type_p.'">';
		echo '<input type="hidden" name="no_mlle" value="'.$no_mlle.'">';
		echo '<input type="hidden" name="date_d" value="'.$date_d.'">';
		echo '<h2>Êtes-Vous sûr d\'annuler cette perte ?</h2>';
		echo '<button type="submit" class="btn btn-danger btn-block" name="valider" value="OUI">
		<span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;OUI</button>
		</form>
		</div>';
		echo'<div class="modal-footer">
			<button type="submit" class="btn btn-primary btn-default pull-left" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span> Annuler</button>';
		echo'   </div>
			 </div>
			 </div>
			 </div> ';
echo'<div class="col-sm-2 sidenav">';
echo'<div class="well">
			<input class="form-control" id="verif" type="text" placeholder="Search..">';
echo'	 </div>';
echo' </div>
</div>';
include('../../Layout/footer.php');
?>
