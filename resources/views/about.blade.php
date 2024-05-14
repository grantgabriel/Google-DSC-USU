<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('components\navbar')

    {{-- Main Content --}}
    <section id="home" class="bg-gdsc bg-center py-36">
        <div class="grid justify-center gap-5 items-center text-center">    
            <h1 class="text-5xl font-semibold">Google Developer Student Clubs</h1>
            <p class="max-w-screen-lg mx-auto text-xl">Google Developer Student Clubs are university based community groups for students interested in Google developer technologies. Students from all undergraduate or graduate programs with an interest in growing as a developer are welcome. By joining a GDSC, students grow their knowledge in a peer-to-peer learning environment and build solutions for local businesses and their community.</p>
        </div>
    </section>
</body>
</html>