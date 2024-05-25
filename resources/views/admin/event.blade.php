
@extends('layout.header_admin')

@section('content_warning')

    <div class="bg-red-500 flex justify-center">

        <div onclick="" class="px-2">
            <button id="1">Upcumming</button>
        </div>

        <div onclick="" class="px-2">
            <button id="2">Past Event</button>
        </div>

    </div>

    <div class="mb-3 relative">
        <input id="input" class="w-[50%] sm:w-[40%] lg:w-[33%] px-2 py-1 border rounded-md" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search for a member" type="text">
            <ion-icon name="search-outline" id="searcho" class="text-[#555555] absolute left-3 top-2"></ion-icon>
        </input>
    </div>

    <div class="bg-blue-500 flex justify-center">

        <table>
            <thead>
                <tr>
                    <th class="py-3 pl-6 px-4">Name</th>
                    <th class="py-3 px-4">Date</th>
                </tr>
            </thead>

            <tbody id="body">
                
            </tbody>
        </table>

    </div>


    <script>
        var page;
        var upBtn = document.getElementById('1');
        var pastBtn = document.getElementById('2');



        function update() {
                fetch('/admin/event/sort/' + page +'/' + input.value)
                    .then(response => response.json())
                    .then(data => {
                        body.innerHTML = '';
                        data.forEach(datas => {
                            body.innerHTML += `
                                <tr>
                                    <td class="flex py-6 px-4 text-[#555555]"><img class="w-14" src="${datas.event_profile}"><a href="#">${datas.event_name}</a></td>
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
                                    <tr class="border-b relative">

                                        <td class="flex py-6 px-4 text-[#555555]"><img class="w-14" src="${datas.event_profile}"><a href="#">${datas.event_name}</a></td>
                                        <td class="py-6 px-4 text-[#555555]">${datas.time}</td>

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
            });
            pastBtn.addEventListener('click', function() {
                page = 2;
                eventList(page);
            });

            

            eventList(page);
            
        });

    </script>



@endsection

