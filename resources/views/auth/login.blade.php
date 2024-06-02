@extends('layout.header')

@section('content')
    <style>
        .valid-feedback {
            color: green;
            display: none;
        }

        .invalid-feedback {
            color: red;
            display: none;
        }
    </style>

    <section class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Welcome Back! 👋</h2>
            <div class="mb-4 flex justify-around">
                <button
                    class="w-1/2 px-4 py-2 bg-white text-black rounded-lg hover:bg-blue-600 hover:text-white focus:outline-none focus:bg-red-700 flex items-center justify-center mr-2">
                    <img src="https://img.icons8.com/color/16/000000/google-logo.png" class="mr-2" alt="Google logo" />
                    Login with Google
                </button>
                <button
                    class="w-1/2 px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-gray-700 flex items-center justify-center ml-2">
                    <img src="https://img.icons8.com/ios-glyphs/16/ffffff/github.png" class="mr-2" alt="GitHub logo" />
                    Login with GitHub
                </button>
            </div>
            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" :value="old('email')" required autofocus autocomplete="username">
                    <p class="valid-feedback text-sm" id="emailValid">Email is valid</p>
                    <p class="invalid-feedback text-sm" id="emailInvalid">Email is invalid</p>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="current-password"
                        class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="bg-red-200 mb-4 ">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
                <div class="mb-4">
                    <button type="submit"
                        class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-700">Login</button>
                </div>
                <p class="text-center text-gray-600">Don't have an account? <a href="{{ route('register') }}"
                        class="text-blue-500 hover:underline">Sign up</a></p>
            </form>
        </div>


        <script>
            document.getElementById('loginForm').addEventListener('submit', function(event) {
                event.preventDefault();
                const emailInput = document.getElementById('email');
                const passwordInput = document.getElementById('password');
                const emailValidFeedback = document.getElementById('emailValid');
                const emailInvalidFeedback = document.getElementById('emailInvalid');
                // const passwordValidFeedback = document.getElementById('passwordValid');
                // const passwordInvalidFeedback = document.getElementById('passwordInvalid');

                // Validate email
                const email = emailInput.value;
                if (email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                    emailValidFeedback.style.display = 'block';
                    emailInvalidFeedback.style.display = 'none';
                    document.getElementById('loginForm').submit();
                } else {
                    emailValidFeedback.style.display = 'none';
                    emailInvalidFeedback.style.display = 'block';
                }

                // // Validate password
                // const password = passwordInput.value;
                // const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;
                // if (password.match(passwordRegex)) {
                //     passwordValidFeedback.style.display = 'block';
                //     passwordInvalidFeedback.style.display = 'none';
                // } else {
                //     passwordValidFeedback.style.display = 'none';
                //     passwordInvalidFeedback.style.display = 'block';
                // }
            });
        </script>
    </section>
@endsection
