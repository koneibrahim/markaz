<?php
	
	switch($_REQUEST['ams']){
		case 'A':

		$nom_tu		=$_REQUEST['nom_tu'];
		$adresse  	=$_REQUEST['adresse'];
		$tel1  		=$_REQUEST['tel1'];
		$tel2  		=$_REQUEST['tel2'];
		$req ="INSERT INTO tuteurs (nom_tu,adresse,tel1,tel2) VALUES ";
		$req.="('$nom_tu','$adresse','$tel1','$tel2')";
			if($_REQUEST['valider']=='Ajouter'){
			$ajout =pg_query($conn,$req);
						
			}
				break;
		case 'M':
		$id_tu		=$_REQUEST['id_tu'];
		$nom_tu		=$_REQUEST['nom_tu'];
		$adresse  	=$_REQUEST['adresse'];
		$tel1	  	=$_REQUEST['tel1'];
		$tel2	  	=$_REQUEST['tel2'];
		$req ="UPDATE tuteurs SET (id_tu,nom_tu,adresse,tel1,tel2) = ";
		$req.="($id_tu,'$nom_tu','$adresse','$tel1','$tel2') WHERE id_tu=$id_tu";
			if($_REQUEST['valider']=='Modifier')
			$mod =pg_query($conn,$req);
				break;
		case 'S': 
		$id_tu		=$_REQUEST['id_tu'];
		$adresse	=$_REQUEST['adresse'];
		$tel1		=$_REQUEST['tel1'];
		$tel2		=$_REQUEST['tel2'];
		    $req="DELETE FROM tuteurs WHERE id_tu=$id_tu";
			if($_REQUEST['valider']=='Supprimer')
			$sup=pg_query($conn,$req);
				break;
				
			}
	$req    ="SELECT * FROM tuteurs ORDER BY nom_tu Asc";
	$liste  =pg_query($conn,$req);
?>
	
	

