<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Card</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #eef1f7;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 40px;
        }

        .outer, .progress-card {
            background: #ffffff;
            padding: 25px 35px;
            width: 450px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.15);
            margin-bottom: 20px;
        }

        caption {
            font-size: 22px;
            font-weight: bold;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px 6px;
            text-align: left;
            font-size: 15px;
        }

        th {
            width: 40%;
        }

        select, input[type="submit"] {
            width: 95%;
            padding: 8px;
            font-size: 15px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            background: #4f7eff;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #2f5eea;
        }

        #top {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 12px;
            text-decoration: none;
            background: #28a745;
            color: white;
            border-radius: 6px;
        }

        #top:hover {
            background: #1e7e34;
        }

        /* Progress card styling */
        .progress-card h3 {
            margin-top: 0;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <!-- Top student link -->
    <div class="outer">
        <a href="topstudent.php" id="top" name="top" target="right">View Top Student</a>

        <!-- Search form -->
        <form action="progresscard.php" method="post">
            <table>
                <caption>View Progress Card</caption>
                <tr>
                    <th>Select Roll No</th>
                    <th>
                        <select name="roll" id="roll">
                            <option>Select Roll No</option>
                            <?php
                            include 'connection.php';
                            $sql="SELECT rollno FROM stud";
                            $result=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    echo "<option value=".$row['rollno'].">".$row['rollno']."</option>";
                                }
                            }
                            ?>
                        </select>
                    </th>
                    <th><input type="submit" name="search" id="search" value="Search"></th>
                </tr>
            </table>
        </form>
    </div>

<?php
include 'connection.php';

if(isset($_POST['search'])){
    $rollno = $_POST['roll'];

    $sql1 = "SELECT * FROM mark WHERE rollno='$rollno'";
    $sql2 = "SELECT name FROM stud WHERE rollno='$rollno'";

    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);

    $row1 = mysqli_fetch_assoc($result1);
    $row2 = mysqli_fetch_assoc($result2);

    if($row1 && $row2){
        echo "<div class='outer progress-card'>";
        echo "<h3>Progress Card</h3>";
        echo "<table>";
        echo "<tr><th>Name :</th><td>".$row2['name']."</td></tr>";
        echo "<tr><th>Roll No :</th><td>".$row1['rollno']."</td></tr>";
        echo "<tr><th>Science :</th><td>".$row1['science']."</td></tr>";
        echo "<tr><th>Maths :</th><td>".$row1['maths']."</td></tr>";
        echo "<tr><th>English :</th><td>".$row1['english']."</td></tr>";
        echo "<tr><th>Total :</th><td>".$row1['total']."</td></tr>";
        echo "</table></div>";
    } else {
        echo "<script>alert('No Record Found');</script>";
    }
}
?>
</body>
</html>
