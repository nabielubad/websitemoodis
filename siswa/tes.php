<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="../dist/stylelogin.css" />
    <link rel="icon" href="../assets/img/icon.png" />
    <title>Login Siswa Moodis</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="" method="POST">
                <h2 class="regis">Registrasi</h2>
                <div class="social-icons"></div>
                <input type="text" pattern="[0-9]{5}" title="NISN harus terdiri dari 5 angka" class="form-control"
                    id="nisn" name="nisn" placeholder="NISN" required />
                <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                    value="<?php echo $username?>" required />
                <input type="password" required class="form-control" id="password" name="password"
                    placeholder="Password" />

                <button type="submit" name="registrasi">Registrasi</button>


            </form>
        </div>
        <div class="form-container sign-in">
            <form action="" method="POST">
                <h1>Login Siswa</h1>
                <div class="social-icons"></div>
                <span></span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                    value="<?php echo $username?>" required />
                <input type="password" required class="form-control" id="password" name="password"
                    placeholder="Password" />
                <a href="https://wa.me/+6287898980341" target="blank">Lupa Password?</a>
                <button type="submit" name="Login">Login</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Hallo!</h1>
                    <p>Login Untuk Laporkan!</p>
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hallo!</h1>
                    <p>Belum Punya Akun?</p>
                    <button class="hidden" id="register">Registrasi</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    const container = document.getElementById("container");
    const registerBtn = document.getElementById("register");
    const loginBtn = document.getElementById("login");

    registerBtn.addEventListener("click", () => {
        container.classList.add("active");
    });

    loginBtn.addEventListener("click", () => {
        container.classList.remove("active");
    });
    </script>
</body>

</html>