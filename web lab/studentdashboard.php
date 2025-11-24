<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #eef1f7;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 50px;
        }

        .dashboard {
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            width: 500px;
        }

        h2 {
            text-align: center;
            color: #4f7eff;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 10px;
            text-align: left;
            font-size: 16px;
        }

        th {
            background-color: #f2f6ff;
            color: #333;
            width: 40%;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e8f0ff;
        }

        .marks-header {
            text-align: center;
            background-color: #4f7eff;
            color: white;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Student Dashboard</h2>
        <?php
        include 'connection.php';

        if(isset($_GET['rollno'])){
            $rollno=$_GET['rollno'];
            $sql1="SELECT * FROM stud WHERE rollno='$rollno'";
            $sql2="SELECT * FROM mark WHERE rollno='$rollno'";
            $result1=mysqli_query($conn,$sql1);
            $result2=mysqli_query($conn,$sql2);
            $row1=mysqli_fetch_assoc($result1);
            $row2=mysqli_fetch_assoc($result2);
            if($row1 && $row2){
                echo "<table>
                    <tr><th>NAME :</th><td>".$row1['name']."</td></tr>
                    <tr><th>Roll No :</th><td>".$row1['rollno']."</td></tr>
                    <tr><th>Address :</th><td>".$row1['address']."</td></tr>
                    <tr><th>Phone No :</th><td>".$row1['phoneno']."</td></tr>
                    <tr><th class='marks-header' colspan='2'>Marks</th></tr>
                    <tr><th>Science :</th><td>".$row2['science']."</td></tr>
                    <tr><th>Maths :</th><td>".$row2['maths']."</td></tr>
                    <tr><th>English :</th><td>".$row2['english']."</td></tr>
                    <tr><th>Total :</th><td>".$row2['total']."</td></tr>
                </table>";
            }
        }
        ?>
    </div>
</body>
</html>
