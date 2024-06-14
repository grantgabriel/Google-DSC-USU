

@extends('layout.header_admin')

@section('content_warning')
<div class="py-6 px-2 sm:px-12 lg:px-36 xl:px-48">
    <div class="shadow-lg rounded-xl bg-white py-4">
        <h1 class="text-center font-semibold text-2xl">Sertificate</h1><br>
        <div class="grid grid-cols-2">
            @foreach ($userAttendance as $user)
            <div class="grid rounded-xl py-4 px-2 md:px-4 lg:px-8 lg:py-6 mx-2 my-2 w-50% shadow-[0_0_10px_0_rgba(0,0,0,0.1)]">
                <h2 class="font-semibold pb-4 text-xl">{{ $user['first_name'] }} {{ $user['last_name'] }}<div class="font-normal text-xs">({{ $user['email'] }})</div></h2>
                <ul class="grid grid-cols-2">
                    @foreach ($user['categories'] as $category)
                        <li class="pb-1 px-1 text-center \">
                            <div class="font-medium">{{ $category['category'] }} <div class="text-xs font-normal">Attendance : {{ number_format($category['attendance_percentage'], 1) }}%</div></div>
                        </li>
                    @endforeach
                </ul>
            </div>
                
            @endforeach
        </div>
            
    </div>
</div>
@endsection
