
@extends('layout.header_admin')

@section('content_warning')

        <div class="flex justify-center">
            <div class="flex flex-col">
                <div class="py-5">
                    <div class="flex justify-center bg-red-500 ">
                        {{$event[0]->event_name}}
                    </div>
                </div>

                <div class="flex justify-between py-1">
                    <div class="px-1">
                        <div class="bg-red-500">
                            Total Member={{$user->count()}}
                        </div> 
                    </div>
                    <div class="px-1">
                        <div class="bg-red-500">
                            Total Regis={{$registrationCount}}
                        </div> 
                    </div>
                    <div class="px-1">
                        <div class="bg-red-500">
                            Persentase Regis={{ number_format(($registrationCount / $user->count()) * 100, 0) }}%

                        </div> 
                    </div>
                </div>
                <div class="flex justify-between py-1">
                    <div class="px-1">         
                        <div class="bg-red-500">
                            Days to next event={{now()->diffInDays($event[0]->time);}}
                        </div>
                    </div>
                    <div class="px-1">         
                        <div class="bg-red-500">
                            Registration|={{$event[0]->rsvp->count()}}
                        </div>
                    </div>
                    <div class="px-1">         
                        <div class="bg-red-500">
                            Hosted APA WOII|

                        </div>
                    </div>
                    <div class="px-1">         
                        <div class="bg-red-500">
                            Collaborated APA ANJ
                        </div>
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="px-1">         
                        <div class="bg-red-500">
                            APA INI ANJ
                        </div>
                    </div>
                    <div class="px-1">         
                        <div class="bg-red-500">
                            Attendess/event = {{$registrationCount/$event->count()}}
                        </div>
                    </div>
                    <div class="px-1">         
                        <div class="bg-red-500">
                            newsletter GK PAHAM BANG|
                        </div>
                    </div>
                    <div class="px-1">         
                        <div class="bg-red-500">
                            auto email open APA INI AJSKDQBuefoh|
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
