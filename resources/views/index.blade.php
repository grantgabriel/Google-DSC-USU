@extends('components.header')

@section('content')

<section id="home" class="grid gap-5 w-full p-2 overflow-x-hidden">
    <div class="flex justify-center items-center w-full h-full">
        <div class="w-fit lg:w-full">    
            <img class="rounded-lg lg:object-cover lg:max-h-52 lg:min-w-full" src="img/bg-USU.png" alt="">
        </div>
    </div>
    <div class="lg:px-24 text-slate-700 grid gap-5">
        <h1 class="font-bold text-3xl lg:text-4xl text-slate-900">Universitas Sumatera Utara - Medan, Indonesia</h1>
        <p class="text-lg"><span class="p-1 bg-slate-50 rounded-md border">{{ $userCount }}</span> Group Members</p>
    </div>
    <div class="bg-gradient-to-r from-white via-gray-200 to-white py-2 flex justify-center">
        <button id="drive" class="bg-blue-600 text-white rounded-md lg:px-8 lg:py-2 lg:w-fit py-2 text-lg font-semibold">
            Join Us
        </button>
    </div>
    <div class="lg:px-24 rounded-md">
        <div class="rounded-md grid gap-3">
            <h1 class="font-semibold text-4xl">Upcoming Events</h1>
            <div class="border bg-slate-50 rounded-md grid grid-cols-1 lg:grid-cols-4 px-6 py-8">
            @foreach ($events as $item)
            @if($item->time > now())
                <a href="/event/{{ $item->event_id}}" class="hover:bg-neutral-100 rounded-sm flex flex-col gap-2 justify-center items-center max-w-[25ch] text-lg py-3">
                    <img class="w-44 h-44 rounded-full bg-gray-800" src="{{ $item->event_profile }}">
                    <span class="font-light">{{ Carbon\Carbon::parse($item->time)->format('M d, Y') }}</span>
                    <p class="font-semibold text-center underline">{{ $item->event_name }}</p>
                    
                    @if ($item->type == 'Hybrid')
                        <span class="text-amber-600 bg-amber-100 rounded-lg px-2 py-1 text-center">
                    @elseif ($item->type == 'Online')
                        <span class="text-green-700 bg-green-100 rounded-lg px-2 py-1 text-center">
                    @else
                        <span class="text-blue-600 bg-slate-200 rounded-lg px-2 py-1 text-center">   
                    @endif
                        
                        {{ $item->type }}
                    </span>
                    <p class="text-gray-600 text-center">
                        Universitas Sumatera Utara - Medan, Indonesia
                    </p>
                </a>
            @endif
            @endforeach
            </div>
            <h1 class="font-semibold text-4xl">Past Events</h1>
            <div class="border bg-slate-50 rounded-md grid grid-cols-1 lg:grid-cols-4 px-6 py-8 gap-4">
            @foreach ($events as $item)
            @if($item->time < now())
                <div class="flex flex-col gap-2 justify-center items-center max-w-[25ch] text-lg">
                    <img class="w-44 h-44 rounded-full bg-gray-800" src="{{ $item->event_profile }}">
                    <span class="font-light">{{ Carbon\Carbon::parse($item->time)->format('M d, Y') }}</span>
                    <p class="font-semibold text-center underline">{{ $item->event_name }}</p>
                    
                    @if ($item->type == 'Hybrid')
                        <span class="text-amber-600 bg-amber-100 rounded-lg px-2 py-1 text-center">
                    @elseif ($item->type == 'Online')
                        <span class="text-green-700 bg-green-100 rounded-lg px-2 py-1 text-center">
                    @else
                        <span class="text-blue-600 bg-slate-200 rounded-lg px-2 py-1 text-center">   
                    @endif
                        
                        {{ $item->type }}
                    </span>
                    <p class="text-gray-600 text-center">
                        Universitas Sumatera Utara - Medan, Indonesia
                    </p>
                </div>
            @endif
            @endforeach
            </div>
        </div>
    </div>
</section>

@endsection