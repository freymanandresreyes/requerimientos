// alert("ok");
$(function() {
    $(document).on('click', 'input[type="button"]', function(event) {
       let id = this.id;
       var url= URLdominio+'editar_area';
       console.log(id)
    //    alert(id);
    //    return(false);
       $.ajax({
    
        url: url,
        type: 'GET',
        data: {
          id : id
        },
        dataType: 'json',
        success: function(respuesta){
            console.log(respuesta);

            // $('#encargado').val(respuesta.userArea.name);

            $( "#editar_area" ).addClass( "show" );

            $("#editar_area").css({
            "display": "block",
            "padding-right": "16px",
            "background": "rgba(0, 0, 0, 0.5)"
            });


            $( "#cerrar_editar" ).click(function() {
            $( "cerrar_editar" ).removeClass( "show" );
            $("#editar_area").css({
              "display": "none"
            });
            });
        }
      });//FIN AJAX
     });
   });