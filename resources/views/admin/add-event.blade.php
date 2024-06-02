

@extends('layout.header_admin')

@section('content_warning')

<div class="py-6 px-4 sm:px-12 md:px-32 lg:px-56 xl:px-80">
    <div class="shadow-lg rounded-xl bg-white py-6 px-6">
        <div class="flex justify-center xl:px-12 text-[#555555]">
            <form id="form" action="/admin/add/event/create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex-col">
                    
                    <div class="my-5 ">
                        <p class="font-semibold ">Title</p>
                        <input id="namee" class="border-[1px] px-4 py-2 w-full  border-[#b3b3b3]" name="name" type="text">
                        <p id="nameeValid2" class="hidden text-red-500">Max 255 characters</p>
                        <p id="nameeValid3" class="hidden text-red-500">At least 1 characters</p>
                    </div>
                    <div class="my-5 ">
                        <p class="font-semibold ">Description</p>
                        <input id="desc" class="border-[1px] px-4 py-2 w-full  border-[#b3b3b3]" name="desc" type="text">
                        <p id="descValid2" class="hidden text-red-500">Max 1000 characters</p>
                        <p id="descValid3" class="hidden text-red-500">At least 1 characters</p>
                    </div>
                    <div class= "my-5 ">
                        <p class="font-semibold ">Tags</p>
                        <input id="tags" class="border-[1px] px-4 py-2 w-full  border-[#b3b3b3]" name="tags" type="text">
                    </div>
                    <div class="my-5">
                        <div class="font-semibold ">Banner & Thumbnail</div>
                        <div class="relative">
                            <img class="" src="http://127.0.0.1:8000/banner/default.webp" alt="">
                            <input accept=".jpg, .jpeg, .png, .webp" id="banner" class="absolute bottom-2 left-2 px-4 py-2 w-full  " type="file" name="banner">
                        </div>
                    </div>
                    <div class="my-5">
                        <div class="flex justify-start items-center">
                            <img class="rounded-full object-cover w-32" src="http://127.0.0.1:8000/event-profile/default.webp" alt="">
                            <input accept=".jpg, .jpeg, .png, .webp" id="thumbnail" class=" px-4 py-2 w-full  " type="file" name="profile">
                        </div>                           
                    </div>

                        <div class="mt-8 mb-4 flex justify-around">
                            <div>
                                <div class="font-semibold ">Choose Venue :</div>
                                <div class="flex">
                                    <div class="mr-3">
                                        <input class="mr-[2px]" checked type="radio" id="1" name="venue" value="Hybrid">
                                        <label for="1">Hybrid</label>
                                    </div>
                                    <div class="mr-3">
                                        <input class="mr-[2px] "  type="radio" id="2" name="venue" value="In Person">
                                    <label for="2">In Person</label>
                                    </div>
                                    <div class="mr-3">
                                        <input class="mr-[2px] " type="radio" id="3" name="venue" value="Online">
                                        <label for="3">Online</label>
                                    </div>                                                                                                      
                                </div>
                            </div>
                            <div>
                                <div class="font-semibold ">Date</div>
                                <input type="date" name="date" id="date">
                                <p id="dateValid" class="text-red-500">Fill this date!!!</p>
                            </div>
                            
                        </div>
                        <div class= "my-5 ">
                            <div class="font-semibold ">Speaker Name</div>
                            <input id="speak" class="border-[1px] px-4 py-2 w-full  border-[#b3b3b3]" name="speak" type="text">
                            <p id="speakValid" class="hidden text-red-500">Speaker name can only contain alphabet characters</p>
                            <p id="speakValid2" class="hidden text-red-500">Max 255 characters</p>
                            <p id="speakValid3" class="hidden text-red-500">At least 1 characters</p>
                        </div>
                        <div class= "my-5 ">
                            <div class="font-semibold ">Speaker Image</div>
                            <input id="speakimg" class="border-[1px] px-4 py-2 w-full  border-[#b3b3b3]" name="speakimg" type="text">
                        </div>

                        <div class= "my-5">
                            <div class="font-semibold ">Choose Categories :</div>
                            <div class="flex justify-start">
                                <div>
                                    <div class="mr-2">
                                        <input class="mr-[2px]" checked type="radio" name="categories" id="1" value="Android">
                                        <label for="1">Android</label>
                                    </div>
                                    <div class="mr-2">
                                        <input class="mr-[2px]" type="radio" name="categories" id="2" value="Machine Learning">
                                        <label for="2">Machine Learning</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="mr-2">
                                        <input class="mr-[2px]" type="radio" name="categories" id="3" value="UI/UX">
                                    <label for="3">UI/UX</label>
                                    </div>
                                    <div class="mr-2">
                                        <input class="mr-[2px]" type="radio" name="categories" id="4" value="Web Development">
                                        <label for="4">Web Development</label>
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div>
                            <di class="font-semibold "v>Event Location gugelmap</div>
                            <input type="text" name="map" id="">
                        </div>

                        <div>
                            <div class="font-semibold ">Event Location</div>
                            <input type="text" name="location" id="">
                        </div>
                        <div class="border-b-[1px] my-5"></div>
                        <div class="flex justify-end">
                            <button  id="draft" type="submit" class="bg-yellow-500 mr-2 savee active:bg-yellow-600 text-white font-semibold py-2 px-4 rounded">
                                Make Draft
                            </button>
                            <button  id="save" type="submit" class="bg-slate-500  text-white font-semibold py-2 px-4 rounded">
                                Create Event
                            </button>
                        </div>

                    </div>
                </div>
            </form>



        </div>
    </div>
</div>

<script>
    const save = document.getElementById('save');
    let dateSubmit = false;
    let nameeSubmit = false;
    let descSubmit = false;
    save.disabled = true;
    function saveButton(){
        if(nameeSubmit && descSubmit && dateSubmit){
            save.disabled = false;
            save.classList.add('bg-blue-500');
            save.classList.remove('bg-slate-500');
            save.classList.add('active:bg-blue-600');
        } else {
            save.disabled = true;
            save.classList.remove('bg-blue-500');
            save.classList.add('bg-slate-500');
            save.classList.remove('active:bg-blue-600');
        }
    };
    namee.addEventListener('input', function(){
        const namee = document.getElementById('namee');
        const nameeValid2 = document.getElementById('nameeValid2');
        const nameeValid3 = document.getElementById('nameeValid3');
        let value = namee.value;
        if (value.length <= 255 && value.length > 0 ) {
            nameeValid2.classList.add('hidden');
            nameeValid3.classList.add('hidden');
            namee.classList.add('border-green-500');
            namee.classList.remove('border-red-500');
            namee.classList.remove('border-[#b3b3b3]');
            nameeSubmit = true; 
        } else {
            nameeSubmit = false;
            namee.classList.add('border-red-500');
            namee.classList.remove('border-green-500');
            namee.classList.remove('border-[#b3b3b3]');
            if (value.length > 255) {
                nameeValid2.classList.remove('hidden');
            } else if(value.length <= 0){
                nameeValid3.classList.remove('hidden');
            }
        }

        saveButton();
    });
    desc.addEventListener('input', function(){
        const desc = document.getElementById('desc');
        const descValid2 = document.getElementById('descValid2');
        const descValid3 = document.getElementById('descValid3');
        let value = desc.value;
        if (value.length <= 1000 && value.length > 0 ) {
            descValid2.classList.add('hidden');
            descValid3.classList.add('hidden');
            desc.classList.add('border-green-500');
            desc.classList.remove('border-red-500');
            desc.classList.remove('border-[#b3b3b3]');
            descSubmit = true; 
        } else {
            descSubmit = false;
            desc.classList.add('border-red-500');
            desc.classList.remove('border-green-500');
            desc.classList.remove('border-[#b3b3b3]');
            if (value.length > 1000) {
                descValid2.classList.remove('hidden');
            } else if(value.length <= 0){
                descValid3.classList.remove('hidden');
            }
        }

        saveButton();
    });
    speak.addEventListener('input', function(){
        let regex = /^[a-zA-Z ]+$/;
        const speak = document.getElementById('speak');
        const speakValid2 = document.getElementById('speakValid2');
        const speakValid3 = document.getElementById('speakValid3');
        let value = speak.value;
        if (value.length <= 255 && value.length > 0 && regex.test(value)) {
            speakValid.classList.add('hidden');
            speakValid2.classList.add('hidden');
            speakValid3.classList.add('hidden');
            speak.classList.add('border-green-500');
            speak.classList.remove('border-red-500');
            speak.classList.remove('border-[#b3b3b3]');
            speakSubmit = true; 
        } else {
            speakSubmit = false;
            speak.classList.add('border-red-500');
            speak.classList.remove('border-green-500');
            speak.classList.remove('border-[#b3b3b3]');
            if (value.length > 255) {
                speakValid2.classList.remove('hidden');
            } else if(value.length <= 0){
                speakValid3.classList.remove('hidden');
            } else if(!regex.test(value)){
                speakValid.classList.remove('hidden');
            }
        }

        saveButton();
    });
    date.addEventListener('input', function(){
        const date = document.getElementById('date');
        const dateValid = document.getElementById('dateValid');
        let value = date.value;
        if (value != '') {
            dateValid.classList.add('hidden');
            dateSubmit = true; 
        } else {
            dateValid.classList.remove('hidden');
            dateSubmit = false;
        }

        saveButton();
    });

    document.getElementById('draft').addEventListener('click', function() {
            var form = document.getElementById('form');
            form.action = 'event/draft';
            form.submit();
        });
</script>
@endsection
