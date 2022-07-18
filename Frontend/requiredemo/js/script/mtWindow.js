define(function(){
    var mtWindow=function(msg){
        $(".body_contanier").append('<div class="modai"><div class="motai_up"><p class="attention">提示</p><p class="charcter">'+msg+'</p></div><span class="mt_line"></span><p class="motai_down">确定</p></div><div class="overlay"></div>');
        $(".modai").css("display","block")
            .next().css("display","block");
        $(".motai_down").click(function(){
            $(".modai").css("display","none")
                .next().css("display","none");
            $(".modai").remove();
            $(".overlay").remove();
        });
    }
    return {
        mtWindow:mtWindow
    };
})