$(document).ready(function(){
    $('.best-seller-slider').slick({
        dots: true,
        infinite: true,
        speed: 800,
        slidesToShow: 4, // 4 items on desktop
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false, // Clean look without side arrows
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1, // 1 item on mobile
                }
            }
        ]
    });
});