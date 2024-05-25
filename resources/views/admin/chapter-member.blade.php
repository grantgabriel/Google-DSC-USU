
@extends('layout.header_admin')

@section('content_warning')
<link rel="stylesheet" href="http://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<div class="bg-blue-50 w-full h-full py-6 px-6">
    <div class="shadow-lg rounded-xl bg-white mx-6 py-6 px-12">
        <div class="justify-between flex mb-4">
            <div id="membercount" class="text-xl font-semibold"></div>
            <button class="bg-[#34A853] rounded-lg text-white px-[12px] py-[6px]"><ion-icon name="print-outline" class="pr-[8px]"></ion-icon>CSV</button>
        </div>
        <div>
            <input id="input" placeholder="Input Member Name" type="text">
        </div>
        <div class="w-full flex items-center justify-center overflow-x-auto">
            <div class="flex justify-center w-1/2 ">


                <table id="rafi" name="rafi">
                    <thead class="bg-red-500">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Joined</th>
                            <th>Event Registered</th>
                            <th>s</th>
                        </tr>
                    </thead>
                    <tbody id="body" class="bg-blue-500 text-center">

                    </tbody>
                </table>


            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('input', () => {
        const body = document.getElementById('body');
        var input = document.getElementById('input');
        
        function update() {
            fetch('/admin/member/data/' + input.value)
                .then(response => response.json())
                .then(data => {
                    body.innerHTML = '';
                    data.forEach(datas => {
                        body.innerHTML += `
                            <tr>
                                <td>${datas.first_name} ${datas.last_name}</td>
                                <td>${datas.email}</td>
                                <td>${datas.created_at}</td>
                                <td>${datas.rsvp.length}</td>
                                <td>:</td>
                            
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

    document.addEventListener('DOMContentLoaded',() => {
        const body = document.getElementById('body');
        const membercount = document.getElementById('membercount');

        function updateTable() {
            fetch('/admin/member/data')
                .then(response => response.json())
                .then(data => {
                    body.innerHTML = '';
                    membercount.innerHTML = "Sex Count=" + data.length;
                    data.forEach(datas => {
                        body.innerHTML += `
                            <tr>
                                <td>${datas.first_name} ${datas.last_name}</td>
                                <td>${datas.email}</td>
                                <td>${datas.created_at}</td>
                                <td>${datas.rsvp.length}</td>
                                <td>:</td>
                            </tr>
                        `;
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        updateTable();  

    })


    
</script>

        

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>        
<script src="http://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
@endsection