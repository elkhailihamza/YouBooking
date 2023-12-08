<?php

if (isset($_POST["submit"])) {
    $username = trim($_POST["name"]);
    $email = trim(strtolower($_POST['email']));
    $pass = trim($_POST['password']);
    $confirmPass = trim($_POST['conf-password']);
    $id_role = $_POST['id_role'];

    if ((empty($username)) || (strlen($username) > 20)) {
        print('<b>Entrez username </b><br>');
        exit();
    }

    if (empty($email)) {
        print('<b>Entrez une adresse E-mail</b><br>');
        exit();
    } elseif (strlen($email) > 50) {
        print('<b>Votre E-mail ne doit pas dépasser 50 caractères</b><br>');
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        print('<b>Rentrez une adresse E-mail valide</b><br>');
        exit();
    }

    if (empty($pass)) {
        print('<b>Entrez une password</b><br>');
        exit();
    } elseif ($pass !== $confirmPass) {
        print('<b>Vous avez tapé deux mots de passe différents</b>');
        exit();
    } elseif ((strlen($pass) > 15 || strlen($pass) < 5) || (!preg_match("#[0-9]+#", $pass)) || (!preg_match("#[a-zA-Z]+#", $pass))) {
        print('<b>Mot de passe non valide : entre 5 et 15 caractères et sans espace</b><br>');
        exit();
    }

    $has_pass = password_hash($pass, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($conn, "INSERT INTO utilisateur (username, id_role, email, password) VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "siss", $username, $id_role, $email, $has_pass);

    $result = mysqli_query($conn, " SELECT * FROM utilisateur WHERE email = '$email'");

    if (mysqli_fetch_assoc($result) > 0) {
        echo "<script>alert('email is exist');</script>";
    } else {
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo "<script>alert('Insert successfully');</script>";
        header("Location: sign-in.php");
        exit();
    }
}