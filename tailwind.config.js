

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            backgroundImage: {
                'gdsc' : "url('/public/img/bg-google.png')",
                'profile' : "url('/public/img/bg-bevy.png')",
              },
        },
    },

    plugins: [],
};
