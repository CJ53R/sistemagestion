

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
    direccion: /[A-Za-z0-9'\.\-\s\,]$/,
    codigo: /[A-Za-z0-9'\.\-\s\,]$/
}


const campos ={
    numdocumento: false, // 8 a 12 numeros.
	nombre: false, // Letras y espacios, pueden llevar acentos.
    apaterno: false, // Letras y espacios, pueden llevar acentos.
    amaterno: false, // Letras y espacios, pueden llevar acentos.
	email: false,
	telefono: false, // 9 a 9 numeros.
    fnacimiento: false,
    fregistro: false,
    direccion: false,
    tipodocumento:false,
    genero: false,
    estado: false,
    tipousuario: false,
    nivel: false,
    nivsec: false, 
    codigo: false
}
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const selects = document.querySelectorAll('#formulario select');
const numdocumento = document.getElementById('numdocumento');
const tipodocumento = document.getElementById('tipodocumento');
numdocumento.disabled=true;
const codigot = document.getElementById('codigo');
const nombres= document.getElementById('nombre');
const apaterno= document.getElementById('apaterno');
const amaterno= document.getElementById('amaterno');
const telefono= document.getElementById('telefono');
const direccion= document.getElementById('direccion');
const email= document.getElementById('email');
const fnacimiento= document.getElementById('fnacimiento');
const fregistro= document.getElementById('fregistro');
const genero = document.getElementById('genero');
const estado = document.getElementById('estado');
const tipousuario = document.getElementById('tipousuario');
const nivel = document.getElementById('nivel');
const nivsec = document.getElementById('nivsec');
const aleatorio= document.getElementById('aleatorio');


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
      case "tipodocumento": 
      validarCampoSelect( e.target, 'tipodocumento');
      if(select.value!=0){
        numdocumento.disabled=false;
        if(numdocumento.value.length!=0){
          var cod = tipodocumento.value;
          if(cod=='2'){
            validarCampo(expresiones.numdocumento2, numdocumento, 'numdocumento');
          }
          if(cod=='1'){
            validarCampo(expresiones.numdocumento, numdocumento, 'numdocumento');
          }
        }
        numdocumento.focus();
      }else{
        numdocumento.disabled=true;
      }
      break;
      case "genero": 
      validarCampoSelect( e.target, 'genero');
      break;
      case "estado": 
      validarCampoSelect( e.target, 'estado');
      break;
      case "tipousuario": 
      validarCampoSelect( e.target, 'tipousuario');
      break;
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
  input.onclick =()=>{
    if(input.name=='fnacimiento'){
      input.addEventListener('blur', validarFormulario);
    }
    if(input.name=='fregistro'){
      input.addEventListener('blur', validarFormulario);
    }
  }

  const validarFormulario = (e) => {
    var cod = tipodocumento.value;
    switch (e.target.name){
      case "codigo":
        validarCampo(expresiones.codigo, e.target, 'codigo');
      break;
      case "numdocumento": 
        validarSoloNumero(e.target);
        if(cod=='2'){
          validarCampo(expresiones.numdocumento2, e.target, 'numdocumento');
        }
        if(cod=='1'){
          validarCampo(expresiones.numdocumento, e.target, 'numdocumento');
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
      case "fregistro":
        validarCampoFec(expresiones.fecha, e.target, 'fregistro', today, minFe);
      break;
      case "nivsec":
        validarCampo(expresiones.direccion, e.target, 'nivsec');
      break;
    }
  }
  input.addEventListener('keyup', validarFormulario);
  input.addEventListener('blur', validarFormulario);
});

const validarCampo = (expresion, input, campo) =>{
  if(expresion.test(input.value)){
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

  if(campos.codigo && campos.tipodocumento && campos.numdocumento && campos.nombre && campos.apaterno && campos.amaterno && campos.genero && campos.fnacimiento
    && campos.fregistro && campos.estado && campos.tipodocumento){

      if((telefono.value.length>0 && campos.telefono==false)||(email.value.length>0 && campos.email==false)||(direccion.value.length>0 && campos.direccion==false)){
        swal({
          title: "¡Uy!",
          text: "¡Algo salio mal!",
          icon: "error",
          button: "OK!",
          dangerMode: true,
        });
      }else{
        if(tipousuario.value=='4' || tipousuario.value=='10'){
          if(campos.nivel){
            formulario.submit();
          }else{
            swal({
              title: "¡Uy!",
              text: "¡Algo salio mal!",
              icon: "error",
              button: "OK!",
              dangerMode: true,
            });
            validarCampoSelect( nivel, 'nivel');
            validarCampo(expresiones.direccion, nivsec, 'nivsec');
          }
        }else{
          formulario.submit();
        }
      }
  }else{
    validarCampoSelect(tipodocumento, 'tipodocumento');
    var cod = tipodocumento.value;
    if(cod=='1'){
      validarCampo(expresiones.numdocumento, numdocumento, 'numdocumento');
    }else
    if(cod=='2'){
      validarCampo(expresiones.numdocumento2, numdocumento, 'numdocumento');
    }
    
    validarCampo(expresiones.codigo, codigot, 'codigo');
    validarCampo(expresiones.nombre, nombres, 'nombre');
    validarCampo(expresiones.nombre, apaterno, 'apaterno');
    validarCampo(expresiones.nombre, amaterno, 'amaterno');
    validarCampoFec(expresiones.fecha, fnacimiento, 'fnacimiento', maxNac, minFe);
    validarCampoFec(expresiones.fecha, fregistro, 'fregistro', today, minFe);
    validarCampoSelect( genero, 'genero');
    validarCampoSelect( estado, 'estado');
    validarCampoSelect( tipousuario, 'tipousuario');
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


  


/**************************************************************** */
/*--------------Limitar Numero de Caracteres----------------------*/
/************************************************************** */
function LimitarDoc(){
  numdocumento.addEventListener('keypress', e =>{
    var cod = tipodocumento.value;
    if(cod=='2'){
      if (numdocumento.value.length>=12){
        e.preventDefault();
      }
    }
    if(cod=='1'){
      if (numdocumento.value.length>=8){
        e.preventDefault();
      }
    }
  });
}
const  Longitud = (campo, longitudMaxima) =>{
    campo.addEventListener('keypress', function(e){
      if (campo.value.length > (longitudMaxima - 1))
          e.preventDefault();
     });
}

LimitarDoc();
/**************************************************************** */
/*--------------------Validar Solo Numeros----------------------*/
/************************************************************** */
function soloNumeros(e){
  var key = e.charCode;
  return key >= 48 && key <= 57;
}

const validarSoloNumero = (input)=>{
   input.addEventListener('keypress', function(e){
    if(!soloNumeros(event)){
      e.preventDefault();
    }
   });
}
/**************************************************************** */
/*--------------------Validar Solo Letras----------------------*/
/************************************************************** */
function soloLetras(e){
  key = e.keyCode || e.which;
tecla = String.fromCharCode(key).toString();
letras = " ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú";

especiales = [8,13];
tecla_especial = false
for(var i in especiales) {
if(key == especiales[i]){
 tecla_especial = true;
 break;
}
}

if(letras.indexOf(tecla) == -1 && !tecla_especial)
{
 return false;
}else{
  return true;
}
}
const validarSoloLetra = (input)=>{
   input.addEventListener('keypress', function(e){
    if(!soloLetras(event)){
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

let maxNac = (yyyy-6)+"-07-31";

let minFe= (yyyy-50)+"-01-01";

fregistro.max = today;
fnacimiento.max =maxNac;
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



function valida(){
  if(codigot.value.length>0){
    codigot.focus();
  }
  if(tipodocumento.value!=0){
    numdocumento.disabled=false;
    tipodocumento.focus();
    if(numdocumento.value.length!=0){
      var cod = tipodocumento.value;
      validarCampoSelect(tipodocumento, 'tipodocumento');
      if(cod=='2'){
        validarCampo(expresiones.numdocumento2, numdocumento, 'numdocumento');
      }
      if(cod=='1'){
        validarCampo(expresiones.numdocumento, numdocumento, 'numdocumento');
      }
    }
    numdocumento.focus();
  }else{
    numdocumento.disabled=true;
  }
  if(nombres.value.length>0){
    nombres.focus();
  }
  if(apaterno.value.length>0){
    apaterno.focus();
  }
  if(amaterno.value.length>0){
    amaterno.focus();
  }
  if(genero.value!=0){
    genero.focus();
    validarCampoSelect( genero, 'genero');
  }
  if(fnacimiento.value.length>0){
    fnacimiento.focus();
  }
  if(telefono.value.length>0){
    telefono.focus();
  }
  if(direccion.value.length>0){
    direccion.focus();
  }
  if(email.value.length>0){
    email
    .focus();
  }
  if(estado.value!=0){
    estado.focus();
    validarCampoSelect( estado, 'estado');
  }
  if(tipousuario.value!=0){
    tipousuario.focus();
    validarCampoSelect( tipousuario, 'tipousuario');
  }
  if(fregistro.value.length>0){
    fregistro.focus();
  }
  if(nivel.value!=0){
    nivel.focus();
    validarCampoSelect( nivel, 'nivel');
  }
  if(nivsec.value.length>0){
    nivsec.focus();
  }
  numdocumento.focus();
}

valida();


tipousuario.addEventListener('change', function(){
  valtipousuario();
} );

function valtipousuario(){
  $("#dnivel").hide();
    $("#dnivsec").hide();
  if(tipousuario.value=='4'){
    $("#dnivel").show();
    $("#dnivsec").show();
    aleatorio.textContent="Grado y Sección a Cargo (Ejemplo: 1° - A, 2° - C,...) o curso que dicta";
  }
  if(tipousuario.value=='3'){
    $("#dnivel").hide();
    $("#dnivsec").show();
    aleatorio.textContent='Descripción de Colegiatura o Maestría';
  }
  if(tipousuario.value=='10'){
    $("#dnivel").show();
    $("#dnivsec").show();
    aleatorio.textContent="Área de Sub Dirección";
  }
  if(tipousuario.value=='11' || tipousuario.value=='12' || tipousuario.value=='13' || tipousuario.value=='14' || tipousuario.value=='15'){
    $("#dnivel").hide();
    $("#dnivsec").hide();
  }
  if(tipousuario.value=='16'){
    $("#dnivel").hide();
    $("#dnivsec").show();
    aleatorio.textContent='Área de Jefatura';
  }
}

valtipousuario();
});