@extends('layout.header_admin')

@section('content_warning')
    

    <div class="flex justify-center">
                
        <div class="px-2">
            <button>Overview</button>
        </div>
        <div class="px-2">
            <button>Attendees</button>
        </div>
        <div class="px-2">
            <button>Edit</button>
        </div>
        <div class="px-2">
            <button>Forms</button>
        </div>
        <div class="px-2">
            <button>Waitlist?</button>
        </div>
        <div class="px-2">
            <button>Analytics</button>
        </div>

    </div>

    <div class="bg-red-500 flex justify-center">
        <div class="flex-col">


            {{-- ini bagian atas --}}
            <div class="flex">
                <div class="px-5">
                    <img class="w-20" src="{{$event->event_profile}}" alt="">
                </div>
                <div class="flex-col">
                    <div>
                        @foreach ($event->keyThemes as $keyTheme)
                            {{ $keyTheme->key_name }}/
                        @endforeach
                    </div>
                    <div>
                        {{ $event->event_name }}
                    </div>
                    <div>
                        {{ $event->time }}
                    </div>
                    <div class="flex">
                        Attendees:<div id="attendee">123</div>&nbsp;
                        Check In :<div id="checkin">123</div>
                    </div>
                </div>
            </div>



            <div>
                <input id="input" value="" type="text">
                <button>Download</button>
                <button class=" text-white">Add Attendee</button>
            </div>

            <div class="overflow-x-hidden overflow-y-auto text-justify bg-green-500 w-96 h-96 p-4">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Registration Date</th>
                                <th>Check In</th>
                            </tr>
                        </thead>

                        <tbody id="table" class="max-h-80 overflow-y-auto">
                            
                        </tbody>
                    </table>
            </div>



        </div>
    </div>

    <script>
        const table = document.getElementById('table');
        const input = document.getElementById('input');

        function name($id) {
                fetch('/admin/event/'+ $id+'/attendees/get/'+input.value)
                    .then(response => response.json())
                    .then(data => {
                        table.innerHTML = '';
                        data.forEach(datas => {
                            table.innerHTML += `
                                <tr>
                                    <td>${datas.user.first_name} ${datas.user.last_name}</td>
                                    <td>${datas.created_at.replace('T', ' ').replace('Z', '').substring(0, datas.created_at.lastIndexOf('.'))}</td>
                                    <td><input type="checkbox" onchange="updateAttendance('${datas.user_id}','${datas.event_id}' ,'${datas.attendance_detail}')" name="" id="" ${datas.attendance_detail == 'Attend' ? 'checked' : ''}></td>
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
                name({{ $event->event_id}});
            });
            
            name({{ $event->event_id}});

            setInterval(() => {
                name({{ $event->event_id}});
            }, 1000);

            


        

    </script>
@endsection
