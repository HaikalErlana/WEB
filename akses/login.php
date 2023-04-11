<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <!-- <h1>Login</h1>
    <form action="proses_login.php" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit" name="submit">Submit</button>
    </form> -->

    <div class="container">
        <form action="proses_login.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 600;">Login Page</p>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" placeholder="Username..." name="username">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" placeholder="Password..." name="password">
            </div>
            <div class="input-group">
            <button name="submit" class="btn">Login</button>
            <!-- <a href="#" class="link" onclick="location.href='../register.php'">Daftar</a>
            <a href="../" class="link">Kembali</a> -->
            </div>

        </form>
    </div>
</body>
</body>
</html>