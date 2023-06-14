<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="login.css" />
    <style>
        form {
            height: 200px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 1px 3px 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        table {}

        table th {}

        table thead tr td h1 {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        table th tr {}

        table tbody tr {}

        table tbody tr td {
            display: flex;
        }

        table tbody tr td h4 {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" name="login" method="post">
        <h1>Đây là trang chủ</h1>
    </form>

</body>

</html>