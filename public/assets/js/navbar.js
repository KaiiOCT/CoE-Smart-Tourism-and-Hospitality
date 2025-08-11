window.addEventListener("scroll", function () {
    const navbar = document.getElementById("navbar");
    const navbarDropdown = this.document.getElementById("navbar-dropdown");

    if (this.window.location.pathname == "/") {
        if (this.window.scrollY > 50) {
            navbar.classList.remove("bg-transparent", "text-white");
            navbar.classList.add("bg-white", "md:shadow-md", "text-black");
            navbarDropdown.classList.remove("md:text-white");
            navbarDropdown.classList.add("md:text-black");
        } else {
            navbar.classList.remove("bg-white", "md:shadow-md", "text-black");
            navbar.classList.add("bg-transparent", "text-white");
            navbarDropdown.classList.add("md:text-white");
            navbarDropdown.classList.remove("md:text-black");
        }
    } else {
        if (this.window.scrollY > 200) {
            navbar.classList.remove("rounded-b-2xl", "md:w-[95%]");
            navbar.classList.add("md:w-full");
        } else {
            navbar.classList.add("rounded-b-2xl", "md:w-[95%]");
            navbar.classList.remove("md:w-full");
        }
    }
});
