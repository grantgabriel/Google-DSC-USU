@extends('components.header')

@section('content')

<div class="bg-profile bg-center bg-cover h-[388px]">
        <div class="flex justify-center lg:justify-end py-10 lg:pb-0 lg:pr-8">
            <a href="/editprofile" class=" bg-white border-[1px] border-slate-300 rounded-[3px] py-2 px-8 text-[#4285f4]">
                Edit Profile
            </a>
        </div>
        <div class="flex justify-center pb-3">
            <img src="{{ asset('profile_pic/' . Auth::user()->profile_photo) }}" class="w-32 rounded-full" alt="Profile Photo">

        </div>
        <div class="flex justify-center font-semibold text-3xl">
                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
        </div>
        <div class="flex justify-center text-xs pt-4">
            KOTA
        </div>
</div>

<div class="mx-4 lg:mx-40 my-6 lg:mt-8">
    <div style="overflow: hidden" class="lg:flex lg:justify-end" >
        <button class="tablinks font-bold focus:border-b-[4px] pb-2 border-[#4285f4] mr-5" onclick="openCity(event, 'profile')">Profile</button>
        <button class="tablinks font-bold focus:border-b-[4px] pb-2 " onclick="openCity(event, 'ticket')">My Ticket</button>
      </div>
      
      <div id="profile" class="tabcontent mx-4">
        <div class="text-5xl mt-12">About me</div>
        <div class="border-[1px] rounded-md mt-9 mb-20 justify-center flex pt-4 pb-8 lg:pb-4 shadow">
            @if (Auth::user()->bio != null)
                {{Auth::user()->bio}}
                
            @else
                You haven't added a bio yet! <a class="text-blue-500" href="/editprofile">&nbsp;Add one now</a>
            @endif
        </div>
      </div>
      
      <div id="ticket" class="tabcontent mx-4" style="display: none">
        <div class="text-5xl mt-16">My Ticket</div>
        <div class="border-[1px] rounded-md mt-9 mb-20 justify-center flex pt-4 pb-8 shadow">
            Saya suka IMKKKKKKKKKKKKKKKK
        </div>
      </div>
</div>
  

<script src="js/tab.js"></script>
@endsection