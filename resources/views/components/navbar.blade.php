{{-- Dashboard --}}

<nav class="w-full h-fit py-4 border px-5 lg:px-48 border-slate-300">
    <div class="flex items-center justify-between my-auto">
        <a href="{{route('home')}}">
            <img src="https://res.cloudinary.com/startup-grind/image/upload/dpr_2.0,fl_sanitize/v1/gcs/platform-data-dsc/contentbuilder/logo_dark_horizontal_097s7oa.svg" class="h-6" alt="">
        </a>
        <nav class=" fixed lg:static h-fit z-10 p-4 lg:p-0 border-t lg:border-0 w-screen lg:w-fit bottom-0 left-0">
            <div class="flex lg:justify-evenly gap-5 my-auto w-full lg:w-fit text-slate-600">
                <a class="hover:text-black hover:bg-gray-100 rounded-lg active:bg-gray-200">
                    <p class="">About GDSC</p>
                </a>
                <a class="hover:text-black hover:bg-gray-100 rounded-lg active:bg-gray-200">
                    <p class="">Chapters</p>
                </a>
                <a class="hover:text-black hover:bg-gray-100 rounded-lg active:bg-gray-200">
                    <p class="">Upcoming Events</p>
                </a>
                
            </div>
        </nav>
        @auth
            <a href="{{ route('profile') }}" class=" text-white">
                <div class="w-10 h-10 overflow-hidden rounded-full bg-gray-200">
                    <img src="https://picsum.photos/200/300" alt="" class="w-full h-full object-cover">
                </div>
            </a>

            {{-- <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form> --}}
        @else
            <a href="{{ route('login') }}" class="active:bg-[#1e467a] bg-[#3275c1] hover:bg-[#285a9e] px-5 py-1.5 rounded-full text-white">Sign In</a>
        @endauth
    </div>
</nav>