function myToday() {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const day = String(today.getDate()).padStart(2, '0');

    return `${year}-${month}-${day}`;
}

const datePickerInput = document.getElementById("datePicker");
const datePicker2Input = document.getElementById("datePicker2");
datePickerInput.min = myToday();
datePicker2Input.min = myToday();
