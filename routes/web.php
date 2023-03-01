<?php

use App\Http\Controllers\admin\anioescolarController;
use App\Http\Controllers\admin\covidadController;
use App\Http\Controllers\admin\documentoadController;
use App\Http\Controllers\admin\imagennoticiaController;
use App\Http\Controllers\admin\imagenpagController;
use App\Http\Controllers\admin\infraestructuraController;
use App\Http\Controllers\admin\noticiaController;
use App\Http\Controllers\admin\paginaController;
use App\Http\Controllers\admin\perfilController;
use App\Http\Controllers\admin\preguntaController;
use App\Http\Controllers\admin\trabajadorController;
use App\Http\Controllers\avatar\avatarController;
use App\Http\Controllers\home\comiteController;
use App\Http\Controllers\home\covidController;
use App\Http\Controllers\home\documentoController;
use App\Http\Controllers\home\equipodirectivoController;
use App\Http\Controllers\home\equipojerarquicoController;
use App\Http\Controllers\home\inicioController;
use App\Http\Controllers\home\nosotrosController;
use App\Http\Controllers\home\vhorariosController;
use App\Http\Controllers\password\passwordController;
use App\Http\Controllers\session\sessionController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/******************************************************************************************************************************************/
/******************************************************************************************************************************************/
/*********************************************                   INICIO                   *************************************************/
/******************************************************************************************************************************************/
/******************************************************************************************************************************************/

/****************************************************************INICIO********************************************************************/
Route::get('/', [inicioController::class, 'index'])->name('index');
Route::get('/preguntas-frecuentes', [inicioController::class, 'preguntas'])->name('home.preguntas');


/****************************************************************Nosotros********************************************************************/

Route::get('/nosotros', [nosotrosController::class, 'nosotros'])->name('home.nosotros.nosotros');
Route::get('/nuestra-historia', [nosotrosController::class, 'index'])->name('home.nosotros.historia');
Route::get('/himno', [nosotrosController::class, 'himno'])->name('home.nosotros.himno');
Route::get('/docentes', [nosotrosController::class, 'docentes'])->name('home.nosotros.docentes');
Route::get('/auxiliares', [nosotrosController::class, 'auxiliares'])->name('home.nosotros.auxiliares');
Route::get('/personal-administrativo', [nosotrosController::class, 'personaladministrativo'])->name('home.nosotros.personaladministrativo');
Route::get('/infraestructura', [nosotrosController::class, 'infraestructura'])->name('home.nosotros.infraestructura');

/****************************************************************Equipo Directivo********************************************************************/

Route::get('/director', [equipodirectivoController::class, 'director'])->name('home.equipodirectivo.director');
Route::get('/subdireccion-primaria', [equipodirectivoController::class, 'sdirectorp'])->name('home.equipodirectivo.sdirectorp');
Route::get('/subdireccion-secundaria', [equipodirectivoController::class, 'sdirectors'])->name('home.equipodirectivo.sdirectors');

/****************************************************************Equipo Jerárquico********************************************************************/

Route::get('/coordinador-pedagogico', [equipojerarquicoController::class, 'coordinadorpedagogico'])->name('home.equipojerarquico.coordinadorpedagogico');
Route::get('/coordinador-tutoria-y-orientacion-educativa', [equipojerarquicoController::class, 'coordinadortoe'])->name('home.equipojerarquico.coordinadortoe');
Route::get('/jefe-laboratorio', [equipojerarquicoController::class, 'jefelaboratorio'])->name('home.equipojerarquico.jefelaboratorio');
Route::get('/jefe-taller', [equipojerarquicoController::class, 'jefetaller'])->name('home.equipojerarquico.jefetaller');

/****************************************************************Comites********************************************************************/

Route::get('/comite-gestion-bienestar', [comiteController::class, 'comitegb'])->name('home.comite.comitegb');
Route::get('/comite-gestion-de-condiciones-operativas', [comiteController::class, 'comitegco'])->name('home.comite.comitegco');
Route::get('/comite-gestion-pedagocica', [comiteController::class, 'comitegp'])->name('home.comite.comitegp');

/****************************************************************Covid********************************************************************/

Route::get('/orientaciones-covid-19', [covidController::class, 'covid'])->name('home.covid.covid');


/****************************************************************Horarios********************************************************************/

Route::get('/documentos', [documentoController::class, 'documento'])->name('home.documento.documento');

/****************************************************************Horarios********************************************************************/

Route::get('/horarios', [vhorariosController::class, 'horario'])->name('home.periodo.horario');

/****************************************************************VER NOTICIA DETALLE********************************************************************/

Route::get('/noticia/{noticia}/show', [noticiaController::class, 'show'])->name('noticia.show');


/****************************************************************VER TODAS LAS NOTICIAS********************************************************************/

Route::get('/noticia/todas-las-noticias', [paginaController::class, 'allnews'])->name('home.noticia.show');











/****************************************************************LOGUEO********************************************************************/

Route::POST('/login', [SessionController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionController::class, 'destroy'])->name('login.destroy');












/******************************************************************************************************************************************/
/******************************************************************************************************************************************/
/************************************                       PERFIL TRABAJADOR                       ***************************************/
/******************************************************************************************************************************************/
/******************************************************************************************************************************************/

/************************************************************HOME TRABAJADOR***************************************************************/

Route::get('admin/{user}', [perfilController::class, 'index'])->middleware('can:admin.perfil.index')->name('admin.perfil.index');

/********************************************************EDITAR DATOS TRABAJADOR***********************************************************/

Route::get('admin/perfil/{user}/edit', [perfilController::class, 'edit'])->middleware('can:admin.perfil.edit')->name('admin.perfil.edit');
Route::put('admin/perfil/{user}', [perfilController::class, 'update'])->middleware('can:admin.perfil.update')->name('admin.perfil.update');

/**********************************************************FOTO DE TRABAJADOR*************************************************************/

Route::get('/user/avatar/{user}', [avatarController::class, 'index'])->middleware('can:user.avatar.index')->name('user.avatar.index');
Route::post('avatar/{user}', [avatarController::class, 'store'])->middleware('can:user.avatar.store')->name('user.avatar.store');
Route::delete('avatar/{user}', [avatarController::class, 'destroy'])->middleware('can:user.avatar.destroy')->name('user.avatar.destroy');

/*******************************************************CONTRASEÑA DE TRABAJADOR**********************************************************/

Route::get('/user/password/{user}', [passwordController::class, 'index'])->middleware('can:user.password.index')->name('user.password.index');
Route::put('password/{user}', [passwordController::class, 'update'])->middleware('can:user.password.update')->name('user.password.update');


















/******************************************************************************************************************************************/
/******************************************************************************************************************************************/
/*********************************                     ADMINISTRACION TRABAJADOR                     **************************************/
/******************************************************************************************************************************************/
/******************************************************************************************************************************************/

/***********************************************************CREAR TRABAJADOR***************************************************************/

Route::get('admin/trabajador/register', [trabajadorController::class, 'create'])->middleware('can:admin.trabajador.create')->name('admin.trabajador.create');
Route::post('admin/trabajador', [trabajadorController::class, 'store'])->middleware('can:admin.trabajador.store')->name('admin.trabajador.store');

/*****************************************************MOSTRAR LISTA DE TRABAJADORES********************************************************/

Route::get('admin/trabajador/list', [trabajadorController::class, 'showTrabajadorList'])->middleware('can:admin.trabajador.showTrabajadorList')->name('admin.trabajador.showTrabajadorList');
Route::get('trabajador/datatable', [trabajadorController::class, 'showDataTrabajadorList'])->middleware('can:admin.trabajador.showDataTrabajadorList')->name('admin.trabajador.showDataTrabajadorList');

/**********************************************************EDITAR TRABAJADOR***************************************************************/

Route::get('admin/trabajador/{trabajador}/edit', [trabajadorController::class, 'edit'])->middleware('can:admin.trabajador.edit')->name('admin.trabajador.edit');
Route::put('admin/trabajador/{trabajador}', [trabajadorController::class, 'update'])->middleware('can:admin.trabajador.update')->name('admin.trabajador.update');
Route::put('passwordad/{user}', [passwordController::class, 'updatead'])->middleware('can:user.password.update')->name('user.passwordad.update');

/**********************************************************ELIMINAR TRABAJADOR***************************************************************/

Route::delete('admin/trabajador/{trabajador}', [trabajadorController::class, 'destroy'])->middleware('can:admin.trabajador.destroy')->name('admin.trabajador.destroy');

/*******************************************************MOSTRAR TRABAJADOR DETALLE************************************************************/

Route::get('admin/trabajador/data/{trabajador}', [trabajadorController::class, 'show'])->middleware('can:admin.trabajador.show')->name('admin.trabajador.show');



/******************************************************************************************************************************************/
/******************************************************************************************************************************************/
/*********************************                     ADMINISTRACION PREGUNTA                     **************************************/
/******************************************************************************************************************************************/
/******************************************************************************************************************************************/

/***********************************************************CREAR PREGUNTA***************************************************************/

Route::get('admin/pregunta/register', [preguntaController::class, 'create'])->middleware('can:admin.pregunta.create')->name('admin.pregunta.create');
Route::post('admin/pregunta', [preguntaController::class, 'store'])->middleware('can:admin.pregunta.store')->name('admin.pregunta.store');

/*****************************************************MOSTRAR LISTA DE PREGUNTAS********************************************************/

Route::get('admin/pregunta/list', [preguntaController::class, 'index'])->middleware('can:admin.pregunta.index')->name('admin.pregunta.index');
Route::get('pregunta/datatable', [preguntaController::class, 'showDataPreguntaList'])->middleware('can:admin.pregunta.showDataPreguntaList')->name('admin.pregunta.showDataPreguntaList');

/**********************************************************EDITAR PREGUNTA***************************************************************/

Route::get('admin/pregunta/{pregunta}/edit', [preguntaController::class, 'edit'])->middleware('can:admin.pregunta.edit')->name('admin.pregunta.edit');
Route::put('admin/pregunta/{pregunta}', [preguntaController::class, 'update'])->middleware('can:admin.pregunta.update')->name('admin.pregunta.update');

/**********************************************************ELIMINAR PREGUNTA***************************************************************/

Route::delete('admin/pregunta/{pregunta}', [preguntaController::class, 'destroy'])->middleware('can:admin.pregunta.destroy')->name('admin.pregunta.destroy');







/******************************************************************************************************************************************/
/******************************************************************************************************************************************/
/************************************                     ADMINISTRACION DE HORARIOS                  *****************************************/
/******************************************************************************************************************************************/
/******************************************************************************************************************************************/

/*******************************************************MOSTRAR TODOS LAS HORARIOS***********************************************************/

Route::get('admin/anioescolar-horario/list', [anioescolarController::class, 'index'])->middleware('can:admin.anioescolar.index')->name('admin.anioescolar.index');
Route::get('anioescolar-horario/datatable', [anioescolarController::class, 'showDataAnioescolarList'])->middleware('can:admin.anioescolar.showDataAnioescolarList')->name('admin.anioescolar.showDataAnioescolarList');

/****************************************************************CREAR HORARIO******************************************************************/

Route::get('admin/anioescolar-horario/register', [anioescolarController::class, 'create'])->middleware('can:admin.anioescolar.create')->name('admin.anioescolar.create');
Route::post('admin/anioescolar-horario', [anioescolarController::class, 'store'])->middleware('can:admin.anioescolar.store')->name('admin.anioescolar.store');

/****************************************************************EDITAR HORARIO*****************************************************************/

Route::get('admin/anioescolar-horario/{anioescolar}/edit', [anioescolarController::class, 'edit'])->middleware('can:admin.anioescolar.edit')->name('admin.anioescolar.edit');
Route::put('admin/anioescolar-horario/{anioescolar}', [anioescolarController::class, 'update'])->middleware('can:admin.anioescolar.update')->name('admin.anioescolar.update');

/***************************************************************ELIMINAR HORARIO****************************************************************/

Route::delete('admin/anioescolar-horario/{anioescolar}', [anioescolarController::class, 'destroy'])->middleware('can:admin.anioescolar.destroy')->name('admin.anioescolar.destroy');



/******************************************************************************************************************************************/
/******************************************************************************************************************************************/
/************************************                     ADMINISTRACION DE DOCUMENTOS                  *****************************************/
/******************************************************************************************************************************************/
/******************************************************************************************************************************************/

/*******************************************************MOSTRAR TODOS LAS DOCUMENTOS***********************************************************/

Route::get('admin/documento/list', [documentoadController::class, 'index'])->middleware('can:admin.documento.index')->name('admin.documento.index');
Route::get('documento/datatable', [documentoadController::class, 'showDataDocumentoList'])->middleware('can:admin.documento.showDataDocumentoList')->name('admin.documento.showDataDocumentoList');

/****************************************************************CREAR HORARIO******************************************************************/

Route::get('admin/documento/register', [documentoadController::class, 'create'])->middleware('can:admin.documento.create')->name('admin.documento.create');
Route::post('admin/documento', [documentoadController::class, 'store'])->middleware('can:admin.documento.store')->name('admin.documento.store');

/****************************************************************EDITAR HORARIO*****************************************************************/

Route::get('admin/documento/{documento}/edit', [documentoadController::class, 'edit'])->middleware('can:admin.documento.edit')->name('admin.documento.edit');
Route::put('admin/documento/{documento}', [documentoadController::class, 'update'])->middleware('can:admin.documento.update')->name('admin.documento.update');

/***************************************************************ELIMINAR AULA****************************************************************/

Route::delete('admin/documento/{documento}', [documentoadController::class, 'destroy'])->middleware('can:admin.documento.destroy')->name('admin.documento.destroy');





/******************************************************************************************************************************************/
/******************************************************************************************************************************************/
/************************************                     ADMINISTRACION DE VISTA COVID                *****************************************/
/******************************************************************************************************************************************/
/******************************************************************************************************************************************/

/*******************************************************METODOS**********************************************************/

Route::get('admin/covid-19/edit', [covidadController::class, 'index'])->middleware('can:admin.covid.index')->name('admin.covid.index');

Route::put('admin/covid-19-pdf/{covid}', [covidadController::class, 'subirpdf'])->middleware('can:admin.covid.subirpdf')->name('admin.covid.subirpdf');






/******************************************************************************************************************************************/
/******************************************************************************************************************************************/
/***********************************                     ADMINISTRACION WEB                   ***************************************/
/******************************************************************************************************************************************/
/******************************************************************************************************************************************/

/*************************************************************ADMINISTRAR PORTADA****************************************************************/


Route::get('admin/portada/register', [paginaController::class, 'portada'])->middleware('can:admin.portada.portada')->name('admin.portada.portada');
Route::post('admin/portada', [paginaController::class, 'portadastore'])->middleware('can:admin.portada.storeportada')->name('admin.portada.storeportada');
Route::delete('admin/portada/{portada}', [paginaController::class, 'destroy'])->middleware('can:admin.portada.destroy')->name('admin.portada.destroy');


/*************************************************************ADMINISTRAR INFRAESTRUCTURA****************************************************************/


Route::get('admin/infraestructura/register', [infraestructuraController::class, 'infraestructura'])->middleware('can:admin.infraestructura.infraestructura')->name('admin.infraestructura.infraestructura');
Route::post('admin/infraestructura', [infraestructuraController::class, 'infraestructurastore'])->middleware('can:admin.infraestructura.storeinfraestructura')->name('admin.infraestructura.storeinfraestructura');
Route::delete('admin/infraestructura/{infraestructura}', [infraestructuraController::class, 'destroy'])->middleware('can:admin.infraestructura.destroy')->name('admin.infraestructura.destroy');


/*************************************************************ADMINISTRAR DIV MATRICULA****************************************************************/


Route::get('admin/div/matricula', [paginaController::class, 'activamatricula'])->middleware('can:admin.matricula.activa')->name('admin.matricula.activa');
Route::put('admin/div/{div}', [paginaController::class, 'updatediv'])->middleware('can:admin.updatediv.matricula')->name('admin.updatediv.matricula');


/*************************************************************ADMINISTRAR AVISO****************************************************************/


Route::get('admin/div/aviso', [paginaController::class, 'activaaviso'])->middleware('can:admin.aviso.activa')->name('admin.aviso.activa');
Route::put('admin/div-aviso/{div}', [paginaController::class, 'updateaviso'])->middleware('can:admin.updateaviso.aviso')->name('admin.updateaviso.aviso');
Route::put('admin/div-aviso/{div}/img', [paginaController::class, 'updateavisoimg'])->middleware('can:admin.updateaviso.avisoimg')->name('admin.updateaviso.avisoimg');




/*************************************************************ADMINISTRAR IMAGENES DE PAGINA****************************************************************/


/*****************************************************MOSTRAR LISTA PARTES DE LA PAGINA Y SUS IMAGENES********************************************************/

Route::get('admin/imagen-pagina/list', [imagenpagController::class, 'index'])->middleware('can:admin.imagenp.index')->name('admin.imagenp.index');
Route::get('imagen-pagina/datatable', [imagenpagController::class, 'showDataImagenpList'])->middleware('can:admin.imagenp.showDataImagenpList')->name('admin.imagenp.showDataImagenpList');


/**********************************************************EDITAR IMAGEN DE PAGINA***************************************************************/

Route::get('admin/imagen-pagina/{imagenpag}/edit', [imagenpagController::class, 'edit'])->middleware('can:admin.imagenp.edit')->name('admin.imagenp.edit');
Route::put('admin/imagen-pagina/{imagenpag}', [imagenpagController::class, 'update'])->middleware('can:admin.imagenp.update')->name('admin.imagenp.update');

/**********************************************************EDITAR MÁS IMAGENES DE PAGAINA***************************************************************/

Route::get('admin/more-imagenes/{imagenpag}/register', [imagenpagController::class, 'editmore'])->middleware('can:admin.moreimagen.create')->name('admin.moreimagen.create');
Route::put('admin/more-imagenes/{imagenpag}', [imagenpagController::class, 'masimagenesstore'])->middleware('can:admin.moreimagen.update')->name('admin.moreimagen.update');
Route::delete('admin/more-imagenes/{masimagenpag}', [imagenpagController::class, 'destroy'])->middleware('can:admin.moreimagen.destroy')->name('admin.moreimagen.destroy');






/******************************************************************************************************************************************/
/******************************************************************************************************************************************/
/************************************                     ADMINISTRACION DE NOTICIAS                *****************************************/
/******************************************************************************************************************************************/
/******************************************************************************************************************************************/

/*******************************************************MOSTRAR TODAS LAS NOTICIAS***********************************************************/

Route::get('admin/noticia/list', [noticiaController::class, 'index'])->middleware('can:admin.noticia.index')->name('admin.noticia.index');
Route::get('noticia/datatable', [noticiaController::class, 'showDataNoticiaList'])->middleware('can:admin.noticia.showDataNoticiaList')->name('admin.noticia.showDataNoticiaList');


/****************************************************************CREAR NOTICIA******************************************************************/

Route::get('admin/noticia/register', [noticiaController::class, 'create'])->middleware('can:admin.noticia.create')->name('admin.noticia.create');
Route::post('admin/noticia', [noticiaController::class, 'store'])->middleware('can:admin.noticia.store')->name('admin.noticia.store');

/****************************************************************EDITAR NOTICIA*****************************************************************/

Route::get('admin/noticia/{noticia}/edit', [noticiaController::class, 'edit'])->middleware('can:admin.noticia.edit')->name('admin.noticia.edit');
Route::put('admin/noticia/{noticia}', [noticiaController::class, 'update'])->middleware('can:admin.noticia.update')->name('admin.noticia.update');

/***************************************************************ELIMINAR NOTICIA****************************************************************/

Route::delete('admin/noticia/{noticia}', [noticiaController::class, 'destroy'])->middleware('can:admin.noticia.destroy')->name('admin.noticia.destroy');


/***************************************************************ELIMINAR IMAGEN NOTICIA****************************************************************/

Route::delete('admin/imagennoticia/{imagennoticia}', [imagennoticiaController::class, 'destroy'])->middleware('can:admin.imagennoticia.destroy')->name('admin.imagennoticia.destroy');


