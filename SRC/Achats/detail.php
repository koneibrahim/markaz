 <?php

       $id_ac=$_REQUEST['id_ac'];
       $id_fo=$_REQUEST['id_fo'];
       $mas=$_REQUEST['mas'];
       $id_cac=$_REQUEST['id_cac'];
       $date_ac=$_REQUEST['date_ac'];
       $libele=$_REQUEST['libele'];
       $nom=$_REQUEST['nom'];
       $aaa=$id_ac;

         function etat_liv($e) {
        	if($e=='N') return 'Non livré';
        	elseif ($e=='P') return 'Partiellement livré';
        	 else return 'Totalement livré';
        	 }

  include'../../Layout/header.php';
  include'../../Layout/retour.php';
  include'../../Layout/header2.php';
  include'CRUD.php';

		echo'<div id="caisse2">';
		echo'
	    <span class="glyphicon glyphicon-search"></span><input class="form-control affiche" id="verif" type="text" placeholder="Search..." size="15%">
	    ';
		echo'</div>';

      	echo'<div id="content">';
      	echo'<h3 class="titrecform textcen">Contenu de l\'achat  '.$libele.' '.$date_ac.' </h3><br/>';
      	echo'<table class="table-hover table-responsive w90">';
		echo'<thead>';
      	
      	
      	$det=pg_query($dbconn,"select * from achats where id_ac =$id_ac");
		$det2=pg_fetch_assoc($det);
      				if($det2['etat']==0){
      	echo'<tr>';
          echo' <th colspan="11" class="droite">
          	<a href="../html2pdf_v4.03/examples/exemple03.php?id_ac='.$id_ac.'" target="_blank">
		   <button class="btn btn-default" data-toggle="aj_b" title="Imprimer">
		   <span class="glyphicon glyphicon-print"></button></a>
          	</th>';
      	echo '</tr>';
      	echo'<tr>';
      	echo' <th colspan="11" class="droite">
          	<a id="ajout"><button class="badd"><span class="glyphicon glyphicon-file"></span>
          	<span class="glyphicon glyphicon-plus"></span></button></a>
          	</th>';
      	echo '</tr>';

      	echo'<tr>';
      	echo'<th >N°</th>';
      	echo'<th >Produit</th>';
      	echo'<th >Prix achat</th>';
      	echo'<th >Quantité</th>';
      	echo'<th >Quantité livré</th>';
        echo'<th >Montant</th>';
      	echo'<th  colspan="5" class="centre">Action</th>';
      	echo'</tr>';
      		}
      			else if($det2['etat']==1){
      		
      		echo'<h3 class="centre"><b> Achat Validé</b></h3>';
      		
      	echo' <th colspan="6" class="droite">
          <a href="../html2pdf_v4.03/examples/exemple03.php?id_ac='.$id_ac.'" target="_blank">
		   <button class="btn btn-default" data-toggle="aj_b" title="Imprimer">
		   <span class="glyphicon glyphicon-print">
          	</button></a>
          	</th>';
      	echo'<tr>';
      	echo'<th >N°</th>';
      	echo'<th >Produit</th>';
      	echo'<th >Prix achat</th>';
      	echo'<th >Quantité</th>';
      	echo'<th >Quantité livré</th>';
        echo'<th >Montant</th>';
      //echo'<th  colspan="5">Action</th>';
      	echo'</tr>';
      			}
      		
      		
      	echo'</thead>';
      	echo'<tbody id="table_verif">';
      	$i=1;
      	while($ligne=pg_fetch_assoc($contenuac))
      	{
      	echo'<tr class="l'.($i%2).'">';
      	echo'<td>'.$i.'</td>';
      	echo'<td>'.$ligne['nom_pro'].'</td>';
      	echo'<td>'.$ligne['prix_acha'].'</td>';
      	echo'<td>'.$ligne['qte_pro'].'</td>';
        echo'<td>'.$ligne['qte_liv'].'</td>';
        echo'<td>'.$ligne['montant'].'</td>';

      	$cp=$ligne['id_cac'];
          $reqpay=pg_query($dbconn,"select sum(somme) as mnt,contenu_acha.prix_acha*qte_pro as mont from payements join contenu_acha using(id_cac) where id_cac=$cp group by contenu_acha.prix_acha*qte_pro");
          	$lp=pg_fetch_assoc($reqpay);
          	
          		if($det2['etat']==0){
          		
              		if($lp['mnt'] == 0 ){
       echo' <td><a href="payement.php?id_cac='.$ligne['id_cac'].
			'&qte_pro='.$ligne['qte_pro'].
			'&id_ac='.$ligne['id_ac'].
			'&nom_pro='.$ligne['nom_pro'].
			'&som='.$lp['mnt'].
			'&id_fo='.$ligne['id_fo'].
			'&date_pay='.date('d/m/Y').
			'&libele='.$libele.'">
          <button class="btn btn-danger" >
          <span class="glyphicon glyphicon-usd"></span>
          	<span class="glyphicon glyphicon-remove"></span></button></a>
          </td>';
              
          	} 
          else if($lp['mnt'] > 0 && $lp['mnt'] < $lp['mont']){
        echo' <td><a href="payement.php?id_cac='.$ligne['id_cac'].
			'&qte_pro='.$ligne['qte_pro'].
			'&id_ac='.$ligne['id_ac'].
			'&nom_pro='.$ligne['nom_pro'].
			'&som='.$lp['mont'].
			'&id_fo='.$ligne['id_fo'].
			'&date_ac='.$date_ac.
			'&libele='.$libele.'">
          <button class="btn btn-warning" title="payement encours" >
          <span class="glyphicon glyphicon-usd"></span>
          	<span class="glyphicon glyphicon-remove"></span></button></a>
          </td>';
          		} 
          else if($lp['mnt'] == $lp['mont']){
          	echo' <td>
          <button class="btn btn-primary" title="Payé">
          <span class="glyphicon glyphicon-usd"></span>
          	<span class="glyphicon glyphicon-ok"></span></button>
          </td>';
          		} 
          
          		if($ligne['qte_liv']==0){
               echo' <td>
          <a href="contenuac.php?id_cac='.$ligne['id_cac'].
			'&qte_pro='.$ligne['qte_pro'].
			'&id_ac='.$ligne['id_ac'].
			'&nom_pro='.$ligne['nom_pro'].
			'&id_fo='.$ligne['id_fo'].
			'&date_ac='.$ligne['date_ac'].
			'&libele='.$ligne['libele'].
			'&mas=LVA">
          <button class="btn btn-danger"><b>Non livré</b></button></a>
          </td>';
          		}
          		else{
          	echo' <td>
          <a href="contenuac.php?id_cac='.$ligne['id_cac'].
			'&qte_pro='.$ligne['qte_pro'].
			'&id_ac='.$ligne['id_ac'].
			'&nom_pro='.$ligne['nom_pro'].
			'&id_fo='.$ligne['id_fo'].
			'&date_ve='.$ligne['date_ve'].
			'&libele='.$ligne['libele'].
			'&mas=LVS">
          <button class="btn btn-primary"><b>Livré</b></button></a>
          </td>';
          		}
               echo' <td>
          <a href="detail.php?id_ac='.$ligne['id_ac'].
			'&id_cac='.$ligne['id_cac'].
			'&id_fo='.$id_fo.
			'&prix_acha='.$ligne['prix_acha'].
			'&libele='.$libele.
			'&etat='.$etat.
			'&date_ac='.$date_ac.'">
          <button class="btn badd"><b>détail</b></button></a>
          </td>';
              // Modification le contenu de la vente
               echo'<td ><a href="Cmodifier.php?id_cac='.$ligne['id_cac'].
                   '&id_ac='.$ligne['id_ac'].
                   '&prix_acha='.$ligne['prix_acha'].
                   '&qte_pro='.$ligne['qte_pro'].
                   '&nom_pro='.$ligne['nom_pro'].'">
                   <button class="btn btn-success">
                   <span class="glyphicon glyphicon-file"></span><span class="glyphicon glyphicon-pencil">
                   </span></button></a></td>';
               echo'<td ><a href="Csupprimer.php?id_cac='.$ligne['id_cac'].
                   '&id_ac='.$ligne['id_ac'].
                   '&prix_acha='.$ligne['prix_acha'].
                   '&montant='.$ligne['montant'].
                   '&qte_pro='.$ligne['qte_pro'].
                   '&qte_liv='.$ligne['qte_liv'].
                   '&nom_pro='.$ligne['nom_pro'].'"><button class="btn btn-danger">
                   <span class="glyphicon glyphicon-trash"></span></button></a></td>';
                      }
       	echo'</tr>';

      	$i++;
      	}
      	echo'</tbody>';
      	echo'</table>';
      	
      	//***********  <!-- Modal --> **************
	   
		echo'<div class="modal fade" id="ajout_Modal" role="dialog">
		    <div class="modal-dialog">';
    
      //*************** <!-- Modal content-->
      echo'<div class="modal-content ">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-plus"></span> Nouveau produit</h4>
        </div>';
        echo'<div class="modal-body" style="padding:40px 50px;">
          <form class="form-horizontal " role="form" action="contenuac.php" method="post">';
          echo'<input type="hidden" name="mas" value="CA">';
          echo' <input type="hidden" name="id_ac" value="'.$id_ac.'"/>';
          echo' <input type="hidden" name="id_cac" value="'.$id_cac.'"/>';
          echo'<div class="form-group">';
          echo'<label class="control-label">Produit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
          echo'<label >
			<input type="text" class="form-control" id="mat" name="nom_pro" placeholder="Ciseaux...">
			</label>';
          echo'</div>';
          
          echo'<div class="form-group" >
	
	<label class="control-label" for="mat">Prix d\'achat &nbsp;</label>
	<label >
	<input type="text" class="form-control" id="mat" name="prix_acha" >
	</label>
	    </div>';
          
          echo'<div class="form-group">';
          echo'<label class="control-label">Quantité &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
          echo'<label><input type="text" class="form-control" id="mat" name="qte_pro"></label>';
          echo'</div>';
          	if($_SESSION['utilisateur']=='Identifie') {
	echo'<button type="submit" class="btn btn-success btn-block" name="valider" value="Valider">
              <span class="glyphicon glyphicon-ok"></span> Valider</button>
          </form>
        </div>';
	echo'<div class="modal-footer">
		     <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
		     <span class="glyphicon glyphicon-remove"></span> Annuler</button>
		   </div>
		 </div>
		 
	    </div>
	  </div> 
	</div>';
	}
		// **************** Modal_END ******************
		
		//***********  <!-- Modal detail --> **************
	   
		echo'<div class="modal fade" id="det_mod" role="dialog">
		    <div class="modal-dialog">';
    
      //*************** <!-- Modal content-->
      echo'<div class="modal-content ">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-list-alt"></span> Detail de l\'achat</h4>
        </div>';
        echo'<div class="modal-body" style="padding:40px 50px;">';

        	//$ligne=pg_fetch_assoc($lachat);

        	echo'<h2 class="titrecform textcen"> Details de l\'achat </h2>';
        	echo '<table  cellpadding="5" class="w90">';

        	echo'<tr class="ld'.($i%2).'">';
            	echo '<td>Date achat</td>';
            	echo '<td>'.$date_ac.'</td>';
        	echo '</tr>';

        	echo '<tr>';
            	echo '<td>Libele</td>';
            	echo '<td>'.$libele.'</td>';
        	echo '</tr>';
        	$fo=pg_fetch_assoc($lfournisseur2);
        		if($fo['id_fo']==$id_fo){
        	echo '<tr>';
            	echo '<td>Fournisseur </td>';
            	echo '<td>'.$fo['prenom_f'].' '.$fo['nom_f'].'</td>';
        	echo '</tr>';
				}
		$det=pg_query($dbconn,"select * from achats where id_ac =$id_ac");
		$det2=pg_fetch_assoc($det);
        	echo '<tr>';
            	echo '<td>Total</td>';
            	echo '<td ><b>'.number_format($det2['montant'],0,' ',' ').'<sup>F</sup></b></td>';
        	echo '</tr>';

        	echo '<tr>';
        			if($det2['montant_paye'] == 0){
            echo '<td>Montant payé</td>';
            echo '<td><b class="rouge">'.number_format($det2['montant_paye'],0,' ',' ').'<sup>F</sup></b></td>';
            		}else{
            echo '<td>Montant payé</td>';
            echo '<td><b class="verte">'.number_format($det2['montant_paye'],0,' ',' ').'<sup>F</sup></b></td>';
            		}
        	echo '</tr>';

        	echo '<tr>';
            	echo '<td>Reste à payé</td>';
            			if($det2['montant'] > $det2['montant_paye'] || $det2['montant_paye']==0){
     echo '<td><b class="rouge">'.number_format($det2['montant']-$det2['montant_paye'],0,' ',' ').'<sup>F</sup>
     		</b></td>';
     			}
     				else{
     		echo'<td><button class="btn btn-success" disabled title="PAYE!!">
     			<span class="glyphicon glyphicon-usd"></span> Montant Payé!!</button></td>';
     				}
        	echo '</tr>';

        	echo '<tr>';
            	echo '<td></td>';
            	echo '<td></td>';
        	echo '</tr>';
        	
		echo'<tr>';
           echo'<td class="textcen"><a href="contenuac.php?id_ac='.$id_ac.
            			'&date_ac='.$date_ac.
            			'&libele='.$libele.
            			'&id_fo='.$id_fo.
            			'&etat='.$etat.'">
               <button class="badd btn-default"><span class="glyphicon glyphicon-list"></span>Contenu</button>
               		</a></td>';
               	$et=1;
               	$M='V';
               if($det2['etat']==0) {
            	  echo'<td  class="textgau"><a href="detail.php?id_ac='.$id_ac.
            			'&date_ac='.$date_ac.
            			'&libele='.$libele.
            			'&mas='.$M.
            			'&etat='.$et.'">
            		<button class="btn btn-primary"> Validation &nbsp;
            		<span class="glyphicon glyphicon-file"><span class="glyphicon glyphicon-ok"></span>
            		  </button></a></td>';
            	     }
         	else {
            	  echo'<td  class="textgau"><h2><b class="verte">Achat validé</b></h2></td>';
            	     }
           
           echo'</tr>';
           echo'</table>';
 			
     echo'</div>';
	echo'<div class="modal-footer">
		     <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
		     <span class="glyphicon glyphicon-remove"></span> Fermer</button>
		   </div>
		 </div>
		 
	    </div>
	  </div> 
	</div>';
		//******** Modal detail_END ******************

        	include'../../Layout/footer.php';
        			/*------------Fin du fichier Achat.php-------------*/
?>
