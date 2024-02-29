<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Login<?= $this->endSection() ?>

<?= $this->section("headLinks") ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" typte="text/css" href="/css/bookAppointment.css">

<?= $this->endSection() ?>

<?= $this->section("headStyle") ?>

<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="navbar">
        <ul>
            <li><a href="<?php echo base_url(); ?>/UserController/dashboard">Home</a></li>
            <li><a href="<?php echo base_url(); ?>/AppointmentController/bookAppointment">Book Appointment</a></li>
            <li><a href="<?php echo base_url(); ?>/UserController/logout">Log Out</a></li>
        </ul>

    </div>


    <div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading">Book a New Appointment</div>
        <div class="panel-body">
            <label class="required-field" for="apptType" ><b>Select Type of Appointment:</b></label>
            <select class="form-select" id="apptType" onchange="getProviders(this.value)">
                <option value="1">Beauty</option>
                <option value="2">Medical</option>
                <option value="3">Fitness</option>
            </select>
            <br><br>
            <label class="required-field" for="provName" ><b>Select a Service Provider:</b></label>
            <select class="form-select" id="provName" onchange="getAvailability(this.value)">
                <option>Select an appointment type first</option>
            </select>
   

        </div>
    </div>
</div>



<?= $this->endSection() ?>

<?= $this->section("footerLinks") ?>
<script>

    
</script>

<?= $this->endSection() ?>

