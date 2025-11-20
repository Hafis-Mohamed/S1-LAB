<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="outer">
        <div class="inner">
            <form action="login.php" method="post">
                <table>
                    <caption>Log In</caption>
                    <tr>
                        <th>Username </th>
                        <th><input type="text" name="usr" id="usr"></th>
                    </tr>
                    <tr>
                        <th>Password </th>
                        <th><input type="password" name="pass" id="pass"></th>
                    </tr>
                    <tr>
                        <th><input type="submit" name="submit" id="submit" value="Log In"></th>
                        <th><input type="reset" name="reset" id="reset" value="Reset"></th>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>

<?php
include 'connection.php';


if(isset($_POST['submit'])){
    $username=$_POST['usr'];
    $password=$_POST['pass'];
    $sql = "SELECT username FROM admin WHERE username='$username' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        echo "<script>window.location='admin.php';</script>";
    }else{
        echo "<script>alert('Incorrect username or password!!');</script>";
    }
}
?>