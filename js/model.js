$(document).ready(function () {
    //item
    $(".containpost").click(function () {
        let id = $(this).prop("id");
        if ($("#id" + id).is(":focus")) {
            console.log($("#id_" + id));
        } else {
            window.location.href = "http://localhost/SocialSpot/views/post.php?id=" + id;
        }
    });


    var a = $(".contain-img");

    for (var i=0; i < a.length; i++) {
        var id = a[i].getAttribute('id')
        var contI = $(".container_img_" + id);
        if(contI.length>2){
            $(".img-left_" + id).css({
                "visibility" : "visible"
            });
            $(".img-right_" + id).css({
                "visibility" : "visible"
            });
            $(".img_ico_" + id).css({
                "visibility" : "visible"
            });
        }
    }
    
    $(".cont-right").click(function () {
        var position = 0;
        var sum = 0;
        let idP = $(this).prop("id");
        var idI = $(".contain-img_" + idP);
        var img = idI.attr("data-val");
        var conI = $(".container_img_" + idP);

        for (var i=0; i <= img; i++) {
            if(conI.length-1 == img){

            }else{
                position++;
                sum+= 150;
                idI.attr("data-val", position);
                $(".group_" + idP).css({
                    "margin-right" : sum +"rem"
                }); 
            }
        }
    });
    $(".cont-left").click(function () {
        var position = 0;
        var sum = 0;
        let idP = $(this).prop("id");
        var idI = $(".contain-img_" + idP);
        var img = idI.attr("data-val");
        
        if(img == 0){

        }else{
            for (var i=0; i < img-1; i++){
                position++;
                idI.attr("data-val", position);
                sum+= 150;
                $(".group_" + idP).css({
                    "margin-right" : sum +"rem"
                });
            }
            if(img==1){
                idI.attr("data-val", 0);
                sum= 0;
                $(".group_" + idP).css({
                    "margin-right" : sum +"rem"
                });
            }
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