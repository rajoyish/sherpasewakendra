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
                sans: ['Akshar', ...defaultTheme.fontFamily.sans],
                'bo': ["Jomolhari", "serif"],
            },
            colors: {
                "prime-blue": "#1072a4",
                "ace-gold": "#d8b353",
                "dark-gold": "#a4883f",
                "monk-red": "#9d1e1a",
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio')
    ],
};
