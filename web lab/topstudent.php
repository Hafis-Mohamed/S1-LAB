<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Student</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #eef1f7;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }

        .outer {
            background: #ffffff;
            padding: 25px 35px;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.15);
        }

        .inner h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #4f7eff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 8px 6px;
            font-size: 15px;
        }

        th {
            width: 40%;
        }

        tr:nth-child(even) {
            background: #f5f5f5;
        }
    </style>
</head>
<body>

<?php
include 'connection.php';
$sql="SELECT rollno FROM mark WHERE total=(SELECT MAX(total) from mark)";
$result=mysqli_query($conn,$sql);

if($row=mysqli_fetch_assoc($result)){
    $rollno=$row['rollno'];
    $sql1="SELECT name FROM stud WHERE rollno='$rollno'";
    $result1=mysqli_query($conn,$sql1);
    if($row1=mysqli_fetch_assoc($result1)){
        echo "<div class='outer'><div class='inner'><h3>Top Student</h3>";
        echo "<table>";
        echo "<tr><th>Name :</th><td>".$row1['name']."</td></tr>";

        $sql2="SELECT * FROM mark WHERE rollno='$rollno'";
        $result2=mysqli_query($conn,$sql2);
        if($row2=mysqli_fetch_assoc($result2)){
            echo "<tr><th>Roll No :</th><td>".$row2['rollno']."</td></tr>";
            echo "<tr><th>Science :</th><td>".$row2['science']."</td></tr>";
            echo "<tr><th>Maths :</th><td>".$row2['maths']."</td></tr>";
            echo "<tr><th>English :</th><td>".$row2['english']."</td></tr>";
            echo "<tr><th>Total :</th><td>".$row2['total']."</td></tr>";
        }

        echo "</table></div></div>";
    }
}
?>

</body>
</html>
