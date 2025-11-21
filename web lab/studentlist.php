<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>
<body>
    <div class="outer">
        <div class="inner">
            <table border="1">
                <form action="studentlist.php" method="post">
                <caption>Student List</caption>
                <tr>
                    <th>ROLL NO</th>
                    <th>NAME</th>
                    <th>ADDRESS</th>
                    <th>PHONE NO</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                    <th>ACTION</th>
                </tr>
                <?php
                include 'connection.php';

                $sql="SELECT * FROM stud";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>".$row['rollno']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['phoneno']."</td>";
                        echo "<td>".$row['username']."</td>";
                        echo "<td>".$row['password']."</td>";
                        echo "<td><button type='submit' name='update' id='update' value='".$row['rollno']."'>Update</button><button type='submit' name='delete' id='delete' value='".$row['rollno']."'>Delete</button></td>";
                        echo "</tr>";
                    }
                }else{
                    echo "No Students Found";
                }
                ?>
                </form>
            </table>
        </div>
    </div>
</body>
</html>
<table>
    <form action="studentlist.php" method="post">
<?php
include 'connection.php';

if(isset($_POST['delete'])){
    $rollno=$_POST['delete'];
    $sql="DELETE FROM stud WHERE rollno=$rollno";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Student Deleted Successfully!!!');</script>";
    }else{
        echo "<script>alert('Student Deletion Failed!!!');</script>";

    }
}

if(isset($_POST['update'])){
    $rollno=$_POST['update'];
    $sql="SELECT * FROM stud WHERE rollno=$rollno";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo "<caption>Update Student Details</caption>";
        echo "<tr><th>Name :</th><td>".$row['name']."</td></tr>";
        echo "<tr><th>Roll No :</th><td>".$row['rollno']."<br>";
        echo "<tr><th>Address :</th><td><textarea name='address' id='address'>".$row['address']."</textarea></td></tr>";
        echo "<tr><th>Phone No :</th><td><input type='number' id='phoneno' name='phoneno' value='".$row['phoneno']."'></td></tr>";
        echo "<tr><th>User Name :</th><td><input type='text' id='username' name='username' value='".$row['username']."'></td></tr>";
        echo "<tr><th>Password :</th><td><input type='password' id='password' name='password' value='".$row['password']."'></td></tr>";
        echo "<tr><td><button type='submit' name='updateDetails' id='updateDetails' value='".$row['rollno']."'>Update</button></td>"; 
        echo "<td><input type='reset' name='reset' id='reset'></td></tr>"; 
    }
}

if(isset($_POST['updateDetails'])){
    $rollno=$_POST['updateDetails'];
    $address=$_POST['address'];
    $phoneno=$_POST['phoneno'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql = "UPDATE stud 
        SET address='$address',
            phoneno='$phoneno',
            username='$username',
            password='$password'
        WHERE rollno='$rollno'";
    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Student Updation successfull!!');</script>";
    }else{
        echo "<scipt>alert('Student Updation Failed!!');</script>";
    }
}
?>
</form>
</table>