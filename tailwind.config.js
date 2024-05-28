const tailpress = require("@jeffreyvr/tailwindcss-tailpress");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.php',
        './**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
        './safelist.txt'
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        extend: {
            colors: {
                blue: {
                    500: '#679DAD'
                },
                yellow: {
                    500: '#C8AD2C'
                },
                gray: {
                    500: '#5F5F62'
                }
            }
        },
        screens: {
            'xs': '480px',
            'sm': '600px',
            'md': '782px',
            'lg': '960px',
            'xl': '1280px',
            '2xl': '1440px'
        }
    },
    plugins: [
        tailpress.tailwind
    ]
};
