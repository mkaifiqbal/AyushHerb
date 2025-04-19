let slides = document.querySelectorAll('.slides');
    let count = 0;
    slides.forEach((slide, index) => {
        slide.style.left = `${index * 100}%`;
    });

    function slider() {
        slides.forEach((slide) => {
            slide.style.transform = `translateX(-${count * 100}%)`;
        });
    }

    function next() {
        count++;
        if (count >= slides.length) {
            count = 0;
        }
        slider();
    }
    setInterval(next, 2000);