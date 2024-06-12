@extends('layout.header_admin')

@section('content_warning')
<div class="py-6 px-4 sm:px-12 lg:px-36 xl:px-48">
    <div class="flex justify-start font-semibold mb-4">
        <div class="px-2">
            <a href="/admin/event/{{$id}}" class="">Overview</a>
        </div>
        <div class="px-2">
            <a href="/admin/event/{{$id}}/attendees">Attendees</a>
        </div>
        <div class="px-2">
            <a href="/admin/event/{{$id}}/edit">Edit</a>
        </div>
        <div class="px-2">
            <a href="/admin/event/{{$id}}/survey">Survey</a>
        </div>
        <div class="px-2">
            <button class="border-b-2 pb-2 border-black">Q&A</button>
        </div>
        <div class="px-2">
            <a href="/admin/event/{{$id}}/statistic">Statistic</a>
        </div>
    </div>
    <div class="shadow-lg rounded-xl bg-white py-6 px-6 flex justify-center">
        <div class="">

        </div>
        @foreach ($event as $item)
            {{$item->question}}
        @endforeach
    </div>
</div>

@endsection