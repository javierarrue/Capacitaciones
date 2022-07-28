$(document).on('click', 'button[data-role=delete]', function() {
    var id = $(this).data('id');
    var nombre = document.querySelector('#crequerido_nombre_'+id).innerText;

    document.querySelector('#delete_nombre_crequerido').innerText = nombre;

    $('#deleteModal').modal('toggle')

})

$(document).on('click','button[data-role=edit]',function(){
    var id = $(this).data('id');
    var nombre = document.querySelector('#crequerido_nombre_'+id).innerText;

    console.log(nombre)

    document.querySelector('#edit_nombre_crequerido').innerHTML = nombre;
    document.querySelector('#editar_nombre').value = nombre;
    document.querySelector('#id_curso').value = id;
    document.querySelector('#nombre_viejo').value = nombre;

    $('#editModal').modal('toggle')

})