<!DOCTYPE html>
<html>
<head>
    <title>Cafe Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<section class="hero">
    <div>
        <h1>CAFE DIGITAL</h1>
        <p class="lead">Modern Coffee • Digital Workspace • Chill Place</p>

        <a href="menu.php" class="btn btn-custom btn-lg mt-3">
            Lihat Menu
        </a>
    </div>
</section>

<div class="container py-5">
    <div class="row text-center">

        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white p-4">
                <h3>Fast Wifi</h3>
                <p>Cocok untuk kerja, kuliah, dan nongkrong.</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white p-4">
                <h3>Premium Coffee</h3>
                <p>Kopi pilihan dengan cita rasa modern.</p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white p-4">
                <h3>Cozy Place</h3>
                <p>Tempat nyaman untuk semua aktivitas.</p>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
