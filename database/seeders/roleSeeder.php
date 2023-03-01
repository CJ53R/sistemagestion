<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /************************************************************************************************************************************************************/
        /**********************************************************************ROLES POR DEFECTO*********************************************************************/
        /************************************************************************************************************************************************************/
        $Role1 = Role::create(['name'=>'Administrador']);
        $Role2 = Role::create(['name'=>'Alumno']);
        $Role3 = Role::create(['name'=>'Director']);
        $Role4 = Role::create(['name'=>'Docente']);
        $Role5 = Role::create(['name'=>'Auxiliar de Educación']);
        $Role6 = Role::create(['name'=>'Oficinista']);
        $Role7 = Role::create(['name'=>'Auxiliar de Biblioteca']);
        $Role8 = Role::create(['name'=>'Auxiliar de Laboratorio']);
        $Role9 = Role::create(['name'=>'Personal de Servicio']);
        $Role10 = Role::create(['name'=>'Sub Director']);
        $Role11 = Role::create(['name'=>'Coordinador Pedagógico']);
        $Role12 = Role::create(['name'=>'Coordinador de TOE']);
        $Role13 = Role::create(['name'=>'Jefe de Laboratorio de Biología']);
        $Role14 = Role::create(['name'=>'Jefe de Laboratorio de Química']);
        $Role15 = Role::create(['name'=>'Jefe de Laboratorio de Física']);
        $Role16 = Role::create(['name'=>'Jefe de Taller']);


        /************************************************************************************************************************************************************/
        /************************************************************************************************************************************************************/
        /******************************************************************PERMISOS DE ADMINISTRADOR*****************************************************************/
        /************************************************************************************************************************************************************/
        /************************************************************************************************************************************************************/

        /***********************************************************************HOME TRABAJADOR**********************************************************************/

        Permission::create(['name' => 'admin.perfil.index', 'descripcion' =>'Acceso a Home Trabajador'])->syncRoles([$Role1,$Role4]);
        
        /*******************************************************************EDITAR PERFIL TRABAJADOR*****************************************************************/

        Permission::create(['name' => 'admin.perfil.edit', 'descripcion' =>'Formulario Editar Perfil Trabajador'])->syncRoles([$Role1,$Role4]);
        Permission::create(['name' => 'admin.perfil.update', 'descripcion' =>'Botón de Editar Perfil Trabajador'])->syncRoles([$Role1,$Role4]);

        /*********************************************************************FOTO DE TRABAJADOR*******************************************************************/

        Permission::create(['name' => 'user.avatar.index', 'descripcion' =>'Formulario Subir Foto Trabajador'])->syncRoles([$Role1,$Role4]);
        Permission::create(['name' => 'user.avatar.store', 'descripcion' =>'Botón Subir Foto Trabajador'])->syncRoles([$Role1,$Role4]);
        Permission::create(['name' => 'user.avatar.destroy', 'descripcion' =>'Botón Eliminar Foto Trabajador'])->syncRoles([$Role1,$Role4]);

        /************************************************************CAMBIO DE CONTRASEÑA TRABAJADOR*****************************************************************/

        Permission::create(['name' => 'user.password.index', 'descripcion' =>'Formulario Cambio de Contraseña Trabajador'])->syncRoles([$Role1,$Role4]);
        Permission::create(['name' => 'user.password.update', 'descripcion' =>'Botón Cambiar Contraseña Trabajador'])->syncRoles([$Role1,$Role4]);

        



        
        /************************************************************************************************************************************************************/
        /*****************************************************************ADMINISTRACION TRABAJADOR******************************************************************/
        /************************************************************************************************************************************************************/

        /*******************************************************************CREAR TRABAJADOR*************************************************************************/

        Permission::create(['name' => 'admin.trabajador.create', 'descripcion' =>'Formulario Crear Trabajador'])->assignRole($Role1);
        Permission::create(['name' => 'admin.trabajador.store', 'descripcion' =>'Botón Crear Trabajador'])->assignRole($Role1);

        /*************************************************************MOSTRAR TODOS LOS TRABAJADORES******************************************************************/

        Permission::create(['name' => 'admin.trabajador.showTrabajadorList', 'descripcion' =>'Ver Trabajadores Registrados'])->assignRole($Role1);
        Permission::create(['name' => 'admin.trabajador.showDataTrabajadorList', 'descripcion' =>'Obtener Datos Para la Tabla Trabajadores Registrados'])->assignRole($Role1);

        /********************************************************************EDITAR TRABAJADOR************************************************************************/

        Permission::create(['name' => 'admin.trabajador.edit', 'descripcion' =>'Formulario Editar Trabajador'])->assignRole($Role1);
        Permission::create(['name' => 'admin.trabajador.update', 'descripcion' =>'Botón Editar Trabajador'])->assignRole($Role1);

        /*******************************************************************ELIMINAR TRABAJADOR***********************************************************************/

        Permission::create(['name' => 'admin.trabajador.destroy', 'descripcion' =>'Botón Eliminiar Trabajador'])->assignRole($Role1);

        /******************************************************************MOSTRAR TRABAJADOR DETALLE********************************************************************/

        Permission::create(['name' => 'admin.trabajador.show', 'descripcion' =>'Botón Mostrar Trabajador Detalle'])->assignRole($Role1);




        /************************************************************************************************************************************************************/
        /*****************************************************************ADMINISTRACION PREGUNTAS FRECUENTES******************************************************************/
        /************************************************************************************************************************************************************/

        /*******************************************************************CREAR PREGUNTAS FRECUENTES*************************************************************************/

        Permission::create(['name' => 'admin.pregunta.create', 'descripcion' =>'Formulario Crear Pregunta Frecuente'])->assignRole($Role1);
        Permission::create(['name' => 'admin.pregunta.store', 'descripcion' =>'Botón Crear Pregunta Frecuente'])->assignRole($Role1);

        /*************************************************************MOSTRAR TODAS LAS PREGUNTAS FRECUENTES******************************************************************/

        Permission::create(['name' => 'admin.pregunta.index', 'descripcion' =>'Ver Preguntas Frecuentes Registradas'])->assignRole($Role1);
        Permission::create(['name' => 'admin.pregunta.showDataPreguntaList', 'descripcion' =>'Obtener Datos Para la Tabla Preguntas Frecuentes Registradas'])->assignRole($Role1);

        /********************************************************************EDITAR PREGUNTAS FRECUENTES************************************************************************/

        Permission::create(['name' => 'admin.pregunta.edit', 'descripcion' =>'Formulario Editar Pregunta Frecuente'])->assignRole($Role1);
        Permission::create(['name' => 'admin.pregunta.update', 'descripcion' =>'Botón Editar Pregunta Frecuente'])->assignRole($Role1);

        /*******************************************************************ELIMINAR PREGUNTAS FRECUENTES***********************************************************************/

        Permission::create(['name' => 'admin.pregunta.destroy', 'descripcion' =>'Botón Eliminiar Pregunta Frecuente'])->assignRole($Role1);


        /************************************************************************************************************************************************************/
        /*****************************************************************ADMINISTRACION HORARIOS******************************************************************/
        /************************************************************************************************************************************************************/

        /*******************************************************************CREAR HORARIOS*************************************************************************/

        Permission::create(['name' => 'admin.anioescolar.create', 'descripcion' =>'Formulario Crear Horario'])->assignRole($Role1);
        Permission::create(['name' => 'admin.anioescolar.store', 'descripcion' =>'Botón Crear Horario'])->assignRole($Role1);

        /*************************************************************MOSTRAR TODAS LAS HORARIOS******************************************************************/

        Permission::create(['name' => 'admin.anioescolar.index', 'descripcion' =>'Ver Horarios Registrados'])->assignRole($Role1);
        Permission::create(['name' => 'admin.anioescolar.showDataAnioescolarList', 'descripcion' =>'Obtener Datos Para la Tabla Horarios Registrados'])->assignRole($Role1);

        /********************************************************************EDITAR HORARIOS************************************************************************/

        Permission::create(['name' => 'admin.anioescolar.edit', 'descripcion' =>'Formulario Editar Horario'])->assignRole($Role1);
        Permission::create(['name' => 'admin.anioescolar.update', 'descripcion' =>'Botón Editar Horario'])->assignRole($Role1);

        /*******************************************************************ELIMINAR HORARIOS***********************************************************************/

        Permission::create(['name' => 'admin.anioescolar.destroy', 'descripcion' =>'Botón Eliminiar Horario'])->assignRole($Role1);



        /************************************************************************************************************************************************************/
        /*****************************************************************ADMINISTRACION DOCUMENTOS******************************************************************/
        /************************************************************************************************************************************************************/

        /*******************************************************************CREAR DOCUMENTO*************************************************************************/

        Permission::create(['name' => 'admin.documento.create', 'descripcion' =>'Formulario Crear Documento'])->assignRole($Role1);
        Permission::create(['name' => 'admin.documento.store', 'descripcion' =>'Botón Crear Documento'])->assignRole($Role1);

        /*************************************************************MOSTRAR TODOS LOS DOCUMENTOS******************************************************************/

        Permission::create(['name' => 'admin.documento.index', 'descripcion' =>'Ver Documentos Registrados'])->assignRole($Role1);
        Permission::create(['name' => 'admin.documento.showDataDocumentoList', 'descripcion' =>'Obtener Datos Para la Tabla Documentos Registrados'])->assignRole($Role1);

        /********************************************************************EDITAR DOCUMENTO************************************************************************/

        Permission::create(['name' => 'admin.documento.edit', 'descripcion' =>'Formulario Editar Documento'])->assignRole($Role1);
        Permission::create(['name' => 'admin.documento.update', 'descripcion' =>'Botón Editar Documento'])->assignRole($Role1);

        /*******************************************************************ELIMINAR DOCUMENTO***********************************************************************/

        Permission::create(['name' => 'admin.documento.destroy', 'descripcion' =>'Botón Eliminiar Documento'])->assignRole($Role1);

        

        /************************************************************************************************************************************************************/
        /*****************************************************************ADMINISTRACION PARTE DE COVID******************************************************************/
        /************************************************************************************************************************************************************/

        /*******************************************************************SUBIR PDF DE PROTOCOLO DE COVID*************************************************************************/

        Permission::create(['name' => 'admin.covid.index', 'descripcion' =>'Formulario Subir Protocolo COVID'])->assignRole($Role1);
        Permission::create(['name' => 'admin.covid.subirpdf', 'descripcion' =>'Botón Subir Protocolo COVID'])->assignRole($Role1);




        /************************************************************************************************************************************************************/
        /*****************************************************************ADMINISTRACION IMAGENES DE PORTADA******************************************************************/
        /************************************************************************************************************************************************************/

        Permission::create(['name' => 'admin.portada.portada', 'descripcion' =>'Formulario Subir Imagenes de Portada'])->assignRole($Role1);
        Permission::create(['name' => 'admin.portada.storeportada', 'descripcion' =>'Botón Subir Imagenes de Portada'])->assignRole($Role1);
        Permission::create(['name' => 'admin.portada.destroy', 'descripcion' =>'Botón Eliminar Imagenes de Portada'])->assignRole($Role1);


        /************************************************************************************************************************************************************/
        /*****************************************************************ADMINISTRACION IMAGENES DE INFRAESTRUCTURA******************************************************************/
        /************************************************************************************************************************************************************/

        Permission::create(['name' => 'admin.infraestructura.infraestructura', 'descripcion' =>'Formulario Subir Imagenes de Infraestructura'])->assignRole($Role1);
        Permission::create(['name' => 'admin.infraestructura.storeinfraestructura', 'descripcion' =>'Botón Subir Imagenes de Infraestructura'])->assignRole($Role1);
        Permission::create(['name' => 'admin.infraestructura.destroy', 'descripcion' =>'Botón Eliminar Imagenes de Infraestructura'])->assignRole($Role1);



        /************************************************************************************************************************************************************/
        /*****************************************************************ADMINISTRACION DIV MATRÍCULA******************************************************************/
        /************************************************************************************************************************************************************/

        Permission::create(['name' => 'admin.matricula.activa', 'descripcion' =>'Formulario Activar DIV Matrícula'])->assignRole($Role1);
        Permission::create(['name' => 'admin.updatediv.matricula', 'descripcion' =>'Botón de Editar DIV Matrícula'])->assignRole($Role1);


        /************************************************************************************************************************************************************/
        /*****************************************************************ADMINISTRACION AVISO******************************************************************/
        /************************************************************************************************************************************************************/

        Permission::create(['name' => 'admin.aviso.activa', 'descripcion' =>'Formulario Activar Aviso'])->assignRole($Role1);
        Permission::create(['name' => 'admin.updateaviso.aviso', 'descripcion' =>'Botón Activar Aviso'])->assignRole($Role1);
        Permission::create(['name' => 'admin.updateaviso.avisoimg', 'descripcion' =>'Botón Subir Imagen de Aviso'])->assignRole($Role1);





        /************************************************************************************************************************************************************/
        /*****************************************************************ADMINISTRACION IMAGENES DE PAGINA******************************************************************/
        /************************************************************************************************************************************************************/


        /******************************************************************MOSTRAR LISTA DE PARTES DE PAGINA********************************************************************/

        Permission::create(['name' => 'admin.imagenp.index', 'descripcion' =>'Ver Partes de Páginas Registradas'])->assignRole($Role1);
        Permission::create(['name' => 'admin.imagenp.showDataImagenpList', 'descripcion' =>'Obtener Datos Para la Tabla Partes de Páginas Registradas'])->assignRole($Role1);


        /******************************************************************EDITAR IMAGENES DE PAGINA********************************************************************/

        Permission::create(['name' => 'admin.imagenp.edit', 'descripcion' =>'Formulario Editar Imagen de Página'])->assignRole($Role1);
        Permission::create(['name' => 'admin.imagenp.update', 'descripcion' =>'Botón Editar Imagen de Página'])->assignRole($Role1);


        /******************************************************************CREAR MÁS IMAGENES DE PÁGINA********************************************************************/

        Permission::create(['name' => 'admin.moreimagen.create', 'descripcion' =>'Formulario Subir Más Imagenes de Página'])->assignRole($Role1);
        Permission::create(['name' => 'admin.moreimagen.update', 'descripcion' =>'Botón Subir Más Imagenes de Página'])->assignRole($Role1);
        Permission::create(['name' => 'admin.moreimagen.destroy', 'descripcion' =>'Botón Eliminar Imagenes de Página'])->assignRole($Role1);






        /************************************************************************************************************************************************************/
        /*****************************************************************ADMINISTRACION NOTICIAS******************************************************************/
        /************************************************************************************************************************************************************/

        /*******************************************************************CREAR NOTICIA*************************************************************************/

        Permission::create(['name' => 'admin.noticia.create', 'descripcion' =>'Formulario Crear Noticia'])->assignRole($Role1);
        Permission::create(['name' => 'admin.noticia.store', 'descripcion' =>'Botón Crear Noticia'])->assignRole($Role1);

        /*************************************************************MOSTRAR TODAS LAS NOTICIAS******************************************************************/

        Permission::create(['name' => 'admin.noticia.index', 'descripcion' =>'Ver Documentos Registrados'])->assignRole($Role1);
        Permission::create(['name' => 'admin.noticia.showDataNoticiaList', 'descripcion' =>'Obtener Datos Para la Tabla Noticias Registradas'])->assignRole($Role1);

        /********************************************************************EDITAR NOTICIA************************************************************************/

        Permission::create(['name' => 'admin.noticia.edit', 'descripcion' =>'Formulario Editar Noticia'])->assignRole($Role1);
        Permission::create(['name' => 'admin.noticia.update', 'descripcion' =>'Botón Editar Noticia'])->assignRole($Role1);

        /*******************************************************************ELIMINAR NOTICIA***********************************************************************/

        Permission::create(['name' => 'admin.noticia.destroy', 'descripcion' =>'Botón Eliminiar Noticia'])->assignRole($Role1);

        /*******************************************************************ELIMINAR IMAGEN DE NOTICIA***********************************************************************/

        Permission::create(['name' => 'admin.imagennoticia.destroy', 'descripcion' =>'Botón Eliminiar Imagen de Noticia'])->assignRole($Role1);

    }

}
