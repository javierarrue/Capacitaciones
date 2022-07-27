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