const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            margin: {
                '0.75': '3px',
            },
            padding: {
                '88': '22rem',
            },
            width: {
                '57': '228px',
            },
            inset: {
                '3.25':'3.25rem',
                '66px': '66px',
                '-32px': '-32px',
            },
            spacing: {
                '3.25':'3.25rem',
                '37.33': '37.33rem',
                '34.25': '34.25rem',
            }

        },
    },

    variants: {
        display: ['responsive', 'hover', 'focus', 'group-hover'],
         },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
