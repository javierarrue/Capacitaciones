$(document).ready(function(){
    $('#save').on('click', function(){
      var id = document.querySelector('#edit_id').value;
      var fecha_inicio = document.querySelector('#edit_fecha_inicio').value;
      var fecha_fin = document.querySelector('#edit_fecha_fin').value;
      var estados_list = document.querySelector('#edit_estado');
      var estado_id = document.querySelector('#edit_estado').value;
      var analisis = document.querySelector('#edit_analisis').value;
      
      //Cambiar texto y estilos del campo analisis.
      var analisis_child = document.querySelector('#analisis_' + id).children[0]; //Accedo al nodo que contiene la columna de analisis para editar su contenido y estilos.
      //Las variables acepto y rechazado, contienen las clases bootstrap para formar los estilos.
      var aceptado_estilo = 'rounded-pill badge bg-success bg-opacity-10 text-success border border-success border-opacity-10 fw-normal';
      var rechazado_estilo = 'rounded-pill badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-10 fw-normal';
    
      $.ajax({
        type    : 'POST',
        url     : '../includes/editCSugeridoTrabajador.inc.php',
        data    : {id: id, estado: estado_id, fecha_inicio: fecha_inicio, fecha_fin: fecha_fin, analisis: analisis},
        success : function(response){

          if(analisis == 'Aceptado'){
            analisis_child.className = aceptado_estilo;
            analisis_child.innerText = 'Aceptado';
          }else{
            analisis_child.className = rechazado_estilo
            analisis_child.innerText = 'Rechazado';
          }

          document.querySelector('#fecha_inicio_' + id).value = fecha_inicio;
          document.querySelector('#fecha_fin_' + id).value = fecha_fin;
          document.querySelector('#estado_' + id).innerText = estados_list.options[estados_list.selectedIndex].text;
          document.querySelector('#estado_id_' + id).value = estado_id;

          $('#editModal').modal('toggle');

        }
      })
    })
})