@extends('components.header')

@section('content')

<div class="flex justify-center items-center w-full h-full">
    <div class="w-fit lg:w-full">    
        <img class="rounded-lg lg:object-cover lg:max-h-52 lg:min-w-full" src="{{ $event->event_banner }}" alt="">
    </div>
</div>
<div class="lg:px-24 text-slate-700 grid gap-5">
    <h1 class="font-bold text-3xl lg:text-4xl text-slate-900">Universitas Sumatera Utara - Medan, Indonesia</h1>
    <p class="text-lg"><span class="p-1 bg-slate-50 rounded-md border"></span> Group Members</p>
</div>

@endsection