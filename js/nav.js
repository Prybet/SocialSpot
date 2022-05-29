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




$(document).on("click",function(e) {
    var btnU = $("#btn_user"); 
    var imgU = $(".img-user"); 
    var lblU = $(".lbluser"); 

    var container = $(".contain_option");            
    if (!container.is(e.target) && container.has(e.target).length === 0) { 
        //si se disparo el btn se hace la condicion 
        if(btnU.is(e.target) || imgU.is(e.target) || lblU.is(e.target)){
            console.log("true");
            modalU.style.visibility = "visible";
            decoU.style.visibility = "visible";
        }else{
            modalU.style.visibility = "hidden";
            decoU.style.visibility = "hidden";
            console.log("else");
        }
        
    }
});

