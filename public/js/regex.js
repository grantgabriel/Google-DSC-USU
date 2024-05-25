const save = document.getElementById('save');
let firstnameSubmit = true;
let lastnameSubmit = true;
let negaraSubmit = true;
let kotaSubmit = true;
let bioSubmit = true;
save.disabled = false;

function saveButton(){
    if(firstnameSubmit && lastnameSubmit && negaraSubmit && kotaSubmit && bioSubmit){
        save.disabled = false;
        save.classList.add('bg-blue-500');
        save.classList.remove('bg-slate-500');
        save.classList.add('active:bg-blue-600');
    } else {
        save.disabled = true;
        save.classList.remove('bg-blue-500');
        save.classList.add('bg-slate-500');
        save.classList.remove('active:bg-blue-600');
    }
};

firstname.addEventListener('input', function(){
    let regex = /^[a-zA-Z ]+$/;
    const firstname = document.getElementById('firstname');
    const firstnameValid = document.getElementById('firstnameValid');
    const firstnameValid2 = document.getElementById('firstnameValid2');
    let value = firstname.value;
    if (value.length <= 255 && regex.test(value)) {
        firstnameValid.classList.add('hidden');
        firstnameValid2.classList.add('hidden');
        firstname.classList.add('border-green-500');
        firstname.classList.remove('border-red-500');
        firstname.classList.remove('border-[#b3b3b3]');
        firstnameSubmit = true;
    } else {
        firstnameSubmit = false;
        firstname.classList.add('border-red-500');
        firstname.classList.remove('border-green-500');
        firstname.classList.remove('border-[#b3b3b3]');
        if (value.length >= 255) {
            firstnameValid2.classList.remove('hidden');
        } else if (!regex.test(value)) {
            firstnameValid.classList.remove('hidden');
        }
    }

    saveButton();
});

lastname.addEventListener('input', function(){
    let regex = /^[a-zA-Z ]+$/;
    const lastname = document.getElementById('lastname');
    const lastnameValid = document.getElementById('lastnameValid');
    const lastnameValid2 = document.getElementById('lastnameValid2');
    let value = lastname.value;
    if (value.length <= 255 && regex.test(value)) {
        lastnameValid.classList.add('hidden');
        lastnameValid2.classList.add('hidden');
        lastname.classList.add('border-green-500');
        lastname.classList.remove('border-red-500');
        lastname.classList.remove('border-[#b3b3b3]');
        lastnameSubmit = true;
    } else {
        lastnameSubmit = false;
        lastname.classList.add('border-red-500');
        lastname.classList.remove('border-green-500');
        lastname.classList.remove('border-[#b3b3b3]');
        if (value.length >= 255) {
            lastnameValid2.classList.remove('hidden');
        } else if (!regex.test(value)) {
            lastnameValid.classList.remove('hidden');
        }
    }

    saveButton();
});

negara.addEventListener('input', function(){
    let regex = /^[a-zA-Z ]+$/;
    const negara = document.getElementById('negara');
    const negaraValid = document.getElementById('negaraValid');
    const negaraValid2 = document.getElementById('negaraValid2');
    let value = negara.value;
    if (value.length <= 255 && regex.test(value)) {
        negaraValid.classList.add('hidden');
        negaraValid2.classList.add('hidden');
        negara.classList.add('border-green-500');
        negara.classList.remove('border-red-500');
        negara.classList.remove('border-[#b3b3b3]');
        negaraSubmit = true;
    } else {
        negaraSubmit = false;
        negara.classList.add('border-red-500');
        negara.classList.remove('border-green-500');
        negara.classList.remove('border-[#b3b3b3]');
        if (value.length >= 255) {
            negaraValid2.classList.remove('hidden');
        } else if (!regex.test(value)) {
            negaraValid.classList.remove('hidden');
        }
    }

    saveButton();
});

kota.addEventListener('input', function(){
    let regex = /^[a-zA-Z ]+$/;
    const kota = document.getElementById('kota');
    const kotaValid = document.getElementById('kotaValid');
    const kotaValid2 = document.getElementById('kotaValid2');
    let value = kota.value;
    if (value.length <= 255 && regex.test(value)) {
        kotaValid.classList.add('hidden');
        kotaValid2.classList.add('hidden');
        kota.classList.add('border-green-500');
        kota.classList.remove('border-red-500');
        kota.classList.remove('border-[#b3b3b3]');
        kotaSubmit = true;
    } else {
        kotaSubmit = false;
        kota.classList.add('border-red-500');
        kota.classList.remove('border-green-500');
        kota.classList.remove('border-[#b3b3b3]');
        if (value.length >= 255) {
            kotaValid2.classList.remove('hidden');
        } else if (!regex.test(value)) {
            kotaValid.classList.remove('hidden');
        }
    }

    saveButton();
});

bio.addEventListener('input', function(){
    const bio = document.getElementById('bio');
    const bioValid = document.getElementById('bioValid');
    
    let value = bio.value;
    if (value.length <= 1000) {
        bioValid.classList.add('hidden');
        bio.classList.add('border-green-500');
        bio.classList.remove('border-red-500');
        bio.classList.remove('border-[#b3b3b3]');
        bioSubmit = true;
    } else {
        bioSubmit = false;
        bio.classList.add('border-red-500');
        bio.classList.remove('border-green-500');
        bio.classList.remove('border-[#b3b3b3]');
        bioValid.classList.remove('hidden');
    }

    saveButton();
});