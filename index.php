<?php
//session_start();
$conn=pg_connect("host=localhost port=5432 dbname=markaz user=kone password=Heresira2");
	include ('CRUD.php');
	include ('Layout/header.php');
	echo'<h3> Bienvenue MR.    </h3>';
	include ('./date.php');
	/*
			if($_SESSION['conn']!='OUI'){
echo '<div class="modal fade" id="Auth_Modal" role="dialog">
    <div class="modal-dialog">';
       $etatac=pg_query($conn,"select * from validation");
       $act=pg_fetch_assoc($etatac);
       $act1=$act['etat'];
echo ' <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 ><span class="glyphicon glyphicon-lock"></span> Authentification</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post" action="index.php">
            <input type="hidden" name="val" value="'.$act1.'">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" name="login" placeholder="Votre identifiant">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mot de passe</label>
              <input type="password" class="form-control" id="psw" name="passwd" placeholder="Mot de passe">
            </div>';
	echo'<button type="submit" class="btn btn-success btn-block" name="valider" value="Valider">
		<span class="glyphicon glyphicon-off"></span> Se connecter</button><br/>
		<h4 class="ftitre"><b style="color:red; font-size:20px">'.$_SESSION['error'].' </b></h4>
		';
		echo'   </div>
		</form>
		</div>
			 </div>
			 </div>
			 </div>';
			} 
        echo ' <div class="container-fluid centre" style="background-color:#c4a000;color:#000;height:200px;">
  <h1>BIENVENUE <b>'.$_REQUEST['login'].'</b></h1>
  <p>
    <h2>Gestion <br/><b>CORRIDOR PETROLEUM</b></h2>
  </p>
</div>';
#echo'<div class="container text-center">    
#	  <h3>What We Do</h3><br>
#	  <div class="row">
#	    <div class="col-sm-4">';
#  echo' <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
#      <p>Current Project</p>
#    </div>
#    <div class="col-sm-4">';
#  echo' <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
#      <p>Project 2</p>    
#    </div>';
echo'</div>
</div><br>';
*/
	include ('Layout/footer.php');
?>

