<?php
	function tr($val){
			$conn=pg_connect("dbname=sds host=localhost port=5432 user=abdallah password=nawawi");
	     switch($val){
	     		case 1:$req ="select id_d,description,date_d,montant,no_mlle,no_p,mark_p,type_p,id_v,vehicules.no_mlle as ml,marque from depenses join vehicules using(no_mlle) where extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val order by no_mlle";
				$liste  =pg_query($conn,$req); 
				$i=1;
   		while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td style="border: 1px solid black;">'.$i.'</td>
		   <td style="border: 1px solid black;">'.$l['description'].'</td>
		   <td style="border: 1px solid black;">'.$l['date_d'].'</td>
		   <td style="border: 1px solid black;">'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['type_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['ml'].' '.$l['marque'].'</td>
		 </tr>';

		$i++;
		}
			break;
			
			case 2:$req ="select id_d,description,date_d,montant,no_mlle,no_p,mark_p,type_p,id_v,vehicules.no_mlle as ml,marque from depenses join vehicules using(no_mlle) where extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val order by no_mlle";
				$liste  =pg_query($conn,$req);
				$i=1;
			while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td style="border: 1px solid black;">'.$i.'</td>
		   <td style="border: 1px solid black;">'.$l['description'].'</td>
		   <td style="border: 1px solid black;">'.$l['date_d'].'</td>
		   <td style="border: 1px solid black;">'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['type_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['ml'].' '.$l['marque'].'</td>
		 </tr>';

		$i++;
		}
			break;
			
			case 3:$req ="select id_d,description,date_d,montant,no_mlle,no_p,mark_p,type_p,id_v,vehicules.no_mlle as ml,marque from depenses join vehicules using(no_mlle) where extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val order by no_mlle";
				$liste  =pg_query($conn,$req); 
				$i=1;
			while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td style="border: 1px solid black;">'.$i.'</td>
		   <td style="border: 1px solid black;">'.$l['description'].'</td>
		   <td style="border: 1px solid black;">'.$l['date_d'].'</td>
		   <td style="border: 1px solid black;">'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['type_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['ml'].' '.$l['marque'].'</td>
		 </tr>';

		$i++;
		}
			break;
			
			case 4:$req ="select id_d,description,date_d,montant,no_mlle,no_p,mark_p,type_p,id_v,vehicules.no_mlle as ml,marque from depenses join vehicules using(no_mlle) where extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val order by no_mlle";
				$liste  =pg_query($conn,$req);
				$i=1;
			while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td style="border: 1px solid black;">'.$i.'</td>
		   <td style="border: 1px solid black;">'.$l['description'].'</td>
		   <td style="border: 1px solid black;">'.$l['date_d'].'</td>
		   <td style="border: 1px solid black;">'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['type_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['ml'].' '.$l['marque'].'</td>
		 </tr>';

		$i++;
		}
			break;
			
			case 5:$req ="select id_d,description,date_d,montant,no_mlle,no_p,mark_p,type_p,id_v,vehicules.no_mlle as ml,marque from depenses join vehicules using(no_mlle) where extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val order by no_mlle";
				$liste  =pg_query($conn,$req);
				$i=1;
			while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td style="border: 1px solid black;">'.$i.'</td>
		   <td style="border: 1px solid black;">'.$l['description'].'</td>
		   <td style="border: 1px solid black;">'.$l['date_d'].'</td>
		   <td style="border: 1px solid black;">'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['type_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['ml'].' '.$l['marque'].'</td>
		 </tr>';

		$i++;
		}
			break;
			
			case 6:$req ="select id_d,description,date_d,montant,no_mlle,no_p,mark_p,type_p,id_v,vehicules.no_mlle as ml,marque from depenses join vehicules using(no_mlle) where extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val order by no_mlle";
				$liste  =pg_query($conn,$req);
				$i=1;
			while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td style="border: 1px solid black;">'.$i.'</td>
		   <td style="border: 1px solid black;">'.$l['description'].'</td>
		   <td style="border: 1px solid black;">'.$l['date_d'].'</td>
		   <td style="border: 1px solid black;">'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['type_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['ml'].' '.$l['marque'].'</td>
		 </tr>';

		$i++;
		}
			break;
			
			case 7:$req ="select id_d,description,date_d,montant,no_mlle,no_p,mark_p,type_p,id_v,vehicules.no_mlle as ml,marque from depenses join vehicules using(no_mlle) where extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val order by no_mlle";
				$liste  =pg_query($conn,$req);
				$i=1;
			while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td style="border: 1px solid black;">'.$i.'</td>
		   <td style="border: 1px solid black;">'.$l['description'].'</td>
		   <td style="border: 1px solid black;">'.$l['date_d'].'</td>
		   <td style="border: 1px solid black;">'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['type_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['ml'].' '.$l['marque'].'</td>
		 </tr>';

		$i++;
		}
			break;
			
			case 8:$req ="select id_d,description,date_d,montant,no_mlle,no_p,mark_p,type_p,id_v,vehicules.no_mlle as ml,marque from depenses join vehicules using(no_mlle) where extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val order by no_mlle";
				$liste  =pg_query($conn,$req); 
				$i=1;
			while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td style="border: 1px solid black;">'.$i.'</td>
		   <td style="border: 1px solid black;">'.$l['description'].'</td>
		   <td style="border: 1px solid black;">'.$l['date_d'].'</td>
		   <td style="border: 1px solid black;">'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['type_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['ml'].' '.$l['marque'].'</td>
		 </tr>';

		$i++;
		}
			break;
			
			case 9:$req ="select id_d,description,date_d,montant,no_mlle,no_p,mark_p,type_p,id_v,vehicules.no_mlle as ml,marque from depenses join vehicules using(no_mlle) where extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val order by no_mlle";
				$liste  =pg_query($conn,$req);
				$i=1;
			while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td style="border: 1px solid black;">'.$i.'</td>
		   <td style="border: 1px solid black;">'.$l['description'].'</td>
		   <td style="border: 1px solid black;">'.$l['date_d'].'</td>
		   <td style="border: 1px solid black;">'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['type_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['ml'].' '.$l['marque'].'</td>
		 </tr>';

		$i++;
		}
			break;
			
			case 10:$req ="select id_d,description,date_d,montant,no_mlle,no_p,mark_p,type_p,id_v,vehicules.no_mlle as ml,marque from depenses join vehicules using(no_mlle) where extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val order by no_mlle";
				$liste  =pg_query($conn,$req);
				$i=1;
			while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td style="border: 1px solid black;">'.$i.'</td>
		   <td style="border: 1px solid black;">'.$l['description'].'</td>
		   <td style="border: 1px solid black;">'.$l['date_d'].'</td>
		   <td style="border: 1px solid black;">'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['type_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['ml'].' '.$l['marque'].'</td>
		 </tr>';

		$i++;
		}
			break;
			
			case 11:$req ="select id_d,description,date_d,montant,no_mlle,no_p,mark_p,type_p,id_v,vehicules.no_mlle as ml,marque from depenses join vehicules using(no_mlle) where extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val order by no_mlle";
				$liste  =pg_query($conn,$req); 
				$i=1;
			while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td style="border: 1px solid black;">'.$i.'</td>
		   <td style="border: 1px solid black;">'.$l['description'].'</td>
		   <td style="border: 1px solid black;">'.$l['date_d'].'</td>
		   <td style="border: 1px solid black;">'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['type_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['ml'].' '.$l['marque'].'</td>
		 </tr>';

		$i++;
		}
			break;
			
			case 12:$req ="select id_d,description,date_d,montant,no_mlle,no_p,mark_p,type_p,id_v,vehicules.no_mlle as ml,marque from depenses join vehicules using(no_mlle) where extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val order by no_mlle";
				$liste  =pg_query($conn,$req); 
				$i=1;
			while($l=pg_fetch_assoc($liste)){
		echo'<tr>
		   <td style="border: 1px solid black;">'.$i.'</td>
		   <td style="border: 1px solid black;">'.$l['description'].'</td>
		   <td style="border: 1px solid black;">'.$l['date_d'].'</td>
		   <td style="border: 1px solid black;">'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['type_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['ml'].' '.$l['marque'].'</td>
		 </tr>';

		$i++;
		}
			break;
	     }
	}
	
	
	
	function pont($char){
		$pt=$char;
		$ress=pg_connect("host=localhost port=5432 dbname=sds user=abdallah password=nawawi");
		$req ="select sum(prix) as s from ponts where etat_p ='N' and lieu='$char'";
		$psom  =pg_query($ress,$req);
		$psom2=pg_fetch_assoc($psom);
	
				
		$req2 ="SELECT * FROM ponts WHERE lieu='$char' AND etat_p ='N'";
				$pliste  =pg_query($ress,$req2);
		
		echo'
                    <thead>';
		echo'    <tr>
                        <th style="text-align: center; background: none;" colspan="6">
                            &nbsp;
                        </th>
                    </tr>';

                echo'    <tr>
                        <th style="text-align: center; border: solid 1px #000000;" colspan="6">
                            DEPENSES PESAGE '.strtoupper($pt).'
                        </th>
                    </tr>';
                    
                    echo'
                    
                    <tr>
                        <th style="width: 10%; border: solid 1px #000000;">N°</th>
                        <th style="width: 10%; border: solid 1px #000000;">Date</th>
                        <th style="width: 10%; border: solid 1px #000000;">Motif</th>
                        <th style="width: 10%; border: solid 1px #000000;">Lieu</th>
                        <th style="width: 10%; border: solid 1px #000000;">Véhicule</th>
                        <th style="width: 10%; border: solid 1px #000000;">Montant</th>
                    </tr>
                    </thead>';
			/*	echo'
                    <tfoot>
                    <tr>
                        
                        <th style="width: 55%; border: solid 1px #000000;text-align: right;" colspan="5">
                        <b>TOTAL</b></th>
                        <th style="width: 15%; border: solid 1px #000000;">
                        <b>'.number_format($psom2['s'], 0, ',', ' ').' FCFA</b></th>
                        
                    </tr>
                    </tfoot>';*/
                    echo'<tbody>';
                    $i=1;
				while($l=pg_fetch_assoc($pliste)){
                    echo'
                    <tr>
                        <td style="width: 10%; border: solid 1px #000000;">'.$i.'</td>
                        <td style="width: 10%; border: solid 1px #000000;">'.$l['date_pt'].'</td>
                        <td style="width: 10%; border: solid 1px #000000;">'.$l['motif'].'</td>
                        <td style="width: 10%; border: solid 1px #000000;">'.$l['lieu'].'</td>
                        <td style="width: 10%; border: solid 1px #000000;">'.$l['no_mlle'].'</td>
                        <td style="width: 10%; border: solid 1px #000000;">'.$l['prix'].'</td>
                        
                    </tr>';
                     $i++;
	    }
            
		echo' <tr>

                        <td style="width: 55%; border: solid 1px #000000;text-align: right;" colspan="5">
                        <b>TOTAL</b></td>
                        <td style="width: 15%; border: solid 1px #000000;">
                        <b>'.number_format($psom2['s'], 0, ',', ' ').' FCFA</b></td>

                    </tr>';

		echo'</tbody>';
		
	}
	
	
?>
