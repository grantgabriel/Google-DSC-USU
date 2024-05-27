
@extends('layout.header_admin')

@section('content_warning')

<div class="py-6 px-4 sm:px-12 lg:px-36 xl:px-48">
    <div class="shadow-lg rounded-xl bg-white py-6 px-6">
        <div class="flex justify-center mb-5">
            <div class="text-2xl font-semibold">Chapter Events</div>
        </div>
        
        

        <div class="mb-3 relative flex justify-between">
            
            <input id="input" class="w-[50%] sm:w-[40%] lg:w-[33%] px-2 py-1 border rounded-md" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search for an event" type="text">
                <ion-icon name="search-outline" id="searcho" class=" text-[#555555] absolute left-3 top-3"></ion-icon>
            </input>
            
            <div class="flex justify-end text-sm lg:text-[16px]">
                <div class="flex items-center pr-2">
                    <div class="mr-2 "><ion-icon  name="filter-outline"></ion-icon></div>
                    <div class=" flex justify-end rounded-md items">
                        <div onclick="" class="pr-2 pl-3 py-[6px] ">
                            <button class="border-b-4 border-blue-500 pb-[6px]" id="1">Upcoming</button>
                        </div>
                        <div onclick="" class="pl-2 pr-3 py-[6px]">
                            <button class="pb-[6px]" id="2">Past</button>
                        </div>
                    </div>
                </div>
               
                <a href="/admin/add/event" class="flex items-center justify-center border active:bg-[#1b1b23] rounded-md px-2 py-2 lg:py-3 ml- lg:px-4 text-white bg-[#313140]">
                    <ion-icon class="pr-2" name="person-add-outline"></ion-icon>
                    <div >Add Event</div>
                </a> 
            </div>            
        </div>

        <div>
            


            <table class="w-full items-center">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="py-3 pl-6 px-4">Event</th>
                        <th class="">Date</th>
                    </tr>
                </thead>

                <tbody id="body">
                    
                </tbody>
            </table>

        </div>
    </div>
</div>

    <script>
        var page;
        var upBtn = document.getElementById('1');
        var pastBtn = document.getElementById('2');
        const searcho = document.getElementById('searcho');


        function update() {
            if (input.value == '') {
            searcho.classList.remove('hidden');
            } else {
                searcho.classList.add('hidden');
            }
                fetch('/admin/event/sort/' + page +'/' + input.value)
                    .then(response => response.json())
                    .then(data => {
                        body.innerHTML = '';
                        data.forEach(datas => {
                            body.innerHTML += `
                            <tr class="border-b text-md">
                                        <td class=" py-6 px-4 text-[#555555]">
                                            <a class="justify-start flex" href="event/${datas.event_id}">
                                                <img class="w-24 mr-4" src="http://127.0.0.1:8000/event-profile/${datas.event_profile}">
                                                <div>${datas.event_name}</div>
                                            </a>
                                        </td>
                                        <td class="py-6 px-4 text-[#555555]">${datas.time}</td>
                                    </tr>
                            `;
                        });
                    });
            }

            function eventList(page) {
                    fetch('/admin/event/sort/' + page)
                        .then(response => response.json())
                        .then(data => {
                            body.innerHTML = '';
                            data.forEach(datas => {
                                body.innerHTML += `
                                
                                    <tr class="border-b ">
                                        <td class=" py-6 px-4 text-[#555555] text-lg lg:text-xl">
                                            <a class="justify-start flex" href="event/${datas.event_id}">
                                                <img class="w-16 lg:w-28 mr-4" src="http://127.0.0.1:8000/event-profile/${datas.event_profile}">
                                                <div>${datas.event_name}</div>
                                            </a>
                                        </td>
                                        <td class="py-6 px-4 lg:text-lg justify-center flex items-center text-[#555555]">${datas.time}</td>
                                    </tr>
                                `;
                            });
                        });
            }
            
        document.addEventListener('input', () => {
            const body = document.getElementById('body');
            var input = document.getElementById('input');
            
            

            input.addEventListener('input', update);
            update();
        });

        document.addEventListener('DOMContentLoaded', function() {
            var upcumming=1;
            var past=2;
            page=upcumming;
            const body = document.getElementById('body');

            upBtn.addEventListener('click', function() {
                page = 1;
                eventList(page);
                upBtn.classList.add('border-b-4');
                upBtn.classList.add('border-blue-500');
                pastBtn.classList.remove('border-b-4');
                pastBtn.classList.remove('border-blue-500');
            });
            pastBtn.addEventListener('click', function() {
                page = 2;
                eventList(page);
                upBtn.classList.remove('border-b-4');
                upBtn.classList.remove('border-blue-500');
                pastBtn.classList.add('border-b-4');
                pastBtn.classList.add('border-blue-500');
            });

            

            eventList(page);
            
        });
        
    </script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


@endsection

