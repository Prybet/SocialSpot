/* 
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */


var btnUser = document.querySelector("#btn_user")
var modalU = document.querySelector(".contain_option");
var decoU = document.querySelector(".decorate_user");


btnUser.addEventListener("click", function(){
    modalU.style.visibility = "visible";
    decoU.style.visibility = "visible";
});


$(document).on("click",function(e) {
    var btnU = $("#btn_user");  
    var container = $(".contain_option");            
    if (container.is(e.target)) { 
        
        modalU.style.visibility = "hidden";
    }
});
