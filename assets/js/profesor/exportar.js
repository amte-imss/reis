$(document).ready(function(){
  $("#btn_export").click(function(event){
      //console.log("HOLA");
      event.preventDefault();
      $("#form_export").attr("action", site_url+"/profesor/export_data");
      $("#form_export").submit();
  });
});
