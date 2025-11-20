<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Entry</title>
</head>
<body>
    <div class="outer">
        <div class="inner">
            <form action="markentry.php" method="post">
                <table>
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
                </table>
            </form>
        </div>
    </div>
</body>
</html>

<?php
include 'connection.php';

if(isset($_POST['search'])){
    $rollno=$_POST['roll'];
    $sql="SELECT name,rollno FROM stud WHERE rollno=$rollno";
    $result=mysqli_query($conn,$sql);
    if($row=mysqli_fetch_assoc($result)){
        echo "Name :<input type='text' value='".$row['name']."' readonly>";
        echo "<form action='markentry.php' method='post'>
            <input type='hidden' value='".$row['rollno']."' id='roll' name='roll' >";
        echo "Science :
        <input type='number' id='science' name='science'><br>
        Maths :
        <input type='number' id='maths' name='maths'><br>
        English :
        <input type='number' id='english' name='english'><br>
        <input type='submit' value='Submit' name='submit'>
        <input type='reset' value='Reset' name='reset'>
        </form>";
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
