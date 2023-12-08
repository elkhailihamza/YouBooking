<?php
$identifier = "is_Proprietairs";
include '../includes/board_header.php';
include("../config/db_connection.php");
?>

<section class="container-fluid d-flex flex-column justify-content-center align-items-center gap-3 w-100 h-75">
  <div class="mt-5">
    <h2>
      Users
    </h2>
    <hr>
  </div>
  <div class="container-fluid d-flex justify-content-center align-items-center">
    <div class="container-fluid" style="overflow: auto; height: 300px;">
      <table class="table">
        <thead class="thead-light">
          <tr class="position-sticky" style="top: 0px;">
            <th scope="col">Users</th>
            <th scope="col">Email</th>
            <th scope="col">id_role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = mysqli_query($conn, "SELECT * FROM utilisateur WHERE id_utilisateur=2");

          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <div>
                <tr>
                  <td>
                    <?= $row["username"] ?>
                  </td>
                  <td>
                    <?= $row["email"] ?>
                  </td>
                  <td>
                    <?= $row["id_role"] ?>
                  </td>
                  <td>
                    <a href="../includes/update.php?id=<?= $row['id_utilisateur'] ?>" class="btn btn-success">Edit</a>
                    <a href="../includes/delete.php?id=<?= $row['id_utilisateur'] ?>" class="btn btn-danger">Refuser</a>
                  </td>
                </tr>
              </div>
              <?php
            }
          } else {
            echo "Erreur dans la requête de sélection : " . mysqli_error($conn);
          }

          ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?php
include '../includes/footer.php';
mysqli_close($conn);
?>