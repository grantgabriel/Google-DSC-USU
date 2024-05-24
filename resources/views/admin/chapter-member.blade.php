
@extends('layout.header_admin')

@section('content_warning')
<link rel="stylesheet" href="http://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">

        <div class="w-full flex items-center justify-center">
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


        <script>
            $(document).ready(function() {
                $('#rafi').DataTable();
            });
        </script>

        

        <script src="http://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
@endsection