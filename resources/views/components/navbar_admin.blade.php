<div id="mySidenav" class="w-0 h-full bg-white border-r-[1px]" style="overflow-x: hidden; position: fixed; z-index: 1; top: 0;  left: 0; transition: 0.5s;">
    <div class="border-b-[2px] font-bold text-[#555555]">
        <div class="justify-end flex pt-1 pr-2">
            <a style=" text-decoration: none; display: block; transition: 0.3s;" class="w-5" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
        <div class="pb-6 pt-1 px-6 text-lg">Universitas Sumatera Utara  - Medan, Indonesia</div>
    </div>
    <div class="justify-between flex">

    </div>
    <a class="pl-3 py-3 rounded-md text-lg mx-2 mt-2 hover:bg-blue-50" style=" text-decoration: none; display: block; transition: 0.3s;" href="/admin/analytic">Analytics</a>
    <a class="pl-3 py-3 rounded-md text-lg mx-2 hover:bg-blue-50" style=" text-decoration: none; display: block; transition: 0.3s;" href="/admin/event">Events</a>
    <a class="pl-3 py-3 rounded-md text-lg mx-2 hover:bg-blue-50" style=" text-decoration: none; display: block; transition: 0.3s;" href="/admin/member">Members</a>
    <a class="pl-3 py-3 rounded-md text-lg mx-2 hover:bg-blue-50" style=" text-decoration: none; display: block; transition: 0.3s;" href="/admin/setting">Settings</a>
</div>


<div id="main" style="transition: margin-left 0.5s;" class="bg-white">
    <nav class="w-full h-fit py-1 border px-5 lg:pr-24 lg:pl-8 border-slate-300">
        <div class="flex items-center justify-between my-auto">
            <button id="navButton"><img src="../../img/hamburger.png" class="object-contain w-4" alt=""></button>
            <a href="{{route('home')}}">
                <img src="https://res.cloudinary.com/startup-grind/image/upload/dpr_2.0,fl_sanitize/v1/gcs/platform-data-dsc/contentbuilder/logo_dark_horizontal_097s7oa.svg" class="lg:h-6 h-4" alt="">
            </a>
            
            @auth
                
                <div class="relative inline-block">
                    <button onclick="toggleDropdown()" class=" text-white">
                        <div class="w-10 h-10 overflow-hidden rounded-full bg-gray-200">
                            <img src="
                                @if (Auth::user()->profile_photo != null)
                                    {{ asset('profile_pic/' . Auth::user()->profile_photo) }}
                                @else
                                    {{ asset('img/user.png') }}
                                @endif
                    " alt="" class="w-full h-full object-cover">
                        </div>
                    </button>
                    <div id="dropdown" class=" absolute right-0 mt-5 mr-[-2px] hidden bg-white border border-gray-200 shadow-md rounded">
                        <div class="relative">
                            <div class="absolute top-[-9px] right-[9px] w-0 h-0 border-l-[9px] border-r-[9px] border-b-[9px] border-transparent border-b-gray-300"></div>
                            <div class="absolute top-[-8px] right-[10px] w-0 h-0 border-l-[8px] border-r-[8px] border-b-[8px] border-transparent border-b-white"></div>
                            <ul class="whitespace-nowrap">
                                <li><a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile & Tickets</a></li>
                                <hr>
                                @if (Auth::check() && Auth::user()->role != 'Member')
                                    <li><a href="/admin" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Admin Page</a></li>
                                @endif
                                <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings & Privacy</a></li>
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
                <a href="{{ route('login') }}" class="active:bg-[#1e467a] bg-[#3275c1] hover:bg-[#285a9e] lg:px-5 lg:py-1.5 px-2 py-1 rounded-full text-white lg:text-base text-xs">Sign In</a>
            @endauth
        </div>
    </nav>
</div>

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

        function openNavSmall() {
            document.getElementById("mySidenav").style.width = "100%";
        }

        function openNavLarge() {
            document.getElementById("mySidenav").style.width = "260px";
            document.getElementById("main").style.marginLeft = "260px";
            document.getElementById("mainA").style.marginLeft = "260px";
        }

        function handleMediaQuery(mq) {
            if (mq.matches) {
                document.getElementById('navButton').onclick = openNavLarge;
            } else {
                document.getElementById('navButton').onclick = openNavSmall;
            }
        }

        const mediaQuery = window.matchMedia('(min-width: 1024px)');
        handleMediaQuery(mediaQuery);
        mediaQuery.addListener(handleMediaQuery);

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.getElementById("mainA").style.marginLeft = "0";
        }
        </script>