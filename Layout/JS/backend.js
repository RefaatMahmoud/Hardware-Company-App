/*Start Astrieks*/
$('input').each(function(){
   if($(this).attr("required") === 'required')
       {
           $(this).after('<span class="asterix">*</span>');
       }
});
/*End Astrieks*/
/*Start Login and signup Treck*/
$('.loginPage .Login').click(function(){
    $(this).addClass('selected1').siblings().removeClass('selected2');
    $('.login').fadeIn(100);
    $('.signup').hide();
});
$('.loginPage .x').click(function(){
    $(this).addClass('selected2').siblings().removeClass('selected1');
    $('.signup').fadeIn(100);
    $('.login').hide();
});
/*End Login and signup Treck*/