import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                quicksand: "'Quicksand', sans-serif",
                kanit: "'Kanit', sans-serif",

            },
            colors: {
                background: "#fefefb",
                accent: "#d50603",
                accentLight: "#e2524e",
                ...colors,
            }
        },
    },
    plugins: [],
};
