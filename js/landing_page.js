$(document).ready(function() {
    var myCarousel = document.querySelector('#myCarousel')
    var carousel = new bootstrap.Carousel(myCarousel, {
    interval: 3000,
     wrap: false
    });
});