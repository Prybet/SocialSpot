/* 
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

$(document).ready(function () {
    const containUser = document.querySelector("#btn_user");

    $("#search").click(function () {
        $("scroll-container").css({
            "visibility": "visible"
        });
        $(".decorate_found").css({
            "visibility": "visible"
        });
    });
    $("#search").focusout(function () {
        $("scroll-container").css({
            "visibility": "hidden"
        });
        $(".decorate_found").css({
            "visibility": "hidden"
        });
    });

    $("#btn_noti").click(function () {
        $("scroll-container-noti").css({
            "visibility": "visible"
        });
        $(".decorate_noti").css({
            "visibility": "visible"
        });
    });

    $("#btn_noti").focusout(function () {
        $("scroll-container-noti").css({
            "visibility": "hidden"
        });
        $(".decorate_noti").css({
            "visibility": "hidden"
        });
    });


    $("#btn_user").click(function () {
        $(".contain_option").css({
            "visibility": "visible"
        });
        $(".decorate_user").css({
            "visibility": "visible"
        });
    });

    $("#btn_user").focusout(function () {
        
        $(".contain_option").css({
            "visibility": "hidden"
        });
        $(".decorate_user").css({
            "visibility": "hidden"
        });
    });



    $("#btn_delete").click(function () {
        $(".contain_modal-profile").css({
            "pointer-events": "auto",
            "opacity": "1"
        });
    });


    $("#btn_editar").click(function () {
        window.location.href = "http://localhost/SocialSpot/views/editProfile.php";
    });

    $("#btn_more").click(function () {
        $(".contain_modal-profile").css({
            "pointer-events": "auto",
            "opacity": "1"
        });
    });

    $("#btn_user").click(function (e) {
        e.stopPropagation();
        $(".contain_option").toggleClass("ocultarContainOption")

    });
    

     
});
