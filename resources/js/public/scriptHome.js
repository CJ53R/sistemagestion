$(document).ready(function () {
  var today = new Date();
  var year = today.getFullYear();
   
  // muestra la fecha de hoy en formato `MM/DD/YYYY`
   const anioesc = document.getElementById('anioesc');
   anioesc.textContent='Año Escolar '+year;


// Buton Nabvar
  document.getElementById('btncolla').addEventListener('click', function(){
    var icon = document.getElementById('iconcolla');
    icon.classList.toggle('fa-bars');
    icon.classList.toggle('fa-xmark');
    });


   // Sticky Navbar
   $(window).scroll(function () {
    if ($(this).scrollTop() > 95) {
        $('.navbar').addClass('fixed-top');
        $('.home-section').addClass('top');
        $('.escudo').addClass('visi');
    } else {
        $('.navbar').removeClass('fixed-top');
        $('.home-section').removeClass('top');
        $('.escudo').removeClass('visi');
    }
});

// Contador
$('[data-toggle="counter-up"]').counterUp({
  delay: 10,
  time: 2000
});


// Main carousel
$(".carousel .owl-carousel").owlCarousel({
  autoplay: true,
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  items: 1,
  smartSpeed: 300,
  dots: false,
  loop: true,
  nav : true,
  navText : [
      '<i class="fa fa-angle-left" aria-hidden="true"></i>',
      '<i class="fa fa-angle-right" aria-hidden="true"></i>'
  ]
});


// Causes carousel
$(".causes-carousel").owlCarousel({
  autoplay: true,
  animateIn: 'slideInDown',
  animateOut: 'slideOutDown',
  items: 1,
  smartSpeed: 450,
  dots: false,
  loop: true,
  responsive: {
      0:{
          items:1
      },
      576:{
          items:1
      },
      768:{
          items:2
      },
      992:{
          items:3
      }
  }
});


// Causes progress
$('.causes-progress').waypoint(function () {
  $('.progress .progress-bar').each(function () {
      $(this).css("width", $(this).attr("aria-valuenow") + '%');
  });
}, {offset: '80%'});

  /******************************************************************************************************************/
  /********************************************Login************************************************/
  /******************************************************************************************************************/
  const wrapper = document.querySelector(".wrapper"),
    signupHeader = document.querySelector(".signup header"),
    loginHeader = document.querySelector(".login header");

  loginHeader.addEventListener("click", () => {
    wrapper.classList.add("active");
  });
  signupHeader.addEventListener("click", () => {
    wrapper.classList.remove("active");
  });


  const toggle = document.querySelector(".toggle"),
    input = document.getElementById("password");

  toggle.addEventListener("click", () => {
    if (input.type === "password") {
      input.type = "text";
      toggle.classList.replace("fa-eye-slash", "fa-eye");
    } else {
      input.type = "password";
      toggle.classList.replace("fa-eye", "fa-eye-slash");
    }
  })


  const $dropdown = $(".dropdown");
  const $dropdownToggle = $(".dropdown-toggle");
  const $dropdownMenu = $(".dropdown-menu");
  const showClass = "show";

  $(window).on("load resize", function () {
    if (this.matchMedia("(min-width: 768px)").matches) {
      $dropdown.hover(
        function () {
          const $this = $(this);
          $this.addClass(showClass);
          $this.find($dropdownToggle).attr("aria-expanded", "true");
          $this.find($dropdownMenu).addClass(showClass);
        },
        function () {
          const $this = $(this);
          $this.removeClass(showClass);
          $this.find($dropdownToggle).attr("aria-expanded", "false");
          $this.find($dropdownMenu).removeClass(showClass);
        }
      );
    } else {
      $dropdown.off("mouseenter mouseleave");
    }
  });



  
/*
  $(function(){
    $(".dropdown-menu > li > a.trigger").on("click",function(e){
        var current=$(this).next();
        var grandparent=$(this).parent().parent();
        if($(this).hasClass('left-caret')||$(this).hasClass('right-caret'))
            $(this).toggleClass('right-caret left-caret');
        grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
        grandparent.find(".sub-menu:visible").not(current).hide();
        current.toggle();
        e.stopPropagation();
    });
    $(".dropdown-menu > li > a:not(.trigger)").on("click",function(){
        var root=$(this).closest('.dropdown');
        root.find('.left-caret').toggleClass('right-caret left-caret');
        root.find('.sub-menu:visible').hide();
    });
});*/


const targets = document.querySelectorAll('[data-target]');
const content = document.querySelectorAll('[data-content]');

targets.forEach(target => {
	target.addEventListener('click', () => {
		content.forEach(c => {
			c.classList.remove('active');
      targets.forEach(target => {
        target.classList.remove('active')
      });
		})
		const t = document.querySelector(target.dataset.target)
		t.classList.add('active')
    target.classList.add('active')
	})
});


let contadores = document.querySelectorAll('.number');
let contFin = 3000;

contadores.forEach(contador => {
  let inicioC = 0;
  let finC = parseInt(contador.getAttribute("data-val"));
  let time = Math.floor(contFin/finC);

  let cuenta = setInterval(function(){
    inicioC += 1;
    contador.textContent = "+ "+inicioC;
    if(inicioC == finC){
      clearInterval(cuenta);
    }
  }, time);
});
});

