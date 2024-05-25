@extends('layout.header')

@section('content')

@php
    $address = Auth::user()->address;
    $parts = explode(',', $address);
    $country = $parts[0] ?? '';
    $city = $parts[1] ?? '';
@endphp


<div class="px-10 my-8 mx-4 md:mx-32 lg:mx-56 xl:mx-72 2xl:mx-96 rounded-lg border-[1px]">
    <div class="py-10">
        <div>

            <form action="/editprofile" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex items-center mb-10 form-group">
                    <div class="min-w-20 max-w-20 h-20 overflow-hidden rounded-full bg-gray-200 ">
                        <img src="
                            @if (Auth::user()->profile_photo != null)
                                {{ asset('profile_pic/' . Auth::user()->profile_photo) }}
                            @else
                                {{ asset('img/user.png') }}
                            @endif
                        "  alt="" class="w-full h-full object-cover">
                    </div>
                    <input id="pp" name="pp" type="file" class="form-control mx-4" value="">
                    
                </div>

                <div class="my-5">
                    <p>First Name</p>
                    <input id="firstname" name="firstname" type="text" class="border-[1px] px-4 py-2 w-full text-[#555555] border-[#b3b3b3]" value="{{ Auth::user()->first_name }}">
                    <p id="firstnameValid" class="hidden text-red-500">First name can only contain alphabet characters </p>
                    <p id="firstnameValid2" class="hidden text-red-500">Max 255 characters</p>
                </div>

                <div class="my-5">
                    <p>Last Name</p>
                    <input id="lastname" name="lastname" type="text" class="border-[1px] px-4 py-2 w-full text-[#555555] border-[#b3b3b3]" value="{{ Auth::user()->last_name }}">
                    <div id="lastnameValid" class="hidden text-red-500">Last name can only contain alphabet characters </div>
                    <div id="lastnameValid2" class="hidden text-red-500">Max 255 characters</div> 
                </div>

                <div class="my-5">
                    <input hidden id="address" name="address" type="text" class="border-[1px] px-4 py-2 w-full text-[#555555] border-[#b3b3b3]">
                </div>

                <div class="my-5">
                    <p>Country</p>
                    <input id="negara" name="negara" type="text" class="border-[1px] px-4 py-2 w-full text-[#555555] border-[#b3b3b3]" value="{{ $country}}">
                    <p id="negaraValid" class="hidden text-red-500">Country can only contain alphabet characters </p>
                    <p id="negaraValid2" class="hidden text-red-500">Max 255 characters</p>
                </div>

                <div class="my-5">
                    <p>City</p>
                    <input id="kota" name="kota" type="text" class="border-[1px] px-4 py-2 w-full text-[#555555] border-[#b3b3b3]" value="{{ $city}}">
                    <p id="kotaValid" class="hidden text-red-500">City can only contain alphabet characters </p>
                    <p id="kotaValid2" class="hidden text-red-500">Max 255 characters</p>
                </div>

                <div class="my-5">
                    <p>Pronoun</p>
                    <select name="pronoun" class="border-[1px] px-4 py-2 w-full text-[#555555] border-[#b3b3b3]" id="pronoun">
                        <option value="1">He/Him</option>
                        <option value="2">She/Her</option>
                    </select>
                </div>

                <div>
                    <p>Bibliography</p>
                    <textarea name="bio" id="bio" class="border-[1px] px-4 py-2 w-full text-[#555555] border-[#b3b3b3]" >{{Auth::user()->bio}}</textarea>
                    <p id="bioValid" class="hidden text-red-500">Max 1000 characters</p>
                </div>
                    

                <div class="border-b-[1px] my-10"></div>
                <div class="flex justify-end">
                    <button id="save" type="submit" class="bg-blue-500 active:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                        Save Changes
                    </button>
                </div>
                
                
            </form>

        </div>
    </div>
</div>

<script>
      

    document.addEventListener('input', function () {
        document.getElementById('address').value = document.getElementById('negara').value + ',' + document.getElementById('kota').value;
    })
</script>

<script src="js/regex.js"></script>


@endsection