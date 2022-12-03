(function($) {
    'use strict';

    $(window).on('load', function() {
        $('#section-preloader').fadeOut('slow');
    });

    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $(this).toggleClass('active');
        });

        InitWaypointAnimations({
            animateClass: 'ez-animate'
        });

        if ($('.video-popup').length) {
            $('.video-popup').magnificPopup({
                type            : 'iframe',
                disableOn       : 700,
                preloader       : true,
                mainClass       : 'mfp-fade',
                removalDelay    : 160,
                fixedContentPos : false
            });
        }
    });
})(jQuery);
