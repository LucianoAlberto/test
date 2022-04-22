require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Swal from 'sweetalert2';

window.deleteConfirm = function(formId, event)
{
    console.log(event.target.closest("form").classList);
    event.preventDefault();
    let texto ="";
    if(event.target.closest("form").classList.contains("cliente")){
        texto = '¿Desea borrar este cliente?';
    }
    else if(event.target.closest("form").classList.contains("user")){
        texto = '¿Desea borrar este usuario?';
    }
    else if(event.target.closest("form").classList.contains("factura")){
        texto = '¿Desea borrar esta factura?';
    }
    else if(event.target.closest("form").classList.contains("contrato")){
        texto = '¿Desea borrar este contrato?';
    }
    console.log(texto)
    Swal.fire({
       icon: 'warning',
        text: texto,
        showCancelButton: true,
       confirmButtonText: 'Borrar',
       cancelButtonText: 'Cancelar',
        confirmButtonColor: '#e3342f',
    }).then((result) => {
        if (result.isConfirmed) {
           document.getElementById(formId).submit();
       }
   });
}

window.detalles = function(vista, event)
{
    //console.log(event.target.tagName);
    if(event.target.tagName == "TD"){
        window.location.href = vista;
    }

}

window.masFactura = function(event)
{
    let divFactura = event.target.closest(".divFacturas").querySelector(".contenedorFacturas").cloneNode(true);

    divFactura.children[0].children[1].value = null;
    divFactura.children[1].children[1].value = null;


    event.target.closest(".divFacturas").append(divFactura);
}

window.menosFactura = function(event)
{
    let ultimoHijoContenedorContrato = event.target.closest(".contenedorContrato").lastElementChild;
    let listaContenedoresFacturas = event.target.closest(".contenedorContrato").querySelectorAll(".contenedorFacturas");

    if(ultimoHijoContenedorContrato.classList.contains("contenedorFacturas") && listaContenedoresFacturas.length > 1){
        ultimoHijoContenedorContrato.remove();
    }
}

let contador_contratos = 0;
window.masContrato = function(event)
{
    contador_contratos++;
    let contenedorContratos = event.target.closest(".divContratos").querySelector(".contenedorContratos").cloneNode(true);
    let divFacturas = contenedorContratos.querySelectorAll(".contenedorFacturas");
    console.log(divFacturas.length);
    for( let i = 1; i <= divFacturas.length - 1; i++){
        divFacturas[i].remove();
    }



    //modifico el for del label y el name e id del input
    contenedorContratos.querySelector(".divFechaFactura").querySelector("label").htmlFor = "contratos["+contador_contratos+"][facturas][fechas][]";
    contenedorContratos.querySelector(".divFechaFactura").querySelector("input").name = "contratos["+contador_contratos+"][facturas][fechas][]";
    contenedorContratos.querySelector(".divFechaFactura").querySelector("input").value = null;


    contenedorContratos.querySelector(".divArchivoFactura").querySelector("label").htmlFor = "contratos["+contador_contratos+"][facturas][archivos][]";
    contenedorContratos.querySelector(".divArchivoFactura").querySelector("input").name = "contratos["+contador_contratos+"][facturas][archivos][]";
    contenedorContratos.querySelector(".divArchivoFactura").querySelector("input").value = null;

    let inputs = contenedorContratos.querySelectorAll("input");

    inputs.forEach(input => {
        input.value = null;
    });

    let numero_contador_contratos = contador_contratos + 1;

    contenedorContratos.children[0].innerText = "Contrato " + numero_contador_contratos;

    contenedorContratos.querySelector(".contenedorTituloBotones").children[0].innerText = "Facturas del contrato " + numero_contador_contratos;

    event.target.closest(".divContratos").append(contenedorContratos);
}

window.menosContrato = function(event)
{
    contador_contratos--;

    let ultimoHijoContenedorContrato = document.getElementById("divContrato").parentElement.lastElementChild;
    //console.log(document.getElementById("divContrato").parentElement.lastElementChild);
    let listaContenedoresContrato = document.getElementById("divContrato").parentElement.querySelectorAll(".contenedorContrato");

    if(ultimoHijoContenedorContrato.classList.contains("contenedorContrato") && listaContenedoresContrato.length > 1){
        listaContenedoresContrato[listaContenedoresContrato.length - 1].remove();
    }
}

window.masFacturaIndependiente = function(event)
{
    let divFactura = document.getElementById("divFacturasIndependientes").querySelector(".contenedorFacturasIndependientes").cloneNode(true);
    console.log(divFactura.children[1].children[1])
    divFactura.children[0].children[1].value = null;
    divFactura.children[1].children[1].value = null;

    document.getElementById("divFacturasIndependientes").appendChild(divFactura);
}

window.menosFacturaIndependiente = function(event)
{
    let ultimoHijoContenedorContrato = document.getElementById("divFacturasIndependientes").lastElementChild;
    let listaContenedoresFacturasIndependientes = document.getElementById("divFacturasIndependientes").querySelectorAll(".contenedorFacturasIndependientes");

    if(ultimoHijoContenedorContrato.classList.contains("contenedorFacturasIndependientes") && listaContenedoresFacturasIndependientes.length > 1){
        ultimoHijoContenedorContrato.remove();
    }
}

let contador_proyectos = 0;

window.masNombreDominio = function(event)
{
    let numeroProyecto = event.target.closest(".divNombresDominio").querySelector(".contenedorNombreDominio").querySelector("input").getAttribute("name").match(/\d+/);

    let divInput = event.target.closest(".divNombresDominio").querySelector(".contenedorNombreDominio").cloneNode(true);
    //modifico el for del label y el name e id del input
    divInput.querySelector("label").htmlFor = "proyectos["+numeroProyecto+"][dominio][nombre][]";
    divInput.querySelector("input").name = "proyectos["+numeroProyecto+"][dominio][nombre][]";
    divInput.querySelector("input").id = "proyectos["+numeroProyecto+"][dominio][nombre][]";
    divInput.querySelector("input").value = null;

    event.target.closest(".divNombresDominio").appendChild(divInput);
}

window.menosNombreDominio = function(event)
{
    let ultimoHijoContenedorDominio = event.target.closest(".divNombresDominio").lastElementChild;

    let listaContenedoresDominio = event.target.closest(".divNombresDominio").querySelectorAll(".contenedorNombreDominio");

    if(ultimoHijoContenedorDominio.classList.contains("contenedorNombreDominio") && listaContenedoresDominio.length > 1){
        ultimoHijoContenedorDominio.remove();
    }
}

window.masBasesDatos = function(event)
{
    let numeroProyecto = event.target.closest(".divBasesDatos").querySelector(".contenedorBasesDatos").querySelector("input").getAttribute("name").match(/\d+/);

    let divContenedorBasesDatos = event.target.closest(".divBasesDatos").querySelector(".contenedorBasesDatos").cloneNode(true);

    //modifico el for del label y el name e id del input
    divContenedorBasesDatos.children[0].querySelector("label").htmlFor = "proyectos["+numeroProyecto+"][bd][nombre][]";
    divContenedorBasesDatos.children[0].querySelector("input").name = "proyectos["+numeroProyecto+"][bd][nombre][]";
    divContenedorBasesDatos.children[0].querySelector("input").value = null;

    divContenedorBasesDatos.children[1].querySelector("label").htmlFor = "proyectos["+numeroProyecto+"][bd][host][]";
    divContenedorBasesDatos.children[1].querySelector("input").name = "proyectos["+numeroProyecto+"][bd][host][]";
    divContenedorBasesDatos.children[1].querySelector("input").value = null;

    divContenedorBasesDatos.children[2].querySelector("label").htmlFor = "proyectos["+numeroProyecto+"][bd][contrasenha][]";
    divContenedorBasesDatos.children[2].querySelector("input").name = "proyectos["+numeroProyecto+"][bd][contrasenha][]";
    divContenedorBasesDatos.children[2].querySelector("input").value = null;

    event.target.closest(".divBasesDatos").appendChild(divContenedorBasesDatos);
}

window.menosBasesDatos = function(event)
{
    let ultimoHijoContenedorBaseDatos = event.target.closest(".divBasesDatos").lastElementChild;


    let listaContenedoresBaseDatos = event.target.closest(".divBasesDatos").querySelectorAll(".contenedorBasesDatos");

    if(ultimoHijoContenedorBaseDatos.classList.contains("contenedorBasesDatos") && listaContenedoresBaseDatos.length > 1){
        ultimoHijoContenedorBaseDatos.remove();
    }
}

window.masEmail = function(event)
{
    let numeroProyecto = event.target.closest(".divEmails").querySelector(".contenedorEmails").querySelector("input").getAttribute("name").match(/\d+/);

    let divContenedorEmails = event.target.closest(".divEmails").querySelector(".contenedorEmails").cloneNode(true);

    //modifico el for del label y el name e id del input
    divContenedorEmails.children[0].querySelector("label").htmlFor = "proyectos["+numeroProyecto+"][email][email][]";
    divContenedorEmails.children[0].querySelector("input").name = "proyectos["+numeroProyecto+"][email][email][]";
    divContenedorEmails.children[0].querySelector("input").value = null;

    divContenedorEmails.children[1].querySelector("label").htmlFor = "proyectos["+numeroProyecto+"][email][contrasenha][]";
    divContenedorEmails.children[1].querySelector("input").name = "proyectos["+numeroProyecto+"][email][contrasenha][]";
    divContenedorEmails.children[1].querySelector("input").value = null;

    divContenedorEmails.children[2].querySelector("label").htmlFor = "proyectos["+numeroProyecto+"][email][ruta][]";
    divContenedorEmails.children[2].querySelector("input").name = "proyectos["+numeroProyecto+"][email][ruta][]";
    divContenedorEmails.children[2].querySelector("input").value = null;

    event.target.closest(".divEmails").appendChild(divContenedorEmails);
}

window.menosEmail = function(event)
{
    let ultimoHijoContenedorEmails = event.target.closest(".divEmails").lastElementChild;

    let listaContenedoresEmails = event.target.closest(".divEmails").querySelectorAll(".contenedorEmails");

    if(ultimoHijoContenedorEmails.classList.contains("contenedorEmails") && listaContenedoresEmails.length > 1){
        ultimoHijoContenedorEmails.remove();
    }
}

window.masAcceso = function(event)
{
    let numeroProyecto = event.target.closest(".divAccesos").querySelector(".contenedorAccesos").querySelector("input").getAttribute("name").match(/\d+/);

    let divContenedorAccesos = event.target.closest(".divAccesos").querySelector(".contenedorAccesos").cloneNode(true);

    //modifico el for del label y el name e id del input
    divContenedorAccesos.children[0].querySelector("label").htmlFor = "proyectos["+numeroProyecto+"][acceso][dominio][]";
    divContenedorAccesos.children[0].querySelector("input").name = "proyectos["+numeroProyecto+"][acceso][dominio][]";
    divContenedorAccesos.children[0].querySelector("input").value = null;

    divContenedorAccesos.children[1].querySelector("label").htmlFor = "proyectos["+numeroProyecto+"][acceso][usuario][]";
    divContenedorAccesos.children[1].querySelector("input").name = "proyectos["+numeroProyecto+"][acceso][usuario][]";
    divContenedorAccesos.children[1].querySelector("input").value = null;

    divContenedorAccesos.children[2].querySelector("label").htmlFor = "proyectos["+numeroProyecto+"][acceso][contrasenha][]";
    divContenedorAccesos.children[2].querySelector("input").name = "proyectos["+numeroProyecto+"][acceso][contrasenha][]";
    divContenedorAccesos.children[2].querySelector("input").value = null;

    event.target.closest(".divAccesos").appendChild(divContenedorAccesos);
}

window.menosAcceso = function(event)
{
    let ultimoHijoContenedorAccesos = event.target.closest(".divAccesos").lastElementChild;

    let listaContenedoresAccesos = event.target.closest(".divAccesos").querySelectorAll(".contenedorAccesos");

    if(ultimoHijoContenedorAccesos.classList.contains("contenedorAccesos") && listaContenedoresAccesos.length > 1){
        ultimoHijoContenedorAccesos.remove();
    }
}

window.masProyecto = function(event)
{
    contador_proyectos++;
    let divContenedorProyectos = document.getElementById("divProyectos").querySelector(".contenedorProyectos").cloneNode(true);

    let numero_contador_proyectos = contador_proyectos + 1;

    divContenedorProyectos.querySelector("h3").innerText = "Proyecto " + numero_contador_proyectos;

    divContenedorProyectos.querySelectorAll("input").forEach(input =>{
        input.value = null;
    })
    //modifico el for del label y el name y value del input
    divContenedorProyectos.querySelector(".contenedorNombreDominio").querySelector("label").htmlFor = "proyectos["+contador_proyectos+"][dominio][nombre][]";
    divContenedorProyectos.querySelector(".contenedorNombreDominio").querySelector("input").name = "proyectos["+contador_proyectos+"][dominio][nombre][]";
    divContenedorProyectos.querySelector(".contenedorNombreDominio").querySelector("input").value = null;

    let divDominios = divContenedorProyectos.querySelectorAll(".contenedorNombreDominio");

    for( let i = 1; i <= divDominios.length - 1; i++){
        divDominios[i].remove();
    }

    divContenedorProyectos.querySelector(".contenedorBasesDatos").querySelector(".divNombreBD").querySelector("label").htmlFor = "proyectos["+contador_proyectos+"][bd][nombre][]";
    divContenedorProyectos.querySelector(".contenedorBasesDatos").querySelector(".divNombreBD").querySelector("input").name = "proyectos["+contador_proyectos+"][bd][nombre][]";
    divContenedorProyectos.querySelector(".contenedorBasesDatos").querySelector(".divNombreBD").querySelector("input").value = null;

    divContenedorProyectos.querySelector(".contenedorBasesDatos").querySelector(".divHostBD").querySelector("label").htmlFor = "proyectos["+contador_proyectos+"][bd][host][]";
    divContenedorProyectos.querySelector(".contenedorBasesDatos").querySelector(".divHostBD").querySelector("input").name = "proyectos["+contador_proyectos+"][bd][host][]";
    divContenedorProyectos.querySelector(".contenedorBasesDatos").querySelector(".divHostBD").querySelector("input").value = null;

    divContenedorProyectos.querySelector(".contenedorBasesDatos").querySelector(".divContrasenhaBD").querySelector("label").htmlFor = "proyectos["+contador_proyectos+"][bd][contrasenha][]";
    divContenedorProyectos.querySelector(".contenedorBasesDatos").querySelector(".divContrasenhaBD").querySelector("input").name = "proyectos["+contador_proyectos+"][bd][contrasenha][]";
    divContenedorProyectos.querySelector(".contenedorBasesDatos").querySelector(".divContrasenhaBD").querySelector("input").value = null;

    let divBD = divContenedorProyectos.querySelectorAll(".contenedorBasesDatos");

    for( let i = 1; i <= divBD.length - 1; i++){
        divBD[i].remove();
    }

    divContenedorProyectos.querySelector(".contenedorEmails").querySelector(".divEmailEmail").querySelector("label").htmlFor = "proyectos["+contador_proyectos+"][email][email][]";
    divContenedorProyectos.querySelector(".contenedorEmails").querySelector(".divEmailEmail").querySelector("input").name = "proyectos["+contador_proyectos+"][email][email][]";
    divContenedorProyectos.querySelector(".contenedorEmails").querySelector(".divEmailEmail").querySelector("input").value = null;

    divContenedorProyectos.querySelector(".contenedorEmails").querySelector(".divContrasenhaEmail").querySelector("label").htmlFor = "proyectos["+contador_proyectos+"][email][contrasenha][]";
    divContenedorProyectos.querySelector(".contenedorEmails").querySelector(".divContrasenhaEmail").querySelector("input").name = "proyectos["+contador_proyectos+"][email][contrasenha][]";
    divContenedorProyectos.querySelector(".contenedorEmails").querySelector(".divContrasenhaEmail").querySelector("input").value = null;

    divContenedorProyectos.querySelector(".contenedorEmails").querySelector(".divRutaEmail").querySelector("label").htmlFor = "proyectos["+contador_proyectos+"][email][ruta][]";
    divContenedorProyectos.querySelector(".contenedorEmails").querySelector(".divRutaEmail").querySelector("input").name = "proyectos["+contador_proyectos+"][email][ruta][]";
    divContenedorProyectos.querySelector(".contenedorEmails").querySelector(".divRutaEmail").querySelector("input").value = null;

    let divEmails = divContenedorProyectos.querySelectorAll(".contenedorEmails");

    for( let i = 1; i <= divEmails.length - 1; i++){
        divEmails[i].remove();
    }

    divContenedorProyectos.querySelector(".contenedorAccesos").querySelector(".divDominioAcceso").querySelector("label").htmlFor = "proyectos["+contador_proyectos+"][acceso][dominio][]";
    divContenedorProyectos.querySelector(".contenedorAccesos").querySelector(".divDominioAcceso").querySelector("input").name = "proyectos["+contador_proyectos+"][acceso][dominio][]";
    divContenedorProyectos.querySelector(".contenedorAccesos").querySelector(".divDominioAcceso").querySelector("input").value = null;

    divContenedorProyectos.querySelector(".contenedorAccesos").querySelector(".divUsuarioAcceso").querySelector("label").htmlFor = "proyectos["+contador_proyectos+"][acceso][usuario][]";
    divContenedorProyectos.querySelector(".contenedorAccesos").querySelector(".divUsuarioAcceso").querySelector("input").name = "proyectos["+contador_proyectos+"][acceso][usuario][]";
    divContenedorProyectos.querySelector(".contenedorAccesos").querySelector(".divUsuarioAcceso").querySelector("input").value = null;

    divContenedorProyectos.querySelector(".contenedorAccesos").querySelector(".divContrasenhaAcceso").querySelector("label").htmlFor = "proyectos["+contador_proyectos+"][acceso][contrasenha][]";
    divContenedorProyectos.querySelector(".contenedorAccesos").querySelector(".divContrasenhaAcceso").querySelector("input").name = "proyectos["+contador_proyectos+"][acceso][contrasenha][]";
    divContenedorProyectos.querySelector(".contenedorAccesos").querySelector(".divContrasenhaAcceso").querySelector("input").value = null;

    let divAccesos = divContenedorProyectos.querySelectorAll(".contenedorAccesos");

    for( let i = 1; i <= divAccesos.length - 1; i++){
        divAccesos[i].remove();
    }

    document.getElementById("divProyectos").appendChild(divContenedorProyectos);
}

window.menosProyecto = function(event)
{
    contador_proyectos--;
    let ultimoHijoContenedorAccesos = document.getElementById("divAccesos").lastElementChild;

    let listaContenedoresAccesos = document.getElementById("divAccesos").querySelectorAll(".contenedorAccesos");

    if(ultimoHijoContenedorAccesos.classList.contains("contenedorAccesos") && listaContenedoresAccesos.length > 1){
        ultimoHijoContenedorAccesos.remove();
    }
}

window.anadirFactura=function(){

    let div = document.getElementById('nueva_factura');
    div.style.display = 'block';

}

window.nuevoConcepto=function(){
    let div = document.getElementById('nuevoConcepto');
    div.style.display = 'block';
}

window.closeNuevoConcepto=function(){
    let div = document.getElementById('nuevoConcepto');
    div.style.display = 'none';
}

//repetimos los campos del dominio
window.nuevoDominio=function(){

    let div = document.getElementById('contenedorPrincipal').querySelector('.contenedor_dominio').cloneNode(true);
    div.querySelectorAll('input').forEach(input => {
        input.value="";
    });
   document.querySelector('.div_dominios').append(div);

}

window.nuevaBD=function(){

    let div = document.getElementById('contenedorPrincipal').querySelector('.contenedor_BBDD').cloneNode(true);
    div.querySelectorAll('input').forEach(input => {
        input.value="";
    });
   document.querySelector('.div_BBDD').append(div);

}

window.nuevoEmail=function(){

    let div = document.getElementById('contenedorPrincipal').querySelector('.contenedor_mail').cloneNode(true);
    div.querySelectorAll('input').forEach(input => {
        input.value="";
    });

   document.querySelector('.div_mail').append(div);

}

window.nuevoAccesso=function(){

    let div = document.getElementById('contenedorPrincipal').querySelector('.contenedor_accesso').cloneNode(true);
    div.querySelectorAll('input').forEach(input => {
        input.value="";
    });

   document.querySelector('.div_accesso').append(div);

}
