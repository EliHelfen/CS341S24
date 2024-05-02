<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Login<?= $this->endSection() ?>

<?= $this->section("headLinks") ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" typte="text/css" href="/css/register.css">

<?= $this->endSection() ?>

<?= $this->section("headStyle") ?>

<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="container">
    <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">Register Account to Make Appointments</div>
        <div class="panel-body">
        <?= form_open("/UserController/attemptRegister", array('id' => 'create-form', 'enctype' => 'multipart/form-data'))?>
                <label class="required-field" for="firstName"><b>First Name:</b></label>
                <input class="input" type="text" id="firstName" name="firstName" required>
                <br><br>
                <label class="required-field" for="lastName"><b>Last Name:</b></label>
                <input class="input" type="text" id="lastName" name="lastName" required>
                <br><br>
                <label for="number"><b>Phone Number (numbers only):</b></label>
                <input class="input" type="text" id="number" name="number">
                <br><br>
                <label class="required-field" for="username"><b>Create a Username:</b></label>
                <input class="input" type="text" id="username" name="username" required>
                <br><br>
                <label class="required-field" for="password"><b>Create a Password:</b></label>
                <input class="input" type="password" id="password" name="password" maxlength="12" required>
                <br><br>
                <label class="required-field" for="userType"><b>Select Type:</b></label>
                <select class="form-select form-select-sm" id="userType" name="userType" onchange="getTypes()" required>
                    <option value="1">User</option>
                    <option value="2">Service Provider</option>
                </select>
                <br><br>
                <label class="required-field" for="spType" id="spTypeQ" hidden><b>Type of Service Provider:</b></label>
                <select class="form-select" id="spType" name="spType" hidden >
                    <option value=""></option>
                    <option value="1">Medical</option>
                    <option value="2">Beauty</option>
                    <option value="3">Fitness</option>
                </select>
                <br><br>
                <div class="form-check" id="spCheck" hidden>
                    <input class="form-check-input" type="checkbox" value="">
                    <label class="form-check-label" for="spCheck">I am a certified Service Provider. I acknowledge that my 
                        certification will not be checked.
                    </label>
                </div>
                <button class="btn btn-primary" type="submit">Register</button>
                <br><br>
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
    
    function getTypes(){
        if($('#userType').val() == 2){
            $('#spTypeQ').show();
            $('#spType').show();
            $('#spCheck').show();
        }else{
            $('#spTypeQ').hide();
            $('#spType').hide();
            $('#spCheck').hide();
        }
    }

    submitForm();
    
</script>

<?= $this->endSection() ?>

