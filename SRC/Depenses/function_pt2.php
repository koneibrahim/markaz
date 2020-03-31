<?php
	
	function som($char){
		$ress=pg_connect("host=localhost port=5432 dbname=sds user=abdallah password=nawawi");
		$req ="select sum(prix) as s from ponts where etat_p ='N' and lieu='$char'";
		$psom  =pg_query($ress,$req);
				if(psom){
		$psom2=pg_fetch_assoc($psom);
		//$somme=$psom2['s'];
	echo'<p class="centre"><b>'.number_format($psom2['s'], 0, ',', ' ').' FCFA</b></p>';
				}
	}
	
	function pont($char,$a,$b,$c,$d,$e,$id){
		$pf=$char;
		$pf2=$pf;
		$pf3=$pf2;
		$lieu=$pf2;
		$id_pt	    =$id;
		$motif	    =$b;
		$date_pt  =$a;
		$prix      =$c;
		$no_mlle      =$d;
		$etat_p         =$e;
		$ress=pg_connect("host=localhost port=5432 dbname=sds user=abdallah password=nawawi");
		$req ="SELECT * FROM ponts WHERE lieu='$char' AND etat_p ='N'";
				$pliste  =pg_query($ress,$req);
		$i=1;
		while($l=pg_fetch_assoc($pliste)){
echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['date_pt'].'</td>
		   <td>'.$l['motif'].'</td>
		   <td>'.$l['lieu'].' '.$l['mark_p'].'</td>
		   <td>'.$l['prix'].'</td>
		   <td>'.$l['no_mlle'].'</td>
		   <td><a href="pmodifier.php?id_pt='.$l['id_pt'].
		   '&motif='.$l['motif'].
		   '&t_pt='.$char.
		   '&date_pt='.$l['date_pt'].
		   '&prix='.$l['prix'].
		   '&no_mlle='.$l['no_mlle'].
		   '&etat_p='.$l['etat_p'].
		   '&lieu='.$l['lieu'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil"><span class="glyphicon glyphicon-file"></button></a></td>
			 <td><a href="psupprimer.php?id_pt='.$l['id_pt'].
		   '&motif='.$l['motif'].
		   '&lieu='.$l['lieu'].
		   '&t_pt='.$char.
		   '&date_pt='.$l['date_pt'].
		   '&no_mlle='.$l['no_mlle'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
		 </tr>';
		 $i++;
	    }
	    
	echo ' </tbody>';
echo'  </table>
	</div>';

//====================== dep ajout ======================
		 
  //<!-- Modal -->
echo '<div class="modal fade" id="da_Modal" role="dialog">
    <div class="modal-dialog">';
    
      //<!-- Modal content-->
echo ' <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Nouveau Depense '.$pf.'</h4>
        </div>';
echo'<div class="modal-body" style="padding:40px 50px;">
          <form  role="form" method="post" action="pont.php">
           <input type="hidden" name="ams" value="PA">
           <input type="hidden" name="t_pt" value="'.$pf2.'">';
		
		echo'   <div class="form-group">
		   <label class="control-label for="mat">Date &nbsp;&nbsp;</label>
		    
		   <label><input type="text" class="form-control" id="mat" value="'.date('d/m/Y').'" readonly>
		   	</label>
		
	    </div>';
		
echo'   <div class="form-group">
		   <label class="control-label for="mat">Motif &nbsp;&nbsp;</label>
		    
		   <label><input type="text" class="form-control" id="mat" Value="Pesage '.$pf.'"
		   name="motif" readonly></label>
		
	    </div>';
	    
echo'   <div class="form-group">
		   <label class="control-label for="mat">Lieu &nbsp;&nbsp;</label>
		    
		   <label><input type="text" class="form-control" id="mat" value="'.$pf.'"
		   name="lieu" readonly></label>
		
	    </div>';
    		 
echo'   <div class="form-group">
		   <label class="control-label for="mat">Montant &nbsp;&nbsp;</label>
		    
		   <label><input type="text" class="form-control" id="mat" name="prix" required></label>
		
	    </div>';
	    
	    echo'<div class="form-group">
		 <label class="control-label  for="date">Vehicule &nbsp;</label>
		 
		<label><select name="no_mlle">';
		$voiture2 =pg_query($ress,"select vehicules.no_mlle,marque FROM vehicules WHERE etat='A' and type='Carasoire' order by no_mlle asc");
			while($v=pg_fetch_assoc($voiture2)){

				   echo '<option value="'.$v['no_mlle'].'" selected>'.$v['no_mlle'].' '.$v['marque'].'</option>';
				}
		echo '</select>
			 </label>';
		 
echo'    </div>';
	    

	echo '<button type="submit" class="btn btn-primary btn-block" name="valider" value="Ajouter">
		<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Ajouter</button>
		</form>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span> Annuler</button>';
			
		echo'   </div>
			 </div>
			
			 </div>
			 </div> ';
			
		//====================== fin dep ajout ==================

		// ============================= Modal_Mod =====================
echo '<div class="modal fade" id="dm_Modal" role="dialog">
    <div class="modal-dialog">';
echo ' <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4>Modification Depense</h4>';
     echo'</div>';
     echo'   <div class="modal-body" style="padding:40px 50px;">
          <form  role="form" method="post" action="pont.php">
           <input type="hidden" name="ams" value="PM">
           <input type="hidden" name="id_pt" value="'.$id_pt.'">
           <input type="hidden" name="t_pt" value="'.$pf3.'">';
	       
	       echo'   <div class="form-group">
		   <label class="control-label for="mat">Date &nbsp;&nbsp;</label>
		    
		   <label><input type="text" class="form-control" id="mat" value="'.$date_pt.'" readonly>
		   	</label>
		
	    </div>';
		
echo'   <div class="form-group">
		   <label class="control-label for="mat">Motif &nbsp;&nbsp;</label>
		    
		   <label><input type="text" class="form-control" id="mat" value="'.$motif.'"  name="motif" readonly>
		   </label>
		
	    </div>';
	    
echo'   <div class="form-group">
		   <label class="control-label for="mat">Lieu &nbsp;&nbsp;</label>
		    
		   <label><input type="text" class="form-control" id="mat" value="'.$lieu.'" name="lieu" readonly>
		   </label>
		
	    </div>';
    		 
echo'   <div class="form-group">
		   <label class="control-label for="mat">Montant &nbsp;&nbsp;</label>
		    
		   <label><input type="text" class="form-control" id="mat" name="prix"  value="'.$prix.'">
		   </label>
		
	    </div>';
	    
	    
	    echo'<div class="form-group">
		 <label class="control-label  for="date">Vehicule &nbsp;</label>
		 
		<label><select name="no_mlle">';
		$voit =pg_query($ress,"select vehicules.no_mlle,marque FROM vehicules ");
			while($v=pg_fetch_assoc($voit)){
	        if($no_mlle==$v['no_mlle']){
	        echo '<option value="'.$v['no_mlle'].'" selected>'.$v['no_mlle'].' '.$v['marque'].'</option>';
	        }else
	        echo '<option value="'.$v['no_mlle'].'">'.$v['no_mlle'].' '.$v['marque'].'</option>';
	}
		echo '</select>
			 </label>
		 
	    </div>';
	echo '<button type="submit" class="btn btn-primary btn-block" name="valider" value="Modifier">
		<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Modifier</button>
		</form>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span> Annuler</button>';
			
		echo'   </div>
			 </div>
			 </div>
			 </div> ';
			// ============================= fin_Modal_Mod =====================

echo'<div class="col-sm-2 sidenav">';
echo'<div class="well">
			<input class="form-control" id="verif" type="text" placeholder="Search..">';
       // <p>ADS</p>
echo'	 </div>';
		$etat='PP';
		
		/*echo '<div class="well">';
		
	echo'</div>';*/
	
  // <!-- Modal -->
  
echo'<div class="modal fade" id="pt_pay" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>';
     echo'<h4 class="modal-title"><b>Confirmation de payement</b></h4>
        </div>';
     echo'<div class="modal-body">';
     	echo'<form  role="form" method="post" action="pont.php">
           	<input type="hidden" name="ams" value="PP">';
          echo'<p class="centre"><h3><b>Voulez-vous vraiment payé les depenses ?</b></h3></p>';
    echo'</div>
        <div class="modal-footer">';
    echo'  <button type="button" class="btn btn-danger" data-dismiss="modal">NON</button>
    		 <button type="submit" class="btn btn-primary" name="valider" value="Oui">OUI</button>
        </div>';
    echo'</form>';
    echo'</div>
    </div>
  </div>';

}
	
	
?>
