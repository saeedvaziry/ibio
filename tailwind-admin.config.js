const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    darkMode: 'class',
    content: [
        "./vendor/filament/**/*.{html,js,php,vue}",
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
                danger: colors.rose,
                success: colors.green,
                warning: colors.yellow,
            },
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
