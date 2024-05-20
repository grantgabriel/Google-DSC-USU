import { driver } from 'driver.js';
import 'driver.js/dist/driver.css';

const eventDriver = driver({
    showProgress: true,
    showButtons: ['next', 'previous'],
    steps: [
        { element: '#main', popover: { title: 'Detail event', description: 'Selamat datang di halaman detail event 🤗', side: "left", align: 'start' }},
        { element: '#rsvpBtn', popover: { title: 'Tombol RSVP', description: 'Daftarkan diri anda pada event ini dengan klik tombol RSVP-nya', side: "left", align: 'start' }},
        { element: '#maps-iframe', popover: { title: 'Maps', description: 'Tekan iframe berikut untuk buka di aplikasi google maps', side: "bottom", align: 'start' }},
        { element: '#maps-detail', popover: { title: 'Maps detail', description: 'Ikuti detail alamat event agar tidak tersesat 🤩', side: "bottom", align: 'start' }},
        { element: 'end', popover: { title: 'Semoga Paham', description: '', side: "top", align: 'top' }},
    ]
  });
  
eventDriver.drive();
