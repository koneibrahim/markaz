<?php
		if($_SESSION['gid']==0){
	switch($_REQUEST['ams']){
				case 'A':
					$login	   =$_REQUEST['login'];
					$passwd	   =$_REQUEST['passwd'];
					$gid         =$_REQUEST['gid'];
					$prenom      =$_REQUEST['prenom'];
					$nom         =$_REQUEST['nom'];
					$contact     =$_REQUEST['contact'];
					$req ="INSERT INTO users (login,passwd,gid,prenom,nom,contact) VALUES ";
					$req.="('$login',md5('$passwd'),$gid,'$prenom','$nom','$contact')";
					    		if($_REQUEST['valider']=='Ajouter')
					    $ajout =pg_query($conn,$req);
					    break;
				case 'M':
					    
					$login	   =$_REQUEST['login'];
					$passwd	   =$_REQUEST['passwd'];
					$uid         =$_REQUEST['uid'];
					$gid         =$_REQUEST['gid'];
					$prenom      =$_REQUEST['prenom'];
					$nom         =$_REQUEST['nom'];
					$contact     =$_REQUEST['contact'];
					    $req ="UPDATE users SET (login,passwd,gid,prenom,nom,contact) = ";
					    $req.="('$login',md5('$passwd'),$gid,'$prenom','$nom','$contact') WHERE uid=$uid";
					    		if($_REQUEST['valider']=='Modifier')
					    $mod =pg_query($conn,$req);
					    break;
				case 'S': 
					$uid         =$_REQUEST['uid'];
					    
					    $req="DELETE FROM users WHERE uid=$uid";
					    		if($_REQUEST['valider']=='Supprimer')
					    		$sup=pg_query($conn,$req);
					    break;
				default : ;
	
	}
	}
$liste  =pg_query($conn,"SELECT * FROM users WHERE login !='admin' ORDER BY prenom,nom ASC");
?>
