 <?php

       $id_ac=$_REQUEST['id_ac'];
       $id_fo=$_REQUEST['id_fo'];
       $mas=$_REQUEST['mas'];
       $id_cac=$_REQUEST['id_cac'];
       $date_ac=$_REQUEST['date_ac'];
       $libele=$_REQUEST['libele'];
       $nom=$_REQUEST['nom'];


  include'../../Layout/header.php';
  include'../../Layout/retour.php';
  include'../../Layout/header2.php';
  include'CRUD.php';

	echo'<div id="caisse2">';
		echo'
	    <span class="glyphicon glyphicon-search"></span><input class="form-control" id="verif" type="text" placeholder="Search..." size="15%">
	    ';
		echo'</div>';

      	echo '<div id="content">';
      	
      	echo' <table class="table-hover table-responsive w90">';
          	echo' <thead>';
          	echo'<tr>';
          	echo' <th colspan="8" class="droite">
          	<a id="ajout"><button class="badd"><span class="glyphicon glyphicon-file"></span>
          	<span class="glyphicon glyphicon-plus"></span></button></a>
          	</th>';
          	echo' </tr>';
          	echo' <tr>';
          	echo' <th>N°</th>';
          	echo' <th>Date</th>';
          	echo' <th>Libellé</th>';
          	echo' <th>Fournisseur</th>';
          	echo' <th>Contact</th>';
          	echo' <th colspan="3" class="centre">Action</th>';
          	echo' </tr>';
          	echo' </thead>';
          	
          	$i = 1;
          	echo' <tbody id="table_verif">';
          	while($ligne=pg_fetch_assoc($listeac))
          	{
          
          	echo' <tr class="l'.$i%2 .'">';
          echo' <td>'.$i.'</td>';
          echo' <td>'.$ligne['date_ac'].'</td>';
          echo' <td>'.$ligne['libele'].'</td>';
          echo' <td>'.$ligne['prenom_f'].' '.$ligne['nom_f'].'</td>';
          echo' <td>'.$ligne['contact'].'</td>';
          echo' <td>
          <a href="achat.php?id_ac='.$ligne['id_ac'].
			'&libele='.$ligne['libele'].
			'&id_fo='.$ligne['id_fo'].
			'&date_ac='.$ligne['date_ac'].'">
          <button class="btn badd"><b>détail</b></button></a>
          </td>';
          if($ligne['etat']==0){
          echo' <td><a id="mod_v" href="Amodifier.php?id_ac='.$ligne['id_ac'].
			'&libele='.$ligne['libele'].
			'&id_fo='.$ligne['id_fo'].
			'&date_ac='.$ligne['date_ac'].'">
			<button class="btn btn-success"><span class="glyphicon glyphicon-file"></span>
          	<span class="glyphicon glyphicon-pencil"></span></button></a></td>';
          echo' <td><a href="Asupprimer.php?id_ac='.$ligne['id_ac'].
			'&libele='.$ligne['libele'].
			'&id_fo='.$ligne['id_fo'].
			'&date_ac='.$ligne['date_ac'].'">
			<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
			</td>';
			}
				else{
		echo' <td colspan="2" class="verte centre"><b>Validé!!!</b></td>';
				}
          	echo' </tr>';
          	$i++;
          	}
          echo' </tbody>';
          echo' </table>';
          
          //***********  <!-- Modal --> **************
	   
		echo'<div class="modal fade" id="ajout_Modal" role="dialog">
		    <div class="modal-dialog">';
    
      //*************** <!-- Modal content-->
      echo'<div class="modal-content ">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-plus"></span> Nouveau Achat </h4>
        </div>';
        echo'<div class="modal-body" style="padding:40px 50px;">
          <form class="form-horizontal centre" role="form" action="index.php" method="post">';
          echo'<input type="hidden" name="mas" value="AA">';
          	
          	echo'<div class="form-group">
	<label class="control-label for="mat">Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><label>
<input type="text" class="form-control" id="mat"  name="date_ve" value="'.date('d/m/Y').'" title="Désactiver" disabled >
</label>
	    </div>';
           
echo'     <div class="form-group">
	<label class="control-label for="mat">Libellé &nbsp;</label>
	<label>
	<input type="text" class="form-control" id="mat" name="libele" placeholder="ex. produit informatique">
	</label>
		
		 </div>';
		 
		echo'<div class="form-group">
		 <label class="control-label  for="f">Fournisseur &nbsp;&nbsp;&nbsp;</label>
		 
		<label><select name="id_fo" >';
			   while ($ligne=pg_fetch_assoc($lfournisseur)) {
      	echo '<option value="'.$ligne['id_fo'].'">'.$ligne['prenom_f'].'  '.$ligne['nom_f'].'</option>';
      	}
		echo '</select>
	    </div>';
           
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
		//******** Modal_END ******************
		
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
            	  echo'<td  class="textgau"><a href="achat.php?id_ac='.$id_ac.
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
