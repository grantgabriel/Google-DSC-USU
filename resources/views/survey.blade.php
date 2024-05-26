@extends('layout.header')

@section('content')
    <section class="p-2 grid gap-2 w-full">
        <div class="flex justify-center items-center w-full h-full">
            <div id="start" class="w-fit lg:w-full">    
                <img class="rounded-lg lg:rounded-3xl  lg:object-cover lg:max-fit lg:min-w-full lg:max-h-[10rem] border-2" src="{{ $survey['event']->event_banner }}" alt="">
            </div>
        </div>
        <h1 class="font-bold text-2xl my-4 underline lg:text-5xl mx-auto">{{ $survey['event']->event_name }}</h1>
        <form action="/survey/submit" method="POST" class="grid gap-2 lg:max-w-screen-lg lg:flex lg:flex-col lg:justify-center lg:mx-auto lg:w-full lg:text-2xl">
            @csrf
            @method('PUT')
            <input type="text" hidden value="{{ $survey['id'] }}" name="eventId">
            <input type="text" hidden value="{{ $survey['slug'] }}" name="slug">
            <input type="text" hidden value="{{ Auth::user()->user_id }}" name="userId">
            <div class=" grid">
                <label for="rating" class="bg-blue-600 px-4 py-2 rounded-t-xl text-white font-semibold">Rating</label>
                <div class="flex appearance-none justify-evenly items-center rounded-b-md py-3  bg-blue-100">
                    <span>Buruk</span>
                    <input type="radio" value="1" class="size-5 lg:size-8 accent-blue-500" name="rating" id="rating">
                    <input type="radio" value="2" class="size-5 lg:size-8 accent-blue-500" name="rating" id="rating">
                    <input type="radio" value="3" class="size-5 lg:size-8 accent-blue-500" name="rating" id="rating">
                    <input type="radio" value="4" class="size-5 lg:size-8 accent-blue-500" name="rating" id="rating">
                    <input type="radio" value="5" class="size-5 lg:size-8 accent-blue-500" name="rating" id="rating" required>
                    <span>Baik</span>
                </div>
            </div>
            <div class=" grid">
                <label for="review" class="bg-blue-200 px-4 py-2 rounded-t-md font-semibold">Review</label>
                <textarea required id="review" class="focus:border-blue-400 invalid:border-red-500 appearance-none border rounded-b-md p-1" placeholder="Your tot" name="review" cols="30" rows="5"></textarea>
            </div>
            <div class=" grid">
                <label for="sprating" class="bg-yellow-500 px-4 py-2 rounded-t-xl text-white font-semibold">Speaker rating</label>
                <div class="flex appearance-none justify-evenly items-center rounded-b-md py-3  bg-amber-100">
                    <span>Buruk</span>
                    <input type="radio" value="1" class="size-5 lg:size-8 accent-yellow-400" name="sprating" id="sprating">
                    <input type="radio" value="2" class="size-5 lg:size-8 accent-yellow-400" name="sprating" id="sprating">
                    <input type="radio" value="3" class="size-5 lg:size-8 accent-yellow-400" name="sprating" id="sprating">
                    <input type="radio" value="4" class="size-5 lg:size-8 accent-yellow-400" name="sprating" id="sprating">
                    <input type="radio" value="5" class="size-5 lg:size-8 accent-yellow-400" name="sprating" id="sprating" required>
                    <span>Baik</span>
                </div>
            </div>
            <div class=" grid">
                <label for="suggestion" class="bg-yellow-200 px-4 py-2 rounded-t-md font-semibold">Suggestion</label>
                <textarea required id="suggestion" class="focus:border-blue-400 invalid:border-red-500 appearance-none border rounded-b-md p-1" placeholder="Your tot" name="suggestion" cols="30" rows="5"></textarea>
            </div>
            <button class="p-2 bg-green-500 rounded-xl text-white font-bold">Submit</button>
        </form>
    </section>
@endsection