import Alpine from 'alpinejs';
import { driver } from 'driver.js';
import 'driver.js/dist/driver.css';

const eventDriver = driver({
    smoothScroll: true,
    showProgress: true,
    showButtons: ['next', 'previous'],
    overlayColor: '#000000',
    overlayOpacity: 0.8,
    steps: [
        { element: '#start', popover: { title: 'Detail event', description: 'Selamat datang di halaman detail event 🤗', side: "left", align: 'start' }},
        { element: '#shareBtn', popover: { title: 'Share event', description: 'Share event ini ke teman-teman anda', side: "left", align: 'start' }},
        { element: '#rsvpBtn', popover: { title: 'Tombol RSVP', description: 'Daftarkan diri anda pada event ini dengan klik tombol RSVP-nya', side: "left", align: 'start' }},
        { element: '#maps-iframe', popover: { title: 'Maps', description: 'Tekan iframe berikut untuk buka di aplikasi google maps', side: "bottom", align: 'start' }},
        { element: '#maps-detail', popover: { title: 'Maps', description: 'Ikuti detail maps untuk menuju lokasi event', side: "bottom", align: 'start' }},
        { element: '#about', popover: { title: 'Tentang Event', description: 'Ketahui event lebih lanjut pada section about', side: "top", align: 'start' }},
        { element: '#toggleDriverBtn', popover: { title: 'Help Button', description: 'Anda bisa lihat intruksi ini lagi dengan menekan tombol berikut', side: "bottom", align: 'start' }},
        { element: 'end', popover: { title: 'Semoga Paham', description: '', side: "top", align: 'top' }},
    ],
    onDestroyed: () => {
        window.localStorage.setItem('eventDriver', 'true');
    }
});


  
if(window.localStorage.getItem('eventDriver') !== 'true'){
  eventDriver.drive();
}

Alpine.store('eventDriver', {
    start(){
        eventDriver.drive();
    },
    rsvp(){
        const rsvpDriver = driver({
            smoothScroll: true,
            showProgress: true,
            showButtons: ['next', 'previous'],
            overlayColor: '#000000',
            overlayOpacity: 0.8,
            steps: [
                { element: '#start', popover: { title: 'Detail event', description: 'Selamat datang di halaman detail event 🤗', side: "left", align: 'start' }},
                { element: '#shareBtn', popover: { title: 'Share event', description: 'Share event ini ke teman-teman anda', side: "left", align: 'start' }},
                { element: '#rsvpDBtn', popover: { title: 'You\'re RSVP\'d to the Event!', description: 'Selamat anda telah terdaftar pada Event ini', side: "left", align: 'start' }},
                { element: '#qnaBtn', popover: { title: 'QnA', description: 'Anda dapat bertanya saat event berlangsung', side: "left", align: 'start' }},
                { element: '#surveyBtn', popover: { title: 'Berikan feedback', description: 'Ceritakan pengalaman anda selama mengikuti event', side: "left", align: 'start' }},
                { element: '#maps-iframe', popover: { title: 'Maps', description: 'Tekan iframe berikut untuk buka di aplikasi google maps', side: "bottom", align: 'start' }},
                { element: '#maps-detail', popover: { title: 'Maps', description: 'Ikuti detail maps untuk menuju lokasi event', side: "bottom", align: 'start' }},
                { element: '#about', popover: { title: 'Tentang Event', description: 'Ketahui event lebih lanjut pada section about', side: "top", align: 'start' }},
                { element: '#toggleDriverBtn', popover: { title: 'Help Button', description: 'Anda bisa lihat intruksi', side: "bottom", align: 'start' }},
                { element: 'end', popover: { title: 'Semoga Paham', description: '', side: "top", align: 'top' }},
            ],
            onDestroyed: () => {
                window.localStorage.setItem('rsvpDriver', 'false');
            }
        }).drive();
    }
});

Alpine.start();

if(window.localStorage.getItem('rsvpDriver') === 'true'){
    Alpine.store('eventDriver').rsvp();
}