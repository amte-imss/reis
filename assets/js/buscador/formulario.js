$( document ).ready(function() {
    var select_sesiones = $("#sesiones");
    data_ajax(site_url+"/buscador/get_data_ajax", "#form_buscador", "#listado_resultado");
    $("#btn_submit").click(function(event){
        data_ajax(site_url+"/buscador/get_data_ajax", "#form_buscador", "#listado_resultado");
        event.preventDefault();
    });
    $("#btn_reset").click(function(event){
        this.form.reset();
        data_ajax(site_url+"/buscador/get_data_ajax", "#form_buscador", "#listado_resultado");
        event.preventDefault();
    });
    $("#btn_export").click(function(event){
        event.preventDefault();
        $("#form_buscador").attr("action", site_url+"/buscador/export_data");
        $("#form_buscador").submit();
        //data_ajax(site_url+"/buscador/export_data", "#form_buscador", "#listado_resultado");        
    });
    $('[name="tipo"]').change(function(){
       console.log("Cambio del tipo seleccionado: "+ $(this).val());
       $.ajax({
           url: location.href+"/get_sesiones_ajax"
           , type: "post"
           , dataType: "json"
           , data: {
               tipo: $(this).val()
           }
           , error: function(){
               console.warn("No se ha podido pedir las sesiones");
           }
           , success: function(response){
               console.log("success: ", response.data);
                select_sesiones.html("");
                select_sesiones.append( $("<option>", { text: "Seleccione...", value: "" }));
                console.log("llenando..");
                for(var sesion in response.data){
                    console.log("iterando: ",response.data[sesion]);
                    select_sesiones.append($("<option>", { text: response.data[sesion]["a_nombre"], value: response.data[sesion]["agenda_id"] }));
                }
           }
       })
   }); 
});


