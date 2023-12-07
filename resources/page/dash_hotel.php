<?php
$identifier = "is_hotel";
include("../config/db_connection.php");
include '../includes/board_header.php';
?>

<section class="container-fluid d-flex flex-column justify-content-center align-items-center gap-3 w-100 h-75">
  <div class="mt-5">
    <h2>
      Hotels
    </h2>
    <hr>
  </div>
  <div class="container-fluid d-flex justify-content-center align-items-center">
    <div class="container-fluid" style="overflow: auto; height: 300px;">
      <table class="table">
        <thead class="thead-light">
          <tr class="position-sticky" style="top: 0px;">
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">website</th>
            <th scope="col">telephone</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = mysqli_query($conn, "SELECT * FROM hotel");

          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <tr>
                <td>
                  <?= $row["id_hotel"] ?>
                </td>
                <td>
                  <?= $row["name_hotel"] ?>
                </td>
                <td>
                  <?= $row["email"] ?>
                </td>
                <td>
                  <?= $row["website"] ?>
                </td>
                <td>
                  <?= $row["telephone"] ?>
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
  </div>
</section>

<?php
include '../includes/footer.php';
mysqli_close($conn);
?>