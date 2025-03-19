document.addEventListener("DOMContentLoaded", () => {
    const carousel = document.querySelector(".carousel1");
    const cards = document.querySelectorAll(".carousel1 .card1");
    let isDragging = false, startX, scrollLeft, autoSlideInterval;

    // Duplicate cards for seamless infinite scrolling
    function duplicateCards() {
        const clone = [...cards].map(card => card.cloneNode(true));
        clone.forEach(card => carousel.appendChild(card));
    }
    duplicateCards();

    // Auto-slide function
    function autoSlide() {
        autoSlideInterval = setInterval(() => {
            if (carousel.scrollLeft + carousel.clientWidth >= carousel.scrollWidth - carousel.clientWidth) {
                carousel.scrollTo({ left: 0, behavior: "instant" });
            } 
            carousel.scrollBy({ left: carousel.clientWidth / 2, behavior: "smooth" });
        }, 3000); // Adjust time interval (in ms)
    }

    // Start auto-slide
    autoSlide();

    // Stop auto-slide when user interacts
    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
        setTimeout(autoSlide, 5000); // Restart after inactivity
    }

    // Dragging functionality
    carousel.addEventListener("mousedown", (e) => {
        isDragging = true;
        startX = e.pageX - carousel.offsetLeft;
        scrollLeft = carousel.scrollLeft;
        carousel.classList.add("dragging");
        stopAutoSlide();
    });

    carousel.addEventListener("mouseleave", () => {
        isDragging = false;
        carousel.classList.remove("dragging");
    });

    carousel.addEventListener("mouseup", () => {
        isDragging = false;
        carousel.classList.remove("dragging");
    });

    carousel.addEventListener("mousemove", (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - carousel.offsetLeft;
        const walk = (x - startX) * 2; // Adjust drag speed
        carousel.scrollLeft = scrollLeft - walk;
    });

    // Restart auto-slide when dragging stops
    carousel.addEventListener("touchend", stopAutoSlide);
    carousel.addEventListener("mouseup", stopAutoSlide);
});
