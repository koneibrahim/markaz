<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Elegant Success Modal</title>
</head>
<body>
<!------------------- MODALE ------------------>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
     <div class="modal-dialog modal-30">
      <div class="modal-content">
        <div class="modal-header modal-header-success">
            <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
            <h4 class="modal-title">Suggestion enregistrée</h4>
        </div>
        <div class="modal-body">
 
            <br />Votre demande a été envoyée aux administrateurs.<br /><br />
            <span class="italique">Merci de votre participation.</span>
             
        </div>
        <div class="modal-footer">
        </div>
       </div>
      </div>
</div>
     <script type="text/javascript" language="javascript">
     
	var myModal = $('#myModal').on('shown', function () {
    clearTimeout(myModal.data('hideInteval'))
    var id = setTimeout(function(){
        myModal.modal('hide');
    });
    myModal.data('hideInteval', id);
})

//==========================

// ouverture de la modale
$('#myModal-success1').modal('show');
 
// fermeture de la modale après 5s
window.setTimeout(function() {
    $('#myModal-success1').modal('hide');
}, 5000);
     </script>
     
     </body>
</html>  



                                                      
