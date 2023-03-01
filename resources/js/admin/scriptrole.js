$(document).ready(function () {
  
  /*-------------------------------------------------*/
  /*----------------Forms Perzonalizados-------------*/
  /*-------------------------------------------------*/
  /*-------------------------------------------------*/
  /*----------------Expresiones validas-------------*/
  /*-------------------------------------------------*/
  
  const expresiones = {
      name: /^[A-Za-z0-9'\.\-\s\,]{1,50}$/
  }
  
  
  const campos ={
      name: false
  }
  
  const name= document.getElementById('name');
  
 
    name.onfocus = ()=>{
      name.previousElementSibling.classList.add('top');
      name.previousElementSibling.classList.add('focus');
      name.parentNode.classList.add('focus');
      name.classList.add('focus');
    }
    name.onblur = ()=>{
      name.value= name.value.trim();
      if(name.value.trim().length==0){
        name.previousElementSibling.classList.remove('top');
        name.previousElementSibling.classList.remove('focus');
        name.parentNode.classList.remove('focus');
        name.classList.remove('focus');
      }
    }
  
    const validarFormulario = (e) => {
      switch (e.target.name){
        case "name": 
          validarCampo(expresiones.name, e.target, 'name');
        break;
      }
    }
    name.addEventListener('keyup', validarFormulario);
    name.addEventListener('blur', validarFormulario);
 
  
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
  
  
  formulario.addEventListener('submit', (e) => {
    e.preventDefault();
  
    if(campos.name){
    formulario.submit();
    }else{
      
      validarCampo(expresiones.name, name, 'name');
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
   
    if(name.value.length>0){
      name.focus();
    }
    name.focus();
  }
  valida();
  
  });