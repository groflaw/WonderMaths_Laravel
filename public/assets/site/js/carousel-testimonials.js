(function($) {
    'use strict';

    var testimonialsSwiper = new Swiper('.swiper.app-testimonials', {
        loop           : true,
        effect         : 'slide',
        grabCursor     : true,
        navigation     : {
            prevEl : '#swiper-testimonials-prev-btn',
            nextEl : '#swiper-testimonials-next-btn'
        },
        spaceBetween   : 20,
        slidesPerView  : 1,
        centeredSlides : true
    });
})(jQuery);
