function devSlider() {
	var devSlider = new Swiper('.swiper-container-dev', {
    pagination: {
      el: '.swiper-pagination-dev',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    loop: true,
    autoplay: 6000,
    speed: 800,
    effect: 'fade',
    fade: {
      crossFade: false
    },
    slidesPerView: 8,
    spaceBetween: 0,
    breakpoints: {
      1200: {
          slidesPerView: 5,
          spaceBetween: 0
      },
      768: {
          slidesPerView: 4,
          spaceBetween: 0
      },
      640: {
          slidesPerView: 2,
          spaceBetween: 0
      },
      320: {
          slidesPerView: 1,
          spaceBetween: 0
      }
    }
	});
}