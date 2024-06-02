@extends('layout.header_admin')

@section('content_warning')
    
<div class="py-6 px-4 sm:px-12 lg:px-36 xl:px-48">
    <div class="flex justify-start font-semibold mb-4">
        <div class="px-2">
            <a href="/admin/event/{{$event->event_id}}" class="">Overview</a>
        </div>
        <div class="px-2">
            <button class="border-b-2 pb-2 border-black">Attendees</button>
        </div>
        <div class="px-2">
            <a href="/admin/event/{{$event->event_id}}/edit">Edit</a>
        </div>
        <div class="px-2">
            <a href="/admin/event/{{$event->event_id}}/survey">Survey</a>
        </div>
        <div class="px-2">
            <button>Waitlist?</button>
        </div>
        <div class="px-2">
            <a href="/admin/event/{{$event->event_id}}/statistic">Statistic</a>
        </div>
    </div>

    <div class="shadow-lg rounded-xl bg-white py-6 px-6 flex justify-center">
        <div class="flex-col justify-center w-full ">
            <div class=" mb-6 lg:text-lg flex justify-between">
                <div class="justify-start flex">
                    <div class="pr-5 lg:pr-8 flex items-center">
                        <img class="w-20 h-20 lg:h-36 lg:w-36  object-cover rounded-full" src="{{ asset('event-profile/' . $event->event_profile)}}" alt="">
                    </div>
                    <div class="flex-col">
                        <div class="text-[#555555] pb-2">
                            @foreach ($event->keyThemes as $keyTheme)
                                {{ $keyTheme->key_name }}
                            @endforeach
                        </div>
                        <div class="text-xl lg:text-3xl pb-2 lg:pb-3 font-semibold text-[#3b3b3b]">
                            {{ $event->event_name }}
                        </div>
                        <div class="pb-1 text-[#555555] text-sm">
                            {{ $event->time }}
                        </div>
                        <div class="flex text-[#555555] text-sm ">
                            Attendees:<div class="font-bold" id="attendee">123</div>&nbsp;
                            Check In :<div class="font-bold" id="checkin">123</div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end items-center" >

                    
                    
                    @if (((now()->startOfDay()->diffInDays($event->time,false))==0))
                    <form action="/admin/show/qr" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$event->event_id}}">
                        <div class="justify-center flex lg:text-lg text-xs items-center border rounded-md px-2 py-2 lg:py-3 lg:px-4 text-white bg-[#34A853]">
                            <ion-icon class="pr-1 lg:pr-4 text-lg lg:text-3xl" name="qr-code-outline"></ion-icon>
                            <button type="submit">Attendance</button>
                        </div>
                        
                    </form>
                    @elseif (((now()->startOfDay()->diffInDays($event->time,false))>0))
                        {{-- <button>Event has not started,Canot Absen</button> --}}
                        <div>
                            <div id="aten" class="justify-center flex lg:text-lg text-xs items-center border rounded-md px-2 py-2 lg:py-3 lg:px-4 text-white bg-[#555555]">
                                <ion-icon class="pr-1 lg:pr-4 text-lg lg:text-3xl" name="qr-code-outline"></ion-icon>
                                <button class="" type="">Attendance</button>  
                            </div>
                            <p class="text-red-500 text-xs lg:text-sm pt-1 hidden">Event Finished</p>
                        </div>
                        
                    @else
                        {{-- <button>Event has ended,Canot Absen</button> --}}
                    @endif
                    
                    
                </div>
            </div>



            <div class="mb-3 relative flex justify-between ">
                <input id="input" class="w-[50%] sm:w-[40%] lg:w-[33%] px-2 py-1 border rounded-md" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search for an attendee" type="text">
                    <ion-icon name="search-outline" id="searcho" class=" text-[#555555] absolute left-3 lg:top-3 top-2"></ion-icon>
                </input>
                <div class="justify-end flex text-xs lg:text-[16px]">
                    <div class="justify-center flex items-center border rounded-md px-2 py-2 lg:py-3 lg:px-4 text-white bg-[#313140]">
                        <ion-icon name="person-add-outline"></ion-icon>
                        <button class="ml-1">Add Attendee</button>
                    </div>
                    
                </div>

            </div>

            <div class="overflow-x-auto overflow-y-auto text-center border rounded-md">
                    <table class="min-w-full text-[#555555] lg:text-lg">
                        <thead>
                            <tr class="border-b">
                                <th class="py-3 pl-6 px-4">Name</th>
                                <th class="py-3 px-4">Registration Date</th>
                                <th class="py-3 pr-6 px-4">Check In</th>
                            </tr>
                        </thead>

                        <tbody id="table" class="max-h-80 text-center">
                            
                        </tbody>
                    </table>
            </div>



        </div>
    </div>
</div>
    <script>
        const table = document.getElementById('table');
        const input = document.getElementById('input');
        const searcho = document.getElementById('searcho');

        aten.addEventListener('click', function() {
            aten.nextElementSibling.classList.remove('hidden');
        });

        function name($id) {
                fetch('/admin/event/'+ $id+'/attendees/get/'+input.value)
                    .then(response => response.json())
                    .then(data => {
                        table.innerHTML = '';
                        data.forEach(datas => {
                            table.innerHTML += `
                                <tr>
                                    <td class="py-2 px-4">${datas.user.first_name} ${datas.user.last_name}</td>
                                    <td class="py-2 px-4">${datas.created_at.replace('T', ' ').replace('Z', '').substring(0, datas.created_at.lastIndexOf('.'))}</td>
                                    <td class="py-2 px-4"><input type="checkbox" onchange="updateAttendance('${datas.user_id}','${datas.event_id}' ,'${datas.attendance_detail}')" name="" id="" ${datas.attendance_detail == 'Attend' ? 'checked' : ''}></td>
                                </tr>
                            `;
                        });
                    });
            }



            function updateAttendance(attendanceId,eventId,isChecked) {
                fetch('/admin/update-attendance', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        attendanceId: attendanceId,
                        eventId: eventId,
                        isChecked: isChecked
                    })

                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to update attendance');
                    }
                    console.log('Attendance updated successfully');
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }

            

            input.addEventListener('input', function() {
                if (input.value == '') {
            searcho.classList.remove('hidden');
            } else {
                searcho.classList.add('hidden');
            }
                name({{ $event->event_id}});
            });
            
            name({{ $event->event_id}});

            setInterval(() => {
                name({{ $event->event_id}});
            }, 1000);

            


        

    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
