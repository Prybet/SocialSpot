/* 
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */


const modalU = document.querySelector(".contain_option");
const decoU = document.querySelector(".decorate_user");

const modalN = document.querySelector("scroll-container-noti");
const decoN = document.querySelector(".decorate_noti");

const modalS = document.querySelector("scroll-container");

$(document).on("click",function(e) {
    var btnS = $(".input_search"); 
    var containerS = $("scroll-container");            
    if (!containerS.is(e.target) && containerS.has(e.target).length === 0) { 
        if(btnS.is(e.target)){
            modalS.style.display = "flex";
        }else{
            modalS.style.display = "none";
        }
        
    }
    var btnN = $("#btn_noti"); 
    var imgN = $(".img-noti"); 
    var containerN = $("scroll-container-noti");            
    if (!containerN.is(e.target) && containerN.has(e.target).length === 0) { 
        if(btnN.is(e.target) || imgN.is(e.target)){
            modalN.style.visibility = "visible";
            decoN.style.visibility = "visible";
        }else{
            modalN.style.visibility = "hidden";
            decoN.style.visibility = "hidden";
        }  
    }
    var btnU = $("#btn_user"); 
    var imgU = $(".img-user"); 
    var lblU = $(".lbluser"); 
    var containerU = $(".contain_option"); 
    if (!containerU.is(e.target) && containerU.has(e.target).length === 0) { 
        if(btnU.is(e.target) || imgU.is(e.target) || lblU.is(e.target)){
            modalU.style.visibility = "visible";
            decoU.style.visibility = "visible";
        }else{
            modalU.style.visibility = "hidden";
            decoU.style.visibility = "hidden";
        }
    } 

    
    $("#img_map").click(() =>{
        window.location.href = "http://localhost/SocialSpot/views/map.php";
    });

});

