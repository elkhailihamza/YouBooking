<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = "DELETE FROM utilisateur WHERE id_utilisateur = ?";
    $stmt = mysqli_prepare($conn, $delete);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $deleteResult = mysqli_stmt_execute($stmt);

    if ($deleteResult){
        header("Location: admin.php");
        exit();
    } else {
        echo "Erreur lors de la suppression : " . mysqli_error($conn);
        exit();
    }
} else {
    echo "ID non spécifié pour la suppression.";
    exit();
}

mysqli_close($conn);
?>