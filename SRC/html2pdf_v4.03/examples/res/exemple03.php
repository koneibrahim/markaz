<?php
	$t=$_REQUEST['t'];
	include('function.php');
	echo'
		<style>
		th
		{
		    text-align: center;
		    background: #cac7c6;
		}
		
		</style>
	';
echo'<page backtop="10mm" backbottom="10mm" backleft="5mm" backright="5mm">';
      //page_header
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
    
    //---------------------//  
    echo'<br>
    		<br>
   		<br>';
    
	//--------------------//

  echo'<table style="width: 100%; font-size: 16px; text-align:center" cellspacing="0">';   
  echo'<thead >';
    
echo'<tr class="n" style="border-left: none;>
	<th colspan="6" style="background: none;">&nbsp;</th>
  </tr>';
	echo '<tr>
   	        
		   <th>N°</th>
		   <th>Motif</th>
		   <th>Date depense</th>
		   <th>Pneu</th>
		   <th>type</th>
		   <th>Véhicule</th>
		   </tr>';
          
  echo'</thead>';

   echo' <tbody >';
   		if($t){
   		tr($t);
   		}
      		else{
$dbconn=pg_connect("dbname=sds user=abdallah password=nawawi host=localhost port=5432");
$req ="select id_d,description,date_d,montant,no_mlle,no_p,mark_p,type_p,id_v,vehicules.no_mlle as ml,marque ";
$req.="from depenses join vehicules using(no_mlle) ORDER BY no_mlle";

	 $dep=pg_query($dbconn,$req);

       $i=1;
   	while($l=pg_fetch_assoc($dep)){
   	
   	
   		echo'<tr>
		   <td style="border: 1px solid black;">'.$i.'</td>
		   <td style="border: 1px solid black;">'.$l['description'].'</td>
		   <td style="border: 1px solid black;">'.$l['date_d'].'</td>
		   <td style="border: 1px solid black;">'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['type_p'].'</td>
		   <td style="border: 1px solid black;">'.$l['ml'].' '.$l['marque'].'</td>
		 </tr>';

	$i++;
	//--------------------------
		}
		}
		
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




