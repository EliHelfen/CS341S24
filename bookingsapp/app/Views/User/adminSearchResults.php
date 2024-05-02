<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Admin Dashboard<?= $this->endSection() ?>

<?= $this->section("headLinks") ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="~/Scripts/data-table/jquery.dataTables.js"></script>
    <script type="text/javascript" src="~/Scripts/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" typte="text/css" href="/css/homePage.css">

<?= $this->endSection() ?>

<?= $this->section("headStyle") ?>

<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="navbar">
        <ul>
            <li><a href="<?php echo base_url(); ?>/adminDashboard">Appointments</a></li>
            <li><a href="<?php echo base_url(); ?>/adminDashboardAccounts">Accounts</a></li>
            <li><a href="<?php echo base_url(); ?>/admin/search">Generate Report</a></li>
            <li><a href="<?php echo base_url(); ?>/UserController/logout">Log Out</a></li>
        </ul>

    </div>


<div class="container-fluid">
    <div class="panel panel-primary">
        <div id="welcome" class="panel-heading">Welcome <?= $user['first_name'] ?></div>
        <div class="panel-body">
            <h3>Appointment Log:</h3>
            <h4>Total Active Appointments-- Medical: <?= $counters['Medical'] ?> -- Beauty: <?= $counters['Beauty'] ?> -- Fitness: <?= $counters['Fitness'] ?></h4>
            <table class="table table-striped table-bordered table-sm" id="apptTbl">
                <thead>
                  <tr>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Appointment User</th>
                    <th scope="col">Appointment Status</th>
                    <th scope="col">Service Provider</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($appointments as $a): ?>
                    <tr>
                    <td><?= $a['id'] ?></td>
                    <td><?= $a['a_user'] ?></td>
                    <td><?= $a['a_status'] ?></td>
                    <td><?= $a['a_serviceProvider'] ?></td>
                    <td><?= $a['a_date'] ?></td>
                    <td><?= $a['a_time'] ?></td>
                    <td><?= $a['a_type'] ?></td>
                    <td><?= $a['a_description'] ?></td>
                    <?php

                        if($a['a_status'] === 'Canceled By Provider' || $a['a_status'] === 'Canceled By User' || $a['a_status'] === 'Canceled By Admin') {
                            echo '<td>Cancellation not available</td>';
                        } else {
                            echo '<td><a href="'. base_url() . 'appointment/cancelAppointmentAdmin/' . $a['id'] . '">Cancel Appointment</a></td>';
                        }

                    ?>                    
                    </tr>
                  <?php endforeach; ?>  
                </tbody>
            </table>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section("footerLinks") ?>
<script>
    $(document).ready(function(){
        
        $('#apptTbl').dataTable();
    

        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const user = urlParams.get('username');
        document.getElementById("username").value = urlParams.get('username');
        document.getElementById("username").text = urlParams.get('username');
        document.getElementById("password").value = urlParams.get('password');
        document.getElementById("password").text = urlParams.get('password');
        
    });

    function book(){
        window.location.href = "bookAppointment.html?username=" + $("#username").val();
    }
    
</script>

<?= $this->endSection() ?>

