<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="../style.css" />
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 300px;
        }

        body {
            height: 100vh;
            width: 100vw;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: #ccc;
            padding: 20px 20px 40px 20px;
            box-shadow: 1px 3px 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        input {
            width: 100%;
        }

        table thead tr td h1 {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        table tbody tr td {
            display: flex;
        }

        table tbody tr td h4 {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin: 10px 0 5px;
        }

        .error-text {
            width: 300px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
<?php
    
    $fullname = $username = $gender = $password = $phone = $repass = $email = $address = "";
    $flag = false;
    $err_username = $err_fullname = $err_gender = $err_password = $err_phone = $err_repass = $err_email = $err_address = "";
    //Kiểm tra tên người dùng
    if ($_SERVER['REQUEST_METHOD'] = "POST") {
        if (empty($_POST["fullname"])) {
            $err_fullname = "Họ tên không được trống";
        } else {
            $fullname = check_data($_POST["fullname"]);
        }

        // kiểm tra phần tên đăng nhập
    
        if (empty($_POST["username"])) {
            $err_username = "Tên đăng nhập không được trống";
        } else {
            $username = check_data($_POST["username"]);
        }
        if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
            $err_username = "tên đăng nhập chỉ có chữ và số";
        }

        //Kiểm tra mật khẩu
    
        if (empty($_POST["password"])) {
            $err_password = "Mật khẩu không được trống";
        } else {
            $password = check_data($_POST["password"]);
        }
        if (!preg_match("/^[a-zA-Z0-9]{8,30}$/", $password)) {
            $err_password = "Mật khẩu đủ tối thiểu 8 ký tự và chỉ có chữ và số";
        }


        //Kiểm tra mật khẩu nhập lại
    
        if (empty($_POST["repass"])) {
            $err_repass = "Mật khẩu không được trống";
        } else {
            $repass = check_data($_POST["repass"]);
        }
        if (!preg_match("/^[a-zA-Z0-9]{8,30}$/", $repass)) {
            $err_repass = "Mật khẩu chỉ có chữ và số";
        }
        if ($password != $repass) {
            $err_repass = "Hai mật khẩu không khớp";
        }



        if (empty($_POST["email"])) {
            $err_email = "email không được trống";
        } else {
            $email = check_data($_POST["email"]);
        }
        if (!preg_match("/^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-z]+$/", $email)) {
            $err_email = "nhập đúng dạng email";
        }
    }


    function check_data($data)
    {
        $data = trim($data); //cắt khoảng tắng 2 đầu
        $data = stripcslashes($data); //cắt bỏ ký tự \
        $data = htmlspecialchars($data); // bỏ tác dụng cuẩ thẻ html, tương tự hàm htmlentities()
        return $data;
    }
    if($err_username =="" && $err_password ==""&& $err_repass ==""&& $err_fullname =="" && $err_gender =="" && $err_phone ==""){
        $localhost = "localhost:3307";
        $username_db = "root";
        $password_db = "";
        $dbname = "register";
        $conn = new mysqli($localhost, $username_db, $password_db, $dbname);
        if(!$conn){
            die("Kết nối cơ sở dữ liệu thất bại. ".mysqli_connect_error());
        }
        else{
            $sql = "INSERT INTO `users`(`fullname`, `username`, `pass`) VALUES ('$fullname','$username','$password')";
            if($conn->query($sql)=== true){
                header('Location: /php/login.php');
            }
            else{
                echo "Có lỗi khi chèn dữ liệu vào cơ sở dữ liệu: ".mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }

    ?>


        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" name="register" method="post">
            <table>
                <thead>
                    <tr>
                        <td>
                            <h1>Register page</h1>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <h4>fullname:</h4>
                        </td>
                        <td>
                            <input type="text" name="fullname" value="<?php echo $fullname ?>" placeholder="fullname" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Gender:</h4>
                        </td>
                        <td>
                            <input type="text" name="gender" value="<?php echo $gender ?>" placeholder="gender" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>email:</h4>
                        </td>
                        <td>
                            <input type="text" name="email" value="<?php echo $email ?>" placeholder="email" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Phone:</h4>
                        </td>
                        <td>
                            <input type="text" name="phone" value="<?php echo $phone ?>" placeholder="phone" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Tên dăng nhập:</h4>
                        </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username ?>" placeholder="username" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Password:</h4>
                        </td>
                        <td>
                            <input type="password" name="password" value="<?php echo $password ?>" placeholder="password" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Confirm password:</h4>
                        </td>
                        <td>
                            <input type="password" name="repass" value="<?php echo $repass ?>" placeholder="repass" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Address:</h4>
                        </td>
                        <td>
                            <input type="text" name="address" value="<?php echo $address ?> " placeholder="address" />
                        </td>
                    </tr>
                </tbody>
                <tr>
                    <td colspan="2" align-item="center"><input type="submit" name="submit" value="submit">
                        <input type="reset" name="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
        <div class="error-text">
            <?php
            if (!empty($err_fullname)) {
                $flag = true;
                echo $err_fullname . "<br>";
            } else if (!empty($err_username)) {
                $flag = true;
                echo $err_username . "<br>";
            } else if (!empty($err_pass)) {
                $flag = true;
                echo $err_pass . "<br>";
            } else if (!empty($err_repass)) {
                $flag = true;
                echo $err_repass . "<br>";
            } else if (!empty($err_email)) {
                $flag = true;
                echo $err_email . "<br>";
            }
        ?>
    </div>

</body>

</html>