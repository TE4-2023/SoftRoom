//let currentEditContainer = null;

function toggleDropdown() {
    const dropdown = document.getElementById('assignmentDropdown');
    dropdown.classList.toggle('show');
}


function openAssignmentModal() {
    const modal = document.getElementById('assignmentModal');
    modal.style.display = 'block';
}


function closeAssignmentModal() {
    const modal = document.getElementById('assignmentModal');
    modal.style.display = 'none';
}


function formatDate(dateString) {
    if (!dateString || dateString === "Invalid Date") {
        return "Inget slutdatum";
    }

    const options = { year: 'numeric', month: 'numeric', day: 'numeric' };
    const date = new Date(dateString);
    return date.toLocaleDateString(undefined, options);
}
let start = document.getElementById("start");
let datum = document.getElementById("datum");
datum.min = new Date().toISOString().split("T")[0];
let slut = document.getElementById("slut");

start.oninput = function(){
    //slut.min = start.value;
    let test = new Date(datum.value + " " + start.value);
    test.setTime(test.getTime() + (1*60*60*1000));
    timeString = test.toLocaleTimeString().slice(0, 5);
    console.log(timeString);
    slut.min = start;
    slut.value = timeString;

}




