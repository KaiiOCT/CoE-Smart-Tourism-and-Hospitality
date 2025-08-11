document.addEventListener("DOMContentLoaded", () => {
    const shopCards = document.querySelectorAll(".shop-card");

    shopCards.forEach((card) => {
        const shopId = card.getAttribute("data-shop-id");
        const mainImage = card.querySelector(
            `.main-image[data-shop-id="${shopId}"]`,
        );
        const thumbnails = card.querySelectorAll(
            `.thumbnail[data-shop-id="${shopId}"]`,
        );
        let currentImageIndex = 0;
        let autoChange;

        // Fungsi untuk setup gambar utama
        function setupMainImage() {
            if (thumbnails.length > 0) {
                mainImage.src = thumbnails[currentImageIndex].src;
                mainImage.style.opacity = 1;
                updateActiveThumbnail(); // Update thumbnail aktif
            }
        }

        // Fungsi untuk mengganti gambar secara otomatis
        function changeImage() {
            mainImage.style.opacity = 0;
            setTimeout(() => {
                currentImageIndex = (currentImageIndex + 1) % thumbnails.length;
                mainImage.src = thumbnails[currentImageIndex].src;
                mainImage.style.opacity = 1;
                updateActiveThumbnail(); // Update thumbnail aktif
            }, 1000); // Sesuaikan dengan CSS transition
        }

        // Fungsi untuk memperbarui thumbnail yang aktif (memberikan border hijau)
        function updateActiveThumbnail() {
            thumbnails.forEach((thumbnail, index) => {
                // Menghapus kelas 'active' dari semua thumbnail
                thumbnail.classList.remove("active");

                // Menambahkan kelas 'active' pada thumbnail yang sesuai dengan currentImageIndex
                if (index === currentImageIndex) {
                    thumbnail.classList.add("active");
                }
            });
        }

        // Event listener untuk thumbnail klik
        thumbnails.forEach((thumbnail, index) => {
            thumbnail.addEventListener("click", () => {
                clearInterval(autoChange);
                mainImage.style.opacity = 0;
                setTimeout(() => {
                    mainImage.src = thumbnail.src;
                    mainImage.style.opacity = 1;
                    currentImageIndex = index;
                    updateActiveThumbnail(); // Update thumbnail aktif setelah klik
                    autoChange = setInterval(changeImage, 4000); // Restart autoplay
                }, 1000);
            });
        });

        // Setup dan mulai autoplay saat halaman dimuat
        setupMainImage();
        autoChange = setInterval(changeImage, 4000);
    });
});
