$('input[name=expertise_area]').on('change',function(){
    console.log($(this).attr('id'));
    if($(this).attr('id') == 'other'){
        console.log($('#area_input_div'));
        $("#area_input_div").removeClass("hidden");
    }else{
        $('#area_input_div').addClass('hidden');
    }
})
