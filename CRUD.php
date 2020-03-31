<?php
		$dconn	  =$_REQUEST['dconn'];
		$actif	  =$_REQUEST['val'];
		$nw		  =$_REQUEST['nw'];
		$ex	  =$_REQUEST['ex'];
			if($dconn=='OUI'){
				$_SESSION['conn']='NON';
				session_destroy();

			}
			else {
		       
		
		$login	=$_REQUEST['login'];
		$passwd   =$_REQUEST['passwd'];
		$requete  ="SELECT * FROM users WHERE login='$login'";
		$resultat =pg_query($conn,$requete);
		$l=pg_fetch_assoc($resultat);
		$_SESSION['error']='';
			if(strlen($l['login'])>0){
			if($l['passwd']==md5("$passwd")){
			$_SESSION['conn']='OUI';
			$_SESSION['gid']=$l['gid'];
			$_SESSION['login']=$l['login'];
			}
			else $_SESSION['error']='Erreur de login ou de mot de passe!!';
			}
			}
?>
