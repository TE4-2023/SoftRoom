<!DOCTYPE html>
<html>
<head>
    <title>Display Klass Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php

$sql = "SELECT * FROM klass";
$result = mysqli_query($your_db_connection, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>KlassID PrimärIndex</th><th>Klass</th><th>Mentor1</th><th>Mentor2</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['KlassID']."</td>";
        echo "<td>".$row['Klass']."</td>";
        echo "<td>".$row['Mentor1']."</td>";
        echo "<td>".$row['Mentor2']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

mysqli_close($your_db_connection);
?>

</body>
</html>
