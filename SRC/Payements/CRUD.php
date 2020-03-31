<?php 
//===================REQUETE PAYEMENT ELEVE============================

	switch($_REQUEST['ams']){
		case 'A':
			$id_el 		=$_REQUEST['id_el'];
			$id_d 		=$_REQUEST['id_d'];
			$montant_p	=$_REQUEST['montant_p'];
			$nom_p 		=$_REQUEST['nom_p'];
			$tel_p  	=$_REQUEST['tel_p'];
				$req ="INSERT INTO payements (id_el,id_d,montant_p,nom_p,tel_p) 
					VALUES ";
				$req.="($id_el,$id_d,$montant_p,'$nom_p','$tel_p')";
				  if($_REQUEST['valider']=='Ajouter'){
				$ajout =pg_query($conn,$req);
							
			}
			break;
		case 'M':
			$id_pay 	=$_REQUEST['id_pay'];
			$id_el 		=$_REQUEST['id_el'];
			$id_d 		=$_REQUEST['id_d'];
			$montant_p	=$_REQUEST['montant_p'];
			$nom_p 		=$_REQUEST['nom_p'];
			$tel_p  	=$_REQUEST['tel_p'];
			$req ="UPDATE payements SET (id_pay,id_el,id_d,montant_p,nom_p,tel_p) = ";
			$req.="($id_pay,$id_el,$id_d,$montant_p,'$nom_p','$tel_p') WHERE id_pay=$id_pay";
				  if($_REQUEST['valider']=='Modifier')
				$mod =pg_query($conn,$req);
			break;
		case 'S': 
			$id_pay=$_REQUEST['id_pay'];
				$req="DELETE FROM payements WHERE id_pay=$id_pay";
				  if($_REQUEST['valider']=='Supprimer')
				$sup=pg_query($conn,$req);
			break;
			}
			
//=================== REQUETE PAYEMENT PERSONNELS===============================================================

	switch($_REQUEST['ams']){
		case 'PA':
			$id_p 		=$_REQUEST['id_p'];
			$id_d 		=$_REQUEST['id_d'];
			$paye		=$_REQUEST['paye'];
			$paye2		=$paye;
			$nom_p 		=$_REQUEST['nom_p'];
			$tel_p  	=$_REQUEST['tel_p'];
											
					if($_REQUEST['valider']=='Ajouter'){
				$req ="INSERT INTO pay_per (id_p,id_d,paye,nom_p,tel_p) 
					VALUES ";
				$req.="($id_p,$id_d,$paye,'$nom_p','$tel_p') returning id_pa";
				 $ajout =pg_query($conn,$req);
			if($ajout)
			$p=pg_fetch_assoc($ajout);
			$pa=$p['id_pa'];
$ins_dep=pg_query($conn,"INSERT INTO depenses(montant,motif,id_pa) values($paye,'PAYEMENT PERSONNEL',$pa)");
			}			
			break;
		case 'PM':
			$id_pa		=$_REQUEST['id_pa'];
			$p		=$id_pa;//========Permet de sauvegarder valeur $id_pa dans $p
			$id_p 		=$_REQUEST['id_p'];
			$id_d 		=$_REQUEST['id_d'];
			$paye		=$_REQUEST['paye'];
			$mnt		=$paye;//========Permet de sauvegarder valeur $paye dans $mnt
			$nom_p 		=$_REQUEST['nom_p'];
			$tel_p  	=$_REQUEST['tel_p'];
				$req ="UPDATE pay_per SET (id_pa,id_p,id_d,paye,nom_p,tel_p) = ";
				$req.="($id_pa,$id_p,$id_d,$paye,'$nom_p','$tel_p') WHERE id_pa=$id_pa";
				  if($_REQUEST['valider']=='Modifier')
				$mod =pg_query($conn,$req);
			if($mod)
			$upd_dep=pg_query($conn,"UPDATE depenses SET montant = $mnt WHERE id_pa=$p");
			
			break;
		case 'PS': 
			$id_pa=$_REQUEST['id_pa'];
			$p		=$id_pa;
				$req="DELETE FROM pay_per WHERE id_pa=$id_pa";
				if($_REQUEST['valider']=='Supprimer')
				$sup=pg_query($conn,$req);
			if($sup)
			$del_dep=pg_query($conn,"DELETE FROM depenses WHERE id_pa=$p");
									
			break;
			}
	//================= Liste des Personnels===========================================================
	$req="SELECT id_p,id_cat,nom,prenom,nom_cat FROM pay_per
	JOIN personnels USING (id_p) JOIN categories USING (id_cat) ORDER BY nom ASC";
	$persoxxx=pg_query($conn,$req);
	
	$req="SELECT id_p,id_cat,nom,prenom,nom_cat FROM personnels JOIN categories USING(id_cat) 
	ORDER BY nom ASC";
	$perso=pg_query($conn,$req);
	//===================== Liste des payemeent personnel====
	$req="SELECT id_pa,id_p,id_d,nom,prenom,date_pa,mois,paye,nom_p,tel_p FROM pay_per
            JOIN personnels USING (id_p) JOIN calendriers USING (id_d) WHERE id_p=$id_p ORDER BY date_pa ASC";
	$perpaye=pg_query($conn,$req);
	//======== Not selection du mois dejà payé==============
	$req10="SELECT * from calendriers WHERE id_d NOT IN (SELECT id_d FROM pay_per
            JOIN personnels USING (id_p) JOIN calendriers USING (id_d) 
            WHERE id_p=16 and extract(year from date_pa)= extract(year from now()) ORDER BY date_pa ASC)";
	$calendp=pg_query($conn,$req10);
	
	$req3="SELECT * FROM personnels ORDER BY nom ASC";
	$personnel=pg_query($conn,$req3);
	
	$req4="SELECT * FROM eleves ORDER BY nom_el ASC";
	$eleve=pg_query($conn,$req4);
	
	$req5="SELECT salaire FROM personnels WHERE id_p=$id_p";
	$salaire=pg_query($conn,$req5);
	
	//=============================== Liste des élèves================================================
	$req2="SELECT id_el,nom_el,prenom_el,niveau FROM eleves JOIN classes USING (id_cl)
	ORDER BY nom_el DESC ";
	$liste2=pg_query($conn,$req2);
	
	$total=pg_query($conn,"SELECT SUM(montant_p) AS tot FROM payements WHERE id_el=$id_el GROUP BY id_el");
	//============== Liste des payemeent un élève===========
	$req8="SELECT id_pay,id_el,id_d,nom_el,prenom_el,date_pay,mois,montant_p,nom_p,tel_p FROM payements
            JOIN eleves USING (id_el) JOIN calendriers USING (id_d) WHERE id_el=$id_el ORDER BY date_pay ASC";
	$elpaye=pg_query($conn,$req8);
	//======== Not selection du mois dejà payé==============
	$req10="SELECT * from calendriers WHERE id_d NOT IN (SELECT id_d FROM payements
            JOIN eleves USING (id_el) JOIN calendriers USING (id_d) 
            WHERE id_el=$id_el and extract(year from date_pay)= extract(year from now()) ORDER BY date_pay ASC)";
	$calendrier=pg_query($conn,$req10);
	//======== Selection du mois=============================
	$req11="select * from calendriers ";
	$cal2=pg_query($conn,$req11);
	
	$total=pg_query($conn,"SELECT SUM(montant_p) AS tot FROM payements WHERE id_el=$id_el GROUP BY id_el");
?>



