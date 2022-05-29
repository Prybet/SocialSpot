$(document).ready(function () {
    //item
    $(".contain_post").click(function () {
        let id = $(this).prop("id");
        if ($("#id_" + id).is(":focus")) {
            console.log($("#id_" + id));
        } else {
            window.location.href = "http://localhost/SocialSpot/views/post.php?id=" + id;
        }
    });
    $(".divcom").click(function () {
        let id = $(this).val();
        window.location.href = "http://localhost/SocialSpot/views/post.php?id=" + id;
    });

    //modal
    $(".more-post").click(function () {
        let id = $(this).val();
        $("button[name=btn_report]").val(id);
        $("button[name=btn-gopost]").val(id);


        $(".contain_modal-profile").css({
            "pointer-events": "auto",
            "opacity": "1"
        });
        $("body").css({
            "overflow": "hidden",
            "height": "100vh",
            "padding-right": "17px"

        });

    });
    $(".btn_cancel").click(function () {
        $(".contain_modal-profile").css({
            "pointer-events": "none",
            "opacity": "0"
        });
        $("body").css({
            "overflow": "auto",
            "height": "auto",
            "padding-right": "0"
        });
    });
    $("#btn_report").click(function () {
        $(".contain_modal-profile").css({
            "pointer-events": "none",
            "opacity": "0"
        });
        $(".contain_modal-report").css({
            "pointer-events": "auto",
            "opacity": "1"
        });

    });
    $(".btn-gotospot").click(function () {
        let id = $(this).val();
        window.location.href = "http://localhost/SocialSpot/views/post.php?id=" + id;
    });
    $(".btn_cancel-report").click(function () {
        $(".contain_modal-report").css({
            "pointer-events": "none",
            "opacity": "0"
        });
        $("body").css({
            "overflow": "auto",
            "height": "auto",
            "padding-right": "0"
        });
    });
})