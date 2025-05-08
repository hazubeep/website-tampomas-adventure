"use strict";

const navbar = document.querySelector("[data-navbar]");
const overlay = document.querySelector("[data-overlay]");
const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navCloseBtc = document.querySelector("[data-nav-close-btn]");
const navbarLink = document.querySelectorAll("[data-navbar-link]");

const elementArr = [navOpenBtn, navCloseBtc, overlay];

const navToggleEvent = function (element) {
    for (let i = 0; i < element.length; i++) {
        element[i].addEventListener("click", function () {
            navbar.classList.toggle("active");
            overlay.classList.toggle("active");
        });
    }
};

navToggleEvent(elementArr);
navToggleEvent(navbarLink);

// sticky header

const header = document.querySelector("[data-header]");

window.addEventListener("scroll", function () {
    if (window.scrollY >= 200) {
        header.classList.add("active");
    } else {
        header.classList.remove("active");
    }
});

// hero

const slides = document.querySelectorAll(".slide");
const dots = document.querySelectorAll(".dot");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");

let currentSlide = 0;
let slideInterval;
let touchStartX = 0;
let touchEndX = 0;
const sliderContainer = document.querySelector(".hero-slider");
const slideDuration = 5000;

function handleTouchStart(e) {
    touchStartX = e.changedTouches[0].screenX;
}
function handleTouchEnd(e) {
    touchEndX = e.changedTouches[0].screenX;
    handelSwipe();
}

function handelSwipe() {
    const threshold = 50;

    if (touchEndX < touchStartX - threshold) {
        nextSlide();
        stopSlideShow();
        startSlideShow();
    }

    if (touchEndX > touchStartX - threshold) {
        prevSlide();
        stopSlideShow();
        startSlideShow();
    }
}

function goToSlide(n) {
    slides[currentSlide].classList.remove("active");
    dots[currentSlide].classList.remove("active");
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].classList.add("active");
    dots[currentSlide].classList.add("active");
}

function nextSlide() {
    goToSlide(currentSlide + 1);
}

function prevSlide() {
    goToSlide(currentSlide - 1);
}

function startSlideShow() {
    slideInterval = setInterval(nextSlide, slideDuration);
}

function stopSlideShow() {
    clearInterval(slideInterval);
}

nextBtn.addEventListener("click", function () {
    nextSlide();
    stopSlideShow();
    startSlideShow();
});

prevBtn.addEventListener("click", function () {
    prevSlide();
    stopSlideShow();
    startSlideShow();
});

dots.forEach((dot) => {
    dot.addEventListener("click", function () {
        const slideIndex = parseInt(this.getAttribute("data-slide"));
        goToSlide(slideIndex);
        stopSlideShow();
        startSlideShow();
    });
});

document
    .querySelector(".hero-slider")
    .addEventListener("mouseenter", stopSlideShow);
document
    .querySelector(".hero-slider")
    .addEventListener("mouseleave", startSlideShow);

startSlideShow();

sliderContainer.addEventListener("touchstart", handleTouchStart, {
    passive: true,
});
sliderContainer.addEventListener("touchend", handleTouchEnd, { passive: true });
