$(document).ready(function(){  
  var form_count = 1, previous_form, next_form, total_forms;
  total_forms = $("fieldset").length;  
  $(".next-form").click(function(){
    previous_form = $(this).parent();
    next_form = $(this).parent().next();
    next_form.show();
    previous_form.hide();
    setProgressBarValue(++form_count);
  });  
  $(".previous-form").click(function(){
    previous_form = $(this).parent();
    next_form = $(this).parent().prev();
    next_form.show();
    previous_form.hide();
    setProgressBarValue(--form_count);
  });
  setProgressBarValue(form_count);  
  function setProgressBarValue(value){
    var percent = parseFloat(100 / total_forms) * value;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width",percent+"%")
      .html(percent+"%");   
  } 
  // Handle form submit and validation
  $( "#register_form" ).submit(function(event) {   

    var nombre = document.getElementById('nombre');
    var telefono = document.getElementById('telefono');
    var email = document.getElementById('email');
    var regexEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*(\.\w{2,6})+$/; 
	  var error_message = '';

    if(nombre.value === null || nombre.value === ''){
      error_message += `Ingresa tu nombre <br/>`;
    }else if(nombre.value.length < 4 ){
      error_message += `Ingresa tu nombre mayor a 4 caracteres <br/>`;
    }
    if(telefono.value === null || telefono.value === ''){
      error_message += `Ingresa tu teléfono <br/>`;
    }else if( telefono.value.length < 4 ){
      error_message += `Ingresa tu teléfono con mas de 4 digitos <br/>`;
    }
    if(regexEmail.value === null || regexEmail.value === ''){
      error_message += `Ingresa tu Email <br/>`;
    }else if(!regexEmail.test(email.value)){
      error_message += `El Email no es válido <br/>`;
    }
    if(!document.querySelector('input[name="polPrivacidad"]:checked')) {
      error_message += `Es Requerido seleccionar las políticas de privacidad <br/>`;
    }
    // Display error if any else submit form
    if(error_message) {
      $('.alert-success').removeClass('hide').html(error_message);
      return false;
    } else {
      return true;	
    }    

  });  

});

