/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.antlers.html',
        './resources/**/*.antlers.php',
        './resources/**/*.blade.php',
        './resources/**/*.vue',
        './content/**/*.md',
    ],

    theme: {
        extend: {
            colors: {
              'gob-blue': '#59A4B7',
              'gob-brown':'#674636',
              'gob-bg':'#F9F9E3',
              'gob-green':'#16423C',
            },
        },
    },

    plugins: [
        require('@tailwindcss/typography'),
    ],
};
