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
/*
  $(document).ready(function(){
    $('#departamento').on('change', function(){
      var depto_codigo = $(this).val();
      if(depto_codigo){
        $.ajax({
          type: 'POST',
          url: '../includes/mostrarTrabajadores.inc.php',
          data: 'C_DEPTO='+depto_codigo,
          success:function(html){
          $('#cargoTrabajadores-tabla').html(html);
          }
        })
      }else{
        $('#cargoTrabajadores-tabla').html('<option value="">Seleccione un Departamento</option>');
      }
    })
  })
*/
/*
  $(document).ready(function(){
    $('#departamento').on('change', function(){
        var c_depto = $(this).val();
        console.log(c_depto)
        if(c_depto){
            $('#table_cargos_trabajadores').DataTable({
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
                    C_DEPTO:c_depto
                  }
                }
              });
        }
    })
  })
*/

$(document).ready(function(){
    $('#departamento').on('change', function(){
        var c_depto = $(this).val();
        console.log(c_depto)
        if(c_depto){
            $('#table_cargos_trabajadores').DataTable({
                "bDestroy": true,
                "processing" : true,
                /*
                "serverSide" : true,
                "order" : [],
                "searching" : false,*/
                "language" : {
                  "url" : "../resources/datatable/espaniol/es_es.json"
                },
                "ajax" : {
                  url: "../includes/mostrarTrabajadores.inc.php",
                  type: "POST",
                  data: {
                    C_DEPTO:c_depto
                  }
                },
                "columns":[
                    {"data":"btn_detalle"},
                    {"data":"nombre"},
                    {"data":"apellido"},
                    {"data":"cedula"},
                    {"data":"cargo"}
                ]
              });
        }
    })
  })

  /**
   * Encontrar una empresa que me permita aplicar los conocimientos adquiridos en los años de estudio, que me brinde la oportunidad de alcanzar todas mis metas trazadas, y que me ofrezca la oportunidad de crecer en el área laboral, personal e intelectual.
   */