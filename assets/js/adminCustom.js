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
                    alert('error');
                    $(".error").text(nData.message);
                }else{
                    alert('error');
                    $(".error").text("Something went wrong");
                }
            },
            error:function(){
                alert('error');
                $(".error").text("Something went wrong/ajax失敗（adminCustom.js）");
            }
        });
        });
        $(".delproduct").click(function(){
            // console.log("working..");
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
        $(".delmodel").click(function(){
            console.log("working..");
            var id = $(this).data("id");
            var text = $(this).data("text");
            // ここでバックエンド側にデータを送る
            $.ajax({
                type: "POST",
                // ドメインとコントローラー
                url: surl+"admin/deleteModel",
                data: {
                    id: id,
                    text: text
                },
                success: function(data) {
                    var ndata = JSON.parse(data);
                    // 開発用
                    console.log(ndata);
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
        $(function(){
            $(".add_spec").click(function(){
                var sp_count = $(".sp_cn").length;
                var items = "";
                items +="<div class='form-group contspecval remv"+sp_count+"'>";
                items +='<input type="text" name="so_val[]" class="form-control sp_cn"  placeholder="Spec value" >';
                items +="<a href='javascript:void(0)' class='remov_spec' data-id="+sp_count+">-</a>";
                items +="<div>";

                if(sp_count <= 3){
                    $('.htmlitems').append(items)
                }
        });
        });
        // $(".contspecval").click(function(){
        // $(body).on("click",".contspecval",function(){
        $("body").on("click","a.remov_spec",function(){
            var curnt = $(this).data('id');
            $(".remv"+curnt).remove();

        });
        $(".specNow").click(function(){
            console.log("working..");
            var id = $(this).data("id");
            var text = $(this).data("text");
            // ここでバックエンド側にデータを送る
            $.ajax({
                type: "POST",
                // ドメインとコントローラー
                url: surl+"admin/deleteSpec",
                data: {
                    id: id,
                    text: text
                },
                success: function(data) {
                    var ndata = JSON.parse(data);
                    // 開発用
                    console.log(ndata);
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
        $(function(){
            $(".add_spec").click(function(){
                var sp_count = $(".sp_cn").length;
                var items = "";
                items +="<div class='form-group contspecval remv"+sp_count+"'>";
                items +='<input type="text" name="so_val[]" class="form-control sp_cn"  placeholder="Spec value" >';
                items +="<a href='javascript:void(0)' class='remov_spec' data-id="+sp_count+">-</a>";
                items +="<div>";

                if(sp_count <= 3){
                    $('.htmlitems').append(items)
                }
        });
        });
        // $(".contspecval").click(function(){
        // $(body).on("click",".contspecval",function(){
        $("body").on("click","a.remov_spec",function(){
            var curnt = $(this).data('id');
            $(".remv"+curnt).remove();

        });
        });//ready end here
})
