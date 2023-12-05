<?php
$identifier='is_home';
include("../includes/board_header.php");
?>
<section class="container-fluid p-0">
    <div class="container rounded-pill py-4 mt-5 col-11">
        <div class="container col-10">
            <h2>Welcome, mdo!</h2>
            <hr class="col-3">
        </div>
    </div>
    <div class="d-flex flex-column align-items-center container-fluid">
        <div class="container-fluid col-2 pb-3">
            <h2>Sales graph</h2>
        </div>
        <hr class="col-6">
        <div class="d-flex container-fluid">
            <div class="container col-5 bg-light rounded" style="box-shadow: rgba(0, 0, 0, 0.15) 2.4px 2.4px 3.2px;">
                <canvas id="upndownchart"></canvas>
            </div>
            <div class="container col-5 bg-light rounded" style="box-shadow: rgba(0, 0, 0, 0.15) 2.4px 2.4px 3.2px;">
                <canvas id="doughnutchart"></canvas>
            </div>
        </div>
    </div>
</section>
</main>
</body>

<script>
    var ctx = document.getElementById('upndownchart').getContext('2d');

    var lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May'],
            datasets: [{
                label: 'Line Chart',
                data: [10, 20, 15, 25, 30],
                borderColor: 'blue',
                borderWidth: 2
            }]
        }
    });

    var cxt = document.getElementById('doughnutchart').getContext('2d');

    var barChart = new Chart(cxt, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Bar Chart',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        }
    });
</script>

</html>