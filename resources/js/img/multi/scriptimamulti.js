$(document).ready(function(){


    //Genera una cadena aleatoria según la longitud dada
function getRandomString(length) {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < length; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

//Genera las previsualizaciones
function createPreview(file) {
    var imgCodified = URL.createObjectURL(file);
    var rand = getRandomString(5);
    var name = file.name;
    var img = $('<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12  col-12" id="imagen"> <input type="hidden" name="photo-' + rand + '" value="' + name + '"> <div class="image-container"> <figure> <img src="' + imgCodified + '" alt="Foto del usuario"> <figcaption> <i class="icon-cross"></i> </figcaption> </figure> </div></div>');
    $(img).insertBefore("#add-photo-container");
}

//Crea un nuevo input file
function createInputFile() {
    var rand = getRandomString(5);
    return $('<input type="file" accept="image/*" multiple id="file" name="file[]">');
}
    // Abrir el inspector de archivos
    
    $(document).on("click", "#add-photo", function(){
        swal({
            title: "!Atención¡",
            text: "Cargue las imagenes correctas.",
            icon: "info",
            buttons: true,
            dshowDenyButton: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $("#file").remove();
                for (var i = 0; i < 100; i++) {
                    $("#imagen").remove();
                }
                var newInputFile = createInputFile();
                $("#add-photo-container").append(newInputFile);
                $("#file").click();
            }
        });
    });
    
    // -> Abrir el inspector de archivos

    // Cachamos el evento change
    
    $(document).on("change", "#file", function () {
    
        var files = this.files;
        var element;
        var supportedImages = ["image/jpeg", "image/png", "image/gif"];
        var seEncontraronElementoNoValidos = false;

        for (var i = 0; i < files.length; i++) {
            element = files[i];
            
            if (supportedImages.indexOf(element.type) != -1) {
                createPreview(element);
            }
            else {
                seEncontraronElementoNoValidos = true;
            }
        }

        //Aquí empieza la creación de un nuevo input file

        if (seEncontraronElementoNoValidos) {
            swal({
                title: "¡Atención!",
                text: "¡Algunos archivos no fueron cargados!",
                icon: "error",
                button: "OK!",
              });
        }
        else {
            swal({
                title: "¡Bien!",
                text: "¡Todos los archivos fueron cargados con exito!",
                icon: "success",
                button: "OK!",
              });
        }
    
    });
    
    // -> Cachamos el evento change
    
   
});