<?php
$identifier = 'is_reservation';
require("../config/db_connection.php");
require("../includes/CRUD/functions.php");
include("../includes/board_header.php");
?>

<section class="container-fluid d-flex flex-column align-items-center gap-3 w-100 h-100">
    <div class="mt-5">
        <h2>
            Current reservations
        </h2>
        <hr>
    </div>
    <div>
        <button
            class="btn btn-success d-flex align-items-center text-white px-5 py-2 add_button">
            Add
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
        </button>
    </div>
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="container-fluid">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">id_utilisateur</th>
                        <th scope="col">username</th>
                        <th scope="col">id_reservation</th>
                        <th scope="col">date_debut</th>
                        <th scope="col">date_fin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include("../includes/CRUD/functions.php");
                        select();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>

</html>