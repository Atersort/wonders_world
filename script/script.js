document.addEventListener('DOMContentLoaded', () => {
    const slides = document.querySelectorAll('.slider__slide');
    const prev = document.querySelector('.slider__prev');
    const next = document.querySelector('.slider__next');

    let numberSlide = 0;

    const showSlide = (number) => {
        slides.forEach((slides, index) => {
            slides.classList.toggle('active', index === number);
        });
    };

    const nextSlide = () => {
        numberSlide = (numberSlide + 1) % slides.length;
        showSlide(numberSlide);
    }

    const prevSlide = () => {
        numberSlide = (numberSlide - 1 + slides.length) % slides.length;
        showSlide(numberSlide);
    };

    prev.addEventListener('click', prevSlide);
    next.addEventListener('click', nextSlide);

    showSlide(numberSlide);
});