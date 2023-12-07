<?php
include('../connect.php');

if (isset($_POST['updatebtn'])) {
    $id_room = $_POST['id_room'];
    $number = $_POST['number'];
    $prix = $_POST['prix'];
    $status = $_POST['status'];
    $hotel_id = $_POST['hotel']; 

    $requetUpdate = "UPDATE room SET id_room = '$number', prix = '$prix', status = '$status', id_hotel = '$hotel_id' WHERE id_room = '$id_room'";

    $result = mysqli_query($conn, $requetUpdate);
    if ($result) {
        header("Location:../room.php");
        exit();
    } else {
        echo "error update : " . mysqli_error($conn);
    }
}

?>
