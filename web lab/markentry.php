<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Entry</title>

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

        .outer, .mark-form {
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
        }

        th {
            padding: 10px 0;
            font-size: 16px;
            text-align: left;
        }

        select, input[type="number"], input[type="text"] {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        input[type="submit"], input[type="reset"] {
            padding: 8px 16px;
            border: none;
            background: #4f7eff;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            margin-top: 10px;
        }

        input[type="reset"] {
            background: #888;
        }

        input[type="submit"]:hover {
            background: #2f5eea;
        }

        input[type="reset"]:hover {
            background: #666;
        }

        /* Spacing for the mark entry form */
        .mark-form input {
            margin-bottom: 12px;
        }
    </style>
</head>
<body>

    <div class="outer">
        <form action="markentry.php" method="post">
            <table>
                <caption>Mark Entry</caption>
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
                    <th>
                        <input type="submit" name="search" id="search" value="Search">
                    </th>
                </tr>
            </table>
        </form>
    </div>

<?php
if(isset($_POST['search'])){
    $rollno=$_POST['roll'];
    $sql="SELECT name,rollno FROM stud WHERE rollno=$rollno";
    $result=mysqli_query($conn,$sql);
    if($row=mysqli_fetch_assoc($result)){
        echo "<div class='mark-form'>";
        echo "<h3>Enter Marks for: ".$row['name']."</h3>";

        echo "<form action='markentry.php' method='post'>
            <input type='hidden' value='".$row['rollno']."' id='roll' name='roll'>
            Science :<br>
            <input type='number' id='science' name='science' required><br>
            Maths :<br>
            <input type='number' id='maths' name='maths' required><br>
            English :<br>
            <input type='number' id='english' name='english' required><br>
            <input type='submit' value='Submit' name='submit'>
            <input type='reset' value='Reset'>
        </form>";
        echo "</div>";
    }
}

if(isset($_POST['submit'])){
    $rollno=$_POST['roll'];
    $science=$_POST['science'];
    $maths=$_POST['maths'];
    $english=$_POST['english'];
    $total=$science+$maths+$english;
    $sql="SELECT rollno FROM mark WHERE rollno=$rollno";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        echo "<script>alert('Student Marks already entered!!');</script>";
    }else{
        $sql="INSERT INTO mark VALUES($rollno,$science,$maths,$english,$total)";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<script>alert('Student Mark Has Entered Succesfully!!');</script>";
        }else{
            echo "<script>alert('Student Mark Has Entering Failed!!');</script>";
        }
    }
}
?>

</body>
</html>
