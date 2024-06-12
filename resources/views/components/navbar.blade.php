{{-- Dashboard --}}

<div id="logoutModal" class="hidden fixed inset-0 bg-black bg-opacity-70 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg overflow-hidden shadow-lg w-11/12 max-w-sm">
        <div class="p-6">
            <h2 class="text-lg font-bold mb-4">Confirm Logout</h2>
            <p class="mb-6">Are you sure you want to logout?</p>
            <div class="flex justify-end">
                <button id="cancelLogout" class="px-4 py-2 bg-gray-200 rounded mr-2">Cancel</button>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="px-4 py-2 bg-red-500 text-white rounded" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
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
                        <img src="
                            @if (Auth::user()->profile_photo != null)
                                {{ asset('profile_pic/' . Auth::user()->profile_photo) }}
                            @else
                                {{ asset('img/user.png') }}
                            @endif
                " alt="" class="w-full h-full object-cover">
                    </div>
                </button>
                <div id="dropdown" class="z-40 absolute right-0 mt-5 mr-[-2px] hidden bg-white border border-gray-200 shadow-md rounded">
                    <div class="relative">
                        <div class="absolute top-[-9px] right-[9px] w-0 h-0 border-l-[9px] border-r-[9px] border-b-[9px] border-transparent border-b-gray-300"></div>
                        <div class="absolute top-[-8px] right-[10px] w-0 h-0 border-l-[8px] border-r-[8px] border-b-[8px] border-transparent border-b-white"></div>
                        <ul class="whitespace-nowrap">
                            <li><a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"><div class="flex justify-start items-center">
                                <ion-icon class="pr-2" name="person-outline"></ion-icon>
                                <div>Profile & Tickets</div>
                            </div></a></li>
                            @if (Auth::check() && Auth::user()->role != 'Member')
                                <li><a href="/admin" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"><div class="flex justify-start items-center">
                                    <ion-icon class="pr-2" name="clipboard-outline"></ion-icon>
                                    <div>Admin Page</div>
                                </div></a></li>
                            @endif
                            <hr>
                            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100"><div class="flex justify-start items-center ">
                                <ion-icon class="pr-2" name="settings-outline"></ion-icon>
                                <div>Settings & Privacy</div>
                            </div></a></li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="showLogoutModal()">
                                    <div class="flex justify-start items-center text-red-500">
                                        <ion-icon class="pr-2" name="log-out-outline"></ion-icon>
                                        <div>Logout</div>
                                    </div>
                                </a>
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


<script>
    function showLogoutModal() {
        document.getElementById('logoutModal').classList.remove('hidden');
    }

    function hideLogoutModal() {
        document.getElementById('logoutModal').classList.add('hidden');
    }

    document.getElementById('cancelLogout').addEventListener('click', hideLogoutModal);
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    }
    function closeDropdown() {
            const dropdown = document.getElementById('dropdown');
            dropdown.classList.add('hidden');
        }

    // window.addEventListener('click', function(e) {
    //     const dropdown = document.getElementById('dropdown');
    //     const button = dropdown.previousElementSibling;
    //     if (!dropdown.contains(e.target) && !button.contains(e.target)) {
    //         dropdown.classList.add('hidden');
    //     }
    // });
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>