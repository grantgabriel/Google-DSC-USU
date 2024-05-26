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
            {{-- <div class="justify-center items-center w-full h-full">
                <img src="https://res.cloudinary.com/startup-grind/image/upload/dpr_2.0,fl_sanitize/v1/gcs/platform-data-dsc/contentbuilder/logo_dark_horizontal_097s7oa.svg"
                class="mb-4" height="500px" width="500px" alt="">
            </div> --}}
            <div class="flex justify-center items-center">
                <h2 class="text-2xl font-bold mb-6 text-center"><i>Join</i> Our Community!</h2>
            </div>
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
            <form id="registerForm" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-4">
                    <label for="firstName" class="block text-gray-700">First Name</label>
                    <input type="firstName" id="firstName" name="firstName"
                        class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required autofocus>
                    <p class="valid-feedback text-sm" id="firstValid">First Name is Valid</p>
                    <p class="invalid-feedback text-sm" id="firstInvalid">Name cannot contain number</p>
                </div>
                <div class="mb-4">
                    <label for="lastName" class="block text-gray-700">Last Name</label>
                    <input type="lastName" id="lastName" name="lastName"
                        class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required autofocus>
                    <p class="valid-feedback text-sm" id="lastValid">Last Name is valid</p>
                    <p class="invalid-feedback text-sm" id="lastInvalid">Name cannot contain number</p>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        :value="old('email')" required autofocus autocomplete="username">
                    <p class="valid-feedback text-sm" id="emailValid">Email is valid</p>
                    <p class="invalid-feedback text-sm" id="emailInvalid">Email is invalid</p>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="current-password"
                        class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="valid-feedback text-sm" id="passwordValid">Password is valid</p>
                    <p class="invalid-feedback text-sm" id="passwordInvalid">Password must be at least 8 characters, contain
                        an uppercase letter, a lowercase letter, and a symbol</p>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="confirmPassword" name="password" required autocomplete="current-password"
                        class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="valid-feedback text-sm" id="confirmPasswordValid">Confirmation Password is Correct</p>
                    <p class="invalid-feedback text-sm" id="confirmPasswordInvalid">Confirmation Password is not the same as
                        Password</p>
                </div>
                <div class="mb-4">
                    <button type="submit" id="submitBtn"
                        class="w-full px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-700">Register</button>
                </div>
                <p class="text-center text-gray-600">Already have an account? <a href="{{ route('login') }}"
                        class="text-blue-500 hover:underline">Sign in</a></p>
            </form>
        </div>

        <script>
            document.getElementById('registerForm').addEventListener('submit', function(event) {
                event.preventDefault();
                const firstNameInput = document.getElementById('firstName');
                const lastNameInput = document.getElementById('lastName');
                const emailInput = document.getElementById('email');
                const passwordInput = document.getElementById('password');
                const confirmPasswordInput = document.getElementById('confirmPassword');
                const firstValidFeedback = document.getElementById('firstValid');
                const firstInvalidFeedback = document.getElementById('firstInvalid');
                const lastValidFeedback = document.getElementById('lastValid');
                const lastInvalidFeedback = document.getElementById('lastInvalid');
                const emailValidFeedback = document.getElementById('emailValid');
                const emailInvalidFeedback = document.getElementById('emailInvalid');
                const passwordValidFeedback = document.getElementById('passwordValid');
                const passwordInvalidFeedback = document.getElementById('passwordInvalid');
                const confirmPasswordValidFeedback = document.getElementById('confirmPasswordValid');
                const confirmPasswordInvalidFeedback = document.getElementById('confirmPasswordInvalid');

                const regex = /\d/;
                const firstName = firstNameInput.value;
                if(firstName === NULL)
                else if (regex.test(firstName)) {
                    firstValidFeedback.style.display = 'none';
                    firstInvalidFeedback.style.display = 'block';
                } else {
                    firstValidFeedback.style.display = 'block';
                    firstInvalidFeedback.style.display = 'none';
                }

                const lastName = lastNameInput.value;
                if (regex.test(lastName)) {
                    lastValidFeedback.style.display = 'none';
                    lastInvalidFeedback.style.display = 'block';
                } else {
                    lastValidFeedback.style.display = 'block';
                    lastInvalidFeedback.style.display = 'none';
                }

                // Validate email
                const email = emailInput.value;
                if (email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
                    emailValidFeedback.style.display = 'block';
                    emailInvalidFeedback.style.display = 'none';
                } else {
                    emailValidFeedback.style.display = 'none';
                    emailInvalidFeedback.style.display = 'block';
                }

                // Validate password
                const password = passwordInput.value;
                const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;
                if (password.match(passwordRegex)) {
                    passwordValidFeedback.style.display = 'block';
                    passwordInvalidFeedback.style.display = 'none';
                } else {
                    passwordValidFeedback.style.display = 'none';
                    passwordInvalidFeedback.style.display = 'block';
                }

                if (confirmPasswordInput.value !== passwordInput.value) {
                    confirmPasswordValidFeedback.style.display = 'none';
                    confirmPasswordInvalidFeedback.style.display = 'block';
                } else {
                    confirmPasswordValidFeedback.style.display = 'block';
                    confirmPasswordInvalidFeedback.style.display = 'none';
                }
            });
        </script>
    </section>
@endsection



{{--
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name">First Name:</label>
            <input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
        </div>

        <div class="mt-4">
            <label for="lname">Last Name:</label>
            <input id="lname" class="block mt-1 w-full" type="text" name="lname" required autofocus autocomplete="lname" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email">Email:</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">Password:</label>

            <input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation">Confirm Password</label>

            <input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>


        </div>
        <button type="submit">Submit</button>
    </form> --}}
