$(document).ready(function(){
    var formPosts = $('#form-posts');
    formPosts.on('keyup', '[name="title"]', function(){
        var title = $(this).val().replace(/[^0-9a-z]/gi, '-').replace(/-+/g,'-');
        var segments = title.replace(/\s+/g, '-').toLowerCase();

        $('[name="segments"]').attr('value', segments);
        $('[name="meta[title]"]').attr('value', $(this).val());
    });

    var dropify = $('.dropify').dropify();

    dropify.on('dropify.afterClear', function(event, element){
        formPosts.find('[name="image"]').attr('value', null);
    });
});