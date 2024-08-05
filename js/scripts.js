
const swiper = new Swiper('.swiper', {
    // Optional parameters
    grapCursor: true,
    centeredSlides: true,
    spaceBetween: true,

    loop: true,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      clickable:true,
      dymanicBllets: true,
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 30,
        },
        769: {
            slidesPerView: 1,
            spaceBetween: 30,
          },
         993: {
            slidesPerView: 3,
            spaceBetween: 10,
          },
        }
  });