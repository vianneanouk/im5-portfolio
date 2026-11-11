document.querySelectorAll('[data-slider]').forEach((slider) => {
    const track = slider.querySelector('.slider__track');
    const prev  = slider.querySelector('.slider__btn--prev');
    const next  = slider.querySelector('.slider__btn--next');

    const update = () => {
        prev.disabled = track.scrollLeft <= 1;
        next.disabled = track.scrollLeft + track.clientWidth >= track.scrollWidth - 1;
    };

    prev.addEventListener('click', () => track.scrollBy({ left: -track.clientWidth, behavior: 'smooth' }));
    next.addEventListener('click', () => track.scrollBy({ left:  track.clientWidth, behavior: 'smooth' }));
    track.addEventListener('scroll', update, { passive: true });

    update();
});