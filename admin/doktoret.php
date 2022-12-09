 <?php
    include('../config.php');
    if (!isset($_SESSION['admin'])) {
        header("Location: login.php");
    }
    ?>
 <?php include('header.php') ?>
 <title>Doktoret</title>
 </head>

 <body>
     <?php
        $nameErr = $surnameErr = $departamentErr = $genderErr = $emailErr = $photoErr = $phoneErr = $bioErr  = $userErr = $passErr = "";
        $name = $lastName = $personalNumber = $gender = $userEmail = $biografia = $phone = $user1 = "";

        if (isset($_POST['regjistro'])) {

            function testInput($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if (empty($_POST['name'])) {
                $nameErr = '*Emri duhet plotesuar.';
                $invalid_name = 'is-invalid';
            } else {
                $emri = testInput($_POST['name']);
                if (!preg_match("/^[a-zA-z]*$/", $emri)) {
                    $nameErr = '*Nuk lejohen karaktere tjera perveq shkronjave.';
                    $invalid_name = 'is-invalid';
                } else {
                    $nameErr = '';
                    $name = $emri;
                }
            }

            if (empty($_POST['surname'])) {
                $surnameErr = '*Mbiemri duhet plotesuar.';
                $invalid_surname = 'is-invalid';
            } else {
                $mbiemri = testInput($_POST['surname']);
                if (!preg_match("/^[a-zA-z]*$/", $mbiemri)) {
                    $surnameErr = '*Nuk lejohen karaktere tjera perveq shkronjave.';
                    $invalid_surname = 'is-invalid';
                } else {
                    $surnameErr = '';
                    $lastName = $mbiemri;
                }
            }

            if (empty($_POST['departament'])) {
                $departamentErr = '*Duhet te zgjidhni nje departament.';
                $invalid_dep = 'is-invalid';
            } else {
                $departamenti = $_POST['departament'];
                $dep = $departamenti;
            }

            if (!isset($_POST['gender'])) {
                $genderErr = '*Gjinia duhet zgjedhur';
            } else {
                $gjinia = testInput($_POST['gender']);
                $genderErr = '';
            }

            if (empty($_POST['email'])) {
                $emailErr = '*Email duhet plotesuar.';
                $invalid_email = 'is-invalid';
            } else {
                $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
                $email = testInput($_POST['email']);
                if (!preg_match($pattern, $email)) {
                    $emailErr = '*Email adresa e mesiperme nuk eshte valide.';
                    $invalid_email = 'is-invalid';
                } else {
                    $userEmail = $email;
                    $emailErr = '';
                }
            }


            if (isset($_POST['my_image']) && empty($_POST['my_image'])) {
                $photoErr = '*Duhet te shtoni nje foto te personit ne fjale.';
                $invalid_photo = 'is-invalid';
            } else {
                $photoErr = '';
                $img_name = $_FILES['my_image']['name'];
                $img_size = $_FILES['my_image']['size'];
                $tmp_name = $_FILES['my_image']['tmp_name'];
                $error = $_FILES['my_image']['error'];

                if ($error === 0) {
                    $photoErr = '';
                    if ($img_size > 12500000) {
                        $photo_err = "*Ky file eshte shume i madh.";
                        $invalid_photo = 'is-invalid';
                    } else {
                        $photoErr = '';
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);

                        $allowed_exs = array("jpg", "jpeg", "png", "gif", "webp");

                        if (in_array($img_ex_lc, $allowed_exs)) {
                            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                            $img_upload_path = 'uploads/' . $new_img_name;
                            move_uploaded_file($tmp_name, $img_upload_path);
                        } else {
                            $photoErr = "*Ky format nuk eshte valid. <br> Formatet e lejuara(jpg, jpeg, png, gif, webp).";
                            $invalid_photo = 'is-invalid';
                        }
                    }
                } else {
                    $photoErr = "*Eshte shfaqur nje gabim i panjohur!";
                    $invalid_photo = 'is-invalid';
                }
            }

            if (empty($_POST['phone'])) {
                $phoneErr = '*Telefoni duhet plotesuar.';
                $invalid_phone = 'is-invalid';
            } else {
                $tel = testInput($_POST['phone']);
                if (!preg_match('/^[0-9]{9}+$/', $tel)) {
                    $phoneErr = '*Numri i telefonit i mesiperm nuk eshte valid.';
                    $invalid_phone = 'is-invalid';
                } else {
                    $phoneErr = '';
                    $phone = $tel;
                }
            }


            if (empty($_POST['docBio'])) {
                $bioErr = '*Biografia duhet plotesuar.';
                $invalid_bio = 'is-invalid';
            } else {
                $bio = testInput($_POST['docBio']);
                $bioErr = '';
                $biografia = $bio;
            }

            if (empty($_POST['username'])) {
                $userErr = '*Username duhet plotesuar.';
                $invalid_user = 'is-invalid';
            } else {
                $username = testInput($_POST['username']);
                $userErr = '';
                $user1 = $username;
            }

            if (empty($_POST['password'])) {
                $passErr = '*Password duhet plotesuar.';
                $invalid_pass = 'is-invalid';
            } else {
                $password = testInput($_POST['password']);
                $passErr = '';
                $encPass = password_hash($password, PASSWORD_DEFAULT);
            }

            if (
                $nameErr == '' && $surnameErr == '' && $departamentErr == '' && $genderErr == '' && $emailErr == '' && $photoErr == ''
                && $phoneErr == '' && $bioErr == '' && $userErr == '' && $passErr == ''
            ) {

                $fullName = $emri . ' ' . $mbiemri;


                $sql = "INSERT INTO doctor_personal_info(fullName, departamenti, gjinia, email, biografia, foto, telefoni, username, password)
                        VALUES(:fullName, :departamenti, :gjinia, :email, :biografia, :foto, :telefoni, :username, :password)";
                $stm = $con->prepare($sql);
                $stm->bindParam(':fullName', $fullName);
                $stm->bindParam(':departamenti', $departamenti);
                $stm->bindParam(':gjinia', $gjinia);
                $stm->bindParam(':email', $email);
                $stm->bindParam(':biografia', $bio);
                $stm->bindParam(':foto', $new_img_name);
                $stm->bindParam(':telefoni', $tel);
                $stm->bindParam(':username', $username);
                $stm->bindParam(':password', $encPass);
                $stm->execute();
                $name = $lastName = $personalNumber = $gender = $userEmail = $biografia = $phone = $user1 = "";
            }
        }

        ?>

     <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sidebar">
         <p class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
             <span class="fs-4"><?php echo $_SESSION['admin'] ?></span>
         </p>
         <hr>
         <ul class="nav nav-pills flex-column mb-auto">
             <li class="nav-item"><a href="doktoret.php" class="nav-link active" aria-current="page">Doktoret</a></li>
             <li><a href="departamentet.php" class="nav-link text-white">Departamentet</a></li>
             <li><a href="orari.php" class="nav-link text-white">Orari</a></li>
             <li><a href="terminet.php" class="nav-link text-white">Terminet</a></li>
             <li><a href="pacientat.php"" class=" nav-link text-white">Pacientat</a></li>
             <li><a href="historiaTerminit.php" class="nav-link text-white">Historia e termineve</a></li>
             <li class="nav-item"><a href="galeria.php" class="nav-link text-white">Galeria</a></li>
             <li><a href="ankesat.php" class="nav-link text-white">Ankesat</a></li>
             <li><a href="kerkesatAnulimit.php" class="nav-link text-white">Kerkesat e anulimit te termineve</a></li>
         </ul>
         <hr>
         <div class="dropdown">
             <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                 <img src="https://w7.pngwing.com/pngs/200/420/png-transparent-user-profile-computer-icons-overview-rectangle-black-data-thumbnail.png" alt="" width="32" height="32" class="rounded-circle me-2">
                 <strong><?php echo $_SESSION['admin'] ?></strong>
             </a>
             <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                 <li><a class="dropdown-item" href="profili.php">Profile</a></li>
                 <li>
                     <hr class="dropdown-divider">
                 </li>
                 <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
             </ul>
         </div>
     </div>

     <?php
        $sql = "SELECT * FROM departamentet";
        $stm = $con->prepare($sql);
        $stm->execute();
        $data = $stm->fetchAll();
        ?>

     <main class="form-signin text-center main_side">
         <form method="POST" enctype="multipart/form-data" autocomplete="off">
             <h1 class="h3 mb-3 fw-normal">Regjistroni nje doktor</h1>

             <div class="form-floating">
                 <input type="text" class="form-control <?= $invalid_name ?? "" ?>" id="floatingInput" name="name" placeholder="Emri" value="<?= $name; ?>">
                 <label for="floatingInput">Emri</label>
                 <span class="text-danger fw-normal"><?php echo $nameErr; ?></span>
             </div>

             <div class="form-floating">
                 <input type="text" class="form-control mt-2 <?= $invalid_surname ?? "" ?>" id="floatingInput" name="surname" placeholder="Mbiemri" value="<?= $lastName; ?>">
                 <label for="floatingInput">Mbiemri</label>
                 <span class="text-danger fw-normal"><?php echo $surnameErr; ?></span>
             </div>

             <div>
                 <select class="form-select <?= $invalid_dep ?? "" ?> mt-2" aria-label="Default select example" name="departament">
                     <option value="">Zgjidhni nje departament</option>
                     <?php foreach ($data as $data) : ?>
                         <option value="<?= $data['departamenti'] ?>"><?= $data['departamenti'] ?></option>
                     <?php endforeach; ?>
                 </select>
                 <span class="text-danger fw-normal"><?php echo $departamentErr; ?></span>
             </div>

             <div class="form-check form-check-inline mt-2">
                 <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Mashkull">
                 <label class="form-check-label" for="inlineRadio1">Mashkull</label>
             </div>

             <div class="form-check form-check-inline mt-2">
                 <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Femer">
                 <label class="form-check-label" for="inlineRadio2">Femer</label>
             </div> <br>
             <span class="text-danger fw-normal"><?php echo $genderErr; ?></span>

             <div class="form-floating">
                 <input type="email" class="form-control mt-2 <?= $invalid_email ?? "" ?>" id="floatingInput" name="email" placeholder="name@example.com" value="<?= $userEmail; ?>">
                 <label for="floatingInput">Email adresa</label>
                 <span class="text-danger fw-normal"><?php echo $emailErr; ?></span>
             </div>

             <div class="mb-3">
                 <label for="formFile" class="form-label mt-2">Foto</label>
                 <input class="form-control <?= $invalid_photo ?? "" ?>" type="file" name="my_image" id="formFile">
                 <span class="text-danger fw-normal"><?php echo $photoErr; ?></span>
             </div>

             <div class="form-floating">
                 <input type="tel" class="form-control mt-2 <?= $invalid_phone ?? "" ?>" id="floatingInput" name="phone" placeholder="Telefoni" value="<?= $phone; ?>">
                 <label for="floatingInput">Telefoni</label>
                 <span class="text-danger fw-normal"><?php echo $phoneErr; ?></span>
             </div>

             <div class="mb-3">
                 <label for="biografia" class="form-label mt-2">Biografia personale</label>
                 <textarea class="form-control <?= $invalid_bio ?? "" ?>" id="biografia" rows="4" maxlength="250" name="docBio"><?= $biografia; ?></textarea>
                 <span class="text-danger fw-normal"><?php echo $bioErr; ?></span>
             </div>

             <div class="form-floating">
                 <input type="text" class="form-control mt-2 <?= $invalid_user ?? "" ?>" id="floatingInput" name="username" placeholder="Username" value="<?= $user1; ?>">
                 <label for="floatingInput">Username</label>
                 <span class="text-danger fw-normal"><?php echo $userErr; ?></span>
             </div>

             <div class="form-floating">
                 <input type="password" class="form-control mt-2 <?= $invalid_pass ?? "" ?>" id="floatingPassword" name="password" placeholder="Password">
                 <label for="floatingPassword">Password</label>
                 <span class="text-danger fw-normal"><?php echo $passErr; ?></span>
             </div>

             <button class="w-100 btn btn-lg btn-primary" type="submit" name="regjistro">Regjistrohuni</button>
         </form>



     </main>


     <?php
        $sql = "SELECT * FROM doctor_personal_info";
        $stm = $con->prepare($sql);
        $stm->execute();
        $data = $stm->fetchAll();

        if (!$data) {
            $empty = 'empty';
        } else {
            $empty = '';
        }
        ?>

     <?php if ($empty == '') : ?>
         <table class="table table-striped">
             <thead>
                 <tr>
                     <th scope="col">Foto</th>
                     <th scope="col">Doktori</th>
                     <th scope="col">Departamenti</th>
                     <th scope="col">Gjinia</th>
                     <th scope="col">Email</th>
                     <th scope="col">Biografia</th>
                     <th scope="col">Telefoni</th>
                     <th scope="col">Username</th>
                     <th scope="col">Aksioni</th>
                 </tr>
             </thead>
             <tbody>
                 <?php foreach ($data as $data) : ?>
                     <tr>
                         <td class="p-0 m-0"><img src="uploads/<?= $data['foto'] ?>"></td>
                         <td><?= $data['fullName'] ?></td>
                         <td><?= $data['departamenti'] ?></td>
                         <td><?= $data['gjinia'] ?></td>
                         <td><?= $data['email'] ?></td>
                         <td><?= $data['biografia'] ?></td>
                         <td><?= $data['telefoni'] ?></td>
                         <td><?= $data['username'] ?></td>
                         <td>
                             <a class="text-decoration-none text-white" href="editUser.php?id=<?= $data['id']  ?>"><button class="btn btn-warning w-100 p-1 mb-2 text-white">Edit</button></a>
                             <a class="text-decoration-none text-white" href="deleteUser.php?id=<?= $data['id']  ?>"><button class="btn btn-danger w-100 p-1 text-white">Delete</button></a>
                         </td>
                     </tr>
                 <?php endforeach; ?>
             </tbody>
         </table>

     <?php endif; ?>

 </body>

 </html>