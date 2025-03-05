$(document).ready(function() {
    let prevSlide = null;

    $('.carousel').on('init', function(event, slick) {
        /*  $('.slick-slide').find('h1, a, span').hide();
         $('.slick-current').find('h1, a, span').slideDown(500).delay(1500); */
    });

    $('.carousel').slick({
        slidesToShow: 5,
        dots: false,
        arrows: true,
        speed: 300,
        slidesToScroll: 1,
        infinite: true,
        centerMode: true,
        centerPadding: '60px',
        focusOnSelect: true,
        cssEase: 'cubic-bezier(.1, .2, .1, .02)',
        prevArrow: $('.nav__prev'),
        nextArrow: $('.nav__next'),
        responsive: [

            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    centerMode: true,
                    centerPadding: '60px',

                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                    centerPadding: '60px',
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    /*  $('.carousel').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
         if (currentSlide !== nextSlide) {
             $('.slick-current').find('h1, a, span').slideUp('fast');
         }
         liked();
     });

     $('.carousel').on('afterChange', function(event, slick, currentSlide) {
         if (currentSlide !== prevSlide) {
             $('.slick-current').find('h1, a, span').slideDown(500).delay(1000);
             prevSlide = currentSlide;
         };
     }); */

    const liked = () => {
        $('.slick-current').find('span').on('click', function() {
            if ($(this).hasClass('liked')) {
                $(this).removeClass('liked');
            } else {
                $(this).addClass('liked');
            }
        });
    }

});