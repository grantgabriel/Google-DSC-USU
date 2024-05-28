@extends('layout.header_admin')

@section('content_warning')
        <div class="flex justify-center">
                <div class="flex-col">
                        <table>
                                <thead>
                                        <tr>
                                                <th>Score</th>
                                                <th>Suggestion</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach ($event as $item)
                                        <tr>
                                                <td>{{$item->rating}}</td>
                                                <td>{{$item->review}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                </div>
        </div>
@endsection
