{{-- Dashboard --}}


<nav class="w-full h-fit py-4 border px-5 lg:px-48 border-slate-300">
    <div class="flex items-center justify-between my-auto">
        <a href="{{route('home')}}">
            <img src="https://res.cloudinary.com/startup-grind/image/upload/dpr_2.0,fl_sanitize/v1/gcs/platform-data-dsc/contentbuilder/logo_dark_horizontal_097s7oa.svg" class="lg:h-6 h-4" alt="">
        </a>
        <nav class="bg-white fixed lg:static h-fit z-10 p-4 lg:p-0 border-t lg:border-0 w-screen lg:w-fit bottom-0 left-0">
            <div class="flex justify-center lg:justify-evenly gap-5 my-auto w-full lg:w-fit text-slate-600">
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
            

            <div class="relative inline-block">
                <button onclick="toggleDropdown()" class=" text-white">
                    <div class="w-10 h-10 overflow-hidden rounded-full bg-gray-200">
                        <img src="{{ asset('profile_pic/' . Auth::user()->profile_photo) }}" alt="" class="w-full h-full object-cover">
                    </div>
                </button>
                <div id="dropdown" class=" absolute right-0 mt-5 mr-[-2px] hidden bg-white border border-gray-200 shadow-md rounded">
                    <div class="relative">
                        <div class="absolute top-[-9px] right-[9px] w-0 h-0 border-l-[9px] border-r-[9px] border-b-[9px] border-transparent border-b-gray-300"></div>
                        <div class="absolute top-[-8px] right-[10px] w-0 h-0 border-l-[8px] border-r-[8px] border-b-[8px] border-transparent border-b-white"></div>
                        <ul class="whitespace-nowrap">
                            <li><a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My Tokets</a></li>
                            <hr>
                            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Sex & Privacy</a></li>
                            <li>
                                <form class="block px-4 py-2 text-gray-700 hover:bg-gray-100"  method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button  type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form> --}}
        @else
            <a href="{{ route('login') }}" class="active:bg-[#1e467a] bg-[#3275c1] hover:bg-[#285a9e] px-5 py-1.5 rounded-full text-white">Sign In</a>
        @endauth
    </div>
</nav>


<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    }
    function closeDropdown() {
            const dropdown = document.getElementById('dropdown');
            dropdown.classList.add('hidden');
        }

        window.addEventListener('click', function(e) {
            const dropdown = document.getElementById('dropdown');
            const button = dropdown.previousElementSibling;
            if (!dropdown.contains(e.target) && !button.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
</script>