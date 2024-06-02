@extends('layout.header_admin')

@section('content_warning')
        <div class="h-screen w-screen flex justify-center align-middle">
                <img class="h-2/5" src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=http://127.0.0.1:8000/survey/{{$event->event_id}}-{{$event->event_name}}">
        </div>
@endsection
