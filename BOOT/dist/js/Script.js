$(document).ready(function(){
	$('.collapse').collapse();
});

//=============== login =============
$(document).ready(function(){
  $("#auth").ready(function(){
    $("#Auth_Modal").modal();
  });
});

//===============  Modal_ajout ===============
$(document).ready(function(){
  $("#ajout").click(function(){
    $("#ajout_Modal").modal();
  });
});

//=============== modal_modifier =============
$(document).ready(function(){
  $("#mod").ready(function(){
    $("#mod_Modal").modal();
  });
});

//=============== modal_supprimer =============
$(document).ready(function(){
  $("#sup").ready(function(){
    $("#sup_Modal").modal();
  });
});

//=============== modal_ajout_four =============
$(document).ready(function(){
  $("#n_aj").click(function(){
    $("#n_ajout").modal();
  });
});
//=============== login2 =============
$(document).ready(function(){
  $("#auth2").click(function(){
    $("#Auth_Modal").modal();
  });
});
//=============== login2 ==============

//=============== Bon_modal =============
$(document).ready(function(){
  $("#bj").click(function(){
    $("#b_Modal").modal();
  });
});
//=============== bon ==============

//=============== All_modal =============
$(document).ready(function(){
  $("#vaj").click(function(){
    $("#ve_Modal").modal();
  });
});

$(document).ready(function(){
  $("#vmod").ready(function(){
    $("#vm_Modal").modal();
  });
});

$(document).ready(function(){
  $("#vsup").ready(function(){
    $("#vs_Modal").modal();
  });
});
//=============== vehi ==============

//=============== pneu_modal =============
$(document).ready(function(){
  $("#paj").click(function(){
    $("#pa_Modal").modal();
  });
});

$(document).ready(function(){
  $("#pmod").ready(function(){
    $("#pm_Modal").modal();
  });
});

$(document).ready(function(){
  $("#psup").ready(function(){
    $("#ps_Modal").modal();
  });
});
//=============== pneu ==============

//=============== liv_modal =============
$(document).ready(function(){
  $("#laj").click(function(){
    $("#la_Modal").modal();
  });
});

$(document).ready(function(){
  $("#lmod").ready(function(){
    $("#lm_Modal").modal();
  });
});

$(document).ready(function(){
  $("#lsup").ready(function(){
    $("#ls_Modal").modal();
  });
});
//=============== liv ==============

//=============== con_modal =============
$(document).ready(function(){
  $("#caj").click(function(){
    $("#ca_Modal").modal();
  });
});

$(document).ready(function(){
  $("#cmod").ready(function(){
    $("#cm_Modal").modal();
  });
});

$(document).ready(function(){
  $("#csup").ready(function(){
    $("#cs_Modal").modal();
  });
});
//=============== con ==============

//=============== dep_modal =============
$(document).ready(function(){
  $("#daj").click(function(){
    $("#da_Modal").modal();
  });
});

$(document).ready(function(){
  $("#pave").click(function(){
    $("#pav_modal").modal();
  });
});

$(document).ready(function(){
  $("#dmod").ready(function(){
    $("#dm_Modal").modal();
  });
});

$(document).ready(function(){
  $("#dsup").ready(function(){
    $("#ds_Modal").modal();
  });
});
//=============== dep ==============

//=============== modal_auto =============
$(document).ready(function(){
  $("#new").click(function(){
    $("#nw_Modal").modal();
  });
});
//=============== modal_auto ==============

//=============== modal_retire_p =============
$(document).ready(function(){
  $("#pr").ready(function(){
    $("#p_Modal").modal();
  });
});
//=============== modal_retire_p ==============

//================ confirmation liv ================
$(document).ready(function(){
  $("#cnBtn").ready(function(){
    $("#cnModal").modal("show");
  });
  $("#cnModal").on('show.bs.modal', function(){
   // alert('Bon ajouter!!');
  });
});

//================ confirmation liv ================



//================ message_ajout_bon ===============
$(document).ready(function(){
  $('[data-toggle="aj_b"]').tooltip();   
});
//================ fin =============================

//================== search depenses ===============
$(document).ready(function(){
  $("#verif").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#table_verif tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
//================== fin ===========================

//================== search depenses_V ===============
$(document).ready(function(){
  $("#detail").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#detail_Table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
//================== fin ===========================

//================== Modal detail Tuteur ===============
$(document).ready(function(){
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
});
});
//================== Modal info ===========================
	// ouverture de la modale
//$('#byModal-success1').modal('show');
 
	// fermeture de la modale après 5s
//window.setTimeout(function() {
 //   $('#byModal-success1').modal('hide');
//}, 5000);

