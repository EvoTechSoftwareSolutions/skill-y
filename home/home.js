document.addEventListener("DOMContentLoaded", function () {
    const scrollContainer = document.querySelector(".home--sec3--div3");
    let isDown = false;
    let startX;
    let scrollLeft;

    // Drag to scroll
    scrollContainer.addEventListener("mousedown", (e) => {
        isDown = true;
        scrollContainer.classList.add("active");
        startX = e.pageX - scrollContainer.offsetLeft;
        scrollLeft = scrollContainer.scrollLeft;
    });

    scrollContainer.addEventListener("mouseleave", () => {
        isDown = false;
    });

    scrollContainer.addEventListener("mouseup", () => {
        isDown = false;
    });

    scrollContainer.addEventListener("mousemove", (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - scrollContainer.offsetLeft;
        const walk = (x - startX) * 2; // Speed
        scrollContainer.scrollLeft = scrollLeft - walk;
    });

    // Auto-scroll every 3 seconds (optional)
    function autoScroll() {
        if (scrollContainer.scrollLeft + scrollContainer.clientWidth >= scrollContainer.scrollWidth) {
            scrollContainer.scrollLeft = 0;
        } else {
            scrollContainer.scrollLeft += 300; // Scroll step
        }
    }

    setInterval(autoScroll, 3000);
});
