/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                lota1: ["'Lota Grotesque Alt 1'", "sans-serif"],
                lota2: ["'Lota Grotesque Alt 2'", "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
                arial: ["Arial"]
                // default: ["Lota Grotesque Alt 2"],
                // "paragraf-sth": "Lota Grotesque Alt 1",
            },
            colors: {
                background: "#EEEEEE",
                "biru-sth": "#2593CF",
                "putih-sth": "#FFFFFF",
                "pink-sth": "#EC018C",
                "biru-form": "#0095DC",
                "orange": "#FF8A00",
                "menu": "#F6A11F",
            },
            fontSize: {
                "size-24": "text-xl",
            },
        },
        backgroundColor: (theme) => ({
            ...theme("colors"),
            purplewhite: "#F4F4FA",
            meta: "#0F172A",
            "ungu-footer": "#472091",
            "ungu-font": "#452090",
            "ungu-gradient": "#873091",
            "biru-gradient": "#04509B",
            "meta-pudar": "#1A2132",
            "biru-ungu": "#E8F0FE",
            "kuning-bg": "#F9A21C",
            "biru-cyan": "#AAF0F7",
        }),
    },
    plugins: [
        require('@tailwindcss/line-clamp'),

    ],
};


