$(document).ready(function () {
  
  /*-------------------------------------------------*/
  /*----------------Forms Perzonalizados-------------*/
  /*-------------------------------------------------*/
  /*-------------------------------------------------*/
  /*----------------Expresiones validas-------------*/
  /*-------------------------------------------------*/
  
  const expresiones = {
      titulo: /^[A-Za-z0-9'\.\-\W\,]{1,200}$/,
      short: /^[A-Za-z0-9'\.\-\W\,]{140,150}$/,
      large: /^[A-Za-z0-9'\.\-\W\,]{100,1450}$/,
      fecha: /^\d{2,4}\-\d{1,2}\-\d{1,2}$/
  }
  
  
  const campos ={
      titulo: false,
      fpublicacion: false,
      estado: false,
      shortdescripcion: false,
      largedescripcion:false
  }
  
  const titulo= document.getElementById('titulo');
  const fpublicacion= document.getElementById('fpublicacion');
  const estado= document.getElementById('estado');
  const shortdescripcion= document.getElementById('shortdescripcion');
  const largedescripcion= document.getElementById('largedescripcion');
  
 
  const inputs = document.querySelectorAll('#formulario input');
  const textareas = document.querySelectorAll('#formulario textarea');
  const selects = document.querySelectorAll('#formulario select');

  inputs.forEach( input =>{
    input.onfocus = ()=>{
      input.previousElementSibling.classList.add('top');
      input.previousElementSibling.classList.add('focus');
      input.parentNode.classList.add('focus');
      input.classList.add('focus');
    }
    input.onblur = ()=>{
      input.value= input.value.trim();
      if(input.value.trim().length==0){
        input.previousElementSibling.classList.remove('top');
        input.previousElementSibling.classList.remove('focus');
        input.parentNode.classList.remove('focus');
        input.classList.remove('focus');
      }
    }
  
    const validarFormulario = (e) => {
      switch (e.target.name){
        case "titulo":
          validarCampo(expresiones.titulo, e.target, 'titulo');
        break;
        case "fpublicacion":
        validarCampoFec(expresiones.fecha, e.target, 'fpublicacion', today, minFe);
        break;
      }
    }
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
  });
 
  textareas.forEach( textarea =>{
    textarea.onfocus = ()=>{
      textarea.previousElementSibling.classList.add('top');
      textarea.previousElementSibling.classList.add('focus');
      textarea.parentNode.classList.add('focus');
      textarea.classList.add('focus');
    }
    textarea.onblur = ()=>{
      textarea.value= textarea.value.trim();
      if(textarea.value.trim().length==0){
        textarea.previousElementSibling.classList.remove('top');
        textarea.previousElementSibling.classList.remove('focus');
        textarea.parentNode.classList.remove('focus');
        textarea.classList.remove('focus');
      }

      const validarFormulario = (e) => {
        switch (e.target.name){
          case "shortdescripcion":
              validarCampo(expresiones.short, e.target, 'shortdescripcion'); 
          break;

          case "largedescripcion":
            validarCampo(expresiones.large, e.target, 'largedescripcion');
          break;
        }
      }
      textarea.addEventListener('keyup', validarFormulario);
      textarea.addEventListener('keypress', validarFormulario);
      textarea.addEventListener('blur', validarFormulario);
    }});

    selects.forEach( select =>{
      select.onfocus = ()=>{
        select.previousElementSibling.classList.add('top');
        select.previousElementSibling.classList.add('focus');
        select.parentNode.classList.add('focus');
      }
      select.onblur = ()=>{
        select.value= select.value.trim();
        if(select.value.trim().length==0){
          select.previousElementSibling.classList.remove('top');
          select.previousElementSibling.classList.remove('focus');
          select.parentNode.classList.remove('focus');
        }
      }
      const validarFormulario = (e) => {
        switch (e.target.name){
          case "estado": 
          validarCampoSelect( e.target, 'estado');
          break;
        }
      }
      select.addEventListener('change', validarFormulario);
    });

  const validarCampo = (expresion, name, campo) =>{
    if(expresion.test(name.value)){
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
  
  const validarCampoSelect = (select, campo) =>{
    if(select.value!=0){
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

let minFe= (yyyy)+"-"+(mm)+"-01";

fpublicacion.max = today;
const validarCampoFec = (expresion, input, campo,maxF, minF) =>{
  if(expresion.test(input.value) && input.value<=maxF  && input.value>=minF){
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
  
    if(campos.titulo && campos.fpublicacion && campos.estado && campos.shortdescripcion && campos.largedescripcion){
    formulario.submit();
    }else{
      
      validarCampo(expresiones.titulo, titulo, 'titulo');
      validarCampoFec(expresiones.fecha, fpublicacion, 'fpublicacion', today, minFe);
      validarCampoSelect(estado, 'estado');
      validarCampo(expresiones.short, shortdescripcion, 'shortdescripcion');
      validarCampo(expresiones.large, largedescripcion, 'largedescripcion');
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
   shortdescripcion.focus();
   largedescripcion.focus();
    if(titulo.value.length>0){
      titulo.focus();
    }
    if(fpublicacion.value.length>0){
      fpublicacion.focus();
    }
    if(estado.value!=0){
      estado.focus();
      validarCampoSelect( estado, 'estado');
    }
    if(shortdescripcion.value.length>0){
      shortdescripcion.focus();
      validarCampo(expresiones.short, shortdescripcion, 'shortdescripcion');
    }
    if(largedescripcion.value.length>0){
      largedescripcion.focus();
      validarCampo(expresiones.large, largedescripcion, 'largedescripcion');
    }
    titulo.focus();
  }
  valida();
  
  });