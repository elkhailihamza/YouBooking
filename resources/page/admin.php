<?php
include 'board_header.php';

?>

<main class="flex-shrink-0  w-75 d-flex justify-content-center align-items-center ">
  <div class="container-fluid ">
    <table class="table table-dark table-hover rounded">
      <thead>
        <tr>
          <th scopcole="">Users</th>
          <th scope="col">Email</th>
          <th scope="col">id_role</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM utilisateur");

        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td><?= $row["username"] ?></td>
              <td><?= $row["email"] ?></td>
              <td><?= $row["id_role"] ?></td>
              <td>
                <a href="update.php?id=<?= $row['id_utilisateur'] ?>" class="btn btn-success">Edit</a>
                <a href="delet.php?id=<?= $row['id_utilisateur'] ?>" class="btn btn-danger">Refuser</a>
              </td>
            </tr>
        <?php
          }
        } else {
          echo "Erreur dans la requête de sélection : " . mysqli_error($conn);
        }
        
        ?>
      </tbody>
    </table>
  </div>
</main>


<?php

include 'footer.php';
mysqli_close($conn);
?>
