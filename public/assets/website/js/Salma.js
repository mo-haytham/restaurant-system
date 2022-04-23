$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    items: 3,
    center: true,
    loop: true,
    dots: false,
    margin: 0,
    autoWidth: true,
    stagePadding: 0,
    smartSpeed: 450,
    responsiveClass: true,
    responsive: {
      0: {
        items: 2,
      },
      485: {
        items: 3,
      },
      728: {
        items: 4,
        loop: true,
      },
      960: {
        items: 5,
        loop: true,
      },
      1200: {
        items: 6,
      },
    },
  });
});
