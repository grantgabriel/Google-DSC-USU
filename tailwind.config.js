/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'gdsc' : "url('/public/img/bg-google.png')",
      }
    },
  },
  plugins: [],
}

