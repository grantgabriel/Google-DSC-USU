

@extends('layout.header_admin')

@section('content_warning')
        <div class="bg-red-500 flex justify-center">
            <form id="form" action="/admin/add/event/create" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="flex-col">
                    <div>
                        Title And Description
                    </div>
                    <div>
                        Title:<input name="name" type="text">
                    </div>
                    <div>
                        Event Description:<input name="desc" type="text">
                    </div>
                    <div>
                        <div>Tags:</div>
                        <input name="tags" type="text">
                    </div>
                    <div class="py-10">
                        <div>Event Banner</div>
                        default image nya ini klok gk milih
                        <div>
                            <img class="w-96" src="http://127.0.0.1:8000/banner/default.webp" alt="">
                            <input type="file" name="banner" id="">
                        </div>
                        <div class="py-10">
                            <div>event Profile</div>
                            defaultnya ini klok gk ngisi
                            <img class="rounded-full w-20" src="http://127.0.0.1:8000/event-profile/default.webp" alt="">
                            <input type="file" name="profile" id="">
                        </div>

                        <div>
                            <div>Event Venue</div>
                            <div class="flex">
                                <input type="radio" id="1" name="venue" value="Hybrid">
                                <label for="1">hybrid</label><br>
                                <input type="radio" id="2" name="venue" value="In Person">
                                <label for="2">oflen</label><br>
                                <input type="radio" id="3" name="venue" value="Online">
                                <label for="3">onlen</label><br>
                            </div>
                        </div>

                        <div>
                            <div>Event Date</div>
                            <input type="date" name="date" id="">
                        </div>

                        <div>
                            <div>Speaker Name</div>
                            <input type="text" name="speak" id="">
                        </div>

                        <div>
                            <div>Speaker image</div>
                            <input type="file" name="speakimg" id="">
                        </div>

                        <div>
                            
                            <div>categories</div>
                            <input type="radio" name="categories" id="1" value="Android">
                            <label for="1">Android</label>
                            <input type="radio" name="categories" id="2" value="Machine Learning">
                            <label for="2">Machine Learning</label>
                            <input type="radio" name="categories" id="3" value="UI/UX">
                            <label for="3">UI/UX</label>
                            <input type="radio" name="categories" id="4" value="Web Development">
                            <label for="4">Web Development</label>

                        </div>

                        <div>
                            <div>Event Location gugelmap</div>
                            <input type="text" name="map" id="">
                        </div>

                        <div>
                            <div>Event Location</div>
                            <input type="text" name="location" id="">
                        </div>

                        <div class="flex">
                            <div><button type="button" id="draft" class="bg-yellow-500">Make Draft</button></div>
                            <div><button type="submit" class="bg-blue-500">Create Event</button></div>
                        </div>

                    </div>
                </div>
            </form>



        </div>

        <script>

        document.getElementById('draft').addEventListener('click', function() {
            var form = document.getElementById('form');
            form.action = 'event/draft';
            form.submit();
        });
        </script>
@endsection
