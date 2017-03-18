/*Strart Astriex*/
$('input').each(function(){
   if($(this).attr("required") === 'required')
       {
           $(this).after('<span class="asterix">*</span>');
       }
});
/*End Asterix*/


/*Strart eye*/
var passfield = $('.password');
$('.show-pass').hover(function(){
    passfield.attr('type','text');
},
//when leave by mouse
function(){
    passfield.attr('type','password');
});
/*End eye*/    


/*Strart in member page Delete confirm*/
$('.confirm').click(function(){
    return confirm("Are you sure about delete this record!!");
});
/* End in member page Delete confirm*/
