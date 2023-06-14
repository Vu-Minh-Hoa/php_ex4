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
        <table>
            <thead>
                <tr>
                    <td>
                        <h1>login page</h1>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h4>username:</h4>
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="username" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>password:</h4>
                    </td>
                    <td>
                        <input type="password" name="password" placeholder="password" />
                    </td>
                </tr>
            </tbody>
            <tr>
                <td colspan="2" align-item="center"><input type="submit" name="submit" value="submit"> </td>
            </tr>
        </table>
    </form>
    <?php
 
    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username) || empty($password)) {
            if ($username == "") {
                $errors[] = "Tên đăng nhập không được để trống";
            } else if ($password == "") {
                $errors[] = "Mật khẩu không được để trống";
            }
        } else {
            $localhost = "localhost:3307";
            $username_db = "root";
            $password_db = "";
            $dbname = "register";
            $conn = new mysqli($localhost, $username_db, $password_db, $dbname);
            if (!$conn) {
                die("Kết nối cơ sở dữ liệu thất bại. " . mysqli_connect_error());
            } else {
                $sql = "SELECT ID FROM `users` WHERE username = '$username' and pass = '$password'";
                $result = $conn->query($sql);
                if ($result->num_rows>0) {
                   header('Location: /php/home.php');
                } else {
                    echo "Đăng nhập không thành công: tên đăng nhập hoặc mật khẩu sai. " ;
                }
                mysqli_close($conn);
            }

        }
    }
    ?>

</body>

</html>