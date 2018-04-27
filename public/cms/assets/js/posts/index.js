$(document).ready(function () {
    var formPages = $('#form-search');
    formPages.on('keyup', '[name="q"]', function(){
        var q = $(this).val();

        $('[data-role="search-not-match"]').addClass('hidden');
        $('[data-role="search-not-found"]').addClass('hidden');
        $('.card').removeClass('d-block');
        $('.card').addClass('hidden');

        $('.card-title>a').each(function(){
            if($(this).text().toUpperCase().indexOf(q.toUpperCase()) != -1){
                $(this).parents('.card').addClass('d-block');
                $(this).parents('.card').removeClass('hidden');
            }
        });

        if($('.card.d-block').length == 0) {
            $('[data-role="search-not-match"]').removeClass('hidden');
        }
    });

    $('[data-action="post-delete"]').click(function(e){
        e.preventDefault();

        var href = $(this).attr('href');

        $('#confirm-dialog').modal('show');

        $('#confirm-dialog').on('click','[value="yes"]', function(){
            window.location = href;
        });

        $('#confirm-dialog').on('click','[value="no"]', function(){
            $('#confirm-dialog').modal('hide');
        });
    });
});