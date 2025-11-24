<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #eef1f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .outer {
            background: #ffffff;
            padding: 25px 35px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        }

        caption {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        table {
            width: 100%;
        }

        th {
            padding: 10px;
            text-align: left;
            font-size: 16px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 8px 16px;
            font-size: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            background: #4f7eff;
            color: white;
            transition: 0.2s;
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
    </style>
</head>

<body>
    <div class="outer">
        <div class="inner">
            <form action="studentlogin.php" method="post">
                <table>
                    <caption>Log In</caption>
                    <tr>
                        <th>Username</th>
                        <th><input type="text" name="usr" id="usr"></th>
                    </tr>
                    <tr>
                        <th>Password</th>
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
    $username = $_POST['usr'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM stud WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        // Redirect to dashboard and pass roll number in URL
        $rollno = $row['rollno'];
        echo "<script>
                alert('Welcome ".$row['name']."');
                window.location.href='studentdashboard.php?rollno=".$rollno."';
              </script>";
    } else {
        echo "<script>
                alert('Incorrect username or password');
                window.location.href='studentlogin.php';
              </script>";
    }
}
?>
