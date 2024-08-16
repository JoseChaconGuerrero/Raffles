
const wrapper1 = document.querySelector(".wrapper1");
const carousel1 = document.querySelector(".carousel1");
const firstCardWidth1 = carousel1.querySelector(".card").offsetWidth;
const arrowBtns1 = document.querySelectorAll(".wrapper1 i");
const carousel1Childrens = [...carousel1.children];

let isDragging1 = false, isAutoPlay1 = true, startX1, startScrollLeft1, timeoutId1;


if(carousel1.childElementCount == 1){
    carousel1.classList.add("one-card")
    arrowBtns1.forEach(arrow => {
        arrow.classList.add("hidden")
        
    });
}
else{
    carousel1.classList.remove("one-card")
    arrowBtns1.forEach(arrow => {
        arrow.classList.remove("hidden")
        
    });
}
// Get the number of cards that can fit in the carousel1 at once
let cardPerView1 = Math.round(carousel1.offsetWidth / firstCardWidth1);

// Insert copies of the last few cards to beginning of carousel1 for infinite scrolling
carousel1Childrens.slice(-cardPerView1).reverse().forEach(card => {
    carousel1.insertAdjacentHTML("afterbegin", card.outerHTML);
});

// Insert copies of the first few cards to end of carousel1 for infinite scrolling
carousel1Childrens.slice(0, cardPerView1).forEach(card => {
    carousel1.insertAdjacentHTML("beforeend", card.outerHTML);
});

// Scroll the carousel1 at appropriate postition to hide first few duplicate cards on Firefox
carousel1.classList.add("no-transition");
carousel1.scrollLeft = carousel1.offsetWidth;
carousel1.classList.remove("no-transition");

// Add event listeners for the arrow buttons to scroll the carousel1 left and right
arrowBtns1.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel1.scrollLeft += btn.id == "left" ? -firstCardWidth1 : firstCardWidth1;
    });
});

const dragStart = (e) => {
    isDragging1 = true;
    carousel1.classList.add("dragging");
    // Records the initial cursor and scroll position of the carousel1
    startX = e.pageX;
    startScrollLeft = carousel1.scrollLeft;
}

const dragging = (e) => {
    if(!isDragging1) return; // if isDragging is false return from here
    // Updates the scroll position of the carousel1 based on the cursor movement
    carousel1.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
    isDragging1 = false;
    carousel1.classList.remove("dragging");
}



carousel1.addEventListener("mousedown", dragStart);
carousel1.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);

wrapper1.addEventListener("mouseenter", () => clearTimeout(timeoutId));


const wrapper = document.querySelector(".wrapper");
const carousel = document.querySelector(".carousel");
const firstCardWidth = carousel.querySelector(".card").offsetWidth;
const arrowBtns = document.querySelectorAll(".wrapper i");
const carouselChildrens = [...carousel.children];

let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;

// Get the number of cards that can fit in the carousel at once
let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

// Insert copies of the last few cards to beginning of carousel for infinite scrolling
carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
    carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
});

// Insert copies of the first few cards to end of carousel for infinite scrolling
carouselChildrens.slice(0, cardPerView).forEach(card => {
    carousel.insertAdjacentHTML("beforeend", card.outerHTML);
});

// Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
carousel.classList.add("no-transition");
carousel.scrollLeft = carousel.offsetWidth;
carousel.classList.remove("no-transition");

// Add event listeners for the arrow buttons to scroll the carousel left and right
arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
    });
});

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
