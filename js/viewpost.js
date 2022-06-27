/* 
 * SocialSpot 2022
 * Made by: 
 *  jasmet_generico1
 *  soulbroken
 *  Prybet
 */

$(document).ready(function () {


    $("button[name=hash]").click(function () {
        var text = $("#hashtags").val();
        var hash = toHashTag(text);
        if (hash !== "") {
            var id = $("button[name=hash]").val();
            $.ajax({
                url: "../Controllers/AjaxController.php",
                type: "post",
                data: {"hash": hash, "sub": "hash", "id": id},
                success: function (data) {
                    console.log(data);
                    if (data) {
                        $("#cont-hash").append("\n\
                        <label class='conten_lbl-hash'>\n\
                            "+hash+"\n\
                            <div class='conten_btn-hashtag'>\n\
                                <button type='button' class='btn_hashtag' value="+data+">x</button>\n\
                            </div>\n\
                        </label>");
                        //$("#cont-hash").append("<input type='text' name='hash-' value=" + hash + " hidden>");
                        //$("#cont-hash").append("<span>" + hash + "</span>");
                        $("#hashtags").empty();
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });
    $(".btn_hashtag").click(function (){
        let id = $(this).val();
        console.log(id);
        $.ajax({
            url: "../Controllers/AjaxController.php",
            type: "post",
            data: {"id": id , "sub": "deletehash"},
            success: function (data) {
                console.log(data);
                if (data) {
                    $(".conten_lbl-hash_"+id).empty;
                }else{
                    console.log("algo malo ocurrio");
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
        
    });
});


function toHashTag(text) {
    var text = text.replace(/\s+/g, "");
    var text = text.replaceAll("#", "");
    var text = text.replaceAll("'", "");
    var text = text.replaceAll("\"", "");
    return text;
} 