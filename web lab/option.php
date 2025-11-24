<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <style>
        body {
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #fafafa;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4f7eff;
        }

        a {
            display: block;
            padding: 10px 12px;
            margin-bottom: 8px;
            text-decoration: none;
            color: #333;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 6px;
            transition: 0.2s;
        }

        a:hover {
            background: #e8f0ff;
            border-color: #b4caff;
            color: #1a4db7;
        }
    </style>
</head>

<body>
    <h2>Admin Dashboard</h2>
    <a href="admin.php" target="_top">Home</a>
    <a href="studentreg.php" target="right">Student Registration</a>
    <a href="markentry.php" target="right">Student Mark Entry</a>
    <a href="markupdate.php" target="right">Student Mark Update</a>
    <a href="studentlist.php" target="right">Student List</a>
    <a href="progresscard.php" target="right">Progress Card</a>
</body>
</html>
