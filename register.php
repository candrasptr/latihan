<?php
require_once("config.php");

if (isset($_POST['register'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (name, username, password) VALUES (:name,:username,:password)";
    $stmt = $db->prepare($sql);

    $params = array(
        ':name' => $name,
        ':username' => $username,
        ':password' => $password
    );

    $saved = $stmt->execute($params);

    if ($saved) header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="nama">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="register" value="daftar">
    </form>
</body>

</html>