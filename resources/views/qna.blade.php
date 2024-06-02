@extends('layout.header-blank')

@section('content')
    <section class="grid h-full lg:grid-cols-2">
        <div class="w-1/3">
            
        </div>
        <livewire:question eventId="{{ $qna['id'] }}"/>
        
    </section>
@endsection