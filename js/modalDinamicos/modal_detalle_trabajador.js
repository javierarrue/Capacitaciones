  //Adjuntando informacion al modal de eliminar curso sugerido
  $(document).on('click', 'button[data-role=delete]', function() {

    var id = $(this).data('id');
    var cedula = document.querySelector('#cedula_trabajador').textContent;
    var nombre = document.querySelector('#csugerido_nombre_' + id).innerText;
    var id_csugerido = document.querySelector('#id_csugerido_' + id).value;

    document.querySelector('#delete_nombre_csugerido').textContent = nombre;
    document.querySelector('#delete_id').value = id_csugerido;
    document.querySelector('#delete_cedula_trabajador').value = cedula;

    $('#deleteModal').modal('toggle');
  })
  //Adjuntando informacion al modal de editar curso sugerido
  $(document).on('click', 'button[data-role=edit]', function() {

    var id = $(this).data('id');

    var nombre = document.querySelector('#csugerido_nombre_' + id).innerText;
    var analisis = document.querySelector('#analisis_' + id).innerText;
    var estado = document.querySelector('#estado_' + id).value;
    var fecha_inicio = document.querySelector('#fecha_inicio_' + id).value;
    var fecha_fin = document.querySelector('#fecha_fin_' + id).value;

    var edit_estado = document.querySelector('#edit_estado').options;
    for (let i = 0; i < edit_estado.length; i++) {
      if (edit_estado[i].value == estado) {
        console.log(edit_estado[i].innerText)
        edit_estado[i].setAttribute('selected', '');
      }
    }
    document.querySelector('#edit_nombre_csugerido').textContent = nombre;
    document.querySelector('#edit_fecha_inicio').value = fecha_inicio;
    document.querySelector('#edit_fecha_fin').value = fecha_fin;

    $('#editModal').modal('toggle');

  })