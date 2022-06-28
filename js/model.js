$(document).ready(function () {
    var ip = "http://20.226.8.31";
    //Item
    $(".contain_post").click(function () {
        let id = $(this).prop("id");
        if ($("#id_" + id).is(":focus") || $(".cont-left").is(":focus") || $(".cont-right").is(":focus") || $(".heartNotLike").is(":focus") || $(".heartLike").is(":focus")) {
            console.log($("#id_" + id));
        } else {
            window.location.href = ip +"/SocialSpot/views/post.php?id=" + id;
        }
    }); 
    
    //Modal
    $(".more-post").click(function () {
        let id = $(this).val();
        $("button[name=btn_report]").val(id);
        $("#btn_report").val(id);
        $("button[name=btn-gopost]").val(id);
        $("button[name=showEdit]").val(id);
        $("button[name=showDelete]").val(id);
        
        
        $(".modal").css({
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
        $(".modal").css({
            "pointer-events": "none",
            "opacity": "0"
        });
        $("body").css({
            "overflow": "auto",
            "height": "auto",
            "padding-right": "0"
        });
    });
    $(".btn-gotospot").click(function () {
        let id = $(this).val();
        window.location.href = ip+"/SocialSpot/views/post.php?id=" + id;
    });
    
    //Report Post
    $("#btn_report").click(function () {
        let id = $(this).val();
        $("#inputIdPost").val(id);
        $(".modal").css({
            "pointer-events": "none",
            "opacity": "0"
        });
        $("#modal-report").css({
            "pointer-events": "auto",
            "opacity": "1"
        });
    });
    $(".btn_cancel-report").click(function () {
        $("#modal-report").css({
            "pointer-events": "none",
            "opacity": "0"
        });
        $("body").css({
            "overflow": "auto",
            "height": "auto",
            "padding-right": "0"
        });
    });
    
    //Modal Report Warning
    $(".btn-warning").click(function (){
        $("#modal-warning").css({
            "pointer-events": "none",
            "opacity": "0"
        });
    });
    
    //Icon For Images Post
    var a = $(".contain-img");
    for (var i=0; i < a.length; i++) {
        var id = a[i].getAttribute('id');
        var contI = $(".container_img_" + id);
        if(contI.length>1){
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
    
    //Icon Comentary For Post
    $(".divcom").click(function () {
        let id = $(this).val();
        window.location.href = ip+"/SocialSpot/views/post.php?id=" + id;
    });   
    
    //Modal Delete Post
    $("#btn_delete-post").click(function (){
        let id = $(this).val();
        $("textarea[name=postID]").append(id);
        $("#modal-delete").css({
            "pointer-events": "auto",
            "opacity": "1"
        });
        $(".modal").css({
            "pointer-events": "none",
            "opacity": "0"
        });
        $("body").css({
            "overflow": "hidden",
            "height": "100vh",
            "padding-right": "17px"
        });
    });
    $(".btn_cancel").click(() =>{
        $("#modal-delete").css({
            "pointer-events": "none",
            "opacity": "0"
        });
    });
    
    //Show edit post
    $("button[name=showEdit]").click(function (){
        let id = $(this).val();
        $("button[name=hash]").val(id);;
        $("#modal-edit").css({
            "pointer-events": "auto",
            "opacity": "1"
        });
        
        $.ajax({
            url: "../Controllers/AjaxController.php",
            type: "post",
            data: {"id": id, "sub": "getPost"},
            dataType: "json"
        }).done(function(data) {
            if(data !== null){
                $("textarea[name=postID]").append(id);
                $("#textTitle").empty();
                $("#textDesc").empty();
                $("#textTitle").append(data.title);
                $("#textDesc").append(data.body);
            }else{
                console.log("error");
            }
        });  
    });
    
    //Edit Post
    $("#cancelEdit").click(function (){
        $("#modal-edit").css({
            "pointer-events": "none",
            "opacity": "0"
        });
    });
    
    //Find User
    $(document).on('keyup', '#search', function (){
        var r = $(this).val();
        $.ajax({
            url: "../Controllers/AjaxController.php",
            type: "post",
            data: {"id": r, "sub": "search"},
            success: function (data) {
                if (data) {
                    console.log(data);
                    $("#scroll-find").empty();
                    if(data !== null){
                        if(data.length > 0){
                            for (var i=0; i < data.length; i++){
                                if(data[i].imageURL === ""){
                                    data[i].imageURL = "../img/perfil.png";
                                }else{
                                    data[i].imageURL = "../../SSpotImages/UserMedia/" + data[i].username + "-Folder/ProfileImages/" + data[i].imageURL;
                                }
                                
                                if(data[i].check !== 0){
                                    data[i].name = "/" + data[i].name;
                                }else{
                                    data[i].name = "";
                                }
                                
                                var stringFollow = "";
                                if(data[i].followers.length === 1){
                                    stringFollow = "Seguidor";
                                    
                                }else{
                                    stringFollow = "Seguidores";
                                }
                                $("#scroll-find").append("\n\
                                <a class='search_user pointer' value="+data[i].id+" id='asd'>\n\
                                    <img src="+data[i].imageURL+" alt='usuario' class='img_noti pointer'>\n\
                                    <div class='noti_follow-inf'>\n\
                                        <label class='pointer'>"+data[i].username+" <span class='spn_date'>"+data[i].name+"</span><span class='spnFollows'>"+data[i].followers.length+" "+stringFollow+"</span></label>\n\
                                    </div>\n\
                                    </a>\n\
                                ");
                            } 
                            //Nav For Search
                            $(".search_user").click(function (){
                                let id = $(this).attr("value");
                                let idUser = $("#scroll-find").attr("data-user");
                                if(id == idUser){
                                    window.location.href = ip+"/SocialSpot/views/profile.php";
                                }else{
                                    window.location.href = ip+"/SocialSpot/views/profilepublic.php?id=" + id;
                                }
                            });
                        }else{
                            $("#scroll-find").append("\n\
                                <div class='noFound-user'>\n\
                                    <h2>Busqueda no encontrada</h2>\n\
                                </div>\n\
                                ");
                        }
                        
                    }
                }else{
                    $("#scroll-find").empty();
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
    
    //Modal Followers
    $(".contain-cont").click(function (){
        $("#modal-followers").css({
            "pointer-events": "auto",
            "opacity": "1"
        });
        $("body").css({
            "overflow": "hidden",
            "height": "100vh",
            "padding-right": "17px"
        });
    });
    $(".btn_exit-followers").click(function (){
        $("#modal-followers").css({
            "pointer-events": "none",
            "opacity": "0"
        });
        $("body").css({
            "overflow": "auto",
            "height": "auto",
            "padding-right": "0"
        });
    });
    
    //Like For Post
    $(".heartNotLike").click(function (){
        var idPost = $(this).attr("data-post");
        var idUser = $(this).attr("data-user");
        $.ajax({
            url: "../Controllers/AjaxController.php",
            type: "post",
            data: {"idUser": idUser, "idPost": idPost, "sub": "setLike"},
            success: function (data) {
                if(data !== null){
                    var action = "on";
                    changeLike(action, idPost, data);
                }else{
                    console.log("error");
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
    
    
    $(".heartLike").click(function (){
        var idPost = $(this).attr("data-post");
        var idUser = $(this).attr("data-user");
        $.ajax({
            url: "../Controllers/AjaxController.php",
            type: "post",
            data: {"idUser": idUser, "idPost": idPost, "sub": "like"},
            success: function (data) {
                if(data !== null){
                    //var action = "off";
                    //changeLike(action, idPost, data);
                    console.log("nice");
                }else{
                    console.log("error");
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
        
    });
    
    function changeLike(action, int, data){
        switch (action){
            case "on":
                $(".btnHeartOn_"+int).css({
                    "display": "none"
                });
                $(".btnHeartOff_"+int).css({
                    "display": "flex"
                });
                $(".lblOff_"+int).empty();
                $(".lblOff_"+int).append(data);
                break;
            case "off":
                $(".btnHeartOn_"+int).css({
                    "display": "flex"
                });
                $(".btnHeartOff_"+int).css({
                    "display": "none"
                });
                $(".lblOn_"+int).empty();
                $(".lblOn_"+int).append(data);
                break;
        }
    }
});