

@extends('layout.header_admin')

@section('content_warning')
<h1>Yang worthy dpt sextifikat</h1><br>
    @foreach ($userAttendance as $user)
        <h2>{{ $user['first_name'] }} {{ $user['last_name'] }} ({{ $user['email'] }})</h2>
        <ul>
            @foreach ($user['categories'] as $category)
                <li>
                    Category: {{ $category['category'] }}, Attendance Percentage: {{ $category['attendance_percentage'] }}%
                </li>
            @endforeach
        </ul>
        <br><br><br>
    @endforeach
@endsection
