<?php

	$pt=$_REQUEST['t_pt'];
	$pt2=$pt;
	
	include('../../Layout/header.php');
	include('CRUD.php');
	include('function_pt.php');
	
	echo'  <div class="content">
	    <div class="col-sm-2 sidenav">';
	   
	echo'<div class="dropdown">
   	    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Autres depenses
    	       <span class="caret"></span></button>
	    <ul class="dropdown-menu">
	      <li><a href="depvehi.php">Divers</a></li>
	      <li><a href="personnels.php?t_pt=San Pedro">Pesage San Pedro</a></li>
	      <li><a href="pont.php?t_pt=Dakar">Pesage Dakar</a></li>
	      <li><a href="pont.php?t_pt=Mali">Pesage Mali</a></li>
	    </ul>
  	    </div>';
  	echo'<br>';
  	$req1 ="SELECT count(*) as nb FROM ponts where etat_p='N' GROUP BY ponts.date_pt ORDER BY date_pt 			DESC limit 1";
		$pt_verif23  =pg_query($conn,$req1);
		$p=pg_fetch_assoc($pt_verif23);
		$nbr=$p['nb'];
		if($pt2){
			if($nbr!=0){
  		// <!-- Trigger the modal with a button -->
	echo'<button type="button" class="btn btn-success " data-toggle="modal" data-target="#pt_pay">
  		Payement <span class="glyphicon glyphicon-usd"></span>
  		</button>';
  		}
	   }
	echo '</div>
	    <div class="col-sm-8 text-left">';
	    			if($pt)
	echo '   <h2>Depenses Pesage  '.$pt.'</h2>';
			else
	echo '   <h2>Depenses Ponts</h2>';
  	echo'<table  class="table table-hover table-responsive">';
	echo'	<thead>
		 <tr>';
		 		if($pt){
	echo'<th class="droite" colspan="8">
	<a href="../html2pdf_v4.03/examples/exemple00.php?t_pt2='.$pt.'" target="_blank">
		<button class="badd" data-toggle="aj_b" title="Imprimer"><span class="glyphicon glyphicon-print">
		</button>
		</a>
		</th>';
				}
				else{
	echo'<th class="droite" colspan="8"><a href="../html2pdf_v4.03/examples/exemple00.php" target="_blank">
		<button class="badd" data-toggle="aj_b" title="Imprimer"><span class="glyphicon glyphicon-print">
		</button>
		</a>
		</th>';
			}
	echo'</tr>
		 <tr>
		   <th class="droite" colspan="8"><a id="daj" ><button class="badd">
		   <span class="glyphicon glyphicon-plus"> <span class="glyphicon glyphicon-file">
		   </button></a></th>
		 </tr>
		 <tr>
		   <th>N°</th>
		   <th>Date</th>
		   <th>Motif</th>
		   <th>Lieu</th>
		   <th>prix</th>
		   <th>Véhicule</th>
		   <th class="centre" colspan="2">Action</th>
		 </tr>
	    </thead>';
	echo'	<tbody id="table_verif">';
				
		pont($pt2);
			


	echo' </div>
	</div>';
	include('../../Layout/footer.php');
?>


