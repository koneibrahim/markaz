<?php

	echo '<style type="text/css">;
			
			.header
			{
				top: 1%;
				bottom: 99%;
				left: 40%;
				right: 40%;
				border: none;
			}
			th
			{
		    text-align: center;
		    background:  #cac7c6 ;
			}
			

		</style>';

	$pt=$_REQUEST['t_pt2'];
	$pt2=$pt;
	include('function.php');

echo'<page orientation="paysage" style="font-size: 18px;" backtop="10mm" backbottom="10mm" backleft="30mm" backright="20mm">';
   echo'<page_header>';
echo'    <h2 style="text-align: center;color: #0f41bc;" >CORRIDOR Petroleum</h2>';
        
echo'</page_header>';

echo'<page_footer>
         <table style="width: 100%;">
            <tr>
                <td style="text-align: left;    width: 40%">Corridor Petroleum Mali</td>
                <td style="text-align: center;   width: 40%">Imprimé le, '.date('d-m-Y').'</td>
                <td style="text-align: right;   width: 20%">page [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>';
    
  echo'  <table cellspacing="0" style="width: 100%;">';
    
    	
 echo'     <tr>';
     echo'
  <td style="width: 80%; text-align: center; font-weight: bold; font-size: 20pt;">
                <span style="font-size: 10pt"><br></span>
                DEPENSES DES VEHICULES 
            </td>
            </tr>';
          
    echo'  <tr><td style="width: 10%;">
            </td>
        </tr>';
echo'</table>
    <table cellspacing="0" style="width: 100%; text-align: center;">';
					if($pt!='div'){
					
               		pont($pt2);
               		
						}
						
					else if($pt=='div'){
			echo'
                    <thead>
                    <tr>
                        <th style="text-align: center; border: solid 1px #000000;" colspan="6">
                            DEPENSES DIVERS
                        </th>
                    </tr>';
					
                echo'
                    
                    <tr>
                        <th style="width: 3%; border: solid 1px #000000;">N°</th>
                        <th style="width: 10%; border: solid 1px #000000;">Date</th>
                        <th style="width: 10%; border: solid 1px #000000;">Motif</th>
                        <th style="width: 10%; border: solid 1px #000000;">Véhicule</th>
                        <th style="width: 10%; border: solid 1px #000000;">Montant</th>
                    </tr>
                    </thead>';
			/*	echo'
                    <tfoot>';*/
                   $ress=pg_connect("host=localhost port=5432 dbname=sds user=abdallah password=nawawi");
				$somdep=pg_query($ress,"select somme as s from totdep ");
				$som2=pg_fetch_assoc($somdep);
	    			$som3=$som2['s'];
	
	                        $arch4=pg_query($ress,"select date_p as der from archives ORDER BY date_p desc limit 1");
                 		$arch5=pg_fetch_assoc($arch4);
                  		$arch6=$arch5['der'];
  				$depv=pg_query($ress,"select id_dv,date_dv::date,motif,prix,no_mlle from depvehi WHERE date_dv >'$arch6' ORDER BY id_dv desc"); 
                /*  echo' <tr>
                        
                        <th style="width: 55%; border: solid 1px #000000;text-align: right;" colspan="3">
                        <b>TOTAL:&nbsp;</b></th>
                        <th style="width: 15%; border: solid 1px #000000;text-align: center;">
                        <b>'.number_format($som3, 0, ',', ' ').' FCFA</b></th>
                        
                    </tr>';  */
                   // echo'</tfoot>';

                    echo'
                    <tbody>';
                    
                    $i=1;
				while($l=pg_fetch_assoc($depv)){
			echo'
                    <tr>
                        <td style="width: 3%; border: solid 1px #000000;">'.$i.'</td>';
               echo'     <td style="width: 10%; border: solid 1px #000000;">'.$l['date_dv'].'</td>';
               echo'<td style="width: 10%; border: solid 1px #000000;">'.$l['motif'].'</td>
                        <td style="width: 10%; border: solid 1px #000000;">'.$l['no_mlle'].'</td>
                        <td style="width: 10%; border: solid 1px #000000;">'.$l['prix'].'</td>
                        
                    </tr>';
                    $i++;
	    			}
			echo' <tr>

                        <td style="width: 55%; border: solid 1px #000000;text-align: right;" colspan="4">
                        <b>TOTAL:&nbsp;</b></td>
                        <td style="width: 15%; border: solid 1px #000000;text-align: center;">
                        <b>'.number_format($som3, 0, ',', ' ').' FCFA</b></td>

                    </tr>';
	    		echo'</tbody>';
              }
			
					
				else{
			echo'
                    <thead>
                    <tr>
                        <th style="text-align: center; border: solid 1px #000000;" colspan="6">
                            RECAPUTILATIF DES DEPENSES
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
                    <tfoot>';*/
                   $ress=pg_connect("host=localhost port=5432 dbname=sds user=abdallah password=nawawi");
				$req ="select sum(prix) as s from ponts where etat_p ='N'";
				$psom  =pg_query($ress,$req);
				$psom2=pg_fetch_assoc($psom);
	
				$req2 ="SELECT * FROM ponts WHERE etat_p ='N'";
				$pliste2  =pg_query($ress,$req2);
                    
                /* echo' <tr>
                        
                        <th style="width: 55%; border: solid 1px #000000;text-align: right;" colspan="5">
                        <b>TOTAL</b></th>
                        <th style="width: 15%; border: solid 1px #000000;">
                        <b>'.number_format($psom2['s'], 0, ',', ' ').' FCFA</b></th>
                        
                    </tr>
                    </tfoot>';*/

                    echo'
                    <tbody>';
                    
                    $i=1;
				while($l=pg_fetch_assoc($pliste2)){
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

                        <td style="width: 55%; border: solid 1px #000000;text-align: right;" colspan="3">
                        <b>TOTAL:&nbsp;</b></td>
                        <td style="width: 15%; border: solid 1px #000000;text-align: center;">
                        <b>'.number_format($som3, 0, ',', ' ').' FCFA</b></td>

                    </tr>';
                        echo'</tbody>';


	    		echo'</tbody>';
              }
              
               
                
echo'           <br>
                <br>';

echo'  </table>
       </page>';
?>
