

document.addEventListener("DOMContentLoaded", function() {
    
    const container = document.querySelector('.container-grid');
    const ref = document.querySelector('.container-main');

    var curr = new Date; // get current date
    var first = curr.getDate() - curr.getDay() + 1; // First day is the day of the month - the day of the week
    var week = [];
    for(let i = 1; i < 6; i++)
    {
        week.push(curr.getDate() - curr.getDay()+ i)
    }
    week = week.map(getDatum)

    function getDatum(item){
        return new Date(curr.setDate(item)).toLocaleDateString()
    }

    getLektioner()
    function getLektioner(dag){

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Optionally, you can redirect the user or perform other actions here

                updateTable(JSON.parse(xhr.responseText))
            } else {
               return 
            }
        }
    };
    xhr.open('POST', "getLektioner.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var data = 'week=' + encodeURIComponent(week);
    xhr.send(data);
    }
    function updateTable(data){

    
    const timetable = data
    const colours = [
        // Grön - Tagit närvaro
        "#02b802",

        // Röd - Tagit närvaro (Icke närvarande)
        "#b80202",

        // Grå - Kommande lektion
        "#999999",

        // Gul - Påbörjad lektion - inte tagit närvaro / försenad
        "#d6d300",
    ];

    const divs = [
        {"className":"", "data":"", "row": 1, "col": 1, "row1":2, "col1":2},
        {"className":"days", "data":"Mon", "row": 1, "col": 2, "row1":2, "col1":3},
        {"className":"days", "data":"Tue", "row": 1, "col": 3, "row1":2, "col1":4},
        {"className":"days", "data":"Wed", "row": 1, "col": 4, "row1":2, "col1":5},
        {"className":"days", "data":"Thu", "row": 1, "col": 5, "row1":2, "col1":6},
        {"className":"days", "data":"Fri", "row": 1, "col": 6, "row1":2, "col1":7}
    ];

    var coursesToColour = {};
    var edges = [];
    var courses = [];

    console.log(timetable)
    for (const key in timetable) {
        timetable[key].map((item) => {
            
            edges.push(item.time.split("-")[0]);
            edges.push(item.time.split("-")[1]);
            courses.push(item.course);
        });
    }

    edges = [...new Set(edges)];
    edges = edges.sort();
    courses = [...new Set(courses)];

    courses.forEach((course,i) => {
        coursesToColour[course] = colours[i];
    });

    edges.forEach((edge,i) => {
        divs.push({"className":"time" ,"data":edge, "row": i+2, "col": 1, "row1":i+3, "col1":2});
    });

    var i = 2;
    for (const key in timetable) {
            timetable[key].map((item) => {
            
            let temprow1 = edges.indexOf(item.time.split("-")[0]);
            let temprow2 = edges.indexOf(item.time.split("-")[1]);
            divs.push({"className":"grid-item" ,"data":item.course, "row": temprow1+2, "col": i, "row1":temprow2+2, "col1": i+1, "backgroundColor": coursesToColour[item.course]});
        });
        i++;
    }

    divs.forEach((div) => {
        const divElement = document.createElement('div');
        divElement.className = div.className;
        divElement.style.gridArea = `${div.row}/${div.col}/${div.row1}/${div.col1}`;
        divElement.style.backgroundColor = div.backgroundColor;
        divElement.textContent = div.data;
        container.appendChild(divElement);
    });
    document.documentElement.style.setProperty('--lineWidth', ref.offsetWidth-60 + 'px');

    ref.style.gridTemplateRows = `25px repeat(${edges.length},1fr)`;
}
});
