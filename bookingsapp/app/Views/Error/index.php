<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Login<?= $this->endSection() ?>

<?= $this->section("headLinks") ?>
    

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" typte="text/css" href="/css/error.css">


<?= $this->endSection() ?>

<?= $this->section("headStyle") ?>

<?= $this->endSection() ?>

<?= $this->section("content") ?>


<body>
        <div class="container">
            <div class="jumbotron">
                <h1>Oops!</h1>
                <p id="errorMessage"><?= esc($message) ?></p>
                <a href="/register">Try Again</a>
            </div>
        </div>
    </body>


<?= $this->endSection() ?>

<?= $this->section("footerLinks") ?>
<script>

    
</script>

<?= $this->endSection() ?>

