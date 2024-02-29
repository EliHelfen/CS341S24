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
            <form id="form" method="get">
                <label class="required-field" for="username"><b>Username:</b></label>
                <input class="input" type="text" id="username" name="username">
                <br><br>
                <label class="required-field" for="password"><b>Password:</b></label>
                <input class="input" type="password" id="password" name="password" maxlength="12">
                <br><br>
                <button  class="submit btn btn-primary" onclick="submit1()" >Login</button>
                <br><br>
                <label>Do not have an account:</label>
                <button type="reset" class="btn btn-secondary" onclick="register()">Register Now</button>
                
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
</script>

<?= $this->endSection() ?>

