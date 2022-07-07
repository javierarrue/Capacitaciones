$(document).ready(function(){
    $('#direccion').on('change', function(){
      var direccion_codigo = $(this).val();
      if(direccion_codigo){
        $.ajax({
          type: 'POST',
          url: '../includes/mostrarDeptos.inc.php',
          data: 'C_DIR='+direccion_codigo,
          success:function(html){
          $('#departamento').html(html);
          }
        })
      }else{
        $('#departamento').html('<option value="">Seleccione una dirección</option>');
      }
    })
  })

  //VALIADR QUE LA BUSQUEDA SE PUEDA HACER SOLO USANDO EL CODIGO DE DEPTO.
  //PORQUE PUEDE QUE TAMBIEN NECESITE DEL CODIGO DE DIRECCION
  $(document).ready(function(){
    $('#departamento').on('change', function(){
      var depto_codigo = $(this).val();
      if(depto_codigo){
        $.ajax({
          type: 'POST',
          url: '../includes/mostrarCargos.inc.php',
          data: 'C_DEPTO='+depto_codigo,
          success:function(html){
          $('#cargo').html(html);
          }
        })
      }else{
        $('#cargo').html('<option value="">Seleccione un Departamento</option>');
      }
    })
  })