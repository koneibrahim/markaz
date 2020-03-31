<?php

	switch($_REQUEST['ams']){
		case 'A':
			$nom_el		=$_REQUEST['nom_el'];
			$prenom_el  	=$_REQUEST['prenom_el'];
			$date_nais  	=$_REQUEST['date_nais'];
			$id_tu  	=$_REQUEST['id_tu'];
			$id_cl  	=$_REQUEST['id_cl'];
			$req ="INSERT INTO eleves (nom_el,prenom_el,date_nais,id_tu,id_cl) VALUES ";
			$req.="('$nom_el','$prenom_el','$date_nais',$id_tu,$id_cl)";
				if($_REQUEST['valider']=='Ajouter'){
			echo'Bien';
			$ajout =pg_query($conn,$req);
						
			}
			break;
		case 'M':
			$id_el  	=$_REQUEST['id_el'];
			$id_tu		=$_REQUEST['id_tu'];
			$id_cl  	=$_REQUEST['id_cl'];
			$nom_el		=$_REQUEST['nom_el'];
			$prenom_el  	=$_REQUEST['prenom_el'];
			$date_nais  	=$_REQUEST['date_nais'];
			$req="UPDATE eleves SET id_tu=$id_tu,id_cl=$id_cl,nom_el='$nom_el',
			prenom_el='$prenom_el',date_nais='$date_nais'";
			$req.=" WHERE id_el=$id_el";
			if($_REQUEST['valider']=='Modifier')
			echo'Bien';
			$mod =pg_query($conn,$req);
			break;
		case 'S':
			$id_el		=$_REQUEST['id_el'];
			$nom_el		=$_REQUEST['nom_el'];
			$prenom_el  	=$_REQUEST['prenom_el'];
			$req="DELETE FROM eleves WHERE id_el=$id_el";
			if($_REQUEST['valider']=='Supprimer')
			$sup=pg_query($conn,$req);
			break;
			}
	$liste=pg_query($conn,"SELECT id_el,id_tu,id_cl,nom_el,prenom_el,date_nais,nom_tu,niveau
	FROM eleves JOIN  tuteurs USING(id_tu) JOIN classes USING(id_cl) ORDER BY id_el DESC");
				
	$tuteur=pg_query($conn,"SELECT id_tu,nom_tu FROM tuteurs");
				
	$classe=pg_query($conn,"SELECT id_cl,niveau,nom_cl FROM classes");

	$detail=pg_query($conn,"SELECT id_tu,nom_tu,tel1,tel2,adresse FROM tuteurs 
				NATURAL JOIN eleves  where id_tu =$id_tu");
?>
	
	


