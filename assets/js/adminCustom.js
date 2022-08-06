$(function(){
    $(".delcat").ready(function(){
        $(".delcat").click(function(){
        var id = $(this).data("id");
        var text = $(this).data("text");
        $.ajax({
            type: "POST",
            // ドメインとコントローラー
            url: surl+"admin/deleteCategory",
            data: {
                id: id,
                text: text
            },
            success: function(data) {
                console.log(data);
            },
            error:function(){
                console.log(data);
                console.log("ajax失敗（adminCustom.js）");
            }
        });
        });
    });
})
