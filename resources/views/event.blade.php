@extends('layout.header')

@section('content')
<?php
    $colorArray = ['bg-blue-600', 'bg-green-600', 'bg-amber-500', 'bg-red-600', 'bg-indigo-600', 'bg-purple-600', 'bg-pink-600'];
?>
<div class="flex justify-center items-center w-full h-full">
    <div class="w-fit lg:w-full">    
        <img class="rounded-lg lg:object-cover lg:max-fit lg:min-w-full" src="{{ $event->event_banner }}" alt="">
    </div>
</div>
<section class="px-48">
    <div class="text-slate-700 grid gap-2 mt-5">
        <h1 class="font-bold text-3xl lg:text-6xl text-slate-900">{{ $event->event_name }}</h1>
        <p class="text-lg">Google Developer Student Club Universitas Sumatera Utara, Indonesia.</p>
        <div class="flex gap-2">
            @foreach ($key as $item)
            <span class="{{ $colorArray[random_int(0,7)] }} py-1 px-3 rounded-full"><p class="text-white">{{ $item->key_name }}</p></span>
            
            @endforeach
        </div>
    </div>

    <iframe class="rounded-md" src="https://www.google.com/maps/place/Universitas+Prima+Indonesia/@3.5988387,98.6527098,15z/data=!4m2!3m1!1s0x0:0x2ee9d4c72de475ab?sa=X&ved=1t:2428&ictx=111" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

@endsection