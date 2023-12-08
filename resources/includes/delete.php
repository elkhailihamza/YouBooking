<?php
include(__DIR__ . "/../config/db_connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteFeedback = "DELETE FROM feedback WHERE id_user = ?";
    $stmtF = mysqli_prepare($conn, $deleteFeedback);
    mysqli_stmt_bind_param($stmtF, "i", $id);
    $deleteResultF = mysqli_stmt_execute($stmtF);

    $deleteReservation = "DELETE FROM reservation WHERE id_utilisateur = ?";
    $stmtR = mysqli_prepare($conn, $deleteReservation);
    mysqli_stmt_bind_param($stmtR, "i", $id);
    $deleteResultR = mysqli_stmt_execute($stmtR);

    $deleteUser = "DELETE FROM utilisateur WHERE id_utilisateur = ?";
    $stmtU = mysqli_prepare($conn, $deleteUser);
    mysqli_stmt_bind_param($stmtU, "i", $id);
    $deleteResultU = mysqli_stmt_execute($stmtU);

    if ($deleteResultF && $deleteResultR && $deleteResultU) {
        header("Location: ../page/dash_home.php");
        exit();
    } else {
        echo "Erreur lors de la suppression : " . mysqli_error($conn);
        exit();
    }
} else {
    echo "ID non spécifié pour la suppression.";
    exit();
}
?>