/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/JavaScript.js to edit this template
 */

const btnRegistrar = document.querySelector("#btn-registrar");

const btnCerrar = document.querySelector("#btn-cerrar-modal");

const btnActualizarModal = document.querySelector("#btn-actualizar");

const modal = document.querySelector("#modalRegistrar");

btnRegistrar.addEventListener("click",()=>{
    modal.showModal();
})

btnCerrar.addEventListener("click",()=>{
    modal.close();
})