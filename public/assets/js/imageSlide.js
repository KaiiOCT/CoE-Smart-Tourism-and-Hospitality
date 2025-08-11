const thumbnails = document.querySelectorAll(".thumbnail");
const mainImage = document.getElementById("main-image");
let currentImageIndex = 0;

function setupMainImage() {
    mainImage.src = thumbnails[currentImageIndex].src;
    mainImage.style.opacity = 1; // Menampilkan gambar
    updateActiveThumbnail(); // Memperbarui thumbnail aktif
}

function changeImage() {
    mainImage.style.opacity = 0; // Memudarkan gambar
    setTimeout(() => {
        currentImageIndex = (currentImageIndex + 1) % thumbnails.length;
        mainImage.src = thumbnails[currentImageIndex].src;
        mainImage.style.opacity = 1; // Muncul lagi
        updateActiveThumbnail(); // Memperbarui thumbnail aktif
    }, 1000); // Interval harus sama dengan durasi transisi CSS
}

function updateActiveThumbnail() {
    thumbnails.forEach((thumbnail, index) => {
        // Menghapus kelas active dari semua thumbnail
        thumbnail.classList.remove("active");

        // Menambahkan kelas active pada thumbnail yang sesuai dengan currentImageIndex
        if (index === currentImageIndex) {
            thumbnail.classList.add("active");
        }
    });
}

thumbnails.forEach((item, index) => {
    item.addEventListener("click", (event) => {
        clearInterval(autoChange); // Menghentikan autoplay
        mainImage.style.opacity = 0;
        setTimeout(() => {
            mainImage.src = event.target.src;
            mainImage.style.opacity = 1;
            currentImageIndex = index;
            updateActiveThumbnail(); // Memperbarui thumbnail aktif
            autoChange = setInterval(changeImage, 4000); // Memulai ulang autoplay
        }, 1000);
    });
});

let autoChange = setInterval(changeImage, 4000); // Autoplay dengan interval 4 detik
document.addEventListener("DOMContentLoaded", setupMainImage); // Setup gambar utama saat load
