// Mobile menu toggle
const overlay = document.querySelector("[data-overlay]");
const navbar = document.querySelector("[data-navbar]");
const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navLinks = document.querySelectorAll("[data-nav-link]");

const navElementArr = [overlay, navOpenBtn];

const navToggleEvent = function (element) {
    for (let i = 0; i < element.length; i++) {
        element[i].addEventListener("click", function () {
            if (window.innerWidth <= 768) {
                navbar.classList.toggle("active");
                overlay.classList.toggle("active");
            }
        });
    }
};

navToggleEvent(navElementArr);
navToggleEvent(navLinks);

window.addEventListener("resize", function () {
    if (window.innerWidth > 768) {
        navbar.classList.remove("active");
        overlay.classList.remove("active");
    }
});

document.addEventListener("DOMContentLoaded", function () {
    initSrollAnimations();
    animateNumbers();
    initGallery();
});

function animateNumbers() {
    const statNumbers = document.querySelectorAll(".stat-number");

    statNumbers.forEach((number) => {
        const target = parseInt(number.getAttribute("data-target"));
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;

        const updateNumber = () => {
            if (current < target) {
                current += increment;
                number.textContent = Math.round(current);
                requestAnimationFrame(updateNumber);
            } else {
                number.textContent = target + (target === 98 ? "%" : "+");
            }
        };

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        updateNumber();
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.5,
            }
        );

        observer.observe(number);
    });
}

function initSrollAnimations() {
    const animatedElements = document.querySelectorAll(".will-animate");

    if ("IntersectionObserver" in window) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("animate");
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.2,
            }
        );
        animatedElements.forEach((element) => {
            observer.observe(element);
        });
    } else {
        animatedElements.forEach((element) => {
            element.classList.add("animate");
        });
    }
}