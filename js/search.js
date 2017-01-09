$(function(){
    
    //Живой поиск
    $('.who').bind("change keyup input click", function() {
        if(this.value.length >= 1){
            $.ajax({
                type: 'post',
                url: "search.php", //Путь к обработчику
                data: {'referal':this.value},
                response: 'text',
                success: function(data){
                    $(".search_result").html(data).show(2000); //Выводим полученые данные в списке
                }
            })
        }
    })
    

    
    //При выборе результата поиска, прячем список и заносим выбранный результат в input
    $(".search_result").on("click", "li", function(){
        s_user = $(this).text();
        //$(".who").val(s_user).attr('disabled', 'disabled'); //деактивируем input, если нужно
        $(".search_result").fadeOut();
    });

});