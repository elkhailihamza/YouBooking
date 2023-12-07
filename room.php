<?php
include 'connect.php';
$requeteSelect = "SELECT * FROM room";
$resultatSelect = mysqli_query($conn, $requeteSelect);

$reqeteHotel="SELECT * FROM hotel";
$resultatHotel=mysqli_query($conn,$reqeteHotel);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class='container'>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard</a>
    <div class="navbar-nav ms-auto">
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="images/avatar.png" alt="Profile" width="30" height="30" class="d-inline-block align-top rounded-circle">
          Zakaria
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Profil</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">LogOut</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<center>
  <button type="button" class="btn btn-success mt-3 mb-4" data-bs-toggle="modal" data-bs-target="#ajouterModal">
    Ajouter chambre
  </button>
</center>

<table class="table align-middle mt-2 bg-white">
  <thead class="bg-light text-center">
    <tr>
      <th><h4>number</h4></th>
      <th><h4>prix</h4></th>
      <th><h4>status</h4></th>
      <th><h4>hotel</h4></th>
      <th><h4> edit / delete</h4></th>
    </tr>
  </thead>

  <tbody class='text-center'>
    <?php
    while ($row = mysqli_fetch_assoc($resultatSelect)) {
        $requeteHotel = "SELECT * FROM hotel WHERE id_hotel = " . $row['id_hotel'];
        $resultHotel = mysqli_query($conn, $requeteHotel);

        if ($resultHotel) {
            $rowHotel = mysqli_fetch_assoc($resultHotel);

            echo "<tr>";
            echo "<td>{$row['id_room']}</td>";
            echo "<td>{$row['prix']} $</td>";
            echo "<td><span class='status-text' style='width: fit-content;height:20px;padding:3px 5px 5px 5px;border-radius:7px;'>{$row['status']}</span></td>";
            echo "<td>{$rowHotel['name_hotel']}</td>";
            echo "<td class='d-flex justify-content-center'>
                    <button type='button' class='btn btn-primary btn-sm btn-rounded' data-bs-toggle='modal' data-bs-target='#updateModal{$row['id_room']}'>Modifier</button>
                    <form action='crudROOM/deleteRoom.php' method='post' class='ms-2'>
                        <input type='hidden' name='id_room' value='{$row['id_room']}'>
                        <button type='submit' name='deletebtn' class='btn btn-danger' style='height: 40px;'>Supprimer</button>
                    </form>
                  </td>";
            echo "</tr>";


            // modal update 
            echo "<div class='modal fade' id='updateModal{$row['id_room']}' tabindex='-1' aria-labelledby='updateModalLabel{$row['id_room']}' aria-hidden='true'>".
            "    <div class='modal-dialog'>".
            "        <div class='modal-content'>".
            "            <div class='modal-header'>".
            "                <h5 class='modal-title' id='updateModalLabel{$row['id_room']}'>Modifier chambre</h5>".
            "                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>".
            "            </div>".
            "            <form action='crudROOM/updateRoom.php' method='POST'>".
            "                <div class='modal-body'>".
            "                    <input type='hidden' name='id_room' value='{$row['id_room']}'>".
            "                    <label for='number_update' class='form-label'>number</label>".
            "                    <input type='text' class='form-control' id='number_update' name='number' value='{$row['id_room']}' required>".
            "                    <label for='prix_update' class='form-label'>Prix</label>".
            "                    <input type='text' class='form-control' id='prix_update' name='prix' value='{$row['prix']}' required>".
            "                    <label for='status_update' class='form-label'>Statut</label>".
            "                    <select name='status' id='status_update' class='form-select' aria-label='Default select example'>".
            "                      <option value='Available'>Available</option>".
            "                      <option value='Occupied'>Occupied</option>".
            "                      <option value='Under Maintenance'>Under Maintenance</option>".
            "                    </select>".
            "                    <label for='hotel_update' class='form-label'>hotel</label>".
            "                    <select name='hotel' id='hotel_update' class='form-select' aria-label='Default select example'>".
            "                        <option value='{$rowHotel['id_hotel']}'>{$rowHotel['name_hotel']}</option>";

                                       $resultatHotel = mysqli_query($conn, $reqeteHotel);
                                       while ($rowHotel = mysqli_fetch_assoc($resultatHotel)) {
                                          echo "<option value='" . $rowHotel['id_hotel'] . "'>" . $rowHotel['name_hotel'] . "</option>";
                                       }
                                       
           echo "                 </select>".
            "                </div>".
            "                <div class='modal-footer'>".
            "                    <button type='reset' class='btn btn-secondary' >reset</button>".
            "                    <button type='submit' name='updatebtn' class='btn btn-primary'>update</button>".
            "                </div>".
            "            </form>".
            "        </div>".
            "    </div>".
            "</div>";
        } else {
            echo "error : " . mysqli_error($conn);
        }
    }
    ?>
  </tbody>
</table>

<!-- Modal ajouter -->
<div class="modal fade" id="ajouterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouvele chambre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="crudROOM/insertRoom.php" method="POST">
                <div class="modal-body">
                    <div>
                        <label for="number" class="form-label">number</label>
                        <input type="text" class="form-control" id="number" name="number" required>
                    </div>
                    <div>
                        <label for="prix" class="form-label">Prix</label>
                        <input type="text" class="form-control" id="prix" name="prix" required>
                    </div>
                    <div>
                        <label for="status" class="form-label">Statut</label>
                        <select name="status" id="status" class="form-select" aria-label="Default select example">
                            <option value="Available">Available</option>
                            <option value="Occupied">Occupied</option>
                            <option value="Under Maintenance">Under Maintenance</option>
                        </select>
                    </div>
                    <div>
                        <label for="hotel" class="form-label">hotel</label>
                        <select name="hotel" id="hotel-select" class="form-select" aria-label="Default select example">
                            <?php
                            while ($row = mysqli_fetch_assoc($resultatHotel)) {
                                echo "<option value='" . $row['id_hotel'] . "'>" . $row['name_hotel'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Réinitialiser</button>
                    <button type="submit" name='ok' class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src='js/script.js'></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
