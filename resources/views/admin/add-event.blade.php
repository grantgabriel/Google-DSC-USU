

@extends('layout.header_admin')

@section('content_warning')
        <div class="bg-red-500 flex justify-center">
            <form action="" method="POST">
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
                        <input type="radio" id="1" name="tags" value="male">
                        <label for="1">S</label><br>
                        <input type="radio" id="2" name="tags" value="malee">
                        <label for="2">S</label><br>
                        <input type="radio" id="3" name="tags" value="maleee">
                        <label for="3">S</label><br>
                    </div>
                    <div>
                        <div>Event Banner</div>
                        <img src="" alt="">
                    </div>
                </div>
            </form>
        </div>
@endsection
