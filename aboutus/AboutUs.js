let currentSlide = 0;
const testimonials = document.querySelectorAll('.testimonial');
const slideWidth = testimonials[0].clientWidth * 3; // Width of three testimonials

function showSlide(n) {
    currentSlide += n;
    if (currentSlide > testimonials.length / 3 - 1) {
        currentSlide = 0;
    }
    if (currentSlide < 0) {
        currentSlide = testimonials.length / 3 - 1;
    }
    
    const slidePosition = -currentSlide * slideWidth;
    document.querySelector('.testimonial-slide').style.transform = `translateX(${slidePosition}px)`;
}

function changeSlide(n) {
    showSlide(n);
}
