<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Softroom - Lärar menyn</title>


    

    <style>

    .Menu{
        width:30%;
        margin:auto;
        text-align:center;
        border: 2px solid grey;
    }

    .MenuLists{
        text-align:left;
    }

    .studentList{
        display:block;
    }

    .classList{
        display:block;
    }


    .attendanceChoice{
        right: 1;
        text-align:right;
    }
    </style>


</head>
<body onload=LoadFunc()>

<div class="Menu">
    <form action="">

    <input type="radio" name="edit" id="Students" checked>
    <label for="Students">Elever</label>
    <input type="radio" name="edit" id="Classes">
    <label for="Classes">Klasser</label>
    <div class="MenuLists">
        <div class="studentList">
            <select name="Students" id="StudentsList" size=5>
                
            </select>
        </div>
        <div class="classList">
            <select name="Classes" id="ClassesList" size= 3>
                <option value="class1">hejhej</option>
            </select>
        </div>
    </div>
    <div class="attendanceChoice">

        <div class="attendancebuttons">

    

        </div>

    </div>
    




    </form>
</div>

</body>
<script src="listToggle.js"></script>
</html>
