import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                inter: ["Inter", "sans-serif"],
            },
            colors: {
                dark: "#0f172a",
                neon: {
                    blue: "#00d9ff",
                    pink: "#ff00ff",
                    purple: "#a855f7",
                },
            },
            boxShadow: {
                "neon-blue":
                    "0 0 5px #00d9ff, 0 0 10px #00d9ff, 0 0 15px #00d9ff",
                "neon-pink":
                    "0 0 5px #ff00ff, 0 0 10px #ff00ff, 0 0 15px #ff00ff",
                "neon-purple":
                    "0 0 5px #a855f7, 0 0 10px #a855f7, 0 0 15px #a855f7",
            },
        },
    },

    plugins: [forms],
};
