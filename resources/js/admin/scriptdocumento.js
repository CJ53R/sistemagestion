$(document).ready(function () {
  
    /*-------------------------------------------------*/
    /*----------------Forms Perzonalizados-------------*/
    /*-------------------------------------------------*/
    /*-------------------------------------------------*/
    /*----------------Expresiones validas-------------*/
    /*-------------------------------------------------*/
    
    const expresiones = {
        nombre: /[A-Za-z0-9'\.\-\s\,]{1,50}$/,
    }
    
    
    const campos ={
        nombre: false, 
        nivel: false, 
        file: false
    }
    const formulario = document.getElementById('formulario');
    const nombre= document.getElementById('nombre');
    const file= document.getElementById('file');
    
   
    const inputs = document.querySelectorAll('#formulario input');
  



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
          case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
          break;
        case "file":
            validarCampo(expresiones.nombre, e.target, 'file');
        break;
          
        }
      }
      input.addEventListener('keyup', validarFormulario);
      input.addEventListener('blur', validarFormulario);
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

    
    formulario.addEventListener('submit', (e) => {
      e.preventDefault();
    
      if(campos.nombre && campos.file){
      formulario.submit();
      }else{
        
        validarCampo(expresiones.nombre, nombre, 'nombre');
        validarCampo(expresiones.nombre, file, 'file');
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
     
      if(nombre.value.length>0){
        nombre.focus();
      }
      if(file.value.length>0){
        file.focus();
      }
      nombre.focus();
    }
    valida();
    








 



    });


