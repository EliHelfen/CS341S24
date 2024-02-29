<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Login<?= $this->endSection() ?>

<?= $this->section("headLinks") ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" typte="text/css" href="/css/login.css">

<?= $this->endSection() ?>

<?= $this->section("headStyle") ?>

<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="container">
    <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">Login to View Appointments</div>
        <div class="panel-body">
        <?= form_open("/UserController/attemptLogin", array('id' => 'create-form', 'enctype' => 'multipart/form-data'))?>
                <label class="required-field" for="username"><b>Username:</b></label>
                <input class="input" type="text" id="username" name="username">
                <br><br>
                <label class="required-field" for="password"><b>Password:</b></label>
                <input class="input" type="password" id="password" name="password" maxlength="12">
                <br><br>
                <button class="btn btn-primary" type="submit">Register</button>
                <br><br>
                <p>Dont have an account? Register <a href="<?php echo base_url(); ?>/UserController/dashboard">here</a></p>
                
            </form>
        </div>
    </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section("footerLinks") ?>
<script>
    $(document).ready(function(){
        
    
    });

    
    function submit1(){
        var user = document.getElementById("username").value;
        if(user == "" || user == null){
            alert("Enter a username.");
        
        }
        var pass = document.getElementById("password").value;
        if(pass == "" || pass == null){
            alert("Enter a password.");
   
        }
        
    }

    submitForm();

</script>

<?= $this->endSection() ?>

