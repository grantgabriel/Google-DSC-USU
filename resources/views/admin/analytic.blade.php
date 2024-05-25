
@extends('layout.header_admin')

@section('content_warning')
<div class="py-6 sm:px-12 md:px-24 lg:px-36 xl:px-48">
    <div class=" bg-slate-50 py-6 mb-40 lg:mb-[134px]">
        <div class="flex justify-center">
            <div class="flex flex-col lg:w-full lg:px-6 ">
                <div class="pt-5 pb-1">
                    <div class="text-[#555555] flex justify-center font-semibold shadow-[0_0_4px_0_rgba(0,0,0,0.1)] bg-white rounded-md lg:py-1">
                        Next Event-> <a href="">{{$event[0]->event_name}}</a>
                    </div>
                </div>

                <div class="flex justify-between py-1 relative">
                    <div class="px-1 w-full">
                        <div class=" shadow-[0_0_10px_0_rgba(0,0,0,0.1)] h-full bg-white rounded-md py-6 px-4 lg:py-8">
                            <div class="text-[#555555] font-semibold flex justify-center text-3xl">
                                {{$user->count()}}
                            </div>
                            <div class="flex justify-center text-xs pt-1">
                                Total members
                            </div>
                        </div> 
                    </div>
                    <div class="px-1 w-full">
                        <div class="shadow-[0_0_10px_0_rgba(0,0,0,0.1)] h-full bg-white rounded-md py-6 px-4 lg:py-8">
                            <div class="text-[#555555] font-semibold flex justify-center text-3xl ">
                                {{$registrationCount}}
                            </div>
                            <div class="flex justify-center text-xs pt-1">
                                Members with registration
                            </div>
                        </div> 
                    </div>
                    <div class="px-1 w-full">
                        <div class="shadow-[0_0_10px_0_rgba(0,0,0,0.1)] h-full bg-white rounded-md py-5 px-4 lg:py-8">
                            <div class="text-[#555555] font-semibold flex justify-center text-3xl ">
                                {{ number_format(($registrationCount / $user->count()) * 100, 0) }}%
                            </div>
                            <div class="text-[#555555]  flex justify-center text-xs pt-1 ">
                                Member registration rate
                            </div>

                        </div> 
                    </div>
                </div>
                <div class="flex justify-between py-1">
                    <div class="px-1 w-full">         
                        <div class="shadow-[0_0_10px_0_rgba(0,0,0,0.1)] h-full bg-white rounded-md py-5 px-4 lg:py-8">
                            <div class="text-[#555555] font-semibold flex justify-center text-3xl ">
                                {{now()->diffInDays($event[0]->time);}}
                            </div>
                            <div class="text-[#555555]  flex justify-center text-xs pt-1 ">
                                Days to next event
                            </div>
                        </div>
                    </div>
                    <div class="px-1 w-full">         
                        <div class="shadow-[0_0_10px_0_rgba(0,0,0,0.1)] h-full bg-white rounded-md py-5 px-4 lg:py-8">
                            <div class="text-[#555555] font-semibold flex justify-center text-3xl ">
                                {{$event[0]->rsvp->count()}}
                            </div>
                            <div class="text-[#555555]  flex justify-center text-xs pt-1 ">
                                Registration
                            </div>
                        </div>
                    </div>
                    <div class="px-1 w-full">         
                        <div class="shadow-[0_0_10px_0_rgba(0,0,0,0.1)] h-full bg-white rounded-md py-5 px-4 lg:py-8">
                            <div class="text-[#555555] font-semibold flex justify-center text-3xl ">
                                100
                            </div>
                            <div class="text-[#555555]  flex justify-center text-xs pt-1 ">
                                Hosted
                            </div>

                        </div>
                    </div>
                    <div class="px-1 w-full">         
                        <div class="shadow-[0_0_10px_0_rgba(0,0,0,0.1)] h-full bg-white rounded-md py-5 px-4 lg:py-8">
                            <div class="text-[#555555] font-semibold flex justify-center text-3xl ">
                                100
                            </div>
                            <div class="text-[#555555]  flex justify-center text-xs pt-1 ">
                                Collaborated
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row py-1">
                    <div class="px-1 w-full">         
                        <div class="shadow-[0_0_10px_0_rgba(0,0,0,0.1)] h-full bg-white rounded-md py-5 px-4 lg:py-8">
                            <div class="text-[#555555] font-semibold flex justify-center text-3xl ">
                                100
                            </div>
                            <div class="text-[#555555]  flex justify-center text-xs pt-1 ">
                                APA INI ANJ
                            </div>
                        </div>
                    </div>
                    <div class="px-1 w-full">         
                        <div class="shadow-[0_0_10px_0_rgba(0,0,0,0.1)] h-full bg-white rounded-md py-5 px-4 lg:py-8">
                            <div class="text-[#555555] font-semibold flex justify-center text-3xl ">
                               {{(int)(($registrationCount/$event->count())* pow(10, 2))/pow(10, 2)}}
                            </div>
                            <div class="text-[#555555]  flex justify-center text-xs pt-1 ">
                                Attendees/event
                            </div>
                        </div>
                    </div>
                    <div class="px-1 w-full">         
                        <div class="shadow-[0_0_10px_0_rgba(0,0,0,0.1)] h-full bg-white rounded-md py-5 px-4 lg:py-8">
                            <div class="text-[#555555] font-semibold flex justify-center text-3xl ">
                                100
                             </div>
                             <div class="text-[#555555]     flex justify-center text-xs pt-1 ">
                                Newsletter opens
                             </div>
                        </div>
                    </div>
                    <div class="px-1 w-full">         
                        <div class="shadow-[0_0_10px_0_rgba(0,0,0,0.1)] h-full bg-white rounded-md py-5 px-4 lg:py-8">
                            <div class="text-[#555555] font-semibold flex justify-center text-3xl ">
                                100
                             </div>
                             <div class="text-[#555555]     flex justify-center text-xs pt-1 ">
                                Auto emails opens
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
