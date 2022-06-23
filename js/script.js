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