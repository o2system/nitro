/**
 * This file is part of the O2System Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------

if ('serviceWorker' in navigator) {
    navigator.serviceWorker
        .register('service-worker.js')
        .then(function(registration) {
            console.info(
                'Service Worker registration successful with scope: ',
                registration.scope
            );
        })
        .catch(function(err) {
            console.error('Service Worker registration failed: ', err);
        });
} else {
    console.error('Service Worker registration failed, insecure page, please serve your page over HTTPS or use localhost');
}

// $('body').on('click', 'a', function(e){
//     if(typeof $(this).attr('target') == 'undefined') {
//         e.preventDefault();
//         $('.active').removeClass('active');
//         var targetElement = $(this).data('target');

//         if(typeof targetElement == 'undefined') {
//             if($('#page-sub-content').length == 0) {
//                 targetElement = 'page-content';
//             } else {
//                 targetElement = 'page-sub-content';
//             }
//         }

//         $(this).addClass('active');

//         $(this).closest('ul').find('.selected').removeClass('selected');
//         $(this).closest('li').addClass('selected');

//         window.history.pushState(null, null, $(this).attr('href'));
//         $( '#' + targetElement ).load($(this).attr('href'), function(){
//             $.getScript('/manage/themes/default/theme.js');
//         });
//     } else if($(this).attr('target') == '_self') {
//         e.preventDefault();
//         window.location = $(this).attr('href');
//     }
// });