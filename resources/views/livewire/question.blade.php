<div class="relative " id="qna-all">
    <nav class="shadow-md order-b p-4 sticky top-0 bg-white">
        <h1 class="font-bold pr-8 text-3xl gap-1 lg:text-6xl text-slate-900 flex">
            <a href="{{ route('home') }}">
                <img class="stroke-2 size-8 lg:absolute p-1 lg:p-0 top-3 lg:-translate-x-full mt-1 mr-3 -left-12 shadow border rounded-full" src="{{ asset('img/back.svg') }}" alt="">
            </a>
            {{ $event->event_name }}
        </h1>
    </nav>
    <div class="questions">
        @foreach ($questions as $question)
            <div class="rounded-xl bg-slate-100 m-2 border-2 border-dashed border-black">
                <div class="flex justify-between items-center p-4">
                    <div>
                        <p class="font-bold">{{ $question->question }}</p>
                        <p class="text-xs text-slate-600">{{ $question->created_at }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div id="fab-qna" class="fixed bottom-5 right-5">
        <button class="bg-amber-400 hover:bg-amber-600 active:bg-amber-700 px-5 py-3 rounded-xl text-lg font-extrabold text-white z-10">+</button>
    </div>
    <div id="askQuestion" class="transition-all ease-in-out delay-75 duration-500 fixed bottom-0 w-full translate-y-full">
        <div class="relative rounded-t-xl bg-white border-t-2 border-gray-600 w-full grid py-2 px-3">
            <span class="h-1.5 w-16 bg-gray-400 rounded-full mx-auto"></span>
            <h1 class="mx-auto mt-5 font-bold text-lg">Add Question</h1>
            <div id="closeBtn" class="absolute right-3 top-10 bg-red-500 text-white rounded-full pt-0 py-0.5 px-2.5 flex place-content-center">x</div>
            <form id="form" class="grid mt-5 gap-2 shadow">
                <label class="font-bold" for="qna">Question</label>
                <textarea required wire:model="question" placeholder="Ask your question" class="rounded-lg caret-blue-500 text-blue-950 outline outline-2 focus:outline-none focus:outline-blue-500 p-1 appearance-none" name="qna" id="qna" cols="30" rows="5"></textarea>
                <button id="btnSubmit" wire:click="askQuestion" class="bg-blue-600 text-white py-3 rounded-full">Submit</button>
            </form>
        </div>
    </div>
</div>
    
