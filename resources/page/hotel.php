<?php
include 'board_header.php';
?>

<main class="flex-shrink-0 d-flex w-75 d-flex justify-content-center align-items-center ">
  <div class="container">
    <table class="table table-dark table-hover rounded">
      <thead>
        <tr>
          <th>Name</th> 
          <th>Email</th>
          <th>telephone</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM hotel");

        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td><?= $row["name_hotel"] ?></td>
              <td><?= $row["email"] ?></td>
              <td><?= $row["telephone"] ?></td>
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
