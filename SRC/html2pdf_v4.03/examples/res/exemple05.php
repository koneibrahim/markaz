
<style type="text/css">

table
{
    width:  100%;
}

th
{
    text-align: center;
    border: solid 1px #000;
    background: #cac7c6;
}


td
{
   border: 1px solid black;
   text-align: center;
   width:20%;
}


</style>

<?php
$id=$_REQUEST['id'];
$no=$_REQUEST['no'];
$mm=$_REQUEST['ma'];
?>
<span style="font-size: 20px; font-weight: bold; text-align: center;">Liste des pneus du 
	<?php
	echo''.$mm.' '.$no.'';
	 ?>
	</span>
	
	
<br>
<br>
<table cellspacing="0">
<?php
    
   echo  '<thead >';
    
 echo'<tr>
	<th style="width:5%;">N°</th>
	<th>N° Série</th>
	<th>Marque</th>
	<th>Type</th>
	<th>Date</th>
  </tr>';
          
  echo'</thead>
       
        <tbody >';
$conn=pg_connect("dbname=sds user=abdallah host=localhost port=5432 password=nawawi");
$detail=pg_query($conn,"select * from depenses where no_mlle='$no' ORDER BY date_d DESC");
$k=1;
        
        while($p=pg_fetch_assoc($detail)){
	  echo'<tr>
		<td style="width:5%;">'.$k.'</td>
			<td>'.$p['no_p'].'</td>
			<td>'.$p['mark_p'].'</td>
			<td>'.$p['type_p'].'</td>
			<td>'.$p['date_d'].'</td>';
	  echo '</tr>';
		 $k++;
   	}
	echo'</tbody>';
/*   echo'<tfoot>';
  
 	
 					echo'           <tr>
                <th style="width: 30%; text-align: left; border: solid 1px #337722; background: #CCFFCC">Footer 1</th>
                <th style="width: 30%; text-align: left; border: solid 1px #337722; background: #CCFFCC">Footer 2</th>
           		 </tr>';
           	
 echo' </tfoot>';*/
?>
</table>
<?php
	echo'   <page_footer>
        <table style="width: 100%; border: solid 1px black;">
            <tr>
		<td class="n" style="text-align: left;    width: 40%">Corridor Petroleum Mali</td>
                <td class="n" style="text-align: center;   width: 40%">Imprimé le, '.date('d-m-Y').'</td>
                <td class="n" style="text-align: right;   width: 20%">page [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>';
	?>
