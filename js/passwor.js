$(document).ready(function() {
  $('#clave').keyup(function() {

    var pass1 = $('#contrasenia_cli').val();
    var pass2 = $('#clave').val();
    if ( pass1 == pass2 ) {
      // $('#error2')css("background", "url(check.png)");
      $('#error1').text("Contraseña correctas!");
    } else {
      // $('#error2')css("background", "url(check-.png)");
      $('#error1').text("No coincide la contraseña!");
    }
    if (pass2 =="") {
    	$('#error1').text('No se puede dejar en blanco este espacio!')
    }

  });

});