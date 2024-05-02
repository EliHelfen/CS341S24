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
            <li><a href="<?php echo base_url(); ?>/UserController/logout">Log Out</a></li>
        </ul>

    </div>


<div class="container-fluid">
    <div class="panel panel-primary">
        <div id="welcome" class="panel-heading">Welcome <?= $user['first_name'] ?></div>
        <div class="panel-body">
            <h3>Account Directory:</h3>
            <table class="table table-striped table-bordered table-sm" id="apptTbl">
                <thead>
                  <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Service Provider Type</th>
                    <th scope="col">Account Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $u): ?>
                    <tr>
                        <td><?= $u['id'] ?></td>
                        <td><?= $u['username'] ?></td>
                        <td><?= $u['first_name'] ?></td>
                        <td><?= $u['last_name'] ?></td>
                        <td><?= $u['email'] ?></td>
                        <?php 
                            if($u['user_type'] === '3') {
                                echo '<td>Admin</td>';
                            } else if($u['user_type'] === '2') {
                                echo '<td>Service Provider</td>';
                            } else if($u['user_type'] === '1') {
                                echo '<td>User</td>';
                            } else {
                                echo '<td>Unknown Type</td>';
                            }
                        ?>
                        <?php 
                            if($u['sp_type'] === '3') {
                                echo '<td>Fitness</td>';
                            } else if($u['sp_type'] === '2') {
                                echo '<td>Beauty</td>';
                            } else if($u['sp_type'] === '1') {
                                echo '<td>Medical</td>';
                            } else {
                                echo '<td>N/A</td>';
                            }
                        ?>
                        <?php 
                            if($u['account_status'] === '1') {
                                echo '<td>Enabled</td>';
                            } else if($u['account_status'] === '0') {
                                echo '<td>Disabled</td>';
                            }
                        ?>
                        <?php
                            if($u['user_type'] === 3) {
                                echo '<td></td>';
                            }
                            else if ($u['account_status'] === '1') {
                                echo '<td><a href="'. base_url() . '/admin/disableAccount/' . $u['id'] . '">Disable Account</a></td>';
                            } else {
                                echo '<td><a href="'. base_url() . '/admin/enableAccount/' . $u['id'] . '">Enable Account</a></td>';
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

