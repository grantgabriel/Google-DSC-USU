
@extends('layout.header_admin')

@section('content_warning')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <div class="flex justify-center">
            <div class="flex-col">

                <div>
                    Total RSVP:
                    {{$event->rsvp->count()}}
                </div>
                <div>
                    Total yang Absen:
                    {{$event->rsvp->where('attendance_detail', 'Attend')->count()}}
                </div>
                <div>
                    Persentase Kehadiran:
                    {{round($event->rsvp->where('attendance_detail', 'Attend')->count()/$event->rsvp->count()*100, 2)}}%
                </div>
                <div>
                    Rata rata Rating event:
                    {{$event->rsvp()->whereNotNull('rating')->avg('rating')}}
                </div>
                <div>
                    Rata rata Rating Speaker:
                    {{$event->rsvp()->whereNotNull('speaker_rating')->avg('speaker_rating')}}
                </div>


                <h1>Event Ratings Chart</h1>
                <canvas id="ratings"></canvas>

                <h1>Speaker Ratings Chart</h1>
                <canvas id="ratingspeak"></canvas>

                <h1>Persentasi Chart</h1>
                <canvas id="presensi"></canvas>


                

            </div>
        </div>

        
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
                            {{$event->rsvp()->where('attendance_detail','Attend')->count()}}
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

@endsection
