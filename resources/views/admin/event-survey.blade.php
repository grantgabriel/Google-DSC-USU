@extends('layout.header_admin')

@section('content_warning')
<div class="py-6 px-4 sm:px-12 lg:px-36 xl:px-48">
        <div class="flex justify-start font-semibold mb-4">
                <div class="px-2">
                        <a href="/admin/event/{{$event[0]->event_id}}" class="">Overview</a>
                </div>
                <div class="px-2">
                        <a href="/admin/event/{{$event[0]->event_id}}/attendees">Attendees</a>
                </div>
                <div class="px-2">
                        <a href="/admin/event/{{$event[0]->event_id}}/edit">Edit</a>
                </div>
                <div class="px-2">
                        <button class="border-b-2 pb-2 border-black">Survey</button>
                </div>
                <div class="px-2">
                        <button>Waitlist?</button>
                </div>
                <div class="px-2">
                        <a href="/admin/event/{{$event[0]->event_id}}/statistic">Statistic</a>
                </div>
        </div>
        <div class="flex justify-center">
                
                
                <div class="flex-col">
                        <table>
                                <thead>
                                        <tr>
                                                <th>Score</th>
                                                <th>Suggestion</th>
                                                <th>Speaker Score</th>
                                                <th>Speaker Suggestion</th>
                                        </tr>
                                </thead>
                                <tbody id="body">
                                    @foreach ($event as $item)
                                        <tr>
                                                <td>{{$item->rating}}</td>
                                                <td>{{$item->review}}</td>
                                                <td>{{$item->speaker_rating}}</td>
                                                <td>{{$item->suggestion}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                </div>

                
        </div>
</div>
@endsection
