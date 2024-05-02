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
    <link rel="stylesheet" typte="text/css" href="/css/adminSearch.css">

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

   
    <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 form-container">
            <h2 class="text-center">Generate Appointment Report</h2>
            <?= form_open("/UserController/generateAdminReport", array('id' => 'create-form', 'enctype' => 'multipart/form-data'))?>
            <div class="select-group">
                    <div class="form-group">
                        <label for="hour">Username</label>
                        <select id="username_value" name="username_value" class="form-control">
                            <option value="">Select User</option>
                            <?php foreach ($users as $user): ?>
                                <option value="<?= $user['username']?>"><?= $user['username'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                
                
                <div class="select-group">
                    <div class="form-group">
                        <label for="hour">Category</label>
                        <select id="category_value" name="category_value" class="form-control">
                            <option value="">Select Category</option>
                            <option value="Medical">Medical</option>
                            <option value="Beauty">Beauty</option>
                            <option value="Fitness">Fitness</option>
                        </select>
                    </div>
                    

                </div>

                
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

