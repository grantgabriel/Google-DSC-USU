@extends('layout.header_admin')

@section('content_warning')
<link rel="stylesheet" href="http://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">

<div class="py-6 px-4 sm:px-12 lg:px-36 xl:px-48">
    <div class="shadow-lg rounded-xl bg-white py-6 px-6">
        <div class="justify-between flex mb-4">
            <div id="membercount" class="text-2xl font-semibold"></div>
            <button class="bg-[#34A853] hover:bg-[#2f9348] active:bg-[#2b8843] rounded-lg text-white px-[12px] py-[6px]"><ion-icon name="print-outline" class="pr-[8px]"></ion-icon>CSV</button>
        </div>
        <div class="mb-3 relative">
            <input id="input" class="w-[50%] sm:w-[40%] lg:w-[33%] px-2 py-2 border rounded-md" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search for a member" type="text">
                <ion-icon name="search-outline" id="searcho" class="text-[#555555] absolute left-3 top-2"></ion-icon>
            </input>
            
        </div>
        
        <div class="w-full overflow-x-auto lg:overflow-hidden sm:justify-center md:flex">
            <table class="w-full" id="rafi" name="rafi">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="py-3 pl-6 px-4">Name</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Date Joined</th>
                        <th class="py-3 pr-6 px-4">Event Registered</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="body" class="text-center">
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>



    document.addEventListener('input', () => {
        const body = document.getElementById('body');
        var input = document.getElementById('input');
        const searcho = document.getElementById('searcho');
       
        
        function update() {
            if (input.value == '') {
            searcho.classList.remove('hidden');
            } else {
                searcho.classList.add('hidden');
            }
            fetch('/admin/member/data/' + input.value)
                .then(response => response.json())
                .then(data => {
                    body.innerHTML = '';
                    data.forEach(datas => {
                        body.innerHTML += `
                            <tr class="border-b relative">
                                <td class="py-6 px-4 text-[#555555]">${datas.first_name} ${datas.last_name}</td>
                                <td class="py-6 px-4 text-[#555555]">${datas.email}</td>
                                <td class="py-6 px-4 text-[#555555]">${datas.created_at}</td>
                                <td class="py-6 px-4 text-[#555555]">${datas.rsvp.length}</td>
                                <td class="relative">
                                    <button onclick="toggleDropdownn(this)">
                                        <div  class="px-[2px] py-1 rounded-full active:bg-blue-100 hover:bg-blue-50">
                                            <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                        </div>
                                    </button>
                                    <div class="dropdownn absolute hidden bg-white border border-gray-200 shadow-md rounded right-6 top-0">
                                        <ul class="whitespace-nowrap">
                                            <li><a href="#" class="block px-4 py-[7px] text-sm text-gray-700 hover:bg-gray-100">Profile & Tickets</a></li>
                                            <hr>
                                            <li><a href="#" class="block px-4 py-[7px] text-sm text-gray-700 hover:bg-gray-100">Settings & Privacy</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        `;
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        update()
    });

    document.addEventListener('DOMContentLoaded', () => {
        const body = document.getElementById('body');
        const membercount = document.getElementById('membercount');

        function updateTable() {
            fetch('/admin/member/data')
                .then(response => response.json())
                .then(data => {
                    body.innerHTML = '';
                    membercount.innerHTML = "Chapter Members (" + data.length + ")";
                    data.forEach(datas => {
                        body.innerHTML += `
                            <tr class="border-b relative">
                                <td class="py-6 px-4 text-[#555555]">${datas.first_name} ${datas.last_name}</td>
                                <td class="py-6 px-4 text-[#555555]">${datas.email}</td>
                                <td class="py-6 px-4 text-[#555555]">${datas.created_at}</td>
                                <td class="py-6 px-4 text-[#555555]">${datas.rsvp.length}</td>
                                <td class="relative">
                                    <button onclick="toggleDropdownn(this)">
                                        <div  class="px-[2px] py-1 rounded-full active:bg-blue-100 hover:bg-blue-50">
                                            <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                                        </div>
                                    </button>
                                    <div class="dropdownn absolute hidden bg-white border border-gray-200 shadow-md rounded right-6 top-0">
                                        <ul class="whitespace-nowrap">
                                            <li><a href="#" class="block px-4 py-[7px] text-sm text-gray-700 hover:bg-gray-100">Profile & Tickets</a></li>
                                            <hr>
                                            <li><a href="#" class="block px-4 py-[7px] text-sm text-gray-700 hover:bg-gray-100">Settings & Privacy</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        `;
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        updateTable();  
    });

    function toggleDropdownn(button) {
        const dropdownn = button.nextElementSibling;
        const dropdowns = document.querySelectorAll('.dropdownn');
        dropdowns.forEach(dd => {
            if (dd !== dropdownn) {
                dd.classList.add('hidden');
            }
        });

        dropdownn.classList.toggle('hidden');

    }

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="http://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>

@endsection