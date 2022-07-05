$(document).ready(function () {
    
    $("select[name=cate]").change(function () {
        id = $("select[name=cate]").val();
        if (id === "-1") {
            $("#catName").empty();
            $("#catDesc").empty();
            $("#catName").append("/Categoria");
            $("#catImage").attr("src", "../img/perfil.png");
        } else {
            $.ajax({
                url: "../Controllers/AjaxController.php",
                type: "post",
                data: {"id": id, "sub": "category"},
                dataType: "json"
            }).done(function (data) {
                if (data !== null) {
                    $("#catName").empty();
                    $("#catName").append(data["name"]);

                    $("#catDesc").empty();
                    $("#catDesc").append(data["description"]);

                    $("#catImage").empty();
                    $("#catImage").attr("src", "../../SSpotImages/InterestsImages/CategoryImages/ProfileImages/" + data["imageURL"]);

                    $("#members").empty();
                    $("#members").append(data["members"].length);

                    $("#online").empty();
                    $("#online").append(data["onLine"]);
                }
            });
        }
    });
    var id = 0;
    $("#row-" + id).change(function () {
        id++;
        clone = $("input[name=file-0]").clone();
        $(clone).attr("name", "file-" + id);
        $(clone).attr("id", "row-" + id);
        $(clone).appendTo("#container");

        $("input[name=file-0]").val(null);
    });

    $(document).on('keyup', '#title', function () {
        if (document.querySelector("#title").value.startsWith(" ")) {
            document.querySelector("#title").value = document.querySelector("#title").value.replace(/\s+/g, "");
        }
    });
    $(document).on('keyup', '#body', function () {
        if (document.querySelector("#body").value.startsWith(" ")) {
            document.querySelector("#body").value = document.querySelector("#body").value.replace(/\s+/g, "");
        }
    });

});
