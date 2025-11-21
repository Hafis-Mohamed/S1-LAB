<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="outer">
        <a href="" id='top' name='top'>View Top Student</a>
        <div class="inner">
            <table>
                <form action="progresscard.php" method='post'>
                    <caption>Mark Entry</caption>
                    <tr>
                        <th></th>
                        <th>                        
                            <select name="roll" id="roll">
                            <option >Select Roll No</option>
                            <?php
                            include 'connection.php';
                                
                            $rollno=$_POST['roll'];
                            $sql="SELECT rollno FROM stud";
                            $result=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<option value= ".$row['rollno'].">".$row['rollno']."</option>";
                                }
                            }
                            ?>
                        </select>
                        </th>
                        <th><input type="submit" name="search" id="search" value="Search"></th>
                    </tr>
                </form>
            </table>
        </div>
    </div>
</body>
</html>

<?php
include 'connection.php';

if(isset($_POST['search'])){
    $rollno=$_POST['roll'];
    $sql1="SELECT * FROM mark WHERE rollno='$rollno'";
    $sql2="SELECT name FROM stud WHERE rollno='$rollno'";

    $result1=mysqli_query($conn,$sql1);
    $result2=mysqli_query($conn,$sql2);

    $row1=mysqli_fetch_assoc($result1);
    $row2=mysqli_fetch_assoc($result2);

    if($row1 && $row2){
        echo "<div class='outer'><div class='inner'><h3>Progress Card</h3><br>";
        echo "<table><tr><th>Name :</th><td>".$row2['name']."</td></tr>";
        echo "<tr><th>Roll No :</th><td>".$row1['rollno']."</td></tr>";
        echo "<tr><th>Science :</th><td>".$row1['science']."</td></tr>";
        echo "<tr><th>Maths :</th><td>".$row1['maths']."</td></tr>";
        echo "<tr><th>English :</th><td>".$row1['english']."</td></tr>";
        echo "<tr><th>Total :</th><td>".$row1['total']."</td></tr></div></div>";
    }else{
        echo "<script>alert('No Record Found');</script>";
    }
}

if(isset($_POST['top'])){
    $sql="SELECT rollno FROM mark WHERE total=(SELECT MAX(total) from mark)";
    $result=mysqli_query($conn,$sql);
    if($row=mysqli_fetch_assoc($result)){
        $rollno=$row['rollno'];
        $sql1="SELECT name FROM stud WHERE rollno='$rollno'";
        $result1=mysqli_query($conn,$sql1);
        if($row1=mysqli_fetch_assoc($result1)){
            echo "<div class='outer'><div class='inner'><h3>Top Student</h3>";
            echo "<table><tr><th>Name :</th>"
        }
    }

}
?>