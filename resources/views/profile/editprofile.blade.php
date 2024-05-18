@extends('layout.header')

@section('content')

<div class=" flex justify-center items-center rounded-lg my-10 mx-36">
    <div class=" w-3/5 rounded-lg shadow-md">
        <div class="px-20">
            <div>

                <form action="/editprofile" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex items-center my-10 form-group">
                        <div class="w-20 h-20 overflow-hidden rounded-full bg-gray-200 ">
                            <img src="{{ asset('profile_pic/' . Auth::user()->profile_photo) }}"  alt="" class="w-full h-full object-cover">
                        </div>
                        <input id="pp" name="pp" type="file" class="form-control mx-4" value="">
                    </div>
    
                    <div class="my-5">
                        <p>First Name:</p>
                        <input id="firstname" name="firstname" type="text" class="" value="{{ Auth::user()->first_name }}">
                    </div>
    
                    <div class="my-5">
                        <p>Last Name:</p>
                        <input id="lastname" name="lastname" type="text" class="" value="{{ Auth::user()->last_name }}">
                    </div>
    
                    <div class="my-5">
                        <p>Address:</p>
                        <input id="address" name="address" type="text" class="" value="{{ Auth::user()->address }}">
                    </div>
    
                    <div class="my-5">
                        <p>Pronoun:</p>
                        <select name="pronoun" id="pronoun">
                            <option value="1">He/Him</option>
                            <option value="2">She/Her</option>
                        </select>
                    </div>
    
                    <div class="my-5">
                        <p>Bibliography:</p>
                        <textarea name="bio" id="bio" cols="50" rows="10">{{Auth::user()->bio}}</textarea>
                    </div>

                    
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Save Changes
                        </button>
                    
                </form>

            </div>
        </div>
    </div>
</div>


@endsection