$(function(){
    $(document).ready(function(){
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
                var ndata = JSON.parse(data);
                // 開発用
                // console.log(ndata);
                if(ndata.return == true){
                    $(".error").text(ndata.message);
                    $(".ccat"+id).fadeOut();
                }else if(ndata.return == false){
                    $(".error").text(nData.message);
                }else{
                    $(".error").text("Something went wrong");
                }
            },
            error:function(){
                $(".error").text("Something went wrong/ajax失敗（adminCustom.js）");
            }
        });
        });
        $(".delproduct").click(function(){
            var id = $(this).data("id");
            var text = $(this).data("text");
            $.ajax({
                type: "POST",
                // ドメインとコントローラー
                url: surl+"admin/deleteProduct",
                data: {
                    id: id,
                    text: text
                },
                success: function(data) {
                    var ndata = JSON.parse(data);
                    // 開発用
                    // console.log(ndata);
                    if(ndata.return == true){
                        $(".error").text(ndata.message);
                        $(".ccat"+id).fadeOut();
                    }else if(ndata.return == false){
                        $(".error").text(nData.message);
                    }else{
                        $(".error").text("Something went wrong");
                    }
                },
                error:function(){
                    $(".error").text("Something went wrong/ajax失敗（adminCustom.js）");
                }
            });
            });
        });
})
