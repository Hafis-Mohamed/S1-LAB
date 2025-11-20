<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="outer">
        <div class="inner">
            <form action="markupdate.php" method="post">
                <table>
                    <caption>Update Mark</caption>
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
    $sql="SELECT name FROM stud WHERE rollno=$rollno";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    echo "Name :<input type='text' value='".$row['name']."' readonly>";
    $sql="SELECT * FROM mark WHERE rollno=$rollno";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo "<form action='markupdate.php' method='post'>
        <input type='hidden' name='roll' value='".$row['rollno']."'><br>
        Science :
        <input type='number' name='science' id='science' value='".$row['science']."'><br>
        Maths :
        <input type='number' name='maths' id='maths' value='".$row['maths']."'><br>
        English :
        <input type='number' name='english' id='english' value='".$row['english']."'><br>
        <input type='submit' name='update' value='Update'>
        <input type='reset' name='reset' value='Reset'>
        </form>";
    }
}

if(isset($_POST['update'])){
    $rollno=$_POST['roll'];
    $science=$_POST['science'];
    $maths=$_POST['maths'];
    $english=$_POST['english'];
    $total=$science+$maths+$english;
    $sql="UPDATE mark SET science=$science, maths=$maths, english=$english, total=$total WHERE rollno=$rollno";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Mark Updation Successfull!!')</script>";
    }else{
        echo "<script>alert('Mark Updation Failed!!')</script>";
    }
}
?>
