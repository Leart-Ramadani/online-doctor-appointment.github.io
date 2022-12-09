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
</head>

<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 text-secondary">Ballina</a></li>
                    <li><a href="galeria.php" class="nav-link px-2 text-white">Galeria</a></li>
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

    <?php
    $sql = "SELECT * FROM doctor_personal_info";
    $prep = $con->prepare($sql);
    $prep->execute();
    $data = $prep->fetchAll();
    ?>
    <main>
        <article class="blog_container">
            <img class="img" src="photos/blog.jpg">
            <div class="blog_des">
                <h1 class="fw-bold">Ne kujdesemi per shendetin tuaj</h1>
                <p class="fs-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices <br>
                tincidunt rutrum. Ut maximus malesuada neque.</p>
                <a href="./patientSide/rezervoTermin.php"><button class="btn btn-outline-primary " type="button">Rezervo termin</button></a>
            </div>
        </article>

        <article id="doctors_art">
            <h1 class="personeli_h1">Personeli shëndetësor</h1>
            <hr>
        </article>
        <div #swiperRef="" class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php foreach ($data as $data) : ?>
                    <div id="doctor1" class="swiper-slide">
                        <img class="doc_img" src="./admin/uploads/<?= $data['foto'] ?>" alt="Kardiolog" width="200px !improtant">
                        <h1 class="doc_name"><?= $data['fullName'] ?></h1>
                        <h4 class="doc_prof"><?= $data['departamenti'] ?></h4>
                        <p class="bio"><?= $data['biografia'] ?></p>
                        <a class="text-decoration-none text-white" href="./patientSide/shikoProfilin.php?id=<?= $data['id'] ?>"><button class="btn btn-primary mt-3 p-2 fs-5 w-100 fw-normal" name="view">Shiko me shume</button></a>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>


        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>


        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 4,
                centeredSlides: true,
                spaceBetween: 100,
                pagination: {
                    el: ".swiper-pagination",
                    type: "fraction",
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                }
            });
        </script>


        <article id="doctors_art">
            <h1 class="personeli_h1">Lokacioni</h1>
            <hr>
        </article>
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="700" 
                    height="500" 
                    id="gmap_canvas" 
                    src="https://maps.google.com/maps?q=qkuk&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                    frameborder="0" 
                    scrolling="no" 
                    marginheight="0"
                    marginwidth="0">
                </iframe>
            </div>
        </div>

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
    <p class="text-center text-muted"> Programmer, Leart Ramadani.</p>
  </footer>
</div>

</html>