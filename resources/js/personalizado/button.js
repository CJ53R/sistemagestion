
$(document).ready(function(){
const buttons = document.querySelectorAll(".button");

buttons.forEach(button => {
  button.addEventListener("click", (e) => {
    e.preventDefault;
    button.classList.add("animate");
    setTimeout(() => {
      button.classList.remove("animate");
    }, 600);
  });
});

});