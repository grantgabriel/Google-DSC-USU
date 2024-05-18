

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email">Email</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">Login:</label>

            <input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
        </div>

        <button type="submit">Sumbit</button>

        <!-- Remember Me -->
        
    </form>
