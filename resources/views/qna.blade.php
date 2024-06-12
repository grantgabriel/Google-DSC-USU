@extends('layout.header-blank')

@section('content')
    <section class="grid ">
        {{-- <livewire:question eventId="{{ $qna['id'] }}"/> --}}
        @livewire('question', ['eventId' => $qna['id']])
    </section>
@endsection