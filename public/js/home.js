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

function initGallery() {
    const galleryNext = document.querySelector(".gallery-next");
    const galleryPrev = document.querySelector(".gallery-prev");
    const galleryItems = document.querySelectorAll(".gallery-item");
    const pagination = document.querySelector(".gallery-pagination span");

    if (!galleryNext || !galleryPrev || !galleryItems.length) return;

    let currentPage = 1;
    const totalPages = Math.ceil(galleryItems.length / 4);

    function updatePagination() {
        pagination.textContent = `${String(currentPage).padStart(
            2,
            "0"
        )}/${String(totalPages).padStart(2, "0")}`;
    }

    function showPage(page) {
        galleryItems.forEach((item, index) => {
            const shouldShow = Math.ceil((index + 1) / 4) === page;
            item.style.display = shouldShow ? "block" : "none";
        });
        updatePagination();
    }

    galleryNext.addEventListener("click", () => {
        currentPage = currentPage === totalPages ? 1 : currentPage + 1;
        showPage(currentPage);
    });

    galleryPrev.addEventListener("click", () => {
        currentPage = currentPage === 1 ? totalPages : currentPage - 1;
        showPage(currentPage);
    });

    // Initialize
    showPage(1);
}
