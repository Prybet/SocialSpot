/* 
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

let close =  document.querySelectorAll(".close")[0];
      
let open =  document.querySelector(".more-post");  
let modal =  document.querySelectorAll(".modal")[0];
let modalC =  document.querySelectorAll(".modal-container")[0];



open.addEventListener("click", function(e){
    //para quitar la almuadilla de la etiqueta a 
    e.preventDefault();
    modalC.style.opacity = "1";
    modalC.style.visibility = "visible";
    modal.classList.toggle("modal-close");

    
});
close.addEventListener("click", function(){
    modal.classList.toggle("modal-close");
    
    setTimeout(function(){
        modalC.style.opacity = "0";
        modalC.style.visibility = "hidden";
    },850);
});
window.addEventListener("click", function(e){
    x
});



