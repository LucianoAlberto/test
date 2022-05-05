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
    else if(event.target.closest("form").classList.contains("proyecto")){
        texto = '¿Desea borrar este proyecto?';
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

window.masDominio = function(event)
{
    let numeroDominios = event.target.closest(".divDominios").querySelectorAll(".contenedorDominios").length;

    let divContenedorDominios = event.target.closest(".divDominios").querySelector(".contenedorDominios").cloneNode(true);

    //modifico el for del label y el name e id del input
    divContenedorDominios.querySelector(".divNombreDominio").querySelector("label").htmlFor = "dominio["+numeroDominios+"][nombre]";
    divContenedorDominios.querySelector(".divNombreDominio").querySelector("input").name = "dominio["+numeroDominios+"][nombre]";
    divContenedorDominios.querySelector(".divNombreDominio").querySelector("input").value = null;

    divContenedorDominios.querySelector(".divUsuarioDominio").querySelector("label").htmlFor = "dominio["+numeroDominios+"][usuario]";
    divContenedorDominios.querySelector(".divUsuarioDominio").querySelector("input").name = "dominio["+numeroDominios+"][usuario]";
    divContenedorDominios.querySelector(".divUsuarioDominio").querySelector("input").value = null;

    divContenedorDominios.querySelector(".divContrasenhaDominio").querySelector("label").htmlFor = "dominio["+numeroDominios+"][contrasenha]";
    divContenedorDominios.querySelector(".divContrasenhaDominio").querySelector("input").name = "dominio["+numeroDominios+"][contrasenha]";
    divContenedorDominios.querySelector(".divContrasenhaDominio").querySelector("input").value = null;

    event.target.closest(".divDominios").appendChild(divContenedorDominios);
}

window.menosDominio = function(event)
{
    let ultimoHijoContenedorDominio = event.target.closest(".divDominios").lastElementChild;

    let listaContenedoresDominio = event.target.closest(".divDominios").querySelectorAll(".contenedorDominio");

    if(ultimoHijoContenedorDominio.classList.contains("contenedorDominio") && listaContenedoresDominio.length > 1){
        ultimoHijoContenedorDominio.remove();
    }
}

window.masBasesDatos = function(event)
{
    let numeroBasesDatos = event.target.closest(".divBasesDatos").querySelectorAll(".contenedorBasesDatos").length;

    let divContenedorBasesDatos = event.target.closest(".divBasesDatos").querySelector(".contenedorBasesDatos").cloneNode(true);

    //modifico el for del label y el name e id del input
    divContenedorBasesDatos.querySelector(".divNombreBD").querySelector("label").htmlFor = "bd["+numeroBasesDatos+"][nombre]";
    divContenedorBasesDatos.querySelector(".divNombreBD").querySelector("input").name = "bd["+numeroBasesDatos+"][nombre]";
    divContenedorBasesDatos.querySelector(".divNombreBD").querySelector("input").value = null;

    divContenedorBasesDatos.querySelector(".divHostBD").querySelector("label").htmlFor = "bd["+numeroBasesDatos+"][host]";
    divContenedorBasesDatos.querySelector(".divHostBD").querySelector("input").name = "bd["+numeroBasesDatos+"][host]";
    divContenedorBasesDatos.querySelector(".divHostBD").querySelector("input").value = null;

    divContenedorBasesDatos.querySelector(".divContrasenhaBD").querySelector("label").htmlFor = "bd["+numeroBasesDatos+"][contrasenha]";
    divContenedorBasesDatos.querySelector(".divContrasenhaBD").querySelector("input").name = "bd["+numeroBasesDatos+"][contrasenha]";
    divContenedorBasesDatos.querySelector(".divContrasenhaBD").querySelector("input").value = null;

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
    let numeroEmail = event.target.closest(".divEmail").querySelectorAll(".contenedorEmails").length;

    let divContenedorEmails = event.target.closest(".divEmail").querySelector(".contenedorEmails").cloneNode(true);

    //modifico el for del label y el name e id del input
    divContenedorEmails.querySelector(".divEmailEmail").querySelector("label").htmlFor = "email["+numeroEmail+"][email]";
    divContenedorEmails.querySelector(".divEmailEmail").querySelector("input").name = "email["+numeroEmail+"][email]";
    divContenedorEmails.querySelector(".divEmailEmail").querySelector("input").value = null;

    divContenedorEmails.querySelector(".divEmailcontrasenha").querySelector("label").htmlFor = "email["+numeroEmail+"][contrasenha]";
    divContenedorEmails.querySelector(".divEmailcontrasenha").querySelector("input").name = "email["+numeroEmail+"][contrasenha]";
    divContenedorEmails.querySelector(".divEmailcontrasenha").querySelector("input").value = null;

    divContenedorEmails.querySelector(".divEmailRuta").querySelector("label").htmlFor = "email["+numeroEmail+"][ruta_acceso]";
    divContenedorEmails.querySelector(".divEmailRuta").querySelector("input").name = "email["+numeroEmail+"][ruta_acceso]";
    divContenedorEmails.querySelector(".divEmailRuta").querySelector("input").value = null;

    event.target.closest(".divEmail").appendChild(divContenedorEmails);
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
    let numeroAcceso = event.target.closest(".divAccesos").querySelectorAll(".contenedorAccesos").length;

    let divContenedorAccesos = event.target.closest(".divAccesos").querySelector(".contenedorAccesos").cloneNode(true);

    //modifico el for del label y el name e id del input
    divContenedorAccesos.querySelector(".divDominioAcceso").querySelector("label").htmlFor = "acceso["+numeroAcceso+"][dominio]";
    divContenedorAccesos.querySelector(".divDominioAcceso").querySelector("input").name = "acceso["+numeroAcceso+"][dominio]";
    divContenedorAccesos.querySelector(".divDominioAcceso").querySelector("input").value = null;

    divContenedorAccesos.querySelector(".divUsuarioAcceso").querySelector("label").htmlFor = "acceso["+numeroAcceso+"][usuario]";
    divContenedorAccesos.querySelector(".divUsuarioAcceso").querySelector("input").name = "acceso["+numeroAcceso+"][usuario]";
    divContenedorAccesos.querySelector(".divUsuarioAcceso").querySelector("input").value = null;

    divContenedorAccesos.querySelector(".divContrasenhaAcceso").querySelector("label").htmlFor = "acceso["+numeroAcceso+"][contrasenha]";
    divContenedorAccesos.querySelector(".divContrasenhaAcceso").querySelector("input").name = "acceso["+numeroAcceso+"][contrasenha]";
    divContenedorAccesos.querySelector(".divContrasenhaAcceso").querySelector("input").value = null;

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

window.masPago = function(event)
{
    let numeroPago = event.target.closest(".divPagos").querySelectorAll(".contenedorNominas").length;

    let divContenedorPagos = event.target.closest(".divPagos").querySelector(".contenedorNominas").cloneNode(true);

    //modifico el for del label y el name e id del input
    divContenedorPagos.querySelector(".divFechaInicioNomina").querySelector("label").htmlFor = "nominas["+numeroPago+"][fecha_inicio]";
    divContenedorPagos.querySelector(".divFechaInicioNomina").querySelector("input").name = "nominas["+numeroPago+"][fecha_inicio]";
    divContenedorPagos.querySelector(".divFechaInicioNomina").querySelector("input").value = null;

    divContenedorPagos.querySelector(".divFechaFinNomina").querySelector("label").htmlFor = "nominas["+numeroPago+"][fecha_fin]";
    divContenedorPagos.querySelector(".divFechaFinNomina").querySelector("input").name = "nominas["+numeroPago+"][fecha_fin]";
    divContenedorPagos.querySelector(".divFechaFinNomina").querySelector("input").value = null;

    divContenedorPagos.querySelector(".divFechaPagoNomina").querySelector("label").htmlFor = "nominas["+numeroPago+"][fecha_pago]";
    divContenedorPagos.querySelector(".divFechaPagoNomina").querySelector("input").name = "nominas["+numeroPago+"][fecha_pago]";
    divContenedorPagos.querySelector(".divFechaPagoNomina").querySelector("input").value = null;

    divContenedorPagos.querySelector(".divHorasNomina").querySelector("label").htmlFor = "nominas["+numeroPago+"][horas_alta_ss]";
    divContenedorPagos.querySelector(".divHorasNomina").querySelector("input").name = "nominas["+numeroPago+"][horas_alta_ss]";
    divContenedorPagos.querySelector(".divHorasNomina").querySelector("input").value = null;

    divContenedorPagos.querySelector(".divImporteTotalNomina").querySelector("label").htmlFor = "nominas["+numeroPago+"][importe_total]";
    divContenedorPagos.querySelector(".divImporteTotalNomina").querySelector("input").name = "nominas["+numeroPago+"][importe_total]";
    divContenedorPagos.querySelector(".divImporteTotalNomina").querySelector("input").value = null;

    divContenedorPagos.querySelector(".divImportePagadoNomina").querySelector("label").htmlFor = "nominas["+numeroPago+"][importe_pagado]";
    divContenedorPagos.querySelector(".divImportePagadoNomina").querySelector("input").name = "nominas["+numeroPago+"][importe_pagado]";
    divContenedorPagos.querySelector(".divImportePagadoNomina").querySelector("input").value = null;

    event.target.closest(".divPagos").appendChild(divContenedorPagos);
}

window.menosPago = function(event)
{
    let ultimoHijoContenedorPagos = event.target.closest(".divPagos").lastElementChild;

    let listaContenedoresPagos = event.target.closest(".divPagos").querySelectorAll(".contenedorNominas");

    if(ultimoHijoContenedorPagos.classList.contains("contenedorNominas") && listaContenedoresPagos.length > 1){
        ultimoHijoContenedorPagos.remove();
    }
}

window.masFalta = function(event)
{
    let numeroFalta = event.target.closest(".divFaltas").querySelectorAll(".contenedorFaltas").length;

    let divContenedorFaltas = event.target.closest(".divFaltas").querySelector(".contenedorFaltas").cloneNode(true);

    //modifico el for del label y el name e id del input
    divContenedorFaltas.querySelector(".divFechaFalta").querySelector("label").htmlFor = "faltas["+numeroFalta+"][fecha_falta]";
    divContenedorFaltas.querySelector(".divFechaFalta").querySelector("input").name = "faltas["+numeroFalta+"][fecha_falta]";
    divContenedorFaltas.querySelector(".divFechaFalta").querySelector("input").value = null;

    divContenedorFaltas.querySelector(".divJustificacionFalta").querySelector("label").htmlFor = "faltas["+numeroFalta+"][justificacion]";
    divContenedorFaltas.querySelector(".divJustificacionFalta").querySelector("input").name = "faltas["+numeroFalta+"][justificacion]";
    divContenedorFaltas.querySelector(".divJustificacionFalta").querySelector("input").value = null;

    divContenedorFaltas.querySelector(".divNotaFalta").querySelector("label").htmlFor = "faltas["+numeroFalta+"][notas]";
    divContenedorFaltas.querySelector(".divNotaFalta").querySelector("input").name = "faltas["+numeroFalta+"][notas]";
    divContenedorFaltas.querySelector(".divNotaFalta").querySelector("input").value = null;

    event.target.closest(".divFaltas").appendChild(divContenedorFaltas);
}

window.menosFalta = function(event)
{
    let ultimoHijoContenedorFaltas = event.target.closest(".divFaltas").lastElementChild;

    let listaContenedoresFaltas = event.target.closest(".divFaltas").querySelectorAll(".contenedorFaltas");

    if(ultimoHijoContenedorFaltas.classList.contains("contenedorFaltas") && listaContenedoresFaltas.length > 1){
        ultimoHijoContenedorFaltas.remove();
    }
}

window.masVacacion = function(event)
{
    let numeroVacaciones = event.target.closest(".divVacaciones").querySelectorAll(".contenedorVacaciones").length;

    let divContenedorVacaciones = event.target.closest(".divVacaciones").querySelector(".contenedorVacaciones").cloneNode(true);

    //modifico el for del label y el name e id del input
    divContenedorVacaciones.querySelector(".divInicioVacaciones").querySelector("label").htmlFor = "vacaciones_disfrutadas["+numeroVacaciones+"][fecha_inicio]";
    divContenedorVacaciones.querySelector(".divInicioVacaciones").querySelector("input").name = "vacaciones_disfrutadas["+numeroVacaciones+"][fecha_inicio]";
    divContenedorVacaciones.querySelector(".divInicioVacaciones").querySelector("input").value = null;

    divContenedorVacaciones.querySelector(".divFinVacaciones").querySelector("label").htmlFor = "vacaciones_disfrutadas["+numeroVacaciones+"][fecha_fin]";
    divContenedorVacaciones.querySelector(".divFinVacaciones").querySelector("input").name = "vacaciones_disfrutadas["+numeroVacaciones+"][fecha_fin]";
    divContenedorVacaciones.querySelector(".divFinVacaciones").querySelector("input").value = null;

    event.target.closest(".divVacaciones").appendChild(divContenedorVacaciones);
}

window.menosVacacion = function(event)
{
    let ultimoHijoContenedorVacaciones = event.target.closest(".divVacaciones").lastElementChild;

    let listaContenedoresVacaciones = event.target.closest(".divVacaciones").querySelectorAll(".contenedorVacaciones");

    if(ultimoHijoContenedorVacaciones.classList.contains("contenedorVacaciones") && listaContenedoresVacaciones.length > 1){
        ultimoHijoContenedorVacaciones.remove();
    }
}

/**Comprobueba si el IBAN introducido tiene el formato correcto
 * Además introduce un guión de forma automática según el número de caracteres introducidos
*/
window.mascaraIban=function() {
    let entradaIban=document.getElementById('cuenta_bancaria');
    if(entradaIban.value.length==2){
        entradaIban.value=entradaIban.value+"-";
    }
    if(entradaIban.value.length===5){
        entradaIban.value=entradaIban.value+"-";
    }
    if(entradaIban.value.length>5){
        entradaIban.value=entradaIban.value;
    }
    if(entradaIban.value.length===10){
        entradaIban.value=entradaIban.value+"-";
    }
    if(entradaIban.value.length===15){
        entradaIban.value=entradaIban.value+"-";
    }
    if(entradaIban.value.length===18){
        entradaIban.value=entradaIban.value+"-";
    }
}

/**Comprueba si la tarjeta bancaria introducida tiene el formato correcto
 * Además introduce un guión de forma automática según el número de caracteres introducidos
*/
window.numero_tarjeta=function() {
    let entradaIban=document.getElementById('n_tarjeta');
    if(entradaIban.value.length==4){
        entradaIban.value=entradaIban.value+"-";
    }
    if(entradaIban.value.length===9){
        entradaIban.value=entradaIban.value+"-";
    }
    if(entradaIban.value.length===14){
        entradaIban.value=entradaIban.value+"-";
    }
    if(entradaIban.value.length>14){
        entradaIban.value=entradaIban.value;
    }
}
