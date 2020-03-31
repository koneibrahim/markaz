<?php 

	switch($_REQUEST['ams']){
				case 'A':
					$nom_cl		=$_REQUEST['nom_cl'];
					$niveau  	=$_REQUEST['niveau'];
					    $req ="INSERT INTO classes (nom_cl,niveau) VALUES ";
					    $req.="('$nom_cl','$niveau')";
					    	if($_REQUEST['valider']=='Ajouter'){
					    $ajout=pg_query($conn,$req);
						
					}
					    break;
				case 'M':
					$id_cl		=$_REQUEST['id_cl'];
					$nom_cl		=$_REQUEST['nom_cl'];
					$niveau  	=$_REQUEST['niveau'];
				$req="UPDATE classes SET id_cl='$id_cl',nom_cl='$nom_cl',niveau='$niveau' ";
				$req.=" WHERE id_cl=$id_cl";
					    	if($_REQUEST['valider']=='Modifier')
					     $mod=pg_query($conn,$req);
					    break;
				case 'S': 
					$id_cl=$_REQUEST['id_cl'];
					$nom_cl=$_REQUEST['nom_cl'];
					    $req="DELETE FROM classes WHERE id_cl=$id_cl";
					    		if($_REQUEST['valider']=='Supprimer')
					    	$sup=pg_query($conn,$req);
					    break;
				}
	$req    ="SELECT * FROM classes ORDER BY id_cl DESC";
	$liste  =pg_query($conn,$req);
?>


