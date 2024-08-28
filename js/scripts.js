
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

  // Function to check if an element is in viewport
function isInViewport(element) {
  const rect = element.getBoundingClientRect();
  return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

// Function to handle the reveal effect
function revealOnScroll() {
  const revealElements = document.querySelectorAll('.reveal-element');

  revealElements.forEach(element => {
      if (isInViewport(element)) {
          element.classList.add('revealed');
      }
  });
}

// Intersection Observer setup
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
      if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          // observer.unobserve(entry.target); // Optional: if you want to reveal only once
      }
  });
}, {
  threshold: 0.5 // Adjust the threshold as needed
});

// Observe each element with class 'reveal-element'
document.querySelectorAll('.reveal-element').forEach(element => {
  observer.observe(element);
});

// Alternative approach: reveal on scroll without Intersection Observer
document.addEventListener('scroll', revealOnScroll);
