

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
                        <p id="tagsValid2" class="hidden text-red-500">Max 255 characters</p>
                        <p id="tagsValid3" class="hidden text-red-500">At least 1 characters</p>
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
                            <p id="speakValid3" class="hidden text-red-500">At least alphabet 1 characters</p>
                        </div>



                        <div class="my-5">
                            <div class="font-semibold ">Speaker Image</div>
                            <div class="flex justify-start items-center">
                                <img class="rounded-full object-cover w-32" src="http://127.0.0.1:8000/event-profile/default.webp" alt="">
                                <input accept=".jpg, .jpeg, .png, .webp" id="thumbnail" class=" px-4 py-2 w-full  " type="file" name="speakimg">
                            </div>                           
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
                        <div class= "my-5 ">
                            <div class="font-semibold ">Event Location</div>
                            <input type="text" class="border-[1px] px-4 py-2 w-full  border-[#b3b3b3]" name="lokasi" id="lokasi">
                            <p id="lokasiValid2" class="hidden text-red-500">Max 255 characters</p>
                            <p id="lokasiValid3" class="hidden text-red-500">At least alphabet 1 characters</p>
                        </div>
                        <div class= "my-5 ">
                            <div class="font-semibold">Event lokasi gugelmap</div>
                            <input type="text" class="border-[1px] px-4 py-2 w-full  border-[#b3b3b3]" name="map" id="map">
                            <p id="mapValid2" class="hidden text-red-500">Max 1000 characters</p>
                            <p id="mapValid3" class="hidden text-red-500">At least alphabet 1 characters</p>
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
    document.addEventListener('DOMContentLoaded', function() {
    const saveButton = document.getElementById('save');
    const draftButton = document.getElementById('draft');
    const form = document.getElementById('form');

    let isNameValid = false;
    let isDescValid = false;
    let isTagsValid = false;
    let isDateValid = false;
    let isSpeakValid = false;
    let isLocationValid = false;
    let isMapValid = false;

    function updateSaveButtonState() {
        if (isNameValid && isDescValid && isTagsValid && isDateValid && isSpeakValid && isLocationValid && isMapValid) {
            saveButton.disabled = false;
            saveButton.classList.add('bg-blue-500');
            saveButton.classList.remove('bg-slate-500');
            saveButton.classList.add('active:bg-blue-600');
        } else {
            saveButton.disabled = true;
            saveButton.classList.remove('bg-blue-500');
            saveButton.classList.add('bg-slate-500');
            saveButton.classList.remove('active:bg-blue-600');
        }
    }

    function validateInput(input, maxLength, validMessage, invalidMessage, condition) {
        const value = input.value;
        if (value.length > 0 && value.length <= maxLength && condition(value)) {
            validMessage.classList.add('hidden');
            invalidMessage.classList.add('hidden');
            input.classList.add('border-green-500');
            input.classList.remove('border-red-500');
            input.classList.remove('border-[#b3b3b3]');
            return true;
        } else {
            input.classList.add('border-red-500');
            input.classList.remove('border-green-500');
            input.classList.remove('border-[#b3b3b3]');
            if (value.length > maxLength) {
                validMessage.classList.remove('hidden');
            } else if (value.length <= 0 || !condition(value)) {
                invalidMessage.classList.remove('hidden');
            }
            return false;
        }
    }

    document.getElementById('namee').addEventListener('input', function() {
        isNameValid = validateInput(
            this,
            255,
            document.getElementById('nameeValid2'),
            document.getElementById('nameeValid3'),
            () => true
        );
        updateSaveButtonState();
    });

    document.getElementById('desc').addEventListener('input', function() {
        isDescValid = validateInput(
            this,
            1000,
            document.getElementById('descValid2'),
            document.getElementById('descValid3'),
            () => true
        );
        updateSaveButtonState();
    });

    document.getElementById('tags').addEventListener('input', function() {
        isTagsValid = validateInput(
            this,
            255,
            document.getElementById('tagsValid2'),
            document.getElementById('tagsValid3'),
            () => true
        );
        updateSaveButtonState();
    });

    document.getElementById('lokasi').addEventListener('input', function() {
        isLocationValid = validateInput(
            this,
            255,
            document.getElementById('lokasiValid2'),
            document.getElementById('lokasiValid3'),
            () => true
        );
        updateSaveButtonState();
    });

    document.getElementById('map').addEventListener('input', function() {
        isMapValid = validateInput(
            this,
            1000,
            document.getElementById('mapValid2'),
            document.getElementById('mapValid3'),
            () => true
        );
        updateSaveButtonState();
    });

    document.getElementById('speak').addEventListener('input', function() {
        const regex = /^[a-zA-Z ]+$/;
        isSpeakValid = validateInput(
            this,
            255,
            document.getElementById('speakValid2'),
            document.getElementById('speakValid3'),
            value => regex.test(value)
        );
        updateSaveButtonState();
    });

    document.getElementById('date').addEventListener('change', function() {
        const value = this.value;
        isDateValid = value !== '';
        if (isDateValid) {
            document.getElementById('dateValid').classList.add('hidden');
        } else {
            document.getElementById('dateValid').classList.remove('hidden');
        }
        updateSaveButtonState();
    });

    function setMinDate() {
        const dateInput = document.getElementById('date');
        const today = new Date();
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);

        const year = tomorrow.getFullYear();
        const month = ('0' + (tomorrow.getMonth() + 1)).slice(-2);
        const day = ('0' + tomorrow.getDate()).slice(-2);

        const minDate = `${year}-${month}-${day}`;
        dateInput.setAttribute('min', minDate);
    }

    function validateDate() {
        const dateInput = document.getElementById('date');
        const selectedDate = new Date(dateInput.value);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);

        if (selectedDate < tomorrow) {
            document.getElementById('dateValid').classList.remove('hidden');
            isDateValid = false;
        } else {
            document.getElementById('dateValid').classList.add('hidden');
            isDateValid = true;
        }
        updateSaveButtonState();
    }

    setMinDate();
    document.getElementById('date').addEventListener('change', validateDate);

    draftButton.addEventListener('click', function() {
        form.action = '/event/draft';
        form.submit();
    });
});

</script>
@endsection
