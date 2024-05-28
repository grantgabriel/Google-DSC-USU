@extends('layout.header_admin')

@section('content_warning')

<div class="py-6 px-4 sm:px-12 lg:px-36 xl:px-48">
        <div class="flex justify-start font-semibold mb-4">
            
            <div class="px-2">
                <a href="/admin/event/{{$event->event_id}}" class="">Overview</a>
            </div>
            <div class="px-2">
                <a href="/admin/event/{{$event->event_id}}/attendees">Attendees</a>
            </div>
            <div class="px-2">
                <button class="border-b-2 pb-2 border-black">Edit</button>
            </div>
            <div class="px-2">
                <button>Forms</button>
            </div>
            <div class="px-2">
                <button>Waitlist?</button>
            </div>
            <div class="px-2">
                <a href="/admin/event/{{$event->event_id}}/statistic">Statistic</a>
            </div>

        </div>
        
        <div class="shadow-lg rounded-xl bg-white py-6 px-6 flex justify-center">
            <div class="flex-col">
                
        
                
                

                <form id="eventform" action="/admin/event/{{$event->event_id}}/edit" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="px-0">
                        <div class="flex justify-center items-center">
                            <div class="w-fit lg:w-full relative"> 
                                <img class="rounded-lg lg:object-cover lg:max-fit lg:min-w-full" src="{{ asset('banner/' . $event->event_banner) }}" alt="">
                                <input class="absolute bottom-6 left-6 text-white" type="file" class="form-control" name="banner" id="banner">
                            </div>
                        </div>
                    </div>
                    <section class="bg-white lg:px-48 px-4 relative">
                    
                    <div class="flex justify-start  mt-20 items-center">
                        <img class="w-24 h-24 lg:h-36 lg:w-36 mr-6 object-cover rounded-full" src="http://127.0.0.1:8000/event-profile/{{$event->event_profile}}" alt="">
                        <input type="file" class="form-control" name="pp" id="pp">
                    </div>
                    

                    <main id="main">
                        <div class="text-slate-700 grid relative gap-2 mt-5">
                            
                                <div class="flex justify-start ">
                                    <input id="eventname" class="w-full text-2xl  py-1 text-[#555555]" name="nama" type="text" value="{{ $event->event_name }}">
                                    <ion-icon id="focus-icon" class=""  name="create-outline"></ion-icon>
                                </div>
                                <p id="eventnameValid" class="hidden text-red-500">At least 1 characters</p>
                                <p id="eventnameValid2" class="hidden text-red-500">Max 255 characters</p>

                                <p class="text-lg text-[#555555]">Google Developer Student Club Universitas Sumatera Utara, Indonesia.</p>
                                <div class="flex gap-2">
                                
                                @foreach ($event->keyThemes as $item)
                                    <span class="bg-blue-100 py-1 px-3 rounded-full shadow"><p class="text-blue-900 font-medium">{{ $item->key_name }}</p></span>
                                    
                                @endforeach
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row-reverse py-6 gap-4">
                            <div class="grid gap-4 lg:max-w-screen-sm">
                                <div class=" flex justify-end">
                                    <ion-icon id="focus-icon2" class="text-[#555555] flex justify-end"  name="create-outline"></ion-icon>

                                </div>
                                    <textarea id="deskripsi" name="deskripsi" class="text-[#555555] py-1 px-3" cols="70" rows="10">{{ $event->description }}</textarea>
                                    <p id="deskripsiValid" class="hidden text-red-500">At least 1 characters</p>
                                    <p id="deskripsiValid2" class="hidden text-red-500">Max 255 characters</p>
                                
                                
                                <div class="flex justify-center">
                                    <span  class=" text-blue-600 mr-2 lg:text-sm font-semibold text-center  rounded-t-xl"><input id="date" name="tanggal" type="date" value="{{$event->time}}"></span>
                                    <ion-icon id="focus-icon3" class=""  name="create-outline"></ion-icon>

                                </div>
                                
                            </div>
                            <div class="lg:pr-12 grid" id="maps-iframe">
                                <iframe class="w-full h-96 lg:h-full rounded-lg border-2" 
                                    src="https://www.google.com/maps?q={{ Illuminate\Support\Str::slug($event->address) }}&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <span id="maps-detail" class="flex gap-1"><img class="h-5 mt-1 fill-red-700" src="{{ asset('img/location.svg') }}" alt=""><p class="text-sm lg:text-xs underline ">{{ $event->address }}</p></span>
                            </div>
                        </div>
                        <h1 class="text-3xl text-[#555555] font-bold">About</h1>
                        <div class="grid gap-4 mt-4">
                            <details class="group [&_summary::-webkit-details-marker]:hidden" open>
                                <summary
                                  class="flex cursor-pointer items-center justify-between gap-1.5 rounded-lg bg-blue-50 p-4 text-[#555555]"
                                >
                                  <h2 class="font-semibold text-lg">Speaker</h2>
                            
                                  <svg class="size-5 shrink-0 transition duration-300 group-open:-rotate-180"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                  >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                  </svg>
                                </summary>
                                <div class="mt-4 px-4 leading-relaxed flex">
                                    <article class="rounded-xl border border-555555]  p-4 w-full">
                                        <div class="flex items-center gap-4 lg:px-12">
                                        <img src="{{ $event->speaker_img }}" class="size-16 lg:size-40 rounded-full object-cover"/>
                                        <input type="file" name="speakimg">
                                        <h3 class="text-lg text-[#555555] font-medium mx-auto">
                                            <input type="text" name="speakname" value="{{ $event->speaker_name }}">
                                        </h3>
                                        </div>
                                      </article>
                                </div>
                            </details>
                            
                        </div>

                        <div class="flex justify-end mt-8">
                            <button id="save" type="submit" class="bg-blue-500 active:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                                Save Changes
                            </button>
                        </div>
                    </main>
                    


                </form>

                        <div id="toastFeedback" class="fixed hidden bottom-16 transition-all ease-in-out duration-1000 translate-x-1/2 right-1/2 z-50 w-full mx-5 bg-slate-600 py-1 px-8 lg:text-xl lg:w-fit rounded-full text-white">
                            Copied to clipboard
                        </div>
                </section>
            </div>
        </div>
</div>


<script>

    
    let deskripsiSubmit = true;
    let eventnameSubmit = true;
    document.addEventListener('DOMContentLoaded', function() {
            const inputField = document.getElementById('eventname');
            console.log(eventname.value)
            const inputField2 = document.getElementById('deskripsi');
            const inputField3 = document.getElementById('date');
            const icon = document.getElementById('focus-icon');
            const icon2 = document.getElementById('focus-icon2');
            const icon3 = document.getElementById('focus-icon3');
            const save = document.getElementById('save');

            icon.addEventListener('click', function() {
                inputField.focus();
                const valueLength = inputField.value.length;
                inputField.setSelectionRange(valueLength, valueLength);
            });
            icon2.addEventListener('click', function() {
                inputField2.focus();
                const valueLength = inputField2.value.length;
                inputField2.setSelectionRange(valueLength, valueLength);
            });
            icon3.addEventListener('click', function() {
                inputField3.focus();
            });
        });
        eventname.addEventListener('input', function(){
            const eventname = document.getElementById('eventname');
            const eventnameValid = document.getElementById('eventnameValid');
            const eventnameValid2 = document.getElementById('eventnameValid2');

            let value = eventname.value;
            if (value.length <= 255 && value.length > 0 ) {
                eventnameValid.classList.add('hidden');
                eventnameValid2.classList.add('hidden');
                eventname.classList.remove('border-red-500');
                eventname.classList.remove('border-[#b3b3b3]');
                eventname.classList.remove('border');
                eventnameSubmit = true;
            } else {
                eventnameSubmit = false;
                eventname.classList.add('border');
                eventname.classList.add('border-red-500');
                if (value.length >= 255) {
                    eventnameValid2.classList.remove('hidden');
                } else if (value.length < 1) {
                    eventnameValid.classList.remove('hidden');
                }
            }

            saveButton();
        });
        deskripsi.addEventListener('input', function(){
            const deskripsi = document.getElementById('deskripsi');
            const deskripsiValid = document.getElementById('deskripsiValid');
            const deskripsiValid2 = document.getElementById('deskripsiValid2');

            let value = deskripsi.value;
            if (value.length <= 1000 && value.length > 0 ) {
                deskripsiValid.classList.add('hidden');
                deskripsiValid2.classList.add('hidden');
                deskripsi.classList.remove('border-red-500');
                deskripsi.classList.remove('border-[#b3b3b3]');
                eventname.classList.remove('border');
                deskripsiSubmit = true;
            } else {
                deskripsiSubmit = false;
                deskripsi.classList.add('border');
                deskripsi.classList.add('border-red-500');

                if (value.length >= 1000) {
                    deskripsiValid2.classList.remove('hidden');
                } else if (value.length < 1) {
                    deskripsiValid.classList.remove('hidden');
                }
            }

            saveButton();
        });

        function saveButton(){
            if(deskripsiSubmit && eventnameSubmit){
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
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
