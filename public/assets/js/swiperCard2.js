// Inisialisasi Swiper
const swiper = new Swiper(".mySwiper", {
    slidesPerView: 3, // Default untuk layar besar
    spaceBetween: 0,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        // Ketika lebar layar >= 768px
        768: {
            slidesPerView: 3,
        },
        // Ketika lebar layar < 768px
        0: {
            slidesPerView: 1,
        },
    },
});
