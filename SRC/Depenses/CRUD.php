<?php
	switch($_REQUEST['ams']){
		case 'A':
			$motif		=$_REQUEST['motif'];
			$date_dep  	=$_REQUEST['date_dep'];
			$montant  	=$_REQUEST['montant'];
			$req ="INSERT INTO depenses (motif,date_dep,montant) VALUES ";
			$req.="('$motif','$date_dep',$montant)";
				if($_REQUEST['valider']=='Ajouter'){
			echo'<div class="alert alert-success">
  				<strong>Success!</strong> Ajouter avec Succès.
			</div>';
			$ajout =pg_query($conn,$req);
						
			}
			break;
		case 'M':
			$id_dep  	=$_REQUEST['id_dep'];
			$motif  	=$_REQUEST['motif'];
			$date_dep  	=$_REQUEST['date_dep'];
			$montant  	=$_REQUEST['montant'];
			$req ="UPDATE depenses SET (motif,date_dep,montant) = ";
			$req.="('$motif','$date_dep',$montant) WHERE id_dep=$id_dep";
			if($_REQUEST['valider']=='Modifier')
			echo'Bien';
			$mod =pg_query($conn,$req);
			break;
		case 'S':
			$id_dep  	=$_REQUEST['id_dep'];
			$d		=id_dep;
			$date_dep  	=$_REQUEST['date_dep'];
			$montant  	=$_REQUEST['montant'];
			$req="DELETE FROM depenses WHERE id_dep=$id_dep";
				if($_REQUEST['valider']=='Supprimer')
			$sup=pg_query($conn,$req);
				
			break;
			}


//=========================================
  $liste=pg_query($conn,"select * FROM depenses ORDER BY id_dep DESC");
  $total  =pg_query($conn,"SELECT SUM(montant) AS tot FROM depenses");


 // $somdep=pg_query($conn,"select somme as s from totdep ");
 // $compare  =pg_query($conn,"select somme FROM totdep");


?>



