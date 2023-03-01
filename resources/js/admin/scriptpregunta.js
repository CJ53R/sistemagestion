$(document).ready(function () {
  
  /*-------------------------------------------------*/
  /*----------------Forms Perzonalizados-------------*/
  /*-------------------------------------------------*/
  /*-------------------------------------------------*/
  /*----------------Expresiones validas-------------*/
  /*-------------------------------------------------*/
  
  
  const campos ={
      pregunta: false,
      respuesta: false
  }
  
  const formulario = document.getElementById('formulario');
  const inputs = document.querySelectorAll('#formulario input');
  const pregunta= document.getElementById('pregunta');
  const respuesta= document.getElementById('respuesta');
  
 
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
        case "pregunta":
          validarCampo(e.target, 'pregunta');
          break;
        case "respuesta":
          validarCampo(e.target, 'respuesta');
          break;
      }
    }
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
  });
  
  const validarCampo = ( input, campo) =>{
    if(input.value.length>0){
      document.getElementById(`group_${campo}`).classList.remove('contdiv_incorrecto');
      document.getElementById(`group_${campo}`).classList.add('contdiv_correcto');
      document.querySelector(`#group_${campo} i`).classList.remove('fa-times-circle');
      document.querySelector(`#group_${campo} i`).classList.add('fa-check-circle');
      document.querySelector(`#group_${campo} .error_input`).classList.remove('error_input_activo');
      campos[campo]=true;
    }else{
      document.getElementById(`group_${campo}`).classList.add('contdiv_incorrecto');
      document.getElementById(`group_${campo}`).classList.remove('contdiv_correcto');
      document.querySelector(`#group_${campo} i`).classList.add('fa-times-circle');
      document.querySelector(`#group_${campo} i`).classList.remove('fa-check-circle');
      document.querySelector(`#group_${campo} .error_input`).classList.add('error_input_activo');
      campos[campo]=false;
    }
  }
  
  
  formulario.addEventListener('submit', (e) => {
    e.preventDefault();
  
    if(campos.pregunta && campos.respuesta){
    formulario.submit();
    }else{
      
      validarCampo(pregunta, 'pregunta');
      validarCampo(respuesta, 'respuesta');
      swal({
        title: "¡Uy!",
        text: "¡Algo salio mal!",
        icon: "error",
        button: "OK!",
        dangerMode: true,
      });
    }
  
  });
  
  /*-------------------------------------------------*/
  /*---------------- END Forms Perzonalizados-------------*/
  /*-------------------------------------------------*/
  
  function valida(){
   
    if(pregunta.value.length>0){
      pregunta.focus();
    }
    if(respuesta.value.length>0){
      respuesta.focus();
    }
    pregunta.focus();
  }
  valida();
  
  });