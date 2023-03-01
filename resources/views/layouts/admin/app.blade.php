<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - IE Colegio La Libertad</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('../resources/css/styleadmi.css')}}">
    
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 

    @yield('css')

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" href="{{asset('../resources/img/escudo.png')}}">
   </head>
<body>
  <div class="sidebar close">
      <div class="logo-details">
        <img src="{{asset('../resources/img/escudo.png')}}" class="escudo" alt="">
        <span class="logo_name">IE Colegio La Libertad</span>
      </div>
      <header>
      <i class='bx bx-chevron-right toggle'></i>
      </header>

      @if (auth()->user()->tipousuario_id=='1')
      <div class="section-title">
        <div class="title fw-bold">
          ADMINISTRACIÓN ACADÉMICA
        </div>
        <hr>
      </div>
      @endif

      <ul class="nav-links">

        @canany(['admin.trabajador.create', 'admin.trabajador.showTrabajadorList'])
        <li class=" {{request()->routeIs('admin.trabajador.*') ? 'showMenu' : ''}}">
          <div class="iocn-link">
            <a href="#">
              <i class='fa-solid fa-users-rectangle {{request()->routeIs('admin.trabajador.*') ? 'active' : ''}}' ></i>
              <span class="link_name {{request()->routeIs('admin.trabajador.*') ? 'active' : ''}}">Gestión de Trabajadores</span>
            </a>
            <i class='fa fa-chevron-down arrow' ></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Trabajadores</a></li>
            @can('admin.trabajador.create')
            <li><a href="{{route('admin.trabajador.create')}}" class="{{request()->routeIs('admin.trabajador.create') ? 'active' : ''}}">Nuevo Trabajador</a></li>
            @endcan
            @can('admin.trabajador.showTrabajadorList')
            <li><a href="{{route('admin.trabajador.showTrabajadorList')}}" class="{{request()->routeIs('admin.trabajador.showTrabajadorList') ? 'active' : ''}}">Trabajadores Registrados</a></li>
            @endcan
          </ul>
        </li>
        @endcanany

        @canany(['admin.trabajador.create', 'admin.trabajador.showTrabajadorList'])
        <li class=" {{request()->routeIs('admin.anioescolar.*') ? 'showMenu' : ''}}">
          <div class="iocn-link">
            <a href="#">
              <i class='fa-solid fa-clock {{request()->routeIs('admin.anioescolar.*') ? 'active' : ''}}' ></i>
              <span class="link_name {{request()->routeIs('admin.anioescolar.*') ? 'active' : ''}}">Gestión de Horarios</span>
            </a>
            <i class='fa fa-chevron-down arrow' ></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Horarios</a></li>
            @can('admin.trabajador.create')
            <li><a href="{{route('admin.anioescolar.create')}}" class="{{request()->routeIs('admin.anioescolar.create') ? 'active' : ''}}">Nuevo Horario</a></li>
            @endcan
            @can('admin.trabajador.showTrabajadorList')
            <li><a href="{{route('admin.anioescolar.index')}}" class="{{request()->routeIs('admin.anioescolar.index') ? 'active' : ''}}">Horarios Registrados</a></li>
            @endcan
          </ul>
        </li>
        @endcanany





        @if (auth()->user()->tipousuario_id=='1')
        <div class="section-title mt-4">
          <div class="title fw-bold mt-4">
            ADMINISTRACIÓN WEB
          </div>
          <hr>
        </div>
        @endif

        @canany(['admin.trabajador.create', 'admin.trabajador.showTrabajadorList'])
        <li class=" {{request()->routeIs('admin.documento.*') ? 'showMenu' : ''}}">
          <div class="iocn-link">
            <a href="#">
              <i class='fa-solid fa-paste {{request()->routeIs('admin.documento.*') ? 'active' : ''}}' ></i>
              <span class="link_name {{request()->routeIs('admin.documento.*') ? 'active' : ''}}">Gestión de Documentos</span>
            </a>
            <i class='fa fa-chevron-down arrow' ></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Documentos</a></li>
            @can('admin.trabajador.create')
            <li><a href="{{route('admin.documento.create')}}" class="{{request()->routeIs('admin.documento.create') ? 'active' : ''}}">Nuevo Documento</a></li>
            @endcan
            @can('admin.trabajador.showTrabajadorList')
            <li><a href="{{route('admin.documento.index')}}" class="{{request()->routeIs('admin.documento.index') ? 'active' : ''}}">Documentos Registrados</a></li>
            @endcan
          </ul>
        </li>
        @endcanany

        @can('admin.portada.portada')
        <li class="{{request()->routeIs('admin.portada.*') ? 'active' : ''}}">
          <a href="{{route('admin.portada.portada')}}" class="{{request()->routeIs('admin.portada.*') ? 'active' : ''}}">
            <i class="fa-solid fa-image {{request()->routeIs('admin.portada.*') ? 'active' : ''}}"></i>
            <span class="link_name {{request()->routeIs('admin.portada.*') ? 'active' : ''}}">Portada</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name {{request()->routeIs('admin.portada.*') ? 'active' : ''}}" href="{{route('admin.portada.portada')}}">Portada</a></li>
          </ul>
        </li>
        @endcan

        @can('admin.infraestructura.infraestructura')
        <li class="{{request()->routeIs('admin.infraestructura.*') ? 'active' : ''}}">
          <a href="{{route('admin.infraestructura.infraestructura')}}">
            <i class="fa-solid fa-building-wheat {{request()->routeIs('admin.infraestructura.*') ? 'active' : ''}}"></i>
            <span class="link_name {{request()->routeIs('admin.infraestructura.*') ? 'active' : ''}}">Portada</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name {{request()->routeIs('admin.infraestructura.*') ? 'active' : ''}}" href="{{route('admin.infraestructura.infraestructura')}}">Infraestructura</a></li>
          </ul>
        </li>    
        @endcan
        

        @canany(['admin.pregunta.create', 'admin.pregunta.index', 'admin.pregunta.edit'])
        <li class="{{request()->routeIs('admin.pregunta.*') ? 'active' : ''}}">
          <a href="{{route('admin.pregunta.index')}}">
            <i class="fa-solid fa-circle-question {{request()->routeIs('admin.pregunta.*') ? 'active' : ''}}"></i>
            <span class="link_name {{request()->routeIs('admin.pregunta.*') ? 'active' : ''}}">Preguntas Frecuentes</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name {{request()->routeIs('admin.pregunta.*') ? 'active' : ''}}" href="{{route('admin.pregunta.index')}}">Preguntas Frecuentes</a></li>
          </ul>
        </li>
        @endcanany

        @can('admin.matricula.activa')
        <li class="{{request()->routeIs('admin.matricula.*') ? 'active' : ''}}">
          <a href="{{route('admin.matricula.activa')}}">
            <i class="fa-solid fa-person-chalkboard {{request()->routeIs('admin.matricula.*') ? 'active' : ''}}"></i>
            <span class="link_name {{request()->routeIs('admin.matricula.*') ? 'active' : ''}}">Matrícula</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name {{request()->routeIs('admin.matricula.*') ? 'active' : ''}}" href="{{route('admin.matricula.activa')}}">Matrícula</a></li>
          </ul>
        </li>
        @endcan

        @can('admin.aviso.activa')
        <li class="{{request()->routeIs('admin.aviso.*') ? 'active' : ''}}">
          <a href="{{route('admin.aviso.activa')}}">
            <i class="fa-solid fa-bullhorn {{request()->routeIs('admin.aviso.*') ? 'active' : ''}}"></i>
            <span class="link_name {{request()->routeIs('admin.aviso.*') ? 'active' : ''}}">Aviso</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name {{request()->routeIs('admin.aviso.*') ? 'active' : ''}}" href="{{route('admin.aviso.activa')}}">Aviso</a></li>
          </ul>
        </li>
        @endcan


        @canany(['admin.imagenp.index', 'admin.imagenp.edit', 'admin.moreimagen.create'])
        <li class="{{request()->routeIs('admin.imagenp.*') ? 'active' : ''}}">
          <a href="{{route('admin.imagenp.index')}}">
            <i class="fa-solid fa-images {{request()->routeIs('admin.imagenp.*') ? 'active' : ''}}"></i>
            <span class="link_name {{request()->routeIs('admin.imagenp.*') ? 'active' : ''}}">Imagenes de Página</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name {{request()->routeIs('admin.imagenp.*') ? 'active' : ''}}" href="{{route('admin.imagenp.index')}}">Imagenes de Página</a></li>
          </ul>
        </li>
        @endcanany

        @can('admin.covid.index')
        <li class="{{request()->routeIs('admin.covid.*') ? 'active' : ''}}">
          <a href="{{route('admin.covid.index')}}">
            <i class="fa-regular fa-snowflake {{request()->routeIs('admin.covid.*') ? 'active' : ''}}"></i>
            <span class="link_name {{request()->routeIs('admin.covid.*') ? 'active' : ''}}">Covid-19</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name {{request()->routeIs('admin.covid.*') ? 'active' : ''}}" href="{{route('admin.covid.index')}}">Covid-19</a></li>
          </ul>
        </li>
        @endcan

        @canany(['admin.noticia.create', 'admin.noticia.index', 'admin.noticia.edit'])
        <li class="{{request()->routeIs('admin.noticia.*') ? 'active' : ''}}">
          <a href="{{route('admin.noticia.index')}}">
            <i class="fa-regular fa-newspaper {{request()->routeIs('admin.noticia.*') ? 'active' : ''}}"></i>
            <span class="link_name {{request()->routeIs('admin.noticia.*') ? 'active' : ''}}">Noticias</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name {{request()->routeIs('admin.noticia.*') ? 'active' : ''}}" href="{{route('admin.noticia.index')}}">Noticias</a></li>
          </ul>
        </li>
        @endcanany


        <li>
          <div class="profile-details">
            <div class="profile-content">
                @if (auth()->user()->avatar_id=='')
                    <img src="{{asset('../resources/img/user_anonimo.png')}}"> 
                @else
                    <img src="{{asset(auth()->user()->avatar->url)}}"> 
                @endif
            </div>
            <div class="name-job">
              <div class="profile_name">{{auth()->user()->name}}</div>
              <div class="job">{{auth()->user()->tipousuario->nombretipousuario}}</div>
            </div>
            <a href="{{route('login.destroy')}}"><i class='bx bx-log-out' ></i></a>
          </div>
        </li>
    </ul>
    
  </div>

    <section class="home-section">
      <div class="navigation">
        <ul>
          <li class="list {{request()->routeIs('admin.perfil.index') ? 'active' : ''}}">
            <a href="{{route('admin.perfil.index', auth()->user())}}">
              <span class="text">Inicio</span>
              <span class="icon"><i class="fa fa-home"></i></span>
            </a>
          </li>
          <li class="list {{request()->routeIs('user.avatar.index') ? 'active' : ''}} {{request()->routeIs('admin.perfil.edit') ? 'active' : ''}}">
            <a id="perfil" href="#">
              <span class="text">Perfil</span>
              <span class="icon"><i class="fa fa-user"></i></span>
            </a>
          </li>
          <div class="indicator"></div>
        </ul>
        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu2">
            <div class="user-info">
                @if (auth()->user()->avatar_id=='')
                    <img src="{{asset('../resources/img/user_anonimo.png')}}"> 
                @else
                    <img src="{{asset(auth()->user()->avatar->url)}}"> 
                @endif
                <h6 class="fw-bold">{{auth()->user()->name}}</h6>
            </div>
            <hr>
            <div class="container">
              @can('admin.perfil.edit')
              <a href="{{route('admin.perfil.edit', auth()->user())}}" class="sub-menu-link">
                <i class="fa-solid fa-pen-to-square"></i>
                <p>Editar Perfil</p>
              </a>
              @endcan
              @can('user.password.index')
              <a href="{{route('user.password.index', auth()->user())}}" class="sub-menu-link">
                <i class="fa fa-lock"></i>
                <p>Cambiar Contraseña</p>
              </a>
              @endcan
              <a href="{{route('login.destroy')}}" class="sub-menu-link">
                <i class="fa fa-sign-out"></i>
                <p>Cerrar Sesión</p>
              </a>
            </div>
          </div>
        </div>
      </div>


      <div class="content" >
            @yield('content')
      </div>



      <div class="footer">
        <div class="container">
          <div class="row">
        
            <div class="container copyright">
              <div class="row">
                <div class="col-md-6">
                    <p>&copy; Copyright 2023.<a href="#"> Colegio La Libertad</a>, todos los derechos reservados.</p>
                </div>
                <div class="col-md-6">
                    <p>Diseñado por <a href="#">CJ</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>





    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="{{asset('../resources/js/myscript.js')}}"></script>
</body>
</html>