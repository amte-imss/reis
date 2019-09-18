$( document ).ready(function() {
setTimeout(function(){ mensajeReagenda(); }, 3000);
});
function mensajeReagenda(){
var r = confirm("¿Quisiera re-agendar su asistencia?");
if (r == true) {
document.location.href = "<?php echo site_url('/registro'); ?>";
}
}
