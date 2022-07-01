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
                data: {"hash": hash, "sub": "hashtag", "id": id},
                dataType: "json",
                success: function (data) {
                    if (data) {
                        console.log("nice");
                        console.log(data);
                        $(".contin-hNew").append("\n\
                         <label class='conten_lbl-hash' id='conten_lbl-hash_" + data.id + "'>\n\
                            " + data.name + "\n\
                            <div class='conten_btn-hashtag'>\n\
                                <button type='button' class='btn_hashtag' value=" + data.id + ">x</button>\n\
                            </div>\n\
                        </label>");
                        $("#hashtags").empty();
                    }
                    $(".btn_hashtag").click(function () {
                        let id = $(this).val();
                        console.log(id);
                        $.ajax({
                            url: "../Controllers/AjaxController.php",
                            type: "post",
                            data: {"id": id, "sub": "deletehash"},
                            success: function (data) {
                                if (data) {
                                    $("#conten_lbl-hash_" + id).remove();
                                } else {
                                    console.log("algo malo ocurrio");
                                }
                            },
                            error: function (data) {
                                console.log(data);
                            }
                        });
                    });
                },
                error: function (data) {
                    console.log("algo malo paso :c");
                    console.log(data);
                }
            });
        }
    });
    $(".btn_hashtag").click(function () {
        let id = $(this).val();
        console.log(id);
        $.ajax({
            url: "../Controllers/AjaxController.php",
            type: "post",
            data: {"id": id, "sub": "deletehash"},
            success: function (data) {
                if (data) {
                    $("#conten_lbl-hash_" + id).remove();
                } else {
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