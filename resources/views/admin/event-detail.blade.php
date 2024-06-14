@extends('layout.header_admin')

@section('content_warning')

<div id="logoutModal1" class="hidden fixed inset-0 bg-black bg-opacity-70 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg overflow-hidden shadow-lg w-11/12 max-w-sm">
        <div class="p-6">
            <h2 class="text-lg font-bold mb-4">Confirm Delete</h2>
            <p class="mb-6">Are you sure you want to delete this documentation?</p>
            <div class="flex justify-end">
                <button id="cancelLogout1" class="px-4 py-2 bg-gray-200 rounded mr-2">Cancel</button>
                <form action="/admin/remove/documentation/{{$event->event_id}}" method="POST">
                    @csrf
                    <button class="px-4 py-2 bg-red-500 text-white rounded" type="submit">Delete</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<div id="logoutModal2" class="hidden fixed inset-0 bg-black bg-opacity-70 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg overflow-hidden shadow-lg w-11/12 max-w-sm">
        <div class="p-6">
            <h2 class="text-lg font-bold mb-4">Confirm Delete</h2>
            <p class="mb-6">Are you sure you want to delete this resource?</p>
            <div class="flex justify-end">
                <button id="cancelLogout2" class="px-4 py-2 bg-gray-200 rounded mr-2">Cancel</button>
                <form action="/admin/remove/resource/{{$event->event_id}}" method="POST">
                    @csrf
                    <button class="px-4 py-2 bg-red-500 text-white rounded" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="py-6 px-4 sm:px-12 lg:px-36 xl:px-48">
        <div class="flex justify-start font-semibold mb-4">
            <div class="px-2">
                <button class="border-b-2 pb-2 border-black">Overview</button>
            </div>
            <div class="px-2">
                <a href="/admin/event/{{$event->event_id}}/attendees">Attendees</a>
            </div>
            <div class="px-2">
                <a href="/admin/event/{{$event->event_id}}/edit">Edit</a>
            </div>
            <div class="px-2">
                <a href="/admin/event/{{$event->event_id}}/survey">Survey</a>
            </div>
            <div class="px-2">
                <a href="/admin/event/{{$event->event_id}}/qna">Q&A</a>
            </div>
            <div class="px-2">
                <a href="/admin/event/{{$event->event_id}}/statistic">Statistic</a>
            </div>

        </div>

        <div class="shadow-lg rounded-xl bg-white py-6 px-6">
            <div class="flex-col">
                <div class="">
                    <div class="flex justify-center items-center">
                        <div class="w-fit lg:w-full">    
                            <img class="rounded-lg lg:object-cover lg:max-fit lg:min-w-full" src="{{ asset('banner/' . $event->event_banner)}}" alt="">
                        </div>
                    </div>
                </div>
        
                <section class=" lg:px-48 px-4 relative">
                    <div id="bar" class="absolute w-full bg-white lg:h-10 h-3 border-t left-0 lg:-top-14 -top-7 rounded-t-full ">
                    </div>
                    <main id="main">
                
                        <div class="text-slate-700 grid relative gap-2 mt-5">
                            
                            <h1 class="font-bold pr-8 text-3xl gap-1 lg:text-6xl text-slate-900 flex">
                                {{ $event->event_name }}</h1>
                            <p class="text-lg">Google Developer Student Club Universitas Sumatera Utara, Indonesia.</p>
                            <div class="flex gap-2">
                                <button onclick="myFunction()" id="shareBtn" class="hover:bg-blue-500 active:bg-blue-600 cursor-pointer bg-blue-200 py-2 px-3 rounded-full"><img src="https://www.svgrepo.com/show/522278/share.svg" class="size-4" alt=""></button>
                                @foreach ($key as $item)
                                    <span class="bg-blue-100 py-1 px-3 rounded-full shadow"><p class="text-blue-900 font-medium">{{ $item->key_name }}</p></span>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row-reverse py-6 gap-4">
                            <div class="grid gap-4 lg:max-w-screen-sm">
                                <p>
                                    {{ $event->description }}
                                </p>
                                <div class="flex flex-col">
                                    <span class="bg-slate-100 text-blue-600 lg:text-sm font-semibold text-center p-4 rounded-t-xl">{{ Carbon\Carbon::parse($event->time)->format('l, d M, Y') }}</span>
                                   
                                </div>
                                <p class="mx-auto font-mono text-xs"><span class="bg-slate-200 p-1 rounded-md">{{ $rsvpCount }}</span> already rsvp'd</p>
                            </div>
                            <div class="lg:pr-12 grid" id="maps-iframe">
                                <iframe class="w-full h-96 lg:h-full rounded-lg border-2" 
                                    src="https://www.google.com/maps?q={{ Illuminate\Support\Str::slug($event->address) }}&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <span id="maps-detail" class="flex gap-1"><img class="h-5 mt-1 fill-red-700" src="{{ asset('img/location.svg') }}" alt=""><p class="text-sm lg:text-xs underline ">{{ $event->address }}</p></span>
                            </div>
                        </div>
                        <h1 class="text-3xl font-bold">About</h1>
                        <div class="grid gap-4 mt-4">
                            <details class="group [&_summary::-webkit-details-marker]:hidden" open>
                                <summary
                                  class="flex cursor-pointer items-center justify-between gap-1.5 rounded-lg bg-blue-200 p-4 text-gray-900"
                                >
                                  <h2 class="font-semibold text-lg">Speaker</h2>
                            
                                  <svg class="size-5 shrink-0 transition duration-300 group-open:-rotate-180"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                  >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                  </svg>
                                </summary>
                                <div class="mt-4 pl-4 lg:pl-20 leading-relaxed flex">
                                    <article class="rounded-xl border border-gray-700  p-4 w-full">
                                        <div class="flex items-center gap-4 lg:px-12">
                                        <img src="{{ asset('speaker/' . $event->speaker_img)}}" class="size-16 lg:size-40 rounded-full object-cover"/>
                                        <h3 class="text-lg font-medium mx-auto">{{ $event->speaker_name }}</h3>
                                        </div>
                                      </article>
                                </div>
                            </details>
                            <details class="group [&_summary::-webkit-details-marker]:hidden">
                                <summary
                                  class="flex cursor-pointer items-center justify-between gap-1.5 rounded-lg bg-blue-200 p-4 text-gray-900"
                                >
                                  <h2 class="font-semibold text-lg">Documentation</h2>
                            
                                  <svg class="size-5 shrink-0 transition duration-300 group-open:-rotate-180"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                  >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                  </svg>
                                </summary>
                                <div class="mt-4 pl-4 lg:pl-20 flex flex-col">
                                    @if ($event->documentation)
                                        <div class="flex justify-center">
                                            <img class="w-2/3" src="http://127.0.0.1:8000/documentation/{{$event->documentation}}" alt="">
                                        </div>
                                       
                                            <div class="flex justify-end">
                                                <button onclick="showLogoutModal1()" class="flex justify-center items-center border rounded-md px-2 py-2 mt-5 text-white bg-red-500">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                    <div class=" ml-2 text-xs" >Delete Documentation</div>
                                                </button>
                                            </div>

                                    @else
                                        <div class="mb-4 font-semibold">
                                            Documentation isn't available, add one!
                                        </div>
                                        <form action="/admin/add/documentation/{{$event->event_id}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="lg:flex lg:justify-around">
                                                <input accept=".jpg, .jpeg, .png, .webp" type="file" name="docu" id="docu" placeholder="Masukkan Link Dokumentasi">
                                                <div class="justify-end flex">
                                                    <button disabled id="save2" type="submit" class="flex justify-center items-center border rounded-md px-2 py-2 mt-2 text-white bg-slate-500">
                                                        <ion-icon name="image-outline"></ion-icon>
                                                        <ion-icon name="add-outline"></ion-icon>
                                                        <div class=" ml-2 text-xs" >Add Documentation</div>
                                                    </button>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                        </form>
                                    @endif
                                </div>
                            </details>

                            <details class="group [&_summary::-webkit-details-marker]:hidden">
                                <summary
                                  class="flex cursor-pointer items-center justify-between gap-1.5 rounded-lg bg-blue-200 p-4 text-gray-900"
                                >
                                  <h2 class="font-semibold text-lg">Resource</h2>
                            
                                  <svg class="size-5 shrink-0 transition duration-300 group-open:-rotate-180"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                  >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                  </svg>
                                </summary>
                                <div class="mt-4 pl-4 lg:pl-20 flex flex-col">
                                    <p>
                                
                                            @if ($event->resource)
                                                <a class="text-blue-500" href="{{$event->resource}}">Click here to go to the resource!</a>
                                                
                                                    <div class="flex justify-end">
                                                        <div class="flex justify-end">
                                                            <button onclick="showLogoutModal2()" type="submit" class="flex justify-center items-center border rounded-md px-2 py-2 mt-5 text-white bg-red-500">
                                                                <ion-icon name="trash-outline"></ion-icon>
                                                                <div class=" ml-2 text-xs" >Delete Resource</div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                
                                            @else 
                                                <div class="mb-4 font-semibold">
                                                    Resource isn't available, add one!
                                                </div>
                                                <form action="/admin/add/resource/{{$event->event_id}}" method="POST">
                                                    @csrf
                                                    <input type="text" class="border rounded-md py-1 px-2 w-full" id="resource" name="resource" placeholder="Resource Link Here...">
                                                    <div class="flex justify-end">
                                                        <button disabled id="save" type="submit" class="flex justify-center items-center border rounded-md px-2 py-2 mt-2 text-white bg-slate-500">
                                                            <ion-icon name="document-outline"></ion-icon>
                                                            <ion-icon name="add-outline"></ion-icon>
                                                            <div class=" ml-2 text-xs" >Add Resource</div>
                                                        </button>
                                                    </div>
                                                    
                                                </form>

                                            @endif
                                        
                                    </p>
                                </div>
                            </details>
                        </div>
                        
                    </main>
                        <div id="toastFeedback" class="fixed hidden bottom-16 transition-all ease-in-out duration-1000 translate-x-1/2 right-1/2 z-50 w-full mx-5 bg-slate-600 py-1 px-8 lg:text-xl lg:w-fit rounded-full text-white">
                            Copied to clipboard
                        </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        function showLogoutModal1() {
            document.getElementById('logoutModal1').classList.remove('hidden');
        }

        function hideLogoutModal1() {
            document.getElementById('logoutModal1').classList.add('hidden');
        }

        document.getElementById('cancelLogout1').addEventListener('click', hideLogoutModal1);

        function showLogoutModal2() {
            document.getElementById('logoutModal2').classList.remove('hidden');
        }

        function hideLogoutModal2() {
            document.getElementById('logoutModal2').classList.add('hidden');
        }

        document.getElementById('cancelLogout2').addEventListener('click', hideLogoutModal2);

        const save = document.getElementById('save');
        const save2 = document.getElementById('save2');
        const docu = document.getElementById('docu');
        const resource = document.getElementById('resource');
        
        if (docu != null){
            docu.addEventListener('input', function() {
            if (docu.files.length <= 0) {
                save2.disabled = true;
                save2.classList.add('bg-slate-500');
                save2.classList.remove('bg-[#313140]');
            } else {
                save2.disabled = false;
                save2.classList.add('bg-[#313140]');
                save2.classList.remove('bg-slate-500');
            }
        });
        }
        
    
        resource.addEventListener('input', function() {
            let value = resource.value.trim(); 
            if (value === "") {
                save.disabled = true;
                save.classList.remove('bg-[#313140]');
                save.classList.add('bg-slate-500');
            } else {
                save.disabled = false;
                save.classList.add('bg-[#313140]');
                save.classList.remove('bg-slate-500');
            }
        });
    </script>
    
@endsection
