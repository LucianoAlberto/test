import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.mostrarFormMascota = function(){
    document.getElementById("defaultModal").style.display ="block";
}
window.ocultarFormMascota = function(){
    document.getElementById("defaultModal").style.display ="none";
}

window.mostrarAlergias = function(event) {
    if(event.target.checked){
        document.getElementById("inputAlergias").style.display = "block";
    }
    else{
        document.getElementById("inputAlergias").style.display = "none";
    }

}
