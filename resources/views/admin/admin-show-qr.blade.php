@extends('layout.header_admin')

@section('content_warning')
<div class="py-16 px-12 sm:px-24 lg:px-48 xl:px-96">
        <div class="shadow-lg rounded-xl bg-white py-6 px-6 ">
                <div class="flex-col flex items-center">
                        <div class="font-semibold italic pb-4 sm:text-xl xl:text-2xl">
                                Scan this QR Code to record your attendance
                        </div>
                        <div class="bg-black rounded-lg">
                                
                                <div class="p-2 w-full flex justify-center">
                                        <div class="bg-white p-3">
                                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=http://127.0.0.1:8000/survey/{{$event->event_id}}-{{$event->event_name}}">
        
                                        </div>
                                </div>
                                
                        </div>
                </div>
                
                <div class="flex justify-between place-items-end">
                        <img src="{{ asset('img/gdsc.svg') }}" class="object-contain w-48 mt-12 " alt="">
                        <div class="text-sm">© 2024 Google</div>
                </div>

                
        </div>
</div>
       
@endsection
