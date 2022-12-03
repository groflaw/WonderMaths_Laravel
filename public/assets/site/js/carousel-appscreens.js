(function($) {
    'use strict';

    var appScreensSwiper = new Swiper('.swiper.app-screenshots', {
        loop            : true,
        effect          : 'coverflow',
        grabCursor      : true,
        navigation      : {
            prevEl : '#swiper-appscreens-prev-btn',
            nextEl : '#swiper-appscreens-next-btn'
        },
        slidesPerView   : 'auto',
        centeredSlides  : true,
        coverflowEffect : {
            rotate       : 0,
            depth        : 150,
            stretch      : 20,
            modifier     : 1.5,
            slideShadows : false
        }
    });
})(jQuery);
