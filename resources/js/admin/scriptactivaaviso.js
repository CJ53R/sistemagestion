

$(document).ready(function () {
  
  /*-------------------------------------------------*/
  /*----------------Forms Perzonalizados-------------*/
  /*-------------------------------------------------*/
  /*-------------------------------------------------*/
  /*----------------Expresiones validas-------------*/
  /*-------------------------------------------------*/
  

  const campos ={
      estado: false
  }
  const formulario = document.getElementById('formulario');
  const selects = document.querySelectorAll('#formulario select');
  const estado = document.getElementById('estado');
  
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


  
  formulario.addEventListener('submit', (e) => {
    e.preventDefault();
  
    if(campos.estado ){
          formulario.submit();
    }else{
      validarCampoSelect( estado, 'estado');
      swal({
        title: "¡Uy!",
        text: "¡Algo salio mal!",
        icon: "error",
        button: "OK!",
        dangerMode: true,
      });
    }
  
  });
  
  
  function valida(){
    if(estado.value!=0){
      estado.focus();
      validarCampoSelect( estado, 'estado');
    }
    estado.focus();
  }
  valida();
  
  });