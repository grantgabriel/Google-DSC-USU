
@extends('layout.header_admin')

@section('content_warning')
<link rel="stylesheet" href="http://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">

        <div>
            <table id="rafi" name="rafi">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            $(document).ready(function() {
                $('#rafi').DataTable();
            });
        </script>

        <script src="http://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
@endsection