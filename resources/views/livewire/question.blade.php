<div class="relative h-full" id="qna-all">
    <nav class="shadow-md order-b p-4 sticky top-0 bg-white">
        <h1 class="font-bold pr-8 text-3xl gap-1 lg:text-3xl lg:justify-between text-slate-900 flex">
            <a href="{{ route('home') }}">
                <img class="stroke-2 size-8 p-1 top-3 mt-1 mr-3 -left-12 shadow border rounded-full" src="{{ asset('img/back.svg') }}" alt="">
            </a>
            {{ $event->event_name }}
        </h1>
    </nav>
    <div class="lg:grid lg:grid-cols-3 lg:divide-x lg:h-full">
        <div class="hidden items-start sticky top-[69px] h-fit max-w-lg lg:grid gap-5 bg-gdsc bg-cover">
            <img src="{{ $event->event_banner }}" alt="">
            <div class="mx-auto text-2xl font-extrabold px-8 text-center">{{ $event->event_name }}</div>
            <div class="mx-auto text-lg font-bold">{{ Carbon\Carbon::parse($event->time)->format('l, d M, Y') }}</div>
            <div class="grid mx-auto rounded-xl p-8 gap-5 border bg-white w-fit">
                <span class="h-1.5 w-16 bg-gray-400 rounded-full mx-auto"></span>
                <img src="{{ $event->speaker_img }}" class="mx-auto mt-10 size-16 lg:size-40 rounded-full object-cover"/>
                <h3 class="text-lg font-medium mx-auto">{{ $event->speaker_name }}</h3>
            </div>
            <span class="invisible mt-2">Ini untuk panjang2in</span>
        </div>
        <div class="questions col-span-2">
            @if( count($questions) < 1)
             <div class=" h-96 grid place-content-center place-items-center">
                <p class="text-3xl font-bold">No Question Yet</p>
                <p>Be the first to ask 🤗</p>
             </div>
            @else
            @foreach ($questions as $question)
                
                <div class="rounded-xl bg-slate-100 m-2 border-2 border-dashed border-black">
                    <div class="flex justify-between items-center p-4">
                        <div>
                            <p class="font-bold lg:text-lg">{{ $question->question }}</p>
                            <p class="text-xs text-slate-600">{{ $question->created_at }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
        </div>
    </div>
    <div id="fab-qna" class="fixed bottom-5 right-5">
        <button class="bg-amber-400 hover:bg-amber-600 active:bg-amber-700 px-5 py-3 rounded-xl text-lg font-extrabold text-white z-10">+</button>
    </div>
    <div id="askQuestion" class="transition-all lg:max-w-screen-lg ease-in-out delay-75 duration-500 fixed bottom-0 lg:right-0 w-full translate-y-full">
        <div class="relative rounded-t-xl bg-white border-t-2 lg:border border-gray-600 w-full grid py-2 px-3">
            <span class="h-1.5 w-16 bg-gray-400 rounded-full mx-auto"></span>
            <h1 class="mx-auto mt-5 font-bold text-lg">Add Question</h1>
            <div id="closeBtn" class="cursor-pointer absolute right-3 top-10 bg-red-500 text-white rounded-full pt-0 py-0.5 px-2.5 flex place-content-center">x</div>
            <form id="form" class="grid mt-5 gap-2 shadow" method="">
                <label class="font-bold" for="qna">Question</label>
                <textarea required wire:model="question" placeholder="Ask your question" class="rounded-lg caret-blue-500 text-blue-950 outline outline-2 focus:outline-none focus:outline-blue-500 p-1 appearance-none" name="qna" id="qna" cols="30" rows="5"></textarea>
                <button id="btnSubmit" wire:click="askQuestion" class="bg-blue-600 text-white py-3 rounded-full">Submit</button>
            </form>
        </div>
    </div>
</div>
    
