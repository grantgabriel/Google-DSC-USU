@extends('layout.header')

@section('content')

<div class="flex justify-center items-center w-full h-full">
    <div class="w-fit lg:w-full">    
        <img class="rounded-lg lg:object-cover lg:max-fit lg:min-w-full" src="{{ $event->event_banner }}" alt="">
    </div>
</div>
<section class="lg:px-48 px-4 relative">
    <div id="bar" class="absolute w-full bg-white lg:h-10 h-3 border-t left-0 lg:-top-14 -top-7 rounded-t-full"></div>
    <main>

        <div class="text-slate-700 grid gap-2 mt-5">
            <h1 class="font-bold text-3xl lg:text-6xl text-slate-900">{{ $event->event_name }}</h1>
            <p class="text-lg">Google Developer Student Club Universitas Sumatera Utara, Indonesia.</p>
            <div class="flex gap-2">
                @foreach ($key as $item)
                <span class="bg-blue-100 py-1 px-3 rounded-full shadow"><p class="text-blue-900 font-medium">{{ $item->key_name }}</p></span>
                @endforeach
            </div>
        </div>
        <div class="flex flex-col py-6 gap-4">
            <div class="grid gap-4">
                <p>
                    {{ $event->description }}
                </p>
                <button class="w-full bg-blue-600 active:bg-blue-700 py-2 rounded-xl text-white font-medium shadow ">RSVP</button>
                <p class="mx-auto font-mono text-xs"><span class="bg-slate-200 p-1 rounded-md">0</span> already rsvp'd</p>
            </div>
            <iframe class="w-full h-96 rounded-lg border-2" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.978119436195!2d98.66953807473237!3d3.592491996381635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131db5f608891%3A0xbf274f3799e9336d!2sUniversitas%20IBBI!5e0!3m2!1sid!2sid!4v1716113836601!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </main>

</section>

@endsection