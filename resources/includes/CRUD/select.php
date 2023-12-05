<?php

include(__DIR__ . "/../../config/db_connection.php");

$sql = 'SELECT utilisateur.id_utilisateur, utilisateur.username, reservation.id_reservation, room.id_room, reservation.date_debut, reservation.date_fin, hotel.name_hotel
FROM utilisateur
INNER JOIN reservation ON utilisateur.id_utilisateur = reservation.id_utilisateur
INNER JOIN room ON reservation.id_room = room.id_room
INNER JOIN hotel ON room.id_hotel = hotel.id_hotel Where room.status = "Available";';

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit();
}


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <th scope="row">
                <?php echo $row['id_utilisateur'] ?>
            </th>
            <td>
                <?php echo $row['username'] ?>
            </td>
            <td>
                <?php echo $row['id_reservation'] ?>
            </td>
            <td>
                <?php echo $row['id_room'] ?>
            </td>
            <td>
                <?php echo $row['date_debut'] ?>
            </td>
            <td>
                <?php echo $row['date_fin'] ?>
            </td>
            <td>
                <?php echo $row['name_hotel'] ?>
            </td>
        </tr>
        <?php
    }
} else {
    ?>
    <tr scope="row">
        <td style="text-align: center;">empty</td>
    </tr>
    <?php
}
