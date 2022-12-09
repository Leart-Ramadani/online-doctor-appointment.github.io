<?php
include('../config.php');
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}
?>
<?php include('header.php') ?>
<title>Profili</title>
</head>

<body>

    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sidebar">
        <p class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white ">
            <span class="fs-4"><?php echo $_SESSION['admin'] ?></span>
        </p>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item"><a href="doktoret.php" class="nav-link text-white">Doktoret</a></li>
            <li><a href="departamentet.php" class="nav-link text-white">Departamentet</a></li>
            <li><a href="orari.php" class="nav-link text-white">Orari</a></li>
            <li><a href="terminet.php" class="nav-link text-white">Terminet</a></li>
            <li><a href="pacientat.php" class="nav-link text-white">Pacientat</a></li>
            <li><a href="historiaTerminit.php" class="nav-link text-white">Historia e termineve</a></li>
            <li class="nav-item"><a href="galeria.php" class="nav-link text-white">Galeria</a></li>
            <li><a href="ankesat.php" class="nav-link text-white">Ankesat</a></li>
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
    $username_err = $PassErr = $newPass_err = $confirmPass_err = '';
    $admin_user = $admin_pass = $admin_new_pass = '';
    if (isset($_POST['update'])) {
        $username = $_POST['username'];
        $actualPassword = $_POST['actualPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        $encPass = password_hash($confirmPassword, PASSWORD_DEFAULT);

        if (empty($_POST['username'])) {
            $username_err = 'Duhet te plotesoni username-in.';
            $invalid_username = 'is-invalid';
        } else {
            $username_err = '';
            $admin_user = $username;
        }

        if (empty($_POST['newPassword'])) {
            $newPass_err = 'Duhet te plotesoni fjalkalimin e ri.';
            $invalid_newPass = 'is-invalid';
        } else {
            $newPassword = $_POST['newPassword'];
            $newPass_err = '';
            $admin_new_pass = $newPassword;
        }

        if (empty($_POST['confirmPassword'])) {
            $confirmPass_err = 'Konfirmoni passwordin duhet plotesuar.';
            $invalid_confirmPass = 'is-invalid';
        } else {
            $confirmPassword = $_POST['confirmPassword'];
            $confirmPass_err = '';
        }


        if (empty($_POST['actualPassword'])) {
            $PassErr = '*Passwordi aktual duhet plotesuar.';
            $invalid_pass = 'is-invalid';
        } else {
            $actualPpassword = $_POST['actualPassword'];
            $admin_pass = $actualPassword;

            $PassErr = '';

            $check_pass = "SELECT password FROM admin_table";
            $check_pass_prep = $con->prepare($check_pass);
            $check_pass_prep->execute();
            $check_data = $check_pass_prep->fetch();

            if (password_verify($actualPassword, $check_data['password'])) {
                $PassErr = '';

                if ($newPass_err == '' && $confirmPass_err == '') {
                    if ($newPassword !== $confirmPassword) {
                        $confirmPass_err = 'Fjalkalimi nuk perputhet me fjalkalimin e ri.';
                        $invalid_confirmPass = 'is-invalid';
                    } else {
                        $confirmPass_err = '';
                        $encPass = password_hash($confirmPassword, PASSWORD_DEFAULT);

                        $sql = "UPDATE admin_table SET username=:username, password=:password";
                        $prep = $con->prepare($sql);
                        $prep->bindParam(':username', $username);
                        $prep->bindParam(':password', $encPass);
                        if($prep->execute()){
                            echo "<script>
                                alert('Te dhenat u perditsuan me sukses.');
                                window.location.replace('doktoret.php');
                            </script>";
                        }
                        
                    }
                }
            } else {
                $PassErr = 'Ky nuk eshte passwordi akutal. Ju lutem provojeni perseri.';
                $invalid_pass = 'is-invalid';
            }
        }
    }
    ?>

    <main class="text-center">
        <form method="POST" class="form-signin " enctype="multipart/form-data" autocomplete="off">
            <h1 class="h3 mb-3 fw-normal">Editoni te dhenat</h1>

            <div class="form-floating">
                <input type="text" class="form-control mb-2 w-100 <?= $invalid_username ?? '' ?>" id="floatingInput" name="username" placeholder="Username i ri" value="<?= $admin_user ?>">
                <label for="floatingInput">Username i ri</label>
                <span class="text-danger fw-normal"><?php echo $username_err; ?></span>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control rounded <?= $invalid_pass ?>" id="floatingPassword" name="actualPassword" placeholder="Passwordi aktual" value="<?= $admin_pass ?>">
                <label for="floatingPassword">Passwordi aktual</label>
                <span class="text-danger fw-normal"><?php echo $PassErr; ?></span>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control rounded <?= $invalid_newPass ?? '' ?>" id="floatingPassword" name="newPassword" placeholder="Passwordi i ri" value="<?= $admin_new_pass ?>">
                <label for="floatingPassword">Passwordi i ri</label>
                <span class="text-danger fw-normal"><?php echo $newPass_err; ?></span>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control rounded <?= $invalid_confirmPass ?? '' ?>" id="floatingPassword" name="confirmPassword" placeholder="Konfirmo passwordin">
                <label for="floatingPassword">Konfirmo passwordin</label>
                <span class="text-danger fw-normal"><?php echo $confirmPass_err; ?></span>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit" name="update">Editoni</button>
        </form>
    </main>



</body>

</html>