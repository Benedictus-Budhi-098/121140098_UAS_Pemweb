//Benedictus Budhi Dharmawan
//121140098
//Pemrograman Web RB

function validateForm() {
    //validasi pengambilan nilai inputan
    var name = document.getElementById('name').value;
    var age = document.getElementById('age').value;
    var gender = document.getElementById('gender').value;
    var date = document.getElementById('date').value;
    var campus = document.getElementById('campus').value;

    // Validasi: komponen input tidak boleh kosong
    if (name === '' || age === '' || gender === '' || date === '' || campus === '' || parseInt(age) <= 0) {
        alert('Invalid input. Please check your input and try again.');
        return false;
    }

    return true;
}

function removeData(name) {
    // Implementasi penghapusan data berdasarkan nama
    alert('Data ' + name + ' will be removed.');
}
