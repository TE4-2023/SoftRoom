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




