@extends('layout.header_admin')

@section('content_warning')

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
                <button>Forms</button>
            </div>
            <div class="px-2">
                <button>Waitlist?</button>
            </div>
            <div class="px-2">
                <button>Analytics</button>
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
                                <a href="{{ route('home') }}">
                                    <img class="stroke-2 size-8 lg:absolute p-1 lg:p-0 top-3 lg:-translate-x-full mt-1 mr-3 -left-12 shadow border rounded-full" src="{{ asset('img/back.svg') }}" alt="">
                                </a>
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
                                        <img src="{{ $event->speaker_img }}" class="size-16 lg:size-40 rounded-full object-cover"/>
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
                                    <p>Lihat dokumentasi <a class="text-blue-600" href="{{ $event->documentation }}">disini</a></p>
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
@endsection
