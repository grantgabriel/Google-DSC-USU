import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

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
          'profile' : "url('/public/img/bg-bevy.png')",
        }
      },
    },
    plugins: [],
  }
  
module.exports = {
      theme: {
          extend: {
              fontFamily: {
                  sans: ['Figtree', ...defaultTheme.fontFamily.sans],
              },
          },
      },
  
      plugins: [forms],
  };