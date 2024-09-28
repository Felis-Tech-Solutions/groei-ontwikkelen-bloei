/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './content/**/*.md',
    './site/**/*.antlers.html', 
  ],
  theme: {
    extend: {
      colors: {
        'gob-blue': '#59A4B7',
        'gob-brown':'#674636',
        'gob-bg':'#FFF8E8',
      },
    },
  },
  plugins: [],
}
