$(document).ready(function(){
    var combobox = $("#rist_sesiones");
    var lista = $("#list_usuarios");
    var lista_anios = $("#rist_lista_anio");
    var lista_meses = $("#rist_lista_meses");
    var radio_estatus = $(".radio_estatus");
    combobox.change(function(){
        if($(this).val() != 0){
            dropdown("#rist_sesiones","#list_usuarios","/profesor/sesion");
        }else{
            lista.html("");
        }
    });
    $("input[name=rdSesionTipo]:radio").change(function () {
        
    });
    lista_anios.change(function(){
        sesiones_ajax($(this).val());
    });
    lista_meses.change(function(){
        sesiones_ajax($(this).val());
    });
    radio_estatus.click(function(){
        sesiones_ajax($(this).val());
    });
});

function sesiones_ajax(mes){
    var anio = $("#rist_lista_anio").val();
    var meses = $("#rist_lista_meses").val();
    //var activo = $("#rist_activo").val();
    //console.log($('#rist_activo').attr('name'));
    //console.log(anio);
    //console.log(meses);
    if(anio=='0' || meses=='0'){
        alert('Seleccione el año y el mes de inicio del taller');
    } else {
        $.ajax({
            url: site_url + "/profesor/sesiones_ajax",
            data: $('#form_registro').serialize(), 
            method: "post", 
            dataType: "json", 
            success: function(response){
                var comboBoxSesiones = $("#rist_sesiones");
                comboBoxSesiones.html("");
                comboBoxSesiones.append($("<option>", {
                    text: "Seleccione una sesión"
                    , value: 0
                }))
                for(x in response){
                    comboBoxSesiones.append($("<option>", {
                        text: (""+response[x].texto).replace("&oacute;", "ó")
                        , value: response[x].valor
                    }));
                }
            }
            , error: function(){
                console.warn("No se pudo realizar la conexión");
            }
        });
    }
}

function attendance_ajax(path, elemento_resultado, datos, despues){
	$.ajax({
		url: site_url+path,
		data: datos,
		method: 'POST',
		dataType: 'JSON',
		beforeSend: function( xhr ) {
			$(elemento_resultado).html(create_loader());
		}
	})
	.done(function(response) {
		// alert(response.resultado);
		if(response.resultado==true){
			$(elemento_resultado).html(response.data);
			$('[data-toggle="tooltip"]').tooltip();
			despues;
		}/* else {
			$(elemento_resultado).html(html_message(response.error, 'danger'));
        }*/
        alert(response.msg);
	})
	.fail(function( jqXHR, textStatus ) {
		// alert(textStatus)
		$(elemento_resultado).html("Ocurrió un error durante el proceso de registro de asistencia, inténtelo más tarde.");
	})
	.always(function() {
		remove_loader();
	});
}

function saveAttandance(field){
	//if($(field).is(':checked')){
		var path="/profesor/save_attandance";
		//var tipo = $(field).data("tipo");
        //var sesion = $(field).data("sesion");
        var check = 0;
        if($(field).prop("checked") == true){
            check = 1;
        }
        var taller = $(field).data("taller");
        var agendafecha = $(field).data("agendafecha");
		var datos = {'taller_id':taller, 'agendafecha':agendafecha, 'check':check} //'sesion_id':sesion,
		// alert("Tipo: "+tipo+"; Taller:"+taller);
		attendance_ajax("/profesor/save_attendance", 
						"#row_"+agendafecha+"_"+taller,
						datos);
	//}
}