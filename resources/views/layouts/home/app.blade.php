<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - IE Colegio La Libertad</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('../resources/css/style.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="icon" href="{{asset('../resources/img/escudo.png')}}">

    @yield('css')
</head>
<body>
    <div class="cont" >
        <div class="top-bar" id="start">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="top-bar-left">
                            <div class="text">
                                <a href="{{route('index')}}"><img src="{{asset('../resources/img/logo.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center my-auto">
                        <div class="row">
                            <div class="text-lema">
                                <h1 class="cbg-primary"><span>¡</span><span>SER</span><span> </span><span>LIBERTANO</span><span> </span><span>ES</span><span> </span><span>COMPROMISO</span><span> </span><span>DE</span><span> </span><span>HONOR</span><span>!</span></h1>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <div class="top-bar-right">
                            <div class="social">
                                <a href="https://www.facebook.com/CLL2020" target="blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.youtube.com/@CLLHuaraz"  target="_blank"><i class="fa-brands fa-youtube"></i></a>
                                <div class="text">
                                    <i class="fa-solid fa-phone"></i>
                                    <p>(043) 422711</p>
                                </div>
                                <div class="text">
                                    <i class="fa fa-envelope"></i>
                                    <p>cll@edu.pe</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar pbg-primary navbar-expand-lg">
            <div class="container-fluid">
                <ul class="navbar-nav mx-start logo-details">
                    <div class="row">
                        <div class="col"><a href="#"><img src="{{asset('../resources/img/escudo.png')}}" class="escudo" alt=""> <img src="{{asset('../resources/img/name.png')}}" class="nameInst" alt=""></a></div>
                    </div>
                </ul>
                <button class="navbar-toggler button" id="btncolla" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars" id="iconcolla"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto ">
                    
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('index') ? 'active' : ''}}" aria-current="page" href="{{route('index')}}">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{request()->routeIs('home.nosotros.*') ? 'active' : ''}}"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Nuestro Colegio
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{request()->routeIs('home.nosotros.nosotros') ? 'active' : ''}}" href="{{route('home.nosotros.nosotros')}}">Nosotros</a></li>
                            <li><a class="dropdown-item {{request()->routeIs('home.nosotros.historia') ? 'active' : ''}}" href="{{route('home.nosotros.historia')}}">Nuestra Historia</a></li>
                            <li><a class="dropdown-item {{request()->routeIs('home.nosotros.himno') ? 'active' : ''}}" href="{{route('home.nosotros.himno')}}">Himno del Colegio</a></li>
                            <li><a class="dropdown-item {{request()->routeIs('home.nosotros.docentes') ? 'active' : ''}}" href="{{route('home.nosotros.docentes')}}">Docentes</a></li>
                            <li><a class="dropdown-item {{request()->routeIs('home.nosotros.auxiliares') ? 'active' : ''}}" href="{{route('home.nosotros.auxiliares')}}">Auxiliares de Educación</a></li>
                            <li><a class="dropdown-item {{request()->routeIs('home.nosotros.personaladministrativo') ? 'active' : ''}}" href="{{route('home.nosotros.personaladministrativo')}}">Personal Administrativo</a></li>
                            <li><a class="dropdown-item {{request()->routeIs('home.nosotros.infraestructura') ? 'active' : ''}}" href="{{route('home.nosotros.infraestructura')}}">Infraestructura</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle {{request()->routeIs('home.equipodirectivo.*') ? 'active' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Equipo Directivo
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{request()->routeIs('home.equipodirectivo.director') ? 'active' : ''}}" href="{{route('home.equipodirectivo.director')}}">Director de la IE</a></li>
                            <li><a class="dropdown-item {{request()->routeIs('home.equipodirectivo.sdirectorp') ? 'active' : ''}}" href="{{route('home.equipodirectivo.sdirectorp')}}">Sub Direcciones-Primaria</a></li>
                            <li><a class="dropdown-item {{request()->routeIs('home.equipodirectivo.sdirectors') ? 'active' : ''}}" href="{{route('home.equipodirectivo.sdirectors')}}">Sub Direcciones-Secundaria</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle {{request()->routeIs('home.equipojerarquico.*') ? 'active' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Equipo Jerárquico
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{request()->routeIs('home.equipojerarquico.coordinadorpedagogico') ? 'active' : ''}}" href="{{route('home.equipojerarquico.coordinadorpedagogico')}}">Coordinadores Pedagógicos</a></li>
                            <li><a class="dropdown-item {{request()->routeIs('home.equipojerarquico.coordinadortoe') ? 'active' : ''}}" href="{{route('home.equipojerarquico.coordinadortoe')}}">Cordinadopres de TOE</a></li>
                            <li><a class="dropdown-item {{request()->routeIs('home.equipojerarquico.jefelaboratorio') ? 'active' : ''}}" href="{{route('home.equipojerarquico.jefelaboratorio')}}">Jefes de Laboratorio</a></li>
                            <li><a class="dropdown-item {{request()->routeIs('home.equipojerarquico.jefetaller') ? 'active' : ''}}" href="{{route('home.equipojerarquico.jefetaller')}}">Jefe de Taller</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle {{request()->routeIs('home.comite.*') ? 'active' : ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Comités de Gestión Escolar
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{request()->routeIs('home.comite.comitegco') ? 'active' : ''}}" href="{{route('home.comite.comitegco')}}">Comité de Gestión de Condiciones Operativas</a></li>
                            <li><a class="dropdown-item {{request()->routeIs('home.comite.comitegp') ? 'active' : ''}}" href="{{route('home.comite.comitegp')}}">Comité de Gestión Pedagógica</a></li>
                            <li><a class="dropdown-item {{request()->routeIs('home.comite.comitegb') ? 'active' : ''}}" href="{{route('home.comite.comitegb')}}">Comité de Gestión del Bienestar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('home.covid.covid') ? 'active' : ''}}" aria-current="page" href="{{route('home.covid.covid')}}">COVID-19</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('home.periodo.horario') ? 'active' : ''}}" aria-current="page" href="{{route('home.periodo.horario')}}" id="anioesc">Año Escolar 2023</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('home.documento.documento') ? 'active' : ''}}" aria-current="page" href="{{route('home.documento.documento')}}">Documentos</a>
                    </li>
                </ul>
                <ul class="navbar-nav mx-end mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Acceder</a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                    <section class="wrapper active">
                        <div class="form signup">
                          <header>IE Colegio de La Libertad</header>
                          <div class="contenedorimgl">
                            <a href="#">
                                 <figure>
                                     <img src="{{asset('../resources/img/img_1.jpg')}}">
                                     <div class="capa">
                                         <h3><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></h3>
                                         <p class="text-center">¡Ser Libertano es Compromiso de Honor!</p>
                                     </div>
                                 </figure>
                             </a>
                         </div>
                        </div>
                  
                        <div class="form login">
                          <header>Inicia Sesión</header>
                          <form action="{{route('login.store')}}" method="POST" id="formularioLogin">
                            @csrf
                            <div class="input-box">
                                <input type="text" id="codigo" class="fw-bold" name="codigo" required />
                                <label for="codigo">Código de usuario</label>
                            </div>
                            <div class="input-box">
                                <input type="password" class="fw-bold" id="password" name="password" spellcheck="false" required>
                                <label for="password">Password</label>
                                <i class="fa-solid fa-eye-slash toggle"></i>
                            </div>
                            <a href="#">¿Olvidaste Contraseña?</a>
                            <button type="submit">Acceder</button>
                          </form>
                        </div>
                      </section>
                </div>
              
            </div>
        </div>
    </div>

    
    <section class="home-section">
        
        <div class="content bg-lig" >
            
            @yield('content')
        </div>
  
        <div class="footer">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-md-4">
                <div class="footer-contact">
                  <h2>Nuestra Oficina central</h2>
                  <p><i class="fa-sharp fa-solid fa-location-dot"></i>Av. Agustín Gamarra 217 - Huaraz</p>
                  <p><i class="fa-solid fa-phone"></i>(043) 422711</p>
                  <p><i class="fa-solid fa-envelope"></i>cll@edu.pe</p>
                  <div class="footer-social">
                      <a class="btn btn-custom" href="https://www.facebook.com/CLL2020" target="blank"><i class="fab fa-facebook-f"></i></a>
                      <a class="btn btn-custom" href="https://www.youtube.com/@CLLHuaraz" target="blank"><i class="fab fa-youtube"></i></a>
                  </div>
                </div>    
              </div>
          
              <div class="col-lg-4 col-md-4">
                <div class="footer-link">
                    <h2>Enlaces Populares</h2>
                    <a href="{{route('home.nosotros.nosotros')}}"><i class="fa fa-chevron-right" aria-hidden="true"></i> Sobre Nosotros</a>
                    <a href="#start"><i class="fa fa-chevron-right" aria-hidden="true"></i> Contactanos</a>
                    <a href="{{route('home.noticia.show')}}"><i class="fa fa-chevron-right" aria-hidden="true"></i> Próximos Eventos</a>
                </div>
              </div>
                          
              <div class="col-lg-4 col-md-4">
                <div class="footer-link">
                    <h2>Enlaces Útiles</h2>
                    <a href="https://www.google.com/maps/place/Colegio+La+Libertad,+Av.+Agust%C3%ADn+Gamarra,+Huaraz+02001/@-9.5273105,-77.5268739,18z/data=!4m6!3m5!1s0x91a90d0e4e367f89:0x62fd8a3d8a536270!8m2!3d-9.5275995!4d-77.5257546!16s%2Fg%2F11b8t9d5wx"  target="_blank"><i class="fa fa-chevron-right" aria-hidden="true"></i> Mapa</a>
                    <a href="{{route('home.preguntas')}}"><i class="fa fa-chevron-right" aria-hidden="true"></i> Ayuda</a>
                </div>
              </div>
          
              <div class="container copyright">
                <div class="row">
                  <div class="col-md-6">
                      <p>&copy; Copyright 2023.<a href="#"> IE Colegio La Libertad</a>, todos los derechos reservados.</p>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{asset('../resources/js/public/scriptHome.js')}}"></script> 

    
    <script src="{{asset('../resources/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('../resources/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('../resources/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('../resources/lib/counterup/counterup.min.js')}}"></script>


</body>
</html>