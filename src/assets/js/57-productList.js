const scrollLeft = document.getElementById('scroll-left');
const scrollRight = document.getElementById('scroll-right');
const clothesBox = document.getElementById('clothes-box');

// Set the initial scroll position to the left
clothesBox.scrollLeft = 0;

// Scroll the container to the left when clicking on the scroll-left icon
scrollLeft.addEventListener('click', () => {
    clothesBox.scrollLeft -= clothesBox.clientWidth;
});

// Scroll the container to the right when clicking on the scroll-right icon
scrollRight.addEventListener('click', () => {
    clothesBox.scrollLeft += clothesBox.clientWidth;
});