
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
    </form>