/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Roboto", ...defaultTheme.fontFamily.sans]
            },
            colors: {
                // primary color
                "app-primary-1": "#98afc0",
                // secondary colors
                "app-primary-2": "#6585ed",
                "app-primary-3": "#f5756c",
                // text color
                "app-text": "#2f3148",
                // accent color
                "app-validation": "#56c1ab",
                "app-error": "#ee4c58"
            },
        },
    },
    plugins: [],
}
