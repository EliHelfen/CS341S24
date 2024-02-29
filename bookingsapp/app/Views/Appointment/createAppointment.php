<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Login<?= $this->endSection() ?>

<?= $this->section("headLinks") ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>  
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>  
    <link rel ="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
    <link rel ="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">  
    <link rel="stylesheet" typte="text/css" href="/css/availableTimeSP.css">

<?= $this->endSection() ?>

<?= $this->section("headStyle") ?>

<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="navbar">
        <ul>
            <li><a href="<?php echo base_url(); ?>/UserController/dashboard">Home</a></li>
            <li><a href="<?php echo base_url(); ?>/AppointmentController/book">Book Appointment</a></li>
            <li><a href="<?php echo base_url(); ?>/UserController/logout">Log Out</a></li>
        </ul>

    </div>

    <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Create New Appointment</h2>
            <?= form_open("/AppointmentController/addAppointment", array('id' => 'create-form', 'enctype' => 'multipart/form-data'))?>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
                
                <div class="select-group">
                    <div class="form-group">
                        <label for="hour">Hour</label>
                        <select id="hour" name="hour" class="form-control">
                            <option value="">Select Hour</option>
                            <?php for ($i = 1; $i <= 12; $i++): ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="ampm">AM/PM</label>
                        <select id="ampm" name="ampm" class="form-control" required>
                            <option value="AM">AM</option>
                            <option value="PM">PM</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" id="a_serviceProvider" name="a_serviceProvider" value="<?= $user['first_name'] . ' ' . $user['last_name'] ?>">
                <input type="hidden" id="a_type" name="a_type" value="<?= $user['sp_type']?>">
                <input type="hidden" id="a_SPId" name="a_SPId" value="<?= $user['id']?>">

                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>



<?= $this->endSection() ?>

<?= $this->section("footerLinks") ?>
<script>

    
</script>

<?= $this->endSection() ?>

