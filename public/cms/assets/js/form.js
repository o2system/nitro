$(document).ready(function(){
    $('[data-action="save"]').click(function(){
        $(this).parents('form').submit();
    });

    // TinyMCE Page Editor
    tinymce.init({
        selector: '.tinymce',
        height: 500,
        menubar: false,
        themes: "inlite",
        statusbar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code help wordcount'
        ],
        toolbar: 'insert |  formatselect | bold italic blockquote alignleft aligncenter alignright alignjustify bullist numlist outdent indent removeformat | code',
    });
});
