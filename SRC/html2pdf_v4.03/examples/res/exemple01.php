<?php
	
	//include('function.php');
	echo'
		<style>
		th
		{
		    text-align: center;
		    background:  #cac7c6 ;
		}
		.bleu{
			color:  #0f41bc;
		}
		</style>
	';
echo'<page backtop="10mm" backbottom="10mm" backleft="5mm" backright="5mm">';
      //page_header
echo'<page_header style="text-align:center">';
		
  echo'      <table style="width: 100%; font-size: 12px;font-family:DejaVu Sans Condensed;">
            <tr>
               <td style="text-align: right;    width: 33%"></td>
               <td style="text-align: center;    width: 34%;">
               
              <h2 class="bleu">CORRIDOR Petroleum</h2>
				</td>
                <td style="text-align: right;    width: 33%"></td>
            </tr>
        </table>';
echo'    </page_header>';
    
 echo'<page_footer>
         <table style="width: 100%;">
            <tr>
                <td style="text-align: left;    width: 40%">Corridor Petroleum Mali</td>
                <td style="text-align: center;   width: 40%">Imprimé le, '.date('d-m-Y').'</td>
                <td style="text-align: right;   width: 20%">page [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>';
    
    //---------------------//  
    echo'<br>
    		<br>
   		<br>';
    
	//--------------------//

  echo'<table cellspacing="0" style="width: 100%;font-size: 15px; text-align:left">'; 
  		//echo'<p>Localisation des Véhicules</p>';  
  echo'<thead >';
    
  echo'<tr>';
  echo'<th style=" border: none;background: none;text-align:center" colspan="9"> &nbsp;</th>';
  echo'</tr>';
  echo'<tr>';
  echo'<th style=" border: none;background: none;text-align:center" colspan="9"> &nbsp;</th>';
  echo'</tr>';
  echo'<tr>';
  echo'<th style=" border: solid 1px black;text-align:center" colspan="9"> Localisation des Véhicules </th>';
  echo'</tr>';
	echo '<tr style="text-align:center;">
   	          
		   <th style=" border: solid 1px black;">N°</th>
		   <th style=" border: solid 1px black;">Contenu</th>
		   <th style=" border: solid 1px black;">Locataire</th>
		   <th style=" border: solid 1px black;">Véhicules</th>
		   <th style=" border: solid 1px black;">Etat</th>
		   <th style=" border: solid 1px black;">Position</th>
		   <th style=" border: solid 1px black;">Direction</th>
		   <th style=" border: solid 1px black;">Chauffeur</th>
		   <th style=" border: solid 1px black;">Contact</th>
		   </tr>';
          
  echo'</thead>';

   echo' <tbody >';
   		/* if($t){
   		tr($t);
   		}
      		else{*/
      		
$dbconn=pg_connect("dbname=sds user=abdallah password=nawawi host=localhost port=5432");
$req ="select vehicules.id_v,id_tr,no_mlle,marque,prenom_c || ' ' || nom_c as name,conducteurs.contact,conducteurs.id_c,etat_v,position,destination,locataire,content,date_tr from vehicules join trajets using(id_v) join conducteurs using(id_c) ORDER BY etat_v";

	 $dep=pg_query($dbconn,$req);

       $i=1;
   	while($l=pg_fetch_assoc($dep)){
   	
   		echo'<tr style="text-align:center;">
		   <td style="border: 1px solid black;">'.$i.'</td>
		   <td style="border: 1px solid black;">'.$l['content'].'</td>
		   <td style="border: 1px solid black;">'.$l['locataire'].'</td>
		   <td style="border: 1px solid black;">'.$l['no_mlle'].'</td>
		   <td style="border: 1px solid black;">'.$l['etat_v'].'</td>
		   <td style="border: 1px solid black;">'.$l['position'].'</td>
		   <td style="border: 1px solid black;">'.$l['destination'].'</td>
		   <td style="border: 1px solid black;">'.$l['name'].'</td>
		   <td style="border: 1px solid black;">'.$l['contact'].'</td>
		 </tr>';

	$i++;
	//--------------------------
		}
		//}
		
	echo'</tbody>';
  // echo'<tfoot>';
   echo'<br>
    		<br>
    		<br>
    		<br>
    		<br>
   		<br>
   		<br>';
  	//echo'<td >Imprimé le, "'.date('d-m-Y').'" </td>';
 // echo' </tfoot>';
 echo'   </table>';
    echo'
        <br>
    	<br>
   	<br>';
echo'</page>';
?>




