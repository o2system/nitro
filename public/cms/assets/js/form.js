$(document).ready(function(){
    $('[data-action="save"]').click(function(){
        $(this).parents('form').submit();
    });
});