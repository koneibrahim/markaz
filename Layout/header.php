<?php
		
	//session_start();
echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<title>MARKAZ</title>';
echo '<meta charset="utf-8">';
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
	echo '<link rel="stylesheet" type="text/css" href="/CSS/style.css">';
	echo '<link rel="stylesheet" type="text/css" href="/BOOT/dist/css/bootstrap.min.css">';

  echo '<style>';
	echo '    .navbar {
	      margin-bottom: 0;
	      border-radius: 0;
	    }';

	echo' .navbar-inverse {
	    background-color: #474a48;
	    border-color: #ffffff;
	}';
	echo '  .carousel-inner img {
	      width: 100%; /* Set width to 100% */
	      margin: auto;
	      min-height:200px;
	  }';
	echo' @media (max-width: 600px) {
	    .carousel-caption {
	      display: none; 
	    }
	  }';
	    echo'
		.row.content {
			height: auto;
	    		background:#ACD1B9;
	    		overflow:auto;
	    		width:auto;
	      }';
	  echo'
		.table {
		background:#ACD1B9;

	      }';
	  echo'
		.body {
		background:#ACD1B9;

	      }';
	    echo'.sidenav {
	      padding-top: 20px;

	      height: 100%;
	      }';
	    echo'footer {
	    background-color: #474a48;
	      color: white;
	      padding: 0px;
	      margin-top: 90px;
	      height: 40px;
	      }';
	    echo'
	    .modal-header, h4, .close {
	    background-color: #43604D;
	    color:white !important;
	    text-align: center;
	    font-size: 30px;
	    }
	  .modal-footer {
	    background-color: #ffffff;
	    }';
	    echo'
	    @media screen and (max-width: 767px) {
	      .sidenav {
		height: auto;
		padding: 15px;
	      }
	      .row.content {height:auto;} 
	    }';
	  echo '
	  .affix {
	    top: 0;
	    width: 100%;
	    z-index: 9999 !important;
	  }
	  .affix + .container-fluid {
	    padding-top: 70px;
	  }
   </style>';
 echo'</head>';
 echo'<body>';

	echo '<nav class="navbar navbar-inverse data-spy="affix" data-offset-top="197"" id="site-navigation" role="navigation" aria-label="Main Menu">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand">Logo</a>
    </div>';
   echo'<ul class="nav navbar-nav main-menu">';
   echo'<li ><a href="/index.php"><span class="glyphicon glyphicon-home"></span> Acceuil</a></li>';
   echo'<li ><a href="/SRC/Classes"><span class="glyphicon glyphicon-registration-mark"></span>Classes</a></li>';
   echo'<li ><a href="/SRC/Eleves"><span class="glyphicon glyphicon-road">Eleves</a></li>';
   echo'<li ><a href="/SRC/Personnels"><span class="glyphicon glyphicon-road">Personnels</a></li>';
   echo'<li ><a href="/SRC/Payements"><span class="glyphicon glyphicon-shopping-cart"></span>Payements</a></li>';
   echo'<li ><a href="/SRC/Depenses"><span class="glyphicon glyphicon-shopping-cart"></span>Depenses</a></li>';
   echo'<li ><a href="/SRC/Tuteurs"><span class="glyphicon glyphicon-map-marker"></span>Tuteurs</a></li>';
   echo'<li ><a href="/SRC/Achats"><span class="glyphicon glyphicon-shopping-cart"></span>Achats</a></li>';
   echo'<li ><a href="/SRC/Users"><span class="glyphicon glyphicon-briefcase"> Utilisateurs</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
      		<li ><a href="/index.php?dconn=OUI">
        	<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-off">
		</span> Déconnexion 
        </button></a></li>
      </ul>';
	echo'</div>
   </div>
   </nav>';
  $conn=pg_connect("host=localhost port=5432 dbname=markaz user=kone password=Heresira2");
?>



