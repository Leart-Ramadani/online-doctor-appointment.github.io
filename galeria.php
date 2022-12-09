<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="shortcut icon" href="./photos/icon-hospital.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../bootstrap-5.1.3-examples/sidebars/sidebars.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous" defer></script>
    <script src="../bootstrap-5.1.3-examples/sidebars/sidebars.js" defer></script>
    <!-- Swiper library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <!-- Lightbox library -->
    <link rel='stylesheet' type='text/css' media='screen' href='./css/lightbox.min.css'>
    <script src="./js/lightbox-plus-jquery.min.js"></script>
</head>

<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 text-white">Ballina</a></li>
                    <li><a href="galeria.php" class="nav-link px-2 text-secondary">Galeria</a></li>
                    <li><a href="./patientSide/rezervoTermin.php" class="nav-link px-2 text-white">Terminet</a></li>
                    <li><a href="./patientSide/ankesat.php" class="nav-link px-2 text-white">Ankesat</a></li>
                </ul>


                <div class="text-end">
                    <?php if (!isset($_SESSION['emri']) && !isset($_SESSION['mbiemri'])) { ?>
                        <a href="./patientSide/login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
                    <?php } else { ?>
                        <a href="./patientSide/logout.php"><button type="button" class="btn btn-outline-warning me-2">Log out</button></a>
                    <?php } ?>
                    <a href="./admin/login.php" target="_blank">
                        <img src="./photos/admin-64px.png" alt="Admin" width="40px" title="Admin Side">
                    </a>
                    <a href="./doctorSide/login.php" target="_blank">
                        <img class="bg-light rounded-pill ms-2" src="./photos/doctor-64px.png" alt="Doctor Side" width="40px" title="Doctor Side">
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <?php
            $sql = "SELECT * FROM galeria";
            $prep = $con->prepare($sql);
            $prep->execute();
            $data = $prep->fetchAll();
        ?>
        <article id="doctors_art">
            <h1>Galeria</h1> 
            <hr>

            <section id="gallery">
                <?php foreach($data as $data): ?>
                <a href="./admin/uploads_gallery/<?= $data['foto_src'] ?>" data-lightbox="mygallery">
                    <img src="./admin/uploads_gallery/<?= $data['foto_src'] ?>">
                </a>
                <?php endforeach; ?>
                <article id="biggerImage">
                    <img src="">
                </article>
            </section>

    </main>

</body>

<div class="container">
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Ballina</a></li>
            <li class="nav-item"><a href="galeria.php" class="nav-link px-2 text-muted">Galeria</a></li>
            <li class="nav-item"><a href="./patientSide/rezervoTermin.php" class="nav-link px-2 text-muted">Terminet</a></li>
            <li class="nav-item"><a href="./patientSide/ankesat.php" class="nav-link px-2 text-muted">Ankesat</a></li>
        </ul>
        <p class="text-center text-muted">&copy; Programmer, Leart Ramadani.</p>
    </footer>
</div>

</html>