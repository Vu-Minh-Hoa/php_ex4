<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="login.css" />
    <style>
        form {
            background-color: #fff;
            padding: 20px;
            box-shadow: 1px 3px 6px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            display: flex;
            justify-content: center;
            padding: 50px;
        }

        table {
            border-spacing: 0;
        }

        table thead {}

        table thead tr {
            border-bottom: 1px solid #ccc;

        }

        table thead tr td {
            font-size: 20px;
            font-weight: bold;
            padding: 20px 20px 10px 0;
            border-bottom: 1px solid #ccc;

        }

        table th tr {}

        table tbody tr {}

        table tbody tr td {
            padding: 5px 20px 5px 0;
            border-bottom: 1px solid #ccc;
            font-size: 16px;
            max-width: 160px;
            line-break: anywhere;

        }

    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" name="login" method="post">
        <table>
            <thead>
                <tr>
                    <td>
                        Username
                    </td>
                    <td>
                        Fullname
                    </td>
                    <td>
                        Email
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php
                $localhost = "localhost:3307";
                $username_db = "root";
                $password_db = "";
                $dbname = "ex";

                $conn = new mysqli($localhost, $username_db, $password_db, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Invalid query" . $conn->connect_error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>
                                $row[fullname]
                            </td>
                            <td>
                                $row[username]
                            </td>
                            <td>
                                $row[email]
                            </td>
                            </tr>
                            ";
                        }
                        ?>
            </tbody>
        </table>
    </form>

</body>

</html>
