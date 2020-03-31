



<style type="text/css">
td{
  border: 1px solid black;
  width:20%;
}
th
{
    text-align: center;
    background: #cac7c6;
    border: 1px solid black;
}
.n{
   border: none;
   background: none;
}
.bleu{
	color:  #0f41bc;
		}
</style>
	
	
    <?php
echo'<page backtop="10mm" backbottom="10mm" backleft="5mm" backright="5mm">';
      //page_header
echo'<page_header>';
echo'    <h2 style="text-align: center;" class="bleu">CORRIDOR Petroleum</h2>';
        
echo'</page_header>';
    
 echo'   <page_footer>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
		<td class="n" style="text-align: left;    width: 40%">Corridor Petroleum Mali</td>
                <td class="n" style="text-align: center;   width: 40%">Imprimé le, '.date('d-m-Y').'</td>
                <td class="n" style="text-align: right;   width: 20%">page [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>';
    echo'
    <br><br>';
    
 echo'<table style="width: 100%; font-size: 16px; text-align:center" cellspacing="0">';
      
 echo  '<thead >';
    
 echo'<tr class="n" style="border-left: none;>
	<th colspan="5" class="n">&nbsp;</th>
  </tr>';
  
  echo'<tr>
	<th>N°</th>
	<th>N°Matricule</th>
	<th>Marque</th>
	<th>Type</th>
	<th>Etat</th>
  </tr>';
          
  echo'</thead>
       
        <tbody >';
        $conn=pg_connect("dbname=sds user=abdallah host=localhost port=5432 password=nawawi");
	$liste=pg_query($conn,"select * from vehicules order by id_v desc");
        $i=1;
        
        while($l=pg_fetch_assoc($liste)){
	  echo'<tr>
		<td>'.$i.'</td>
		<td><b>'.$l['no_mlle'].'</b></td>
		<td>'.$l['marque'].'</td>
		 <td>'.$l['type'].'</td>';
		    if($l['etat']=="A")
		       echo'  <td>Actif</td>';
		    else
		       echo'  <td>En panne</td>';
	  echo '</tr>';
		 $i++;
   	}
	echo'</tbody>';
   echo'<tfoot>';
  
 						/*
 					echo'           <tr>
                <th style="width: 30%; text-align: left; border: solid 1px #337722; background: #CCFFCC">Footer 1</th>
                <th style="width: 30%; text-align: left; border: solid 1px #337722; background: #CCFFCC">Footer 2</th>
           		 </tr>';
           			 */
 echo' </tfoot>
    </table>';
echo'</page>';
?>

