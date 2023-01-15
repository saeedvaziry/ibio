const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    darkMode: 'class',
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: [...defaultTheme.fontFamily.sans],
            },

            colors: {
                gray: colors.stone,
                primary: colors.purple,
                secondary: colors.blue,
            },

            borderWidth: {
                12: "12px",
                16: "16px",
                20: "20px",
            },

            borderRadius: {
                "6xl": "4rem",
            },

            minHeight: {
                30: "6rem",
            },

            maxWidth: {
                xxs: "12rem",
            },

            blur: {
                xs: '2px',
            }
        },
    },
    variants: {
        extend: {
            opacity: ["disabled"],
            display: ["group-hover"]
        },
    },
    plugins: [require("@tailwindcss/forms"), require("@tailwindcss/typography")],
};
