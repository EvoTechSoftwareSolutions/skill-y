const wrapper2 = document.querySelector(".wrapper2");
const carousel2 = document.querySelector(".carousel2");
const firstcard2Width = carousel2.querySelector(".card2").offsetWidth;
const arrowBtns = document.querySelectorAll(".wrapper2 i");
const carousel2Childrens = [...carousel2.children];

let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;

// Get the number of card2s that can fit in the carousel2 at once
let card2PerView = Math.round(carousel2.offsetWidth / firstcard2Width);

// Insert copies of the last few card2s to beginning of carousel2 for infinite scrolling
carousel2Childrens.slice(-card2PerView).reverse().forEach(card2 => {
    carousel2.insertAdjacentHTML("afterbegin", card2.outerHTML);
});

// Insert copies of the first few card2s to end of carousel2 for infinite scrolling
carousel2Childrens.slice(0, card2PerView).forEach(card2 => {
    carousel2.insertAdjacentHTML("beforeend", card2.outerHTML);
});

// Scroll the carousel2 at appropriate postition to hide first few duplicate card2s on Firefox
carousel2.classList.add("no-transition");
carousel2.scrollLeft = carousel2.offsetWidth;
carousel2.classList.remove("no-transition");

// Add event listeners for the arrow buttons to scroll the carousel2 left and right
arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel2.scrollLeft += btn.id == "left" ? -firstcard2Width : firstcard2Width;
    });
});

const dragStart = (e) => {
    isDragging = true;
    carousel2.classList.add("dragging");
    // Records the initial cursor and scroll position of the carousel2
    startX = e.pageX;
    startScrollLeft = carousel2.scrollLeft;
}

const dragging = (e) => {
    if(!isDragging) return; // if isDragging is false return from here
    // Updates the scroll position of the carousel2 based on the cursor movement
    carousel2.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
    isDragging = false;
    carousel2.classList.remove("dragging");
}

const infiniteScroll = () => {
    // If the carousel2 is at the beginning, scroll to the end
    if(carousel2.scrollLeft === 0) {
        carousel2.classList.add("no-transition");
        carousel2.scrollLeft = carousel2.scrollWidth - (2 * carousel2.offsetWidth);
        carousel2.classList.remove("no-transition");
    }
    // If the carousel2 is at the end, scroll to the beginning
    else if(Math.ceil(carousel2.scrollLeft) === carousel2.scrollWidth - carousel2.offsetWidth) {
        carousel2.classList.add("no-transition");
        carousel2.scrollLeft = carousel2.offsetWidth;
        carousel2.classList.remove("no-transition");
    }

    // Clear existing timeout & start autoplay if mouse is not hovering over carousel2
    clearTimeout(timeoutId);
    if(!wrapper2.matches(":hover")) autoPlay();
}

const autoPlay = () => {
    if(window.innerWidth < 100 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
    // Autoplay the carousel2 after every 2500 ms
    timeoutId = setTimeout(() => carousel2.scrollLeft += firstcard2Width, 2500);
}
autoPlay();

carousel2.addEventListener("mousedown", dragStart);
carousel2.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carousel2.addEventListener("scroll", infiniteScroll);
wrapper2.addEventListener("mouseenter", () => clearTimeout(timeoutId));
wrapper2.addEventListener("mouseleave", autoPlay);