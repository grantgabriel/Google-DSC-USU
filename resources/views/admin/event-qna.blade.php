@extends('layout.header_admin')

@section('content_warning')
    <div class="flex justify-start font-semibold mb-4">
        <div class="px-2">
            <a href="/admin/event/{{$id}}" class="">Overview</a>
        </div>
        <div class="px-2">
            <button class="border-b-2 pb-2 border-black">Attendees</button>
        </div>
        <div class="px-2">
            <a href="/admin/event/{{$id}}/edit">Edit</a>
        </div>
        <div class="px-2">
            <a href="/admin/event/{{$id}}/survey">Survey</a>
        </div>
        <div class="px-2">
            <button>Waitlist?</button>
        </div>
        <div class="px-2">
            <a href="/admin/event/{{$id}}/statistic">Statistic</a>
        </div>
    </div>

    @foreach ($event as $item)
        {{$item->question}}
    @endforeach
@endsection