
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
                <canvas id="ratingsChart" width="400" height="200"></canvas>
                

            </div>
        </div>

        <script>
            const ctx = document.getElementById('ratingsChart').getContext('2d');
            const ratingsChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($dates),
                    datasets: [{
                        label: 'Average Rating',
                        data: @json($averageRatings),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: 5
                        }
                    }
                }
            });
        </script>

        
@endsection
