import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                outfit: ['Outfit', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: '#f9f6e9',
                    100: '#f0eacc',
                    200: '#e1d4a0',
                    300: '#d0ba70',
                    400: '#c1a147',
                    500: '#A68A36',
                    600: '#8A732B',
                    700: '#695a25',
                    800: '#584b24',
                    900: '#4a4023',
                    950: '#2b2310',
                },
                gold: {
                    DEFAULT: '#A68A36',
                    500: '#A68A36',
                    600: '#8A732B',
                },
                beige: {
                    DEFAULT: '#EAE6D7',
                },
                sand: {
                    DEFAULT: '#D1C8C1',
                }
            },
            boxShadow: {
                'premium': '0 4px 20px -2px rgba(0, 0, 0, 0.05), 0 0 3px rgba(0,0,0,0.02)',
                'premium-hover': '0 10px 25px -4px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
                'drawer': '4px 0 24px rgba(0, 0, 0, 0.08)',
            }
        },
    },

    plugins: [forms, typography],
};
