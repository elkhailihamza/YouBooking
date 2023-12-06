<?php

include(__DIR__ . "/../../config/db_connection.php");

if ($identifier == 'is_reservation') {
    $sql = 'SELECT utilisateur.id_utilisateur, utilisateur.username, reservation.id_reservation, room.id_room, reservation.date_debut, reservation.date_fin, hotel.name_hotel
    FROM utilisateur
    INNER JOIN reservation ON utilisateur.id_utilisateur = reservation.id_utilisateur
    INNER JOIN room ON reservation.id_room = room.id_room
    INNER JOIN hotel ON room.id_hotel = hotel.id_hotel Where room.status = ?;';

    $status = "Available";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $status);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

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
} else if ($identifier == 'is_feedback') {
        $sql = "SELECT feedback.id_feedback, utilisateur.username, utilisateur.email,feedback.description, utilisateur.id_utilisateur, role.id_role
        FROM feedback INNER JOIN utilisateur ON feedback.id_user = utilisateur.id_utilisateur
        INNER JOIN role ON utilisateur.id_role = role.id_role;";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo 'Error :' . mysqli_error($conn);
        exit();
    }
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <th scope="row">
                    <?php echo $row['id_feedback'] ?>
                    </th>
                    <td>
                    <?php echo $row['username'] ?>
                    </td>
                    <td>
                    <?php echo $row['email'] ?>
                    </td>
                    <td>
                    <?php echo $row['description'] ?>
                    </td>
                    <td>
                    <?php echo $row['id_utilisateur'] ?>
                    </td>
                    <td>
                    <?php echo $row['id_role'] ?>
                    </td>
                </tr>
            <?php
        }
    }
}