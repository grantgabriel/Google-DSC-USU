
@extends('layout.header_admin')

@section('content_warning')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="py-6 px-4 sm:px-12 lg:px-36 xl:px-48">
    <div class="flex justify-between font-semibold mb-4">
        <div class="flex justify-start items-center">
            <div class="px-2">
                <a href="/admin/event/{{$event->event_id}}" class="">Overview</a>
            </div>
            <div class="px-2">
                <a href="/admin/event/{{$event->event_id}}/attendees">Attendees</a>
            </div>
            <div class="px-2">
                <a href="/admin/event/{{$event->event_id}}/edit">Edit</a>
            </div>
            <div class="px-2">
                <a href="/admin/event/{{$event->event_id}}/survey">Survey</a>
            </div>
            <div class="px-2">
                <button>Waitlist?</button>
            </div>
            <div class="px-2">
                <button class="border-b-2 pt-[10px] pb-2 border-black">Statistic</button>
            </div>
        </div>
        <div class="hidden lg:flex">
            <button onclick="print()" class="flex items-center justify-center border active:bg-[#1b1b23] rounded-md px-2 py-2 lg:py-3 lg:px-4 text-white bg-[#313140]">
                <ion-icon  class="pr-2 text-lg" name="print-outline"></ion-icon>
                <div class="text-lg">Print Statistic</div>
            </button> 
        </div>

        
    </div>
    <div class=" shadow-lg rounded-xl bg-slate-50 py-4 lg:py-6 px-3 lg:px-10 text-[#555555]">
        {{-- <div>Please use laptop to print the statistic!!</div> --}}
        <div class="flex justify-center ">
            <div class="flex-col w-full">
                
                <div class="flex text-lg lg:text-2xl font-medium justify-center lg:pb-6 pb-3">
                    {{$event->event_name}}
                </div>
                <div class="flex justify-between mb-2 lg:mb-4">
                    <div class=" shadow-[0_0_4px_0_rgba(0,0,0,0.1)]  bg-white  rounded-md w-full py-10 font-semibold ">
                        <div class="flex justify-center items-center text-3xl lg:text-5xl">
                            {{$event->rsvp->count()}}
                        </div>                     
                        <div class="flex justify-center text-xs lg:text-sm lg:pt-3 pt-1">
                            RSVPs
                        </div>
                    </div>
                    <div class=" shadow-[0_0_4px_0_rgba(0,0,0,0.1)]  bg-white  rounded-md w-full py-10 font-semibold mx-[10px] lg:mx-4">
                        <div class="flex justify-center items-center text-3xl lg:text-5xl">
                            {{$event->rsvp->where('attendance_detail', 'Attend')->count()}}
                        </div>  
                        <div class="flex justify-center text-xs lg:text-sm lg:pt-3 pt-1">
                            Attended
                        </div>
                    </div>                   
                    <div class=" shadow-[0_0_4px_0_rgba(0,0,0,0.1)]  bg-white  rounded-md w-full py-10 font-semibold ">
                        <div class="flex justify-center items-center text-3xl lg:text-5xl">
                            {{round($event->rsvp->where('attendance_detail', 'Attend')->count()/$event->rsvp->count()*100, 2)}}%
                        </div>  
                        <div class="flex justify-center text-xs lg:text-sm lg:pt-3 pt-1">
                            Attendance rate
                        </div>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class=" shadow-[0_0_4px_0_rgba(0,0,0,0.1)]  bg-white  rounded-md w-full py-10 font-semibold mr-1 lg:mr-2">
                        <div class="flex justify-center items-center text-3xl lg:text-5xl">
                            {{(int)(($event->rsvp()->whereNotNull('rating')->avg('rating'))* pow(10, 2))/pow(10, 2)}}
                        </div>  
                        <div class="flex justify-center text-xs lg:text-sm lg:pt-3 pt-1">
                            Average event rating
                        </div>
                    </div>
                    <div class=" shadow-[0_0_4px_0_rgba(0,0,0,0.1)] bg-white  rounded-md w-full py-10 font-semibold ml-1 lg:ml-2">
                        <div class="flex justify-center items-center text-3xl lg:text-5xl">
                            {{(int)(($event->rsvp()->whereNotNull('speaker_rating')->avg('speaker_rating'))* pow(10, 2))/pow(10, 2)}}
                        </div>  
                        <div class="flex justify-center text-xs lg:text-sm lg:pt-3 pt-1">
                            Average speaker rating
                        </div>
                    </div>
                    
                </div>
               

                <div class="pt-2 md:justify-evenly md:flex">
                    <div class="pt-8 flex justify-center ">
                        <div>
                            <canvas id="presensi"></canvas>
                            <div class="flex justify-center md:text-lg">
                                <h1>Attendance percentage chart</h1>
                            </div>
                        </div>
                        
                    </div>
                    <div>
                        <div class="pt-8  flex justify-center ">
                            <div>
                                <canvas id="ratings"></canvas>
                                <div class="flex justify-center md:text-lg">
                                    <h1>Event rating chart</h1>
                                </div>
                            </div>
                            
                        </div>
                        <div class="pt-8 flex justify-center ">
                            <div>
                                <canvas id="ratingspeak"></canvas>
                                <div class="flex justify-center md:text-lg">
                                    <h1>Speaker rating chart</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    
   
                    
                   
                </div>
                


                

            </div>
        </div>
    </div>

    <script>
        public function print(){
            window.print();
        }
    </script>

        
<script>
    // Get the context of the canvas element we want to select
    var ctx = document.getElementById('ratings').getContext('2d');

    // Create a new Chart object
    var ratings = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['1 Star', '2 Star', '3 Star', '4 Star', '5 Star'],
            datasets: [{
                label: 'Number of Rating',
                data: [
                    {{$event->rsvp()->whereNotNull('rating')->where('rating','1')->count()}}, 
                    {{$event->rsvp()->whereNotNull('rating')->where('rating','2')->count()}}, 
                    {{$event->rsvp()->whereNotNull('rating')->where('rating','3')->count()}}, 
                    {{$event->rsvp()->whereNotNull('rating')->where('rating','4')->count()}}, 
                    {{$event->rsvp()->whereNotNull('rating')->where('rating','5')->count()}}
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


<script>
    // Get the context of the canvas element we want to select
    var ctx = document.getElementById('ratingspeak').getContext('2d');

    // Create a new Chart object
    var ratings = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['1 Star', '2 Star', '3 Star', '4 Star', '5 Star'],
            datasets: [{
                label: 'Number of Rating',
                data: [
                    {{$event->rsvp()->whereNotNull('speaker_rating')->where('speaker_rating','1')->count()}}, 
                    {{$event->rsvp()->whereNotNull('speaker_rating')->where('speaker_rating','2')->count()}}, 
                    {{$event->rsvp()->whereNotNull('speaker_rating')->where('speaker_rating','3')->count()}}, 
                    {{$event->rsvp()->whereNotNull('speaker_rating')->where('speaker_rating','4')->count()}}, 
                    {{$event->rsvp()->whereNotNull('speaker_rating')->where('speaker_rating','5')->count()}}
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


<script>
    // Get the context of the canvas element we want to select
    var ctx = document.getElementById('presensi').getContext('2d');

    // Create a new Chart object
    var ratings = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Total RSVP', 'Attended'],
            datasets: [{
                label: 'Number of Rating',
                data: [
                    {{$event->rsvp()->count()}}, 
                    {{$event->rsvp()->count()}}-{{$event->rsvp()->where('attendance_detail','Attend')->count()}}
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

@endsection
