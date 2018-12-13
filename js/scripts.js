( function( $ ) {

  $(document).ready(function() {

      // navmenu

      $('#cssmenu').prepend('<div id="menu-button">Menu</div>');

      $('#cssmenu #menu-button').on('click', function(){

        var menu = $(this).next('ul');

        if (menu.hasClass('open')) {

          menu.removeClass('open');

        }

        else {

          menu.addClass('open');

        }

      });

  });

    // // Rounded cliping image

    // var cw = $('.circle-image').width();
    // $('.circle-image').css({
    //   'height': cw + 'px'
    // });
  
    // // Magnific Popup
  
    // $('.portfolio-photo').magnificPopup({
    //   delegate: 'a',
    //   type: 'image',
    //   tLoading: 'Loading image #%curr%...',
    //   mainClass: 'mfp-img-mobile',
    //   gallery: {
    //     enabled: true,
    //     navigateByImgClick: true,
    //     preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    //   },
    //   image: {
    //     tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
    //     titleSrc: function(item) {
    //       return item.el.attr('title');
    //     }
    //   }
    // });

} )( jQuery );