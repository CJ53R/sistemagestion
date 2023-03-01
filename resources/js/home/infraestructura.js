
    const contmodal = document.getElementById("cont-modal-img"),
    imgre = document.getElementById("imgre");

    function abrirVista(reference){
        contmodal.style.display = "flex";
        imgre.src = reference
    }
    function cerrarVista(){
        contmodal.style.display = "none";
    }