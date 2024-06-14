
@extends('layout.header_admin')

@section('content_warning')
@php
$address = $user->address;
$parts = explode(',', $address);
$country = $parts[0] ?? '';
$city = $parts[1] ?? '';
@endphp

<div class="bg-white">
    <div class="bg-profile bg-center bg-cover h-[388px]">
        <div class="flex justify-center lg:justify-end py-10 lg:pb-0 lg:pr-8">
            
        </div>
        <div class="flex justify-center pb-3">
            <img src="
                @if ($user->profile_photo != null)
                    {{ asset('profile_pic/' . $user->profile_photo) }}
                @else
                    {{ asset('img/user.png') }}
                @endif
        " class="w-32  h-32 rounded-full" alt="Profile Photo">
        </div>
        <div class="flex justify-center font-semibold text-3xl">
                {{ $user->first_name }} {{ $user->last_name }}
        </div>
        <div class="flex justify-center text-xs pt-4">
            {{$city}}
        </div>
        <div class="flex justify-center  pt-4">
            @if ($user->bio != null)
                {{$user->bio}}
                
            @else
                -
            @endif
        </div>
    </div>

    <div class="mx-4 lg:mx-40 my-6 lg:mt-8">

    
    <div id="profile" class="tabcontent mx-4">
        <div class="text-5xl mt-12">Rsvp</div>
        
        <table>
            <tr>
                <td class="text-red-500">Event Name</td>
                <td class="text-red-500">Attendance Detail</td>
            </tr>
            @foreach ($rsvp as $item)

                <tr>
                    <td><a href="/admin/event/{{$item->event_id}}">{{ $item->event->event_name }}</a></td>
                    <td>{{ $item->attendance_detail }}</td>
                </tr>
                
            @endforeach
        </table>

    </div>
    

    </div>
</div>

@endsection
