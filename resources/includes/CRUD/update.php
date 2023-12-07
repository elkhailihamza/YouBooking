<?php
include 'connect.php';
include 'header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $select = "SELECT * FROM utilisateur WHERE id_utilisateur  = ?";
    $stmt = mysqli_prepare($conn, $select);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Erreur dans la requete: " . mysqli_error($conn);
            exit();
        }
    } else {
        echo "Erreur dans la préparation de la requête: " . mysqli_error($conn);
        exit();
    }
} else {
    header("Location: erreur.php");
    exit();
}


if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $id_role = $_POST['id_role'];

    $update = "UPDATE utilisateur SET username=?, email=?, id_role=? WHERE id_utilisateur=?";
    $stmt = mysqli_prepare($conn, $update);
    mysqli_stmt_bind_param($stmt, "ssii", $username, $email, $id_role, $id);
    $updateResult = mysqli_stmt_execute($stmt);

    if ($updateResult) {
        header("Location: user.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour : " . mysqli_error($conn);
        exit();
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>

<main class="flex-shrink-0">
    <div class="container">
        <form method="post" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $row['username'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $row['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="id_role" class="form-label">id_role</label>
                <input type="text" class="form-control" id="id_role" name="id_role" value="<?= $row['id_role'] ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Edit</button>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>
