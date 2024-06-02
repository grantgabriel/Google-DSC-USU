@extends('layout.header_admin')

@section('content_warning')
<div class="py-6 px-4 sm:px-12 lg:px-36 xl:px-48">
        <div class="flex justify-start font-semibold mb-4">
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
                        <button class="border-b-2 pb-2 border-black">Survey</button>
                </div>
                <div class="px-2">
                        <button>Waitlist?</button>
                </div>
                <div class="px-2">
                        <a href="/admin/event/{{$event->event_id}}/statistic">Statistic</a>
                </div>
        </div>
        <div class=" shadow-lg rounded-xl bg-white py-4 lg:py-6 px-3 lg:px-10 ">
                <div class="flex justify-center ">
                        
                        
                        <div class="flex-col w-full ">
                                <div class=" text-lg font-semibold pb-2">
                                        Survey for : EVENT NAME
                                </div>
                                
                                <table class="w-full">
                                        <thead class="bg-blue-50">
                                            <tr>
                                                <th class="py-3 hover:cursor-pointer pl-6 px-4 items-center hover:bg-blue-100 flex" data-sort="score">
                                                    Score
                                                    <ion-icon id="up1" class="pl-1" name="caret-up-outline"></ion-icon>
                                                    <ion-icon id="down1" class="pl-1" name="caret-down-outline"></ion-icon>
                                                </th>
                                                
                                                <th class="py-3 px-4">Suggestion</th>
                                                <th class="py-3 hover:cursor-pointer px-4 items-center hover:bg-blue-100 flex" data-sort="speaker_score">
                                                        Speaker Score
                                                        <ion-icon id="up2" class="pl-1" name="caret-up-outline"></ion-icon>
                                                        <ion-icon id="down2" class="pl-1" name="caret-down-outline"></ion-icon>
                                                    </th>
                                                <th class="py-3 pr-6 px-4">Speaker Suggestion</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body" class="text-[#555555]">
                                            @foreach ($event->rsvp->whereNotNull('rating') as $item)
                                                <tr class="border-b">
                                                    <td class="py-6 px-4 text-center">{{$item->rating}}</td>
                                                    <td class="py-6 px-4">{{$item->review}}</td>
                                                    <td class="py-6 px-4 text-center">{{$item->speaker_rating}}</td>
                                                    <td class="py-6 px-4">{{$item->suggestion}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                    
                                    
                        </div>

                        
                </div>
        </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const getCellValue = (row, index) => row.children[index].innerText || row.children[index].textContent;

    const comparer = (index, asc) => (a, b) => ((v1, v2) => 
        v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
    )(getCellValue(asc ? a : b, index), getCellValue(asc ? b : a, index));

    const icons = {
        score: { up: document.getElementById('up1'), down: document.getElementById('down1') },
        speaker_score: { up: document.getElementById('up2'), down: document.getElementById('down2') }
    };

    const updateIcons = (column, state) => {
        Object.values(icons).forEach(iconSet => {
            iconSet.up.style.display = 'none';
            iconSet.down.style.display = 'none';
        });

        if (state === 'asc') {
            icons[column].up.style.display = 'inline';
        } else if (state === 'desc') {
            icons[column].down.style.display = 'inline';
        }
    };

    const table = document.querySelector('table');
    const tbody = table.querySelector('tbody');
    const originalRows = Array.from(tbody.querySelectorAll('tr'));

    document.querySelectorAll('th[data-sort]').forEach(th => th.addEventListener('click', (() => {
        const column = th.getAttribute('data-sort');
        const index = Array.from(th.parentNode.children).indexOf(th);
        this.sortState = this.sortState || {};
        this.sortState[column] = this.sortState[column] === 'asc' ? 'desc' : this.sortState[column] === 'desc' ? 'default' : 'asc';
        const state = this.sortState[column];

        if (state === 'default') {
            originalRows.forEach(tr => tbody.appendChild(tr));
        } else {
            const asc = state === 'asc';
            Array.from(tbody.querySelectorAll('tr'))
                .sort(comparer(index, asc))
                .forEach(tr => tbody.appendChild(tr));
        }

        updateIcons(column, state);
    })));

    // Initialize icons visibility
    Object.values(icons).forEach(iconSet => {
        iconSet.up.style.display = 'none';
        iconSet.down.style.display = 'none';
    });
});



</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
@endsection
