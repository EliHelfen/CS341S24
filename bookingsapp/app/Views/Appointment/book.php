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
            <li><a href="<?php echo base_url(); ?>dashboard">Home</a></li>
            <li><a href="<?php echo base_url(); ?>appointment/book">Book Appointment</a></li>
            <?php if ($user['user_type'] === '2'): ?>
              <li><a href="<?php echo base_url(); ?>appointment/create">Add Appointment</a></li>
            <?php endif; ?>
            <li><a href="/userManual.pdf" download >User Manual</a></li>

            <li><a href="<?php echo base_url(); ?>/UserController/logout">Log Out</a></li>
        </ul>

    </div>


    <div class="container-fluid">
    <div class="panel panel-primary">
        <div class="panel-heading">Book a New Appointment</div>
        <div class="panel-body">
        <?= form_open("/AppointmentController/viewAvailable", array('id' => 'create-form', 'enctype' => 'multipart/form-data'))?>
            <label class="required-field" for="apptType" ><b>Select Type of Appointment:</b></label>
            <select class="form-select" id="apptType" name="apptType" onchange="getProviders(this.value)">
                <option value="1">Medical</option>
                <option value="2">Beauty</option>
                <option value="3">Fitness</option>
            </select>
            <button class="btn btn-primary" type="submit">View Available</button>

        </form>

        </div>
    </div>
</div>



<?= $this->endSection() ?>

<?= $this->section("footerLinks") ?>
<script>

    
</script>

<?= $this->endSection() ?>

