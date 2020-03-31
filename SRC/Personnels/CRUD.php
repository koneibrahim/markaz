<?php
	switch ($_REQUEST['ams']) {
		case 'A':
			$prenom		=$_REQUEST['prenom'];
			$nom		=$_REQUEST['nom'];
			$id_cat		=$_REQUEST['id_cat'];
			$adresse	=$_REQUEST['adresse'];
			$tel1		=$_REQUEST['tel1'];
			$tel2		=$_REQUEST['tel2'];
			$salaire	=$_REQUEST['salaire'];
			$id_cl		=$_REQUEST['id_cl'];
			$req="INSERT INTO personnels (prenom,nom,id_cat,adresse,tel1,tel2,salaire,id_cl) VALUES ";
			$req.="('$prenom','$nom',$id_cat,'$adresse','$tel1','$tel2',$salaire,$id_cl)";
				if($_REQUEST['valider']=='Ajouter'){
				$ajout=pg_query($conn,$req);
			}
			break;
		case 'M':
			$id_p		=$_REQUEST['id_p'];
			$nom		=$_REQUEST['nom'];
			$prenom		=$_REQUEST['prenom'];
			$id_cat		=$_REQUEST['id_cat'];
			$adresse	=$_REQUEST['adresse'];
			$tel1		=$_REQUEST['tel1'];
			$tel2		=$_REQUEST['tel2'];
			$salaire	=$_REQUEST['salaire'];
			$id_cl		=$_REQUEST['id_cl'];
			$req="UPDATE personnels SET (id_p,nom,prenom,id_cat,adresse,tel1,tel2,salaire,id_cl) =";
			$req.="($id_p,'$nom','$prenom','$id_cat','$adresse','$tel1','$tel2',$salaire,$id_cl)
				 WHERE id_p=$id_p";
				if($_REQUEST['valider']=='Modifier')
				$mod=pg_query($conn,$req);
			break;
		case 'S':
			$id_p		=$_REQUEST['id_p'];
				$req="DELETE FROM personnels WHERE id_p=$id_p";
				if($_REQUEST['valider']=='Supprimer')
				$sup=pg_query($conn,$req);
			break;
		}

	$liste=pg_query($conn,"SELECT id_p,id_cat,id_cl,nom,prenom,adresse,tel1,tel2,salaire,niveau,nom_cat 
  	FROM personnels JOIN classes USING(id_cl) JOIN categories USING (id_cat)");

	$classe=pg_query($conn,"SELECT id_cl,niveau,nom_cl FROM classes");
	
	$req1="SELECT id_cat,nom_cat FROM categories";
	$catego=pg_query($conn,$req1);
	
	$req2="SELECT * FROM categories ";
	$categomod=pg_query($conn,$req2);
	
	$req3="SELECT * FROM classes ";
	$cla=pg_query($conn,$req3);
	

?>

