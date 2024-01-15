<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="läggtillpersoner.css">
    <title>Document</title>
</head>

<body>
    <button id="myBtn">Lägg Till I Kurs</button>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            
            <!-- Tabs navigation -->
            <div class="tabs">
                <button onclick="openTab('tab1')">lägg till användare</button>
                <button onclick="openTab('tab2')">Hantera användare</button>
                <!-- Add more buttons for additional tabs as needed -->
            </div>
            
            <!-- Tab content -->
            <div id="tab1" class="tab-content">
                <input type="text" id="searchInput" placeholder="Search for a name...">
                <div class="itemsgrid">
                    <div class="table" id="userContainer">
                        <th>Namn</th>
                    </div>
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">Klasser</button>
                        <div id="myDropdown" class="dropdown-content">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add more tab content sections for additional tabs -->
            <div id="tab2" class="tab-content">
            <input type="text" id="searchInput" placeholder="Search for a name...">
                <div class="itemsgrid">
                    <div class="tableUsersInCourse" id="enrolleduserContainer">
                        <th>Namn</th>
                    </div>
            </div>
            
        </div>
    </div>

    <script src="lägg_till_personer_i_kurs.js"></script>
</body>

</html>
