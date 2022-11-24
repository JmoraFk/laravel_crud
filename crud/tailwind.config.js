const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            backgroundColor: ["active", "hover", "disabled"],
            textColor: ["active", "hover", "disabled"],
            outline: ["hover", "active"],
            opacity: ["disabled"],
            cursor: ["hover", "disabled"]
        }
    },

    plugins: [require('@tailwindcss/forms')],
};
