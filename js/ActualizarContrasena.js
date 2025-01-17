/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/JavaScript.js to edit this template
 */

const btnNuevaContraseña = document.querySelector("#btn-nueva-contraseña");

const btnCerrarModal = document.querySelector("#btn-cerrar");

const btnActualizarModal = document.querySelector("#btn-actualizar");

const modal = document.querySelector("#modal");


btnNuevaContraseña.addEventListener("click",()=>{
    modal.showModal();
})

btnCerrarModal.addEventListener("click",()=>{
    modal.close();
})


