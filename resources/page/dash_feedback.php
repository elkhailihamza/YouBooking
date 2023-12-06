<?php
$identifier = 'is_feedback';
require("../config/db_connection.php");
require("../includes/CRUD/functions.php");
include("../includes/board_header.php");
?>

<section class="container-fluid d-flex flex-column justify-content-center align-items-center gap-3 w-100 h-75">
    <div class="mt-5">
        <h2>
            Feedback
        </h2>
        <hr>
    </div>
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="container-fluid" style="overflow: auto; height: 300px;">
            <table class="table">
                <thead class="thead-light">
                    <tr class="position-sticky" style="top: 0px;">
                        <th scope="col">#</th>
                        <th scope="col">username</th>
                        <th scope="col">email</th>
                        <th scope="col">description</th>
                        <th scope="col">user_id</th>
                        <th scope="col">id_role</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include_once("../includes/CRUD/functions.php");
                        select($identifier);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include("../includes/footer.php"); ?>

