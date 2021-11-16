$('.sort').sortable({
    update:function(event , ui){
        $(this).children().each(function(index){
            if($(this).attr('data-position') != (index + 1)){
                $(this).attr('data-position',(index + 1)).addClass('updated');
                $('#savebtn').css('display','block');
            }
        
        });
        saveNewPoisition();
    }
});