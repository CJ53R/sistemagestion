

$(document).ready(function () {

  /*-------------------------------------------------*/
  /*----------------Forms Perzonalizados-------------*/
  /*-------------------------------------------------*/
  /*-------------------------------------------------*/
  /*----------------Expresiones validas-------------*/
  /*-------------------------------------------------*/

  const expresiones = {
    numdocumento: /^\d{8}$/, // 8 a 12 numeros.
    numdocumento2: /^\d{12}$/, // 8 a 12 numeros.
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{9,9}$/, // 9 a 9 numeros.
    fecha: /^\d{2,4}\-\d{1,2}\-\d{1,2}$/,
    direccion: /[A-Za-z0-9'\.\-\s\,]$/
  }


  const campos = {
    numdocumento: false, // 8 a 12 numeros.
    nombre: false, // Letras y espacios, pueden llevar acentos.
    apaterno: false, // Letras y espacios, pueden llevar acentos.
    amaterno: false, // Letras y espacios, pueden llevar acentos.
    email: false,
    telefono: false, // 9 a 9 numeros.
    fnacimiento: false,
    direccion: false,
    genero: false
  }
  const formulario = document.getElementById('formulario');
  const inputs = document.querySelectorAll('#formulario input');
  const selects = document.querySelectorAll('#formulario select');
  const numdocumento = document.getElementById('numdocumento');
  const codigoTrabajador = document.getElementById('codigoTrabajador');
  codigoTrabajador.classList.add('focus')
  const nombres = document.getElementById('nombre');
  const apaterno = document.getElementById('apaterno');
  const amaterno = document.getElementById('amaterno');
  const telefono = document.getElementById('telefono');
  const direccion = document.getElementById('direccion');
  const email = document.getElementById('email');
  const fnacimiento = document.getElementById('fnacimiento');
  const genero = document.getElementById('genero');

  codigoTrabajador.readOnly = true;
  numdocumento.readOnly = true;
  nombres.readOnly = true;
  apaterno.readOnly = true;
  amaterno.readOnly = true;
  fnacimiento.readOnly = true;

  selects.forEach(select => {
    select.onfocus = () => {
      select.previousElementSibling.classList.add('top');
      select.previousElementSibling.classList.add('focus');
      select.parentNode.classList.add('focus');
    }
    select.onblur = () => {
      select.value = select.value.trim();
      if (select.value.trim().length == 0) {
        select.previousElementSibling.classList.remove('top');
        select.previousElementSibling.classList.remove('focus');
        select.parentNode.classList.remove('focus');
      }
    }
    const validarFormulario = (e) => {
      switch (e.target.name) {
        case "genero":
          validarCampoSelect(e.target, 'genero');
          break;
      }
    }
    select.addEventListener('change', validarFormulario);
  });

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
    input.onclick = () => {
      if (input.name == 'fnacimiento') {
        input.addEventListener('blur', validarFormulario);
      }
      if (input.name == 'fregistro') {
        input.addEventListener('blur', validarFormulario);
      }
    }

    const validarFormulario = (e) => {
      switch (e.target.name) {
        case "numdocumento":
          validarSoloNumero(e.target);
          if (numdocumento.value.length == 12) {
            validarCampo(expresiones.numdocumento2, numdocumento, 'numdocumento');
          } else {
            if (numdocumento.value.length == 8) {
              validarCampo(expresiones.numdocumento, numdocumento, 'numdocumento');
            }
          }
          break;
        case "nombre":
          validarSoloLetra(e.target);
          validarCampo(expresiones.nombre, e.target, 'nombre');
          break;
        case "apaterno":
          validarSoloLetra(e.target);
          validarCampo(expresiones.nombre, e.target, 'apaterno');
          break;
        case "amaterno":
          validarSoloLetra(e.target);
          validarCampo(expresiones.nombre, e.target, 'amaterno');
          break;
        case "fnacimiento":
          validarCampoFec(expresiones.fecha, e.target, 'fnacimiento', maxNac, minFe);
          break;
        case "telefono":
          validarSoloNumero(e.target);
          validarCampo(expresiones.telefono, e.target, 'telefono');
          Longitud(e.target, 9);
          break;
        case "direccion":
          validarCampo(expresiones.direccion, e.target, 'direccion');
          break;
        case "email":
          validarCampo(expresiones.email, e.target, 'email');
          break;
      }
    }
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
  });

  const validarCampo = (expresion, input, campo) => {
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

  const validarCampoSelect = (select, campo) => {
    if (select.value != 0) {
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


  formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    if ((telefono.value.length > 0 && campos.telefono==false) || (email.value.length > 0 && campos.email==false) || 
    (direccion.value.length > 0 && campos.direccion==false)||campos.genero==false) {
      validarCampo(expresiones.telefono, telefono, 'telefono');
      validarCampo(expresiones.email, email, 'email');
      validarCampo(expresiones.direccion, direccion, 'direccion');
      validarCampoSelect(genero, 'genero');
      swal({
        title: "¡Uy!",
        text: "¡Llene los campos de manera correcta!",
        icon: "error",
        button: "OK!",
        dangerMode: true,
      });
    } else {
      formulario.submit();
    }

  });


  /*-------------------------------------------------*/
  /*---------------- END Forms Perzonalizados-------------*/
  /*-------------------------------------------------*/





  /**************************************************************** */
  /*--------------Limitar Numero de Caracteres----------------------*/
  /************************************************************** */
  function LimitarDoc() {
    numdocumento.addEventListener('keypress', e => {
      var cod = tipodocumento.value;
      if (cod == '2') {
        if (numdocumento.value.length >= 12) {
          e.preventDefault();
        }
      }
      if (cod == '1') {
        if (numdocumento.value.length >= 8) {
          e.preventDefault();
        }
      }
    });
  }
  const Longitud = (campo, longitudMaxima) => {
    campo.addEventListener('keypress', function (e) {
      if (campo.value.length > (longitudMaxima - 1))
        e.preventDefault();
    });
  }

  LimitarDoc();
  /**************************************************************** */
  /*--------------------Validar Solo Numeros----------------------*/
  /************************************************************** */
  function soloNumeros(e) {
    var key = e.charCode;
    return key >= 48 && key <= 57;
  }

  const validarSoloNumero = (input) => {
    input.addEventListener('keypress', function (e) {
      if (!soloNumeros(event)) {
        e.preventDefault();
      }
    });
  }
  /**************************************************************** */
  /*--------------------Validar Solo Letras----------------------*/
  /************************************************************** */
  function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú";

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
  const validarSoloLetra = (input) => {
    input.addEventListener('keypress', function (e) {
      if (!soloLetras(event)) {
        e.preventDefault();
      }
    });
  }

  /**************************************************************** */
  /*----------Inicializando input en Solo Numeros-------------------*/
  /**************************************************************** */
  validarSoloNumero(numdocumento);
  validarSoloLetra(nombres);
  validarSoloLetra(apaterno);
  validarSoloLetra(amaterno);
  validarSoloNumero(telefono);







  let today = new Date();
  let dd = today.getDate();
  let mm = today.getMonth() + 1; //January is 0!
  let yyyy = today.getFullYear();
  if (dd < 10) {
    dd = '0' + dd
  }
  if (mm < 10) {
    mm = '0' + mm
  }

  today = yyyy + '-' + mm + '-' + dd;

  let maxNac = (yyyy - 6) + "-07-31";

  let minFe = (yyyy - 50) + "-01-01";

  fnacimiento.max = maxNac;
  const validarCampoFec = (expresion, input, campo, maxF, minF) => {
    if (expresion.test(input.value) && input.value <= maxF && input.value >= minF) {
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



  function valida() {
    if (codigoTrabajador.value.length > 0) {

    }
    if (numdocumento.value.length == 12) {
      validarCampo(expresiones.numdocumento2, numdocumento, 'numdocumento');
    } else {
      if (numdocumento.value.length == 8) {
        validarCampo(expresiones.numdocumento, numdocumento, 'numdocumento');
      }
    }
    if (nombres.value.length > 0) {
      nombres.focus();
    }
    if (apaterno.value.length > 0) {
      apaterno.focus();
    }
    if (amaterno.value.length > 0) {
      amaterno.focus();
    }
    if (genero.value != 0) {
      genero.focus();
      validarCampoSelect(genero, 'genero');
    }
    if (fnacimiento.value.length > 0) {
      fnacimiento.focus();
    }
    if (telefono.value.length > 0) {
      telefono.focus();
    }
    if (direccion.value.length > 0) {
      direccion.focus();
    }
    if (email.value.length > 0) {
      email.focus();
    }
    numdocumento.focus();
  }
  valida();

});