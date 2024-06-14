@extends('layout.header-blank')

@section('content')
    <section class="h-full">
        @livewire('question', ['eventId' =>  $qna['id']])
    </section>
@endsection

@section('script')
    <script>
        const fab = document.getElementById('fab-qna');
        const askQuestion = document.getElementById('askQuestion');
        const questions = document.getElementById('questions');
        const closebtn = document.getElementById('closeBtn');

        fab.addEventListener('click', () => {
            askQuestion.classList.toggle('translate-y-full');
        });

        closebtn.addEventListener('click', (e) => {
            askQuestion.classList.add('translate-y-full');
        });
        
    </script>
@endsection