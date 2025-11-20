<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
</head>
<body>
    <div class="outer">
        <div class="inner">
            <form action="studentreg.php" method="post" onsubmit="return passValidation()">
                <table>
                    <caption>Student Registration</caption>
                    <tr>
                        <th>Roll No </th>
                        <th><input type="number" name="rollno" id="rollno"></th>
                    </tr>
                    <tr>
                        <th>Name </th>
                        <th><input type="text" name="name" id="name"></th>
                    </tr>
                    <tr>
                        <th>Address </th>
                        <th><textarea name="address" id="address">Enter your address</textarea></th>
                    </tr>
                    <tr>
                        <th>Phone No </th>
                        <th><input type="number" name="phoneno" id="phoneno"></th>
                    </tr>
                    <tr>
                        <th>Username </th>
                        <th><input type="text" name="username" id="username"></th>
                    </tr>
                    <tr>
                        <th>Password </th>
                        <th><input type="password" name="password" id="password"></th>
                    </tr>
                    <tr>
                        <th>Re Enter Password </th>
                        <th><input type="password" name="repassword" id="repassword">
                        <p id="PASS"></p>
                    </th>
                    </tr>
                    <tr>
                        <th><input type="submit" name="register" id="register" value="Register"></th>
                        <th><input type="reset" name="reset" id="reset" value="Reset"></th>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script>
        function passValidation(){
            p=document.getElementById('pass').value;
            r=document.getElementById('repass').value;
            if(p!=r){
                document.getElementById('PASS').innerHTML="Must be equal to prevoiusly given password";
                return false;
            }else{
                return true;
            }
        }
    </script>
</body>
</html>

<?php
include 'connection.php';

if(isset($_POST['register'])){
    $rollno=$_POST['rollno'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $phoneno=$_POST['phoneno'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];

    $sql="SELECT rollno FROM stud WHERE rollno=$rollno";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        echo "<script>alert('Same roll no excists!!');</script>";
    }else{
        $sql="INSERT INTO stud VALUES($rollno,'$name','$address',$phoneno,'$username','$password','$repassword')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<script>alert('Student Registration Succesfull!!');</script>";
        }else{
            echo "<script>alert('Student Registration Failed!!');</script>";
        }
    }
}
?>