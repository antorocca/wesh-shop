$('.sliderC3').slick({
  infinite: true,
  slidesToShow: 6,
    slidesToScroll: 2
  });

  // index.php
  $('.sliderI2').slick({//marque en avant
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1
  });
  
  $('.sliderI1').slick({//promotion
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 2,
    responsive: [
      {
        breakpoint: 1024,
        settings: "unslick",
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  $('.sliderI3').slick({// fete
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 2,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  
$('.promo-ad').slick({
  dots: true,
  infinite: true,
  speed: 300,
  fade: true,
  cssEase: 'linear'
});