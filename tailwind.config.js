import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                belanosima: ["Belanosima", "sans-serif"],
            },
            fontWeight: {
                regular: 400,
                semibold: 600,
                bold: 700,
            },

            colors: {
                "google-dark": "#202125",
                "google-decoration": "#181818",
                primary: "#ff6600",
                "primary-ligth": "#ff8533",
                secondary: "#e26f2c",
                accent: "#f19a3a",
            },
        },
    },

    plugins: [forms, typography, require("flowbite/plugin")],
};
