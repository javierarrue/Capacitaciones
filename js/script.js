//Data Table


$(document).ready(function() {
  $('#table2').DataTable({
    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
    "language" : {
      "url" : "../resources/datatable/espaniol/es_es.json"
    },
    responsive: true,
    columnDefs: [
      { responsivePriority: 1, targets: 2 }
    ],
    fixedHeader: false
  });
} );

$(document).ready(function() {
  $('table#table1').DataTable({
    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
    "language" : {
      "url" : "../resources/datatable/espaniol/es_es.json"
    }
  });
} ); 
/*
$(document).ready(function() {
  $('table#table_cargos_trabajadores').DataTable({

    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
    "language" : {
      "url" : "../resources/datatable/espaniol/es_es.json"
    }
  });
} ); */
/*
function fill_cargos_trabajadores(C_DEPTO){
  var datatable = $('#table_cargos_trabajadores').datatable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "searching" : false,
    "language" : {
      "url" : "../resources/datatable/espaniol/es_es.json"
    },
    "ajax" : {
      url: "../includes/mostrarTrabajadores.inc.php",
      type: "POST",
      data: {
        C_DEPTO:C_DEPTO
      }
    }
  });
}*/