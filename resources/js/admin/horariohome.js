$(document).ready(function () {
  
    /*-------------------------------------------------*/
    /*----------------Forms Perzonalizados-------------*/
    /*-------------------------------------------------*/
    /*-------------------------------------------------*/
    /*----------------Expresiones validas-------------*/
    /*-------------------------------------------------*/
    
    const expresiones = {
        nombre: /^[A-Za-z0-9'\.\-\W\,]{1,50}$/,
        file: /[A-Za-z0-9'\.\-\W\,]{1,50}$/,
    }
    
    
    const campos ={
        nombre: false, 
        nivel: false, 
        file: false
    }
    
    const nombre= document.getElementById('nombre');
    const nivel= document.getElementById('nivel');
    const file= document.getElementById('file');
    
   
    const inputs = document.querySelectorAll('#formulario input');
    const selects = document.querySelectorAll('#formulario select');
  

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
            case "nivel": 
            validarCampoSelect( e.target, 'nivel');
            break;
          }
        }
        select.addEventListener('change', validarFormulario);
      });


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
            validarCampo(expresiones.file, e.target, 'file');
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
    
      if(campos.nombre && campos.nivel && campos.file){
      formulario.submit();
      }else{
        
        validarCampo(expresiones.nombre, nombre, 'nombre');
        validarCampoSelect(nivel, 'nivel');
        validarCampo(expresiones.file, file, 'file');
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
      if(nivel.value!=0){
        nivel.focus();
        validarCampoSelect(nivel, 'nivel');
      }
      if(file.value.length>0){
        file.focus();
      }
      nombre.focus();
    }
    valida();
    








 



    $('input[type="file"]').on('change', function(){
        var ext = $( this ).val().split('.').pop();
        if ($( this ).val() != '') {
          if(ext == "pdf"){
            
          }
          else
          {
            $( this ).val('');
          }
        }
      });
    });


