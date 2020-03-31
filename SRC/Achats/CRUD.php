<?php
							
//=====================ACHAT=================================						
	if($_REQUEST['ams']=='AA')
		 {
		$libele		=$_REQUEST['libele'];
		$id_fo		=$_REQUEST['id_fo'];
		$req="INSERT INTO  achats (libele,id_fo)";
		$req.=" VALUES ('$libele',$id_fo)";
			if($_REQUEST['valider']=='Ajouter'){
		$aajouter=pg_query($conn,$req);
		 }
	elseif($_REQUEST['ams']=='AM')
		 {
		$id_ac		=$_REQUEST['id_ac'];
		$id_fo		=$_REQUEST['id_fo'];
		$libele		=$_REQUEST['libele'];
		$req="UPDATE achats SET libele='$libele',id_fo=$id_fo";
		$req.=" WHERE id_ac=$id_ac";
			if($_REQUEST['valider']=='Modifier')
		$amodifier=pg_query($conn,$req);
		  }
	elseif($_REQUEST['ams']=='AS')
		 {
		$id_ac		=$_REQUEST['id_ac'];
			if($_REQUEST['valider']=='Supprimer')
		$req="DELETE FROM achats WHERE id_ac=$id_ac";
		$asupprimer=pg_query($conn,$req);

		 }
		 }

 //=========================VALIDATION-========================
	else if($_REQUEST['ams']=='V')
		 {
		$id_ac=$_REQUEST['id_ac'];
		$etat=$_REQUEST['etat'];

		$requete="update  achats set etat=1 where id_ac=$id_ac";
		$avalider=pg_query($conn,$requete);
		
		 }

//-----CONTENU ACHAT-----------

	 	 if($_REQUEST['ams']=='CA')
		 {
		$id_ac=$_REQUEST['id_ac'];
		$nom_pro=$_REQUEST['nom_pro'];
		$prix_acha=$_REQUEST['prix_acha'];
		$qte_pro=$_REQUEST['qte_pro'];
		//********* pour la depense *****
		$dep_mont= $prix_acha * $qte_pro;
		$mot='Achat';
		$motif=$mot.'_'.$nom_pro;
		$achat=$id_ac;
		//********************************
		
		$requete="insert into contenu_acha (id_ac,nom_pro,prix_acha,qte_pro) ";
		$requete.=" values ($id_ac,'$nom_pro',$prix_acha,$qte_pro) returning id_cac";
			if($_REQUEST['valider']=='Valider'){
		$resultat=pg_query($conn,$requete);
			if($resultat){
			$ap=pg_fetch_assoc($resultat);
			$id_cac=$ap['id_cac'];
		$pj=pg_query($conn,"insert into payements (id_cac) values ($id_cac) returning id_cac");
			if($pj){
	$ins_dep=pg_query($conn,"insert into depenses(motif,montant,id_ac) values('$motif',$dep_mont,$achat)");
							
			$ac=pg_fetch_assoc($pj);
			$id_ach=$ac['id_cac'];
	$to_take=pg_query($conn,"select prix_acha,qte_pro,id_ac,id_cac from contenu_acha where id_cac=$id_ach");
			if($to_take){
			$to_take2=pg_fetch_assoc($to_take);
			$pa=$to_take2['prix_acha'];
			$qp=$to_take2['qte_pro'];
			$a=$to_take2['id_ac'];
			$a2=$to_take2['id_cac'];
			$up= $pa * $qp;
		$to_take3=pg_query($conn,"select montant from achats where id_ac=$a");
			$to_take4=pg_fetch_assoc($to_take3);
			$montant=$to_take4['montant'];
			$montant= $montant + $up;
			$up_ac=pg_query($conn,"update achats set montant = $montant where id_ac=$a");
			 }
		  }
			  }
			 }
		 }
	elseif($_REQUEST['ams']=='CM')
		 {
		$id_cac=$_REQUEST['id_cac'];
		$id_ac=$_REQUEST['id_ac'];
		$nom_pro=$_REQUEST['nom_pro'];
		$prix_acha=$_REQUEST['prix_acha'];
		$qte_pro=$_REQUEST['qte_pro'];
		$requete="update contenu_acha set nom_pro='$nom_pro',qte_pro=$qte_pro,prix_acha=$prix_acha";
		$requete.=" where id_cac=$id_cac";
				if($_REQUEST['valider']=='Valider')
			$cmodifier=pg_query($conn,$requete);
		 }
		 elseif($_REQUEST['ams']=='CS')
	 		 {
			$id_cac=$_REQUEST['id_cac'];
	 		$id_ac=$_REQUEST['id_ac'];
			$nom_pro=$_REQUEST['nom_pro'];
			$np=$nom_pro; # récuperation du nom_pro
			$motif='Achat_'.$np; # pour la suppression dans depense
			$qte_liv=$_REQUEST['qte_liv'];
	 		$mnt=$_REQUEST['montant'];
	 		
	 		if($_REQUEST['valider']=='Oui') {
	 		$requete="delete from contenu_acha where id_cac=$id_cac returning id_cac";
	 		$asupprimer=pg_query($conn,$requete);
	 		if($asupprimer){
	 		$ap=pg_fetch_assoc($asupprimer);
			$id_cac=$ap['id_cac'];
		$pj=pg_query($conn,"delete from payements where id_cac=$id_cac");
		$up_achat=pg_query($conn,"select montant,id_ac from achats where id_ac=$id_ac");
			//******** supression depense ********
$dep_sup=pg_query($conn,"select id_dep from depenses where motif='$motif' order by id_dep desc limit 1");
		$dep_sup2=pg_fetch_assoc($dep_sup);
		$id_dep=$dep_sup2['id_dep'];
	$dep_supr=pg_query($conn,"delete from depenses where id_dep=$id_dep");
	//****************** fin ************************
		$up_achat2=pg_fetch_assoc($up_achat);
			$m=$up_achat2['montant'];
			$aa=$up_achat2['id_ac'];
			$mn= $m - $mnt;
		$up_achat3=pg_query($conn,"update achats set montant = $mn where id_ac=$aa");
		//$take=pg_query($conn,"select qte_reel  from produits where nom_pro=$nom_pro ");
				/*if($take){
			$tk=pg_fetch_assoc($take);
			$tk2=$tk['qte_reel'];
				if($qte_liv > 0){
			$qt = $tk2 - $qte_liv;
		$pup=pg_query($conn,"update produits set qte_reel = $qt where nom_pro=$nom_pro");
				}

			   }*/
			}
	 		 }
	 	}
 //----------LIVRAISONS-----------

	 	if($_REQUEST['ams']=='LVA')
		 {
		$id_cac=$_REQUEST['id_cac'];
		$id_ac=$_REQUEST['id_ac'];
		$aa=$id_ac;
		$aa2=$id_ac;
		$etl='T';
		$libele=$_REQUEST['libele'];
		$qte_pro=$_REQUEST['qte_pro'];
		$qte_reel=$qte_pro;
		$nom_pro=$_REQUEST['nom_pro'];
 $requete="insert into livraisons (id_ac,id_cac,libele) values ($id_ac,$id_cac,'$libele') returning id_cac" ;
			$lv=pg_query($conn,$requete);
			if($lv){
			$ligne=pg_fetch_assoc($lv);
				$id_cac=$ligne['id_cac'];
		$requetel=pg_query($conn,"update contenu_acha set qte_liv = $qte_pro where id_cac=$id_cac ");
			if($requetel){
	$rr=pg_query($conn,"select sum(qte_pro) as p, sum(qte_liv) as l from contenu_acha 
					where id_ac=$aa");
		$rrr=pg_fetch_assoc($rr);
		//$ra=$rrr['id_ac'];
			if($rrr['p'] == $rrr['l']){
		$rrr2=pg_query($conn,"update achats set etat_liv='$etl' where id_ac=$aa2");
				}
		
			}
		 }
	}
	else if($_REQUEST['ams']=='LVM')
		 {
		$id_ac=$_REQUEST['id_ac'];
		$id_liv=$_REQUEST['id_liv'];
		$date_liv=$_REQUEST['date_liv'];
		$libele=$_REQUEST['libele'];
		$requetec=" update livraisons set date_liv='$date_liv',libele='$libele'";
		$requetec.=" where id_ac=$id_ac ";
			if($_REQUEST['valider']=='Valider')
		$lvmodifier=pg_query($conn,$requetec);
		}
	else if($_REQUEST['ams']=='LVS')
		 {
		$id_cac=$_REQUEST['id_cac'];
		$id_ac=$_REQUEST['id_ac'];
		$aa=$id_ac;
		$aa2=$id_ac;
		$etl='N';
		$libele=$_REQUEST['libele'];
		$qte_pro=$_REQUEST['qte_pro'];
		$qte_reel=$qte_pro;
		$nom_pro=$_REQUEST['nom_pro'];
		
		$lvs=pg_query($conn,"delete from livraisons where id_cac=$id_cac returning id_cac");
			if($lvs){
			$ligne=pg_fetch_assoc($lvs);
				$id_cac=$ligne['id_cac'];
			$requetel=pg_query($conn,"update contenu_acha set qte_liv = 0 where id_cac=$id_cac");
			if($requetel){
		$rr=pg_query($conn,"select sum(qte_pro) as p, sum(qte_liv) as l,id_ac from contenu_acha 
					where id_ac=$aa");
		$rrr=pg_fetch_assoc($rr);
		//$ra=$rrr['id_ac'];
			if($rrr['p'] == $rrr['l']){
		$rrr2=pg_query($conn,"update achats set etat_liv='$etl' where id_ac=$aa2");
				}
		
			}
		 }

		 
		 }

//-------MODIFICTAION CONTENU LIVRAISON--------

	else if($_REQUEST['ams']=='LM')
		 {
		$id_ac=$_REQUEST['id_ac'];
		$id_liv=$_REQUEST['id_liv'];
		$nom_pro=$_REQUEST['nom_pro'];
		$id_cliv=$_REQUEST['id_cliv'];
		$id_cac=$_REQUEST['id_cac'];
		$qte_l=$_REQUEST['qte_l'];
		$qte_liv=$_REQUEST['qte_liv'];
		$qte_l_orig=$_REQUEST['qte_l_orig'];
		if($_REQUEST['valider']=='Valider'){
			$req = "update contenu_liv set qte_l=$qte_l where id_cliv=$id_cliv";
			$req=pg_query($conn,$req);
	$req=pg_query($conn,"update contenu_acha set qte_liv=qte_liv-$qte_l_orig+$qte_l where id_cac=$id_cac");

		$eliv=pg_query($conn,"select count(*) as nb from contenu_acha where id_ac=$id_ac and qte_liv<>0");
		$leliv=pg_fetch_assoc($eliv);
		if($leliv['nb']!=0) $r=pg_query($conn,"update achats set etat_liv='P' where id_ac=$id_ac");
	$eliv=pg_query($conn,"select count(*) as nb from contenu_acha where id_ac=$id_ac and qte_liv<qte_pro");
		$leliv=pg_fetch_assoc($eliv);
		if($leliv['nb']==0) $r=pg_query($conn,"update achats set etat_liv='T' where id_ac=$id_ac");
	 	}
	 	}
//------------PAYEMENT----------------
	  if($_REQUEST['ams']=='PA')
		 {
		$id_ac=$_REQUEST['id_ac'];
		$id_cac=$_REQUEST['id_cac'];
		$date_pay=$_REQUEST['date_pay'];
		$somme=$_REQUEST['somme'];
		$som=$_REQUEST['som'];
		$agent=$_REQUEST['agent'];
				if($_REQUEST['valider']=='payer'){
			if($som==0){
			$requete="update payements set (id_ac,date_pay,somme,agent) ";
			$requete.=" = ($id_ac,'$date_pay',$somme,'$agent') where id_cac=$id_cac returning id_ac";
			$py=pg_query($conn,$requete);
					if($py){
						$pye=pg_fetch_assoc($py);
						$a=$pye['id_ac'];
				$pye2=pg_query($conn,"select montant_paye,id_ac from achats where id_ac=$a");
						$pye3=pg_fetch_assoc($pye2);
						$munt=$pye3['montant_paye'];
						$a2=$pye3['id_ac'];
						if($munt==0){
				$up_ac=pg_query($conn,"update achats set montant_paye =$somme where id_ac=$a2");
							}
						else if($munt>0){
						$sss=$munt+$somme;
				$up_ac=pg_query($conn,"update achats set montant_paye =$sss where id_ac=$a2");
							}
						
						} 
					}
					else if($som>0){
					//$somm = $somme + $s;
			$requete="insert into payements (id_ac,id_cac,somme,agent) values ";
			$requete.="  ($id_ac,$id_cac,$somme,'$agent') returning id_ac";
			$py=pg_query($conn,$requete); 
					if($py){
						$pye=pg_fetch_assoc($py);
						$a=$pye['id_ac'];
				$pye2=pg_query($conn,"select montant_paye,id_ac from achats where id_ac=$a");
						$pye3=pg_fetch_assoc($pye2);
						$munt=$pye3['montant_paye'];
						$a2=$pye3['id_ac'];
						if($munt==0){
				$up_ac=pg_query($conn,"update achats set montant_paye =$somme where id_ac=$a2");
							}
						else if($munt>0){
						$sss=$munt+$somme;
				$up_ac=pg_query($conn,"update achats set montant_paye =$sss where id_ac=$a2");
							}
						
						} 
					}
			 // }
				}
		 }

	else if($_REQUEST['ams']=='PM')
		 {
		$id_ac=$_REQUEST['id_ac'];
		$id_pay=$_REQUEST['id_pay'];
		$date_pay=$_REQUEST['date_pay'];
		$somme=$_REQUEST['somme'];
	$requete="update payements set somme=$somme,date_pay='$date_pay',agent='$agent' where id_pay=$id_pay ";
			if($_REQUEST['valider']=='Valider')
		if(pg_query($conn,"update achats set montant_paye=montant_paye+$total where id_ac=$id_ac"))
		$pmodifier=pg_query($conn,$requete);
		 }
	else if($_REQUEST['ams']=='PS')
		 {
		$id_pay=$_REQUEST['id_pay'];
		$valider=$_REQUEST['valider'];
		if($valider=='Oui') {
		$requete="delete from payements where id_pay=$id_pay";
		$lsupprimer=pg_query($conn,$requete);
		 }
		 }
//========================FOURNISSEUR========================
	else if($_REQUEST['ams']=='AF')
	 {
	$prenom_f=$_REQUEST['prenom_f'];
	$nom_f=$_REQUEST['nom_f'];
	$adresse=$_REQUEST['adresse'];
	$contact=$_REQUEST['contact'];
	$req="INSERT INTO fournisseurs (prenom_f,nom_f,adresse,contact)";
	$req.=" VALUES ('$prenom_f','$nom_f','$adresse','$contact')";
			if($_REQUEST['valider']=='Ajouter')
	$resultat=pg_query($conn,$req);
	 }
		 
		 
	$req="SELECT * from achats JOIN fournisseurs USING(id_fo) ORDER BY id_ac desc";
		 	$listeac=pg_query($conn,$req);
		 	
	$req5="select * from fournisseurs order by nom_f,prenom_f asc";
		 		$lfournisseur=pg_query($conn,$req5);
		 		
	$req4="SELECT * from fournisseurs ORDER BY nom_f,prenom_f ASC";
		 		$lfournisseur2=pg_query($conn,$req4);
		 		
	/*
	
	

	 $requete="select id_ac,id_fo,nom,prenom,date_ac,libele,nom,montant,montant_paye,etat_liv,etat
				from achats natural join personnes where id_ac=$id_ac";
			 $achat=pg_query($conn,$requete);

	 $requete2="select id_ac,id_fo,nom,prenom,date_ac,libele,nom,montant,montant_paye,etat_liv,etat,
		sum(prix_acha*qte_pro) as total from	achats natural join personnes natural join contenu_acha
	where id_ac=$id_ac group by id_ac,id_fo,nom,prenom,date_ac,libele,montant,montant_paye,etat_liv,etat";
	  		  $lachat=pg_query($conn,$requete2);

	$requete3="select id_cac,id_ac,id_fo,nom_pro,prix_acha,date_ac,qte_pro,prix_acha*qte_pro as montant,
			qte_liv from contenu_acha join achats using(id_ac)
			where id_ac=$id_ac order by id_cac desc ";
				$contenuac=pg_query($conn,$requete3);

	 
			
 	 $requete6="select id_ac,id_liv,date_liv,libele from livraisons where id_ac=$id_ac";
		 		$listeliv=pg_query($conn,$requete6);

	 $requete7="select id_liv,id_cac,id_cliv,id_ac,nom_pro,qte_pro,qte_l from contenu_liv
		 			natural join contenu_acha natural where id_ac=$id_ac; ";
		 		$livraison=pg_query($conn,$requete7);

     $requete8="select id_pay,id_ac,date_pay,somme,agent from payements natural join
		 			achats where id_ac=$id_ac";
		 		$payement=pg_query($conn,$requete8);

    // $requete9="select id_ac,libele,date_ac from achats where id_ac=$id_ac" ;
		 		//$pachat=pg_query($conn,$requete9);
	 */
?>


