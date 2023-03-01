/*-------------------------------------------------*/
/*-----------------Control lateral bar-------------*/
/*-------------------------------------------------
const btnToggle = document.querySelector('.toggle-btn');


btnToggle.addEventListener('click', function () {
  console.log('clik')
  document.getElementById('sidebar-container').classList.toggle('active');
  console.log(document.getElementById('sidebar-container'))
});

*/

$(document).ready(function(){

  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".toggle");
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });









  let subMenu = document.getElementById("subMenu");

  document.addEventListener('mouseup', function(e) {
    var container = document.getElementById('perfil');
    if (!container.contains(e.target)) {
      subMenu.classList.remove("open-menu");
    }else{
      subMenu.classList.add("open-menu");
    }
});
});
