<?php
	
	$login	   =$_REQUEST['login'];
	$passwd	   =$_REQUEST['passwd'];
	$uid         =$_REQUEST['uid'];
	$gid         =$_REQUEST['gid'];
	$prenom      =$_REQUEST['prenom'];
	$nom         =$_REQUEST['nom'];
	$contact         =$_REQUEST['contact'];

	include('../../Layout/header.php');
	include('CRUD.php');
echo '  <div class="row content">
	    <div class="col-sm-2 sidenav">';
echo '</div>
	    <div class="col-sm-8 text-left">';
	echo '   <h2>Gestion des Utilisateurs</h2>
  		<table  class="table table-hover table-responsive">';
echo'	<thead>
		 <tr>
		   <th class="droite" colspan="9"><a id="paj"><button class="badd"><span class="glyphicon glyphicon-plus"> <span class="glyphicon glyphicon-user"></button></a></th>
		 </tr>
		 <tr>
		   <th>N°</th>
		   <th>Login</th>
		   <th>Prénom</th>
		   <th>Nom</th>
		   <th>Contact</th>
		   <th>Catégorie</th>
		   <th colspan="2">Action</th>
		 </tr>
	    </thead>';
echo'	<tbody>';
		$i=1;
		while($l=pg_fetch_assoc($liste)){
echo'	
		 <tr>
		   <td>'.$i.'</td>
		   <td>'.$l['login'].'</td>
		   <td>'.$l['prenom'].'</td>
		   <td>'.$l['nom'].'</td>
		   <td>'.$l['contact'].'</td>';
		   		if($l['gid']== 0)
		echo'<td>Edition</td>';
				else
		echo'<td>Vue</td>';
		echo'<td><a href="modifier.php?uid='.$l['uid'].
		   '&login='.$l['login'].
		   '&passwd='.$l['passwd'].
		   '&gid='.$l['gid'].
		   '&prenom='.$l['prenom'].
		   '&nom='.$l['nom'].
		   '&contact='.$l['contact'].'">
		   <button class="btn btn-success"><span class="glyphicon glyphicon-pencil"><span class="glyphicon glyphicon-file"></button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		   <a href="supprimer.php?uid='.$l['uid'].
		   '&login='.$l['login'].
		   '&passwd='.$l['passwd'].
		   '&gid='.$l['gid'].
		   '&prenom='.$l['prenom'].
		   '&nom='.$l['nom'].'">
		   <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button></a></td>
		 </tr>';
		 $i++;
	    }
echo ' </tbody>';
echo'  </table>
	</div>';
	
	//Modal_ajout Start =============================
echo '<div class="modal fade" id="pa_Modal" role="dialog">
    <div class="modal-dialog">';
echo ' <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
   <h4><span class="glyphicon glyphicon-plus"><span class="glyphicon glyphicon-user">Nouveau Utilisateur</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form  role="form" method="post" action="index.php">
           <input type="hidden" name="ams" value="A">
           <fieldset>
	       <legend> Information de l\'utilisateur</legend>';
	       echo'<table>';
	  echo'<div class="form-group">
	  		<tr><td>
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Login</label>
              <input type="text" class="form-control" id="usrname" name="login" placeholder="ex. Abdallah32">
              </td>
            </div>
            <div class="form-group">
            	<td>
              <label for="pre">Prénom</label>
              <input type="text" class="form-control" id="pr" name="prenom" placeholder="ex. Abdallah">
              </td></tr>
            </div>';
       echo'<div class="form-group">
       		<tr><td>
       		<div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mot de passe</label>
              <input type="password" class="form-control" id="psw" name="passwd" placeholder="Mot de passe">
              </td>
            </div>
            	<td>
            <label for="n">Nom</label>
              <input type="text" class="form-control" id="n" name="nom" placeholder="ex. Djigué">
              </td></tr>
              
              <tr><td >
       		<div class="form-group">
              <label for="co">Contact</label>
              <input type="text" class="form-control" id="co" name="contact" placeholder="ex. 88445577">
              </td></tr>
            </div>
              
            </div>';
            echo'</table>
            		</fieldset>';
            echo'<fieldset>
         		<legend>Droits Utilisateur</legend>';
         echo'<div class="form-group">
         		<table>
       		<tr><td colspan="2">
       		<div class="form-group">
              <span class="glyphicon glyphicon-eye-open"></span>Vue &nbsp;
              <input type="radio"  id="psw" name="gid" value="1">
              &nbsp;
              <span class="glyphicon glyphicon-pencil"></span><span class="glyphicon glyphicon-file"></span>
              Edition<input type="radio"  id="psw" name="gid" value="0">
              </td></tr>
            </div>
              
            </div>';
	    
		echo'<tr><td >';
	echo'<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span> Annuler</button>';
		echo'</td>';
	echo'
		<td>
		<button type="submit" class="btn btn-primary btn-block" name="valider" value="Ajouter">
		<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Ajouter</button>
		</td>
		</tr>
		</table>
		</fieldset>
		</form>
		</div>';
		
		echo'   </div>
			 </div>
			 </div> ';
		// Modal_ajout End ====================
			 
		// Madal_sup Start ========================
		
echo '<div class="modal fade" id="ps_Modal" role="dialog">
    <div class="modal-dialog">';
echo ' <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <span class="glyphicon glyphicon-trash"></span> 
          <h4>Suppression Utilisateur</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form  role="form" method="post" action="index.php">
           <input type="hidden" name="ams" value="S">
           <input type="hidden" name="uid" value="'.$uid.'">
		 <h2>Voulez-Vous supprimer l\'utilisateur <b class="rouge">'.$prenom.' '.$nom.'</b> ?</h2>
		<button type="submit" class="btn btn-danger btn-block" name="valider" value="Supprimer">
		<span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;Supprimer</button>
		</form>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary btn-default pull-left" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span> Annuler</button>';
			
		echo'   </div>
			 </div>
			
			 </div>
			 </div> ';
		// Modal_sup End ===================================
		
echo'<div class="col-sm-2 sidenav">';
echo' </div>
</div>';

	include('../../Layout/footer.php');
?>
