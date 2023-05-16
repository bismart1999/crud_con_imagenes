<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/slyle_login.css">
  <title>Login</title>
</head>
<body>
<div class="container">
    <div class="logo">ADMINISTRADOR</div>
    <div class="login-item">
      <form action="validar_login.php" method="post" class="form form-login">
        <div class="form-field">
          <label class="user" for="login-username"><span class="hidden">Username</span></label>
          <input name ="usuario" id="login-username" type="text" class="form-input" placeholder="Username" required>
        </div>

        <div class="form-field">
          <label class="lock" for="login-password"><span class="hidden">Password</span></label>
          <input name ="contraseña" id="login-password" type="password" class="form-input" placeholder="Password" required>
        </div>

        <div class="form-field">
          <input type="submit" value="Log in">
        </div>
      </form>
    </div>
</div>
</body>
</html>