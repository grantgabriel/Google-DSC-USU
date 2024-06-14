
@extends('layout.header_admin')

@section('content_warning')
@php
$address = $user->address;
$parts = explode(',', $address);
$country = $parts[0] ?? '';
$city = $parts[1] ?? '';
@endphp

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
    <div class="flex justify-center text-xs pt-4">
        @if ($user->bio != null)
            {{$user->bio}}
            
        @else
            -
        @endif
    </div>
</div>

<div class="mx-4 lg:mx-40 my-6 lg:mt-8">

  
  <div id="profile" class=" mx-4">

  </div>
  
    <div class="rounded-lg border border-gray-200">
    <div class="overflow-x-auto rounded-lg">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-slate-50 text-lg">
        <thead class="text-start font-bold">
            <tr class="bg-blue-200">
            <td class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">Name</td>
            <td class="whitespace-nowrap px-4 py-2 font-bold text-gray-900">Attendance Detail</td>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @foreach ($rsvp as $item)
            <tr class="odd:bg-gray-200 even:bg-white">
            <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"><a href="/admin/event/{{$item->event_id}}">{{ $item->event->event_name }}</a></td>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                @if ($item->attendance_detail == 'Attend')
                <span class="rounded-full outline p-1 px-2 bg-white
                    outline-green-200 text-green-700
                ">
                @else
                <span class="rounded-full outline p-1 px-2 bg-white
                    outline-red-200 text-red-700
                ">
                @endif
                    {{ $item->attendance_detail }}
                </span>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>


@endsection
