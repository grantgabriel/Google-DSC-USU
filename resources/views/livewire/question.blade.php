<div class="lg:px-48">
    <div>

    
    <div class="flex flex-col lg:ml-4 px-4 pt-4 h-full">
        <div class="flex justify-between sticky top-0">
            <a class="m-2" href="{{ route('home') }}">
                <img class="stroke-2 bg-slate-50 size-8 p-1 lg:p-0 top-3 lg:-translate-x-full mt-1 mr-3 -left-12 shadow border rounded-full" src="{{ asset('img/back.svg') }}" alt="">
            </a>
            <span class="my-auto font-extrabold">QnA</span>
            <a class="font-bold my-auto stroke-2 bg-slate-50 size-8 p-1 px-3   lg:-translate-x-full -left-12 shadow border rounded-full" href="{{ route('home') }}">
                &quest;
            </a>
        </div>
        <div class="h-full w-full flex flex-col-reverse gap-2 py-2">
            @foreach ($questions as $question)
            <div class="shadow rounded-md w-full gap-4 p-4 grid bg-slate-50 text-blue-950">
                <div class="flex gap-4">
                    <div class="bg-slate-800 size-8 m-auto min-h-8 min-w-8 rounded-full"></div>
                    <span class="w-full text-sm font-semibold lg:text-base">
                        {{ $question->question }}
                    </span>
                </div>
                <div class="text-xs border-t border-t-blue-950 flex justify-end pt-2">{{ $question->created_at }}</div>
            </div>
            @endforeach
        </div>
        <div class="h-fit w-full sticky bottom-1">
            <form action="">
                <div class="grid">
                    <div class="flex p-4 rounded-t-xl justify-between bg-slate-800 text-white">
                        <p>Ask a Question</p>
                    </div>
                    <div class="relative flex">
                        <textarea wire:model="question" type="text" name="question" id="" required 
                        class="p-2 appearance-none rounded-bl-xl border border-blue-950 h-20 lg:w-full text-start active:caret-blue-600 active:bg-slate-100 active:border-blue-600 w-full">
                        </textarea>
                        <button wire:click.prevent="askQuestion" class="absolute right-2 top-1/2 -translate-y-1/2 w-fit max-w-sm p-2 rounded-full px-3 bg-blue-950 text-white font-extrabold text-lg">&RightArrow;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>