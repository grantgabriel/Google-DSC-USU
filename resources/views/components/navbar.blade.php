{{-- Dashboard --}}

<nav class="w-[100dvw] h-fit py-5 border px-5 lg:px-48">
    <div class="flex justify-between my-auto">
        <div>
            <img src="img/google.svg" class="h-7" alt="">
        </div>
        <p class="font-semibold my-auto hidden">Google Developer Students Club</p>
        <nav class=" fixed lg:static h-fit z-10 p-4 lg:p-0 border-t lg:border-0 w-screen lg:w-fit bottom-0 left-0">
            <div class="flex lg:justify-evenly gap-5 my-auto w-full lg:w-fit text-slate-600">
                <a class="hover:text-black hover:bg-gray-100 rounded-lg active:bg-gray-200">
                    <p class="px-3 py-1">About GDSC</p>
                </a>
                <a class="hover:text-black hover:bg-gray-100 rounded-lg active:bg-gray-200">
                    <p class="px-3 py-1">Chapters</p>
                </a>
                <a class="hover:text-black hover:bg-gray-100 rounded-lg active:bg-gray-200">
                    <p class="px-3 py-1">Upcoming Events</p>
                </a>
                
            </div>
        </nav>
        @auth
            <a href="{{ route('home') }}" class="active:bg-[#1e467a] bg-[#3275c1] hover:bg-[#285a9e] px-5 py-1.5 rounded-full text-white">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="active:bg-[#1e467a] bg-[#3275c1] hover:bg-[#285a9e] px-5 py-1.5 rounded-full text-white">Sign In</a>
        @endauth
    </div>
</nav>