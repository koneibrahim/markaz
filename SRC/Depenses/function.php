<?php
	function tr($val){
			$conn=pg_connect("dbname=sds host=localhost port=5432 user=abdallah password=nawawi");
	     switch($val){
	     		case 1:$req ="select * from depenses where 
	     		extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val";
				$liste  =pg_query($conn,$req); 
				$i=1;
				while($l=pg_fetch_assoc($liste)){
			echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['description'].'</td>
		   <td>'.$l['date_d'].'</td>
		   <td>'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td>'.$l['type_p'].'</td>
		   <td>'.$l['ml'].' '.$l['marque'].'</td>
		   <td><a href="modifier.php?id_d='.$l['id_d'].
		   '&id_v='.$l['id_v'].
		   '&description='.$l['description'].
		   '&date_d='.$l['date_d'].
		   '&no_mlle='.$l['no_mlle'].
		   '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil">
		   <span class="glyphicon glyphicon-file"></button></a></td>
			 <td><a href="supprimer.php?id_d='.$l['id_d'].
			 '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].
			 '&date_d='.$l['date_d'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
		 </tr>';
		 $i++;
	    }
			break;
			
			case 2:$req ="select * from depenses where 
	     		extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val";
				$liste  =pg_query($conn,$req);
				$i=1;
				while($l=pg_fetch_assoc($liste)){
			echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['description'].'</td>
		   <td>'.$l['date_d'].'</td>
		   <td>'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td>'.$l['type_p'].'</td>
		   <td>'.$l['ml'].' '.$l['marque'].'</td>
		   <td><a href="modifier.php?id_d='.$l['id_d'].
		   '&id_v='.$l['id_v'].
		   '&description='.$l['description'].
		   '&date_d='.$l['date_d'].
		   '&no_mlle='.$l['no_mlle'].
		   '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil">
		   <span class="glyphicon glyphicon-file"></button></a></td>
			 <td><a href="supprimer.php?id_d='.$l['id_d'].
			 '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].
			 '&date_d='.$l['date_d'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
		 </tr>';
		 $i++;
	    }
			break;
			
			case 3:$req ="select * from depenses where 
	     		extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val";
				$liste  =pg_query($conn,$req);
				$i=1;
				while($l=pg_fetch_assoc($liste)){
			echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['description'].'</td>
		   <td>'.$l['date_d'].'</td>
		   <td>'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td>'.$l['type_p'].'</td>
		   <td>'.$l['ml'].' '.$l['marque'].'</td>
		   <td><a href="modifier.php?id_d='.$l['id_d'].
		   '&id_v='.$l['id_v'].
		   '&description='.$l['description'].
		   '&date_d='.$l['date_d'].
		   '&no_mlle='.$l['no_mlle'].
		   '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil">
		   <span class="glyphicon glyphicon-file"></button></a></td>
			 <td><a href="supprimer.php?id_d='.$l['id_d'].
			 '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].
			 '&date_d='.$l['date_d'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
		 </tr>';
		 $i++;
	    }
			break;
			
			case 4:$req ="select * from depenses where 
	     		extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val";
				$liste  =pg_query($conn,$req);
				$i=1;
				while($l=pg_fetch_assoc($liste)){
			echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['description'].'</td>
		   <td>'.$l['date_d'].'</td>
		   <td>'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td>'.$l['type_p'].'</td>
		   <td>'.$l['ml'].' '.$l['marque'].'</td>
		   <td><a href="modifier.php?id_d='.$l['id_d'].
		   '&id_v='.$l['id_v'].
		   '&description='.$l['description'].
		   '&date_d='.$l['date_d'].
		   '&no_mlle='.$l['no_mlle'].
		   '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil">
		   <span class="glyphicon glyphicon-file"></button></a></td>
			 <td><a href="supprimer.php?id_d='.$l['id_d'].
			 '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].
			 '&date_d='.$l['date_d'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
		 </tr>';
		 $i++;
	    }
			break;
			
			case 5:$req ="select * from depenses where 
	     		extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val";
				$liste  =pg_query($conn,$req);
				$i=1;
				while($l=pg_fetch_assoc($liste)){
			echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['description'].'</td>
		   <td>'.$l['date_d'].'</td>
		   <td>'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td>'.$l['type_p'].'</td>
		   <td>'.$l['ml'].' '.$l['marque'].'</td>
		   <td><a href="modifier.php?id_d='.$l['id_d'].
		   '&id_v='.$l['id_v'].
		   '&description='.$l['description'].
		   '&date_d='.$l['date_d'].
		   '&no_mlle='.$l['no_mlle'].
		   '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil">
		   <span class="glyphicon glyphicon-file"></button></a></td>
			 <td><a href="supprimer.php?id_d='.$l['id_d'].
			 '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].
			 '&date_d='.$l['date_d'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
		 </tr>';
		 $i++;
	    }
			break;
			
			case 6:$req ="select * from depenses where 
	     		extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val";
				$liste  =pg_query($conn,$req);
				$i=1;
				while($l=pg_fetch_assoc($liste)){
			echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['description'].'</td>
		   <td>'.$l['date_d'].'</td>
		   <td>'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td>'.$l['type_p'].'</td>
		   <td>'.$l['ml'].' '.$l['marque'].'</td>
		   <td><a href="modifier.php?id_d='.$l['id_d'].
		   '&id_v='.$l['id_v'].
		   '&description='.$l['description'].
		   '&date_d='.$l['date_d'].
		   '&no_mlle='.$l['no_mlle'].
		   '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil">
		   <span class="glyphicon glyphicon-file"></button></a></td>
			 <td><a href="supprimer.php?id_d='.$l['id_d'].
			 '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].
			 '&date_d='.$l['date_d'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
		 </tr>';
		 $i++;
	    }
			break;
			
			case 7:$req ="select * from depenses where 
	     		extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val";
				$liste  =pg_query($conn,$req);
				$i=1;
				while($l=pg_fetch_assoc($liste)){
			echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['description'].'</td>
		   <td>'.$l['date_d'].'</td>
		   <td>'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td>'.$l['type_p'].'</td>
		   <td>'.$l['ml'].' '.$l['marque'].'</td>
		   <td><a href="modifier.php?id_d='.$l['id_d'].
		   '&id_v='.$l['id_v'].
		   '&description='.$l['description'].
		   '&date_d='.$l['date_d'].
		   '&no_mlle='.$l['no_mlle'].
		   '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil">
		   <span class="glyphicon glyphicon-file"></button></a></td>
			 <td><a href="supprimer.php?id_d='.$l['id_d'].
			 '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].
			 '&date_d='.$l['date_d'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
		 </tr>';
		 $i++;
	    }
			break;
			
			case 8:$req ="select * from depenses where 
	     		extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val";
				$liste  =pg_query($conn,$req);
				$i=1;
				while($l=pg_fetch_assoc($liste)){
			echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['description'].'</td>
		   <td>'.$l['date_d'].'</td>
		   <td>'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td>'.$l['type_p'].'</td>
		   <td>'.$l['ml'].' '.$l['marque'].'</td>
		   <td><a href="modifier.php?id_d='.$l['id_d'].
		   '&id_v='.$l['id_v'].
		   '&description='.$l['description'].
		   '&date_d='.$l['date_d'].
		   '&no_mlle='.$l['no_mlle'].
		   '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil">
		   <span class="glyphicon glyphicon-file"></button></a></td>
			 <td><a href="supprimer.php?id_d='.$l['id_d'].
			 '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].
			 '&date_d='.$l['date_d'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
		 </tr>';
		 $i++;
	    }
			break;
			
			case 9:$req ="select * from depenses where 
	     		extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val";
				$liste  =pg_query($conn,$req);
				$i=1;
				while($l=pg_fetch_assoc($liste)){
			echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['description'].'</td>
		   <td>'.$l['date_d'].'</td>
		   <td>'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td>'.$l['type_p'].'</td>
		   <td>'.$l['ml'].' '.$l['marque'].'</td>
		   <td><a href="modifier.php?id_d='.$l['id_d'].
		   '&id_v='.$l['id_v'].
		   '&description='.$l['description'].
		   '&date_d='.$l['date_d'].
		   '&no_mlle='.$l['no_mlle'].
		   '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil">
		   <span class="glyphicon glyphicon-file"></button></a></td>
			 <td><a href="supprimer.php?id_d='.$l['id_d'].
			 '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].
			 '&date_d='.$l['date_d'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
		 </tr>';
		 $i++;
	    }
			break;
			
			case 10:$req ="select * from depenses where 
	     		extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val";
				$liste  =pg_query($conn,$req);
				$i=1;
				while($l=pg_fetch_assoc($liste)){
			echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['description'].'</td>
		   <td>'.$l['date_d'].'</td>
		   <td>'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td>'.$l['type_p'].'</td>
		   <td>'.$l['ml'].' '.$l['marque'].'</td>
		   <td><a href="modifier.php?id_d='.$l['id_d'].
		   '&id_v='.$l['id_v'].
		   '&description='.$l['description'].
		   '&date_d='.$l['date_d'].
		   '&no_mlle='.$l['no_mlle'].
		   '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil">
		   <span class="glyphicon glyphicon-file"></button></a></td>
			 <td><a href="supprimer.php?id_d='.$l['id_d'].
			 '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].
			 '&date_d='.$l['date_d'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
		 </tr>';
		 $i++;
	    }
			break;
			
			case 11:$req ="select * from depenses where 
	     		extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val";
				$liste  =pg_query($conn,$req);
				$i=1;
				while($l=pg_fetch_assoc($liste)){
			echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['description'].'</td>
		   <td>'.$l['date_d'].'</td>
		   <td>'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td>'.$l['type_p'].'</td>
		   <td>'.$l['ml'].' '.$l['marque'].'</td>
		   <td><a href="modifier.php?id_d='.$l['id_d'].
		   '&id_v='.$l['id_v'].
		   '&description='.$l['description'].
		   '&date_d='.$l['date_d'].
		   '&no_mlle='.$l['no_mlle'].
		   '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil">
		   <span class="glyphicon glyphicon-file"></button></a></td>
			 <td><a href="supprimer.php?id_d='.$l['id_d'].
			 '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].
			 '&date_d='.$l['date_d'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
		 </tr>';
		 $i++;
	    }
			break;
			
			case 12:$req ="select * from depenses where 
	     		extract(year from date_d)= extract(year from now()) and extract(month from date_d)=$val";
				$liste  =pg_query($conn,$req);
				$i=1;
				while($l=pg_fetch_assoc($liste)){
			echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['description'].'</td>
		   <td>'.$l['date_d'].'</td>
		   <td>'.$l['no_p'].' '.$l['mark_p'].'</td>
		   <td>'.$l['type_p'].'</td>
		   <td>'.$l['ml'].' '.$l['marque'].'</td>
		   <td><a href="modifier.php?id_d='.$l['id_d'].
		   '&id_v='.$l['id_v'].
		   '&description='.$l['description'].
		   '&date_d='.$l['date_d'].
		   '&no_mlle='.$l['no_mlle'].
		   '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil">
		   <span class="glyphicon glyphicon-file"></button></a></td>
			 <td><a href="supprimer.php?id_d='.$l['id_d'].
			 '&no_p='.$l['no_p'].
		   '&mark_p='.$l['mark_p'].
		   '&type_p='.$l['type_p'].
			 '&date_d='.$l['date_d'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
		 </tr>';
		 $i++;
	    }
			break;
		default: ;
	     }
	     }
?>
