var KursID = 9;
function fetchData() {
    fetch('fetch_data.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const parentDiv = document.getElementById('userContainer');
            parentDiv.innerHTML = "";

            // Create a grid container
            const gridContainer = document.createElement('div');
            gridContainer.classList.add('itemsgrid');

            data.forEach((row, index) => {
                const div = document.createElement('div');
                div.classList.add('user-row');

                const nameDiv = document.createElement('div');
                nameDiv.classList.add('user-name');
                nameDiv.textContent = `${row.namn} ${row.efternamn}`;
                div.appendChild(nameDiv);

                const inputDiv = document.createElement('div');
                inputDiv.classList.add('user-button');
                const input = document.createElement('input');
                input.type = 'button';
                input.value = row.användarID;

                const textSpan = document.createElement('span');
                textSpan.textContent = 'Lägg till';
                input.appendChild(textSpan);

                input.onclick = function () {
                    dosomething(div, row.användarID, KursID);
                };
                inputDiv.appendChild(input);
                div.appendChild(inputDiv);

                // Append each user row to the grid container
                gridContainer.appendChild(div);

                // If we have reached 3 items or it's the last item, append the grid container to the parentDiv
                if ((index + 1) % 3 === 0 || index === data.length - 1) {
                    parentDiv.appendChild(gridContainer);
                }
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}




function dosomething(row, användarID, KursID) {
    console.log(row);
    console.log(användarID);
    row.classList.toggle('hidden');

    fetch('update_data_kurs.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            ElevID: användarID,
            KursID: KursID,
        }),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Data updated successfully:', data);
            fetchData();
        })
        .catch(error => console.error('Error updating data:', error));
}

window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

function fetchDataklass() {
    fetch('fetch_klass_data.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const dropdown = document.getElementById('myDropdown');
            dropdown.innerHTML = '';

            data.forEach(row => {
                const link = document.createElement('a');
                link.href = '#'; 
                link.textContent = `${row.KlassID} ${row.Klass}`;
                dropdown.appendChild(link);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}
document.addEventListener('DOMContentLoaded', function () {
    fetchData();
    fetchDataklass(); 
    initializeSearch();
});

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

//w3schools
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
function initializeSearch() {
    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.trim().toLowerCase();
        const userRows = document.querySelectorAll('.user-row');

        userRows.forEach(row => {
            const userName = row.querySelector('.user-name').textContent.toLowerCase();
            const isVisible = userName.includes(searchTerm);

            row.style.display = isVisible ? 'flex' : 'none';
        });
    });
}
// Add this function to toggle the active state of modal buttons
function toggleModalBtn(btn, isAdd) {
    const addBtn = document.getElementById('addUserBtn');
    const removeBtn = document.getElementById('removeUserBtn');

    if (isAdd) {
        addBtn.classList.add('active');
        removeBtn.classList.remove('active');
    } else {
        addBtn.classList.remove('active');
        removeBtn.classList.add('active');
    }
}

// Call the toggleModalBtn function when the modal is opened
btn.onclick = function () {
    modal.style.display = "block";
    toggleModalBtn(document.getElementById('addUserBtn'), true);
}

function openTab(tabName) {
    var i, tabContent;
    tabContent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
    }
    document.getElementById(tabName).style.display = "block";
}