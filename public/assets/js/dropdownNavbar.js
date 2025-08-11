// tentang kami
document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.getElementById("dropdownAboutUsLink");
    const dropdownMenu = document.getElementById("aboutUsDropdown");

    // Fungsi untuk toggle (menampilkan atau menyembunyikan) dropdown
    dropdownButton.addEventListener("click", function () {
        dropdownMenu.classList.toggle("hidden");
    });

    // Menambahkan event listener untuk menutup dropdown jika klik di luar dropdown
    document.addEventListener("click", function (event) {
        if (
            !dropdownButton.contains(event.target) &&
            !dropdownMenu.contains(event.target)
        ) {
            dropdownMenu.classList.add("hidden");
        }
    });
});

// aktivitas
document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.getElementById("activityDropdownLink");
    const dropdownMenu = document.getElementById("activityDropdown");

    // Fungsi untuk toggle (menampilkan atau menyembunyikan) dropdown
    dropdownButton.addEventListener("click", function (event) {
        event.stopPropagation();  // Mencegah event click di luar dropdown menutup dropdown saat tombol diklik
        dropdownMenu.classList.toggle("hidden");  // Toggle visibility
    });

    // Menambahkan event listener untuk menutup dropdown jika klik di luar dropdown
    document.addEventListener("click", function (event) {
        // Pastikan klik tidak terjadi pada tombol atau menu dropdown
        if (
            !dropdownButton.contains(event.target) &&
            !dropdownMenu.contains(event.target)
        ) {
            dropdownMenu.classList.add("hidden");
        }
    });
});


// program
document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.getElementById("dropdownNavbarLink3");
    const dropdownMenu = document.getElementById("programDropdown");

    // Fungsi untuk toggle (menampilkan atau menyembunyikan) dropdown
    dropdownButton.addEventListener("click", function () {
        dropdownMenu.classList.toggle("hidden");
    });

    // Menambahkan event listener untuk menutup dropdown jika klik di luar dropdown
    document.addEventListener("click", function (event) {
        if (
            !dropdownButton.contains(event.target) &&
            !dropdownMenu.contains(event.target)
        ) {
            dropdownMenu.classList.add("hidden");
        }
    });
});
