<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Login<?= $this->endSection() ?>

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
            <li><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
            <li><a href="<?php echo base_url(); ?>appointment/book">Book Appointment</a></li>
            <?php if ($user['user_type'] === '2'): ?>
              <li><a href="<?php echo base_url(); ?>appointment/create">Add Appointment</a></li>
            <?php endif; ?>
            <li><a href="<?php echo base_url(); ?>/UserController/logout">Log Out</a></li>
        </ul>

    </div>


<div class="container-fluid">
    <div class="panel panel-primary">
        <div id="welcome" class="panel-heading">Welcome <?= $user['first_name'] ?></div>
        <div class="panel-body">
            <h3>Current Appointments:</h3>
            <table class="table table-striped table-bordered table-sm" id="apptTbl">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Service Provider</th>
                    <th>Book Now</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">2/4</th>
                    <td>3:00pm</td>
                    <td>Beauty</td>
                    <td>Sue</td>
                    <td>Smith</td>
                  </tr>
                  <?php foreach ($appointments as $a): ?>
                    <td><?= $a['a_date'] ?></td>
                    <td><?= $a['a_time'] ?></td>
                    <td><?= $a['a_type'] ?></td>
                    <td><?= $a['a_description'] ?></td>
                    <td><?= $a['a_serviceProvider'] ?></td>
                  <?php endforeach; ?>  
                  <tr>
                    <th scope="row">2/4</th>
                    <td>3:00pm</td>
                    <td>Beauty</td>
                    <td>Sue</td>
                    <td>Smith</td>
                  </tr>
                  <tr>
                    <th scope="row">2/4</th>
                    <td>3:00pm</td>
                    <td>Feauty</td>
                    <td>Sue</td>
                    <td>Smith</td>
                  </tr>
                </tbody>
            </table>
            <a href="<?php echo base_url(); ?>appointment/book">Book Appointment</a>
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

    submitForm();

    
</script>

<?= $this->endSection() ?>

