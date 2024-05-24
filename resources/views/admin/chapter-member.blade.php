
@extends('layout.header_admin')

@section('content_warning')
<link rel="stylesheet" href="http://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<div class="bg-blue-50 w-full h-full py-6 px-6">
    <div class="shadow-lg rounded-xl bg-white mx-6 py-6 px-12">
        <div class="justify-between flex mb-4">
            <div class="text-xl font-semibold">Chapter Members ({{$data->count()}})</div>
            <button class="bg-[#34A853] rounded-lg text-white px-[12px] py-[6px]"><ion-icon name="print-outline" class="pr-[8px]"></ion-icon>CSV</button>
        </div>
        <div class="w-full flex items-center justify-center overflow-x-auto">
            <div class="flex justify-center w-1/2 ">
                <table border="1" id="rafi" name="rafi">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Joined</th>
                            <th>Event Registered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$item->first_name}} {{$item->last_name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->created_at}}</t>
                                <td>{{$item->rsvp->count()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#rafi').DataTable();
        });
    </script>
</div>


        

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>        
<script src="http://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
@endsection