@extends('layout.header')

@section('js')
    @vite('resources/js/event.js')
@endsection
@section('content')
@php
    use App\Models\Rsvp;
    $isRsvp = false;
    if (isset(Auth::user()->user_id)) {
        $isRsvp = count(Rsvp::where('event_id', $event->event_id)->where('user_id', Auth::user()->user_id)->get()) > 0;
    }
@endphp


<div class="flex justify-center items-center w-full h-full">
    <div class="w-fit lg:w-full">    
        <img class="rounded-lg lg:object-cover lg:max-fit lg:min-w-full" src="{{ $event->event_banner }}" alt="">
    </div>
</div>
<section class="lg:px-48 px-4 relative">
    <div id="bar" class="absolute w-full bg-white lg:h-10 h-3 border-t left-0 lg:-top-14 -top-7 rounded-t-full ">
        <button x-data @click="$store.eventDriver.start()" id="toggleDriverBtn" class="text-red-300 font-bold border-red-300 rounded-full border-2 px-[7px] text-sm absolute right-5 top-9 z-20">&quest;</button>
    </div>
    <main id="main">

        <div class="text-slate-700 grid relative gap-2 mt-5">
            
            <h1 class="font-bold text-3xl lg:text-6xl text-slate-900 flex">
                <a href="{{ route('home') }}">
                    <img class="stroke-2 h-8 lg:absolute p-1 lg:p-0 top-3 lg:-translate-x-full mt-1 mr-3 -left-12 shadow border rounded-full" src="{{ asset('img/back.svg') }}" alt="">
                </a>
                {{ $event->event_name }}</h1>
            <p class="text-lg">Google Developer Student Club Universitas Sumatera Utara, Indonesia.</p>
            <div class="flex gap-2">
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
                    <span class="bg-slate-100 text-blue-600 lg:text-sm font-semibold text-center p-4 rounded-t-xl">{{ Carbon\Carbon::parse($item->time)->format('l, d M, Y') }}</span>
                    @guest
                        <a href="{{ route('login') }}" id="rsvpBtn" class="w-full bg-blue-600 active:bg-blue-700 text-center py-2 rounded-b-xl text-white font-medium shadow ">RSVP</a>
                    @endguest
                    @auth
                    @if($isRsvp)
                        <button disabled id="rsvpBtn" class="w-full bg-gray-600 py-2 rounded-b-xl text-white font-medium shadow ">Already registered</button>
                    @else
                    <form action="/event-rsvp" method="POST">
                        @csrf
                        <input hidden type="text" name="eventid" value="{{ $event->event_id }}" id="eventid">
                        <input hidden type="text" name="userid" value="{{ Auth::user()->user_id }}" id="userid">
                        <button type="submit" id="rsvpBtn" class="w-full bg-blue-600 active:bg-blue-700 py-2 rounded-b-xl text-white font-medium shadow ">RSVP</button>
                    </form>
                    @endif
                    @endauth
                </div>
                <p class="mx-auto font-mono text-xs"><span class="bg-slate-200 p-1 rounded-md">{{ $rsvpCount }}</span> already rsvp'd</p>
            </div>
            <div class="lg:pr-12 grid" id="maps-iframe">
                <iframe class="w-full h-96 lg:h-full rounded-lg border-2" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.978119436195!2d98.66953807473237!3d3.592491996381635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131db5f608891%3A0xbf274f3799e9336d!2sUniversitas%20IBBI!5e0!3m2!1sid!2sid!4v1716113836601!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

</section>
@endsection