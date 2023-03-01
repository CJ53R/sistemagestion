

$(document).ready(function () {

  /*-------------------------------------------------*/
  /*----------------Forms Perzonalizados-------------*/
  /*-------------------------------------------------*/
  /*-------------------------------------------------*/
  /*----------------Expresiones validas-------------*/
  /*-------------------------------------------------*/

  const expresiones = {
    old_password: /[A-Za-z0-9'\.\-\s\,]$/,
    letra: /[A-Za-z']$/, 
    numero: /[0-9']$/
  }
  const buttons = document.querySelectorAll(".button");

  buttons.forEach(button => {
    button.addEventListener("click", (e) => {
      e.preventDefault;
      button.classList.add("animate");
      setTimeout(() => {
        button.classList.remove("animate");
      }, 600);
    });
  });

  const campos = {
    password: false,
    repeat_password: false,
    old_password: false,
    dosletras: false,
    dosnumeros: false
  }
  const formulario = document.getElementById('formulario');
  const inputs = document.querySelectorAll('#formulario input');
  const password = document.getElementById('password');
  const repeat_password = document.getElementById('repeat_password');
  const old_password = document.getElementById('old_password');

  inputs.forEach(input => {
    input.onfocus = () => {
      input.previousElementSibling.classList.add('top');
      input.previousElementSibling.classList.add('focus');
      input.parentNode.classList.add('focus');
      input.classList.add('focus');
    }
    input.onblur = () => {
      input.value = input.value.trim();
      if (input.value.trim().length == 0) {
        input.previousElementSibling.classList.remove('top');
        input.previousElementSibling.classList.remove('focus');
        input.parentNode.classList.remove('focus');
        input.classList.remove('focus');
      }
    }

    const validarFormulario = (e) => {
      switch (e.target.name) {
        case "password":
          validarCampo( e.target, 'password');
          if(repeat_password.value.length>0){
            validaRepite()
          }
          break;
        case "repeat_password":
          if(repeat_password.value.length>0){
            validaRepite();
          }
          break;
        case "old_password":
          validarCampo2(expresiones.old_password, e.target, 'old_password');
          break;
      }
    }
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
  });

  const validarCampo = (input, campo) => {
    let i = 0, j=0;
    for (let index = 0; index < input.value.length; index++) {
      if(expresiones.numero.test(input.value.charAt(index))){
        i+=1;
      }

      if(expresiones.letra.test(input.value.charAt(index))){
        j+=1;
      }
    }

    if(j>=2){
      campos.dosletras=true;
    }else{
      campos.dosletras=false;
    }
    if(i>=2){
      campos.dosnumeros=true;
    }else{
      campos.dosnumeros=false;
    }
    if ( input.value.length>=8 && campos.dosnumeros && campos.dosletras) {
      document.getElementById(`group_${campo}`).classList.remove('contdiv_incorrecto');
      document.getElementById(`group_${campo}`).classList.add('contdiv_correcto');
      document.querySelector(`#group_${campo} i`).classList.remove('fa-times-circle');
      document.querySelector(`#group_${campo} i`).classList.add('fa-check-circle');
      document.querySelector(`#group_${campo} .error_input`).classList.remove('error_input_activo');
      campos[campo] = true;
    } else {
      document.getElementById(`group_${campo}`).classList.add('contdiv_incorrecto');
      document.getElementById(`group_${campo}`).classList.remove('contdiv_correcto');
      document.querySelector(`#group_${campo} i`).classList.add('fa-times-circle');
      document.querySelector(`#group_${campo} i`).classList.remove('fa-check-circle');
      document.querySelector(`#group_${campo} .error_input`).classList.add('error_input_activo');
      campos[campo] = false;

    }
  }

  const validarCampo2 = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
      document.getElementById(`group_${campo}`).classList.remove('contdiv_incorrecto');
      document.getElementById(`group_${campo}`).classList.add('contdiv_correcto');
      document.querySelector(`#group_${campo} i`).classList.remove('fa-times-circle');
      document.querySelector(`#group_${campo} i`).classList.add('fa-check-circle');
      document.querySelector(`#group_${campo} .error_input`).classList.remove('error_input_activo');
      campos[campo] = true;
    } else {
      document.getElementById(`group_${campo}`).classList.add('contdiv_incorrecto');
      document.getElementById(`group_${campo}`).classList.remove('contdiv_correcto');
      document.querySelector(`#group_${campo} i`).classList.add('fa-times-circle');
      document.querySelector(`#group_${campo} i`).classList.remove('fa-check-circle');
      document.querySelector(`#group_${campo} .error_input`).classList.add('error_input_activo');
      campos[campo] = false;
    }
  }

  function validaRepite() {
    if (password.value==repeat_password.value) {
      document.getElementById(`group_repeat_password`).classList.remove('contdiv_incorrecto');
      document.getElementById(`group_repeat_password`).classList.add('contdiv_correcto');
      document.querySelector(`#group_repeat_password i`).classList.remove('fa-times-circle');
      document.querySelector(`#group_repeat_password i`).classList.add('fa-check-circle');
      document.querySelector(`#group_repeat_password .error_input`).classList.remove('error_input_activo');
      campos.repeat_password = true;
    } else {
      document.getElementById(`group_repeat_password`).classList.add('contdiv_incorrecto');
      document.getElementById(`group_repeat_password`).classList.remove('contdiv_correcto');
      document.querySelector(`#group_repeat_password i`).classList.add('fa-times-circle');
      document.querySelector(`#group_repeat_password i`).classList.remove('fa-check-circle');
      document.querySelector(`#group_repeat_password .error_input`).classList.add('error_input_activo');
      campos.repeat_password = false;
    }
  }

  formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    if (campos.password && campos.repeat_password && campos.old_password ) {
      formulario.submit();
    } else {
      swal({
        title: "¡Uy!",
        text: "¡Algo salio mal!",
        icon: "error",
        button: "OK!",
        dangerMode: true,
      });
    }

  });

  /**************************************************************** */
  /*--------------------Validar Sin especiales----------------------*/
  /************************************************************** */
  function sinespceciales(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz0123456789";

    especiales = [8, 13];
    tecla_especial = false
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    } else {
      return true;
    }
  }
  const validarSinespeciales = (input) => {
    input.addEventListener('keypress', function (e) {
      if (!sinespceciales(event)) {
        e.preventDefault();
      }
    });
  }


  validarSinespeciales(password);
  validarSinespeciales(repeat_password);


  function valida() {
    if (password.value.length > 0) {
      password.focus();
    }
    if (repeat_password.value.length > 0) {
      repeat_password.focus();
    }
    if (old_password.value.length > 0) {
      old_password.focus();
    }
  }
  valida();

});