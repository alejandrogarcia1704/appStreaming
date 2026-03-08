<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<title>Login</title>

<style>

body{
font-family: Arial;
background:#f4f4f4;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.login-box{
background:white;
padding:30px;
border-radius:10px;
width:300px;
box-shadow:0 0 10px rgba(0,0,0,0.1);
}

input{
width:100%;
padding:10px;
margin-top:10px;
}

button{
width:100%;
padding:10px;
margin-top:15px;
background:#007BFF;
color:white;
border:none;
cursor:pointer;
}

a{
display:block;
margin-top:10px;
text-align:center;
}

.error{
color:red;
text-align:center;
}

</style>

</head>

<body>

<div class="login-box">

<h2>Login</h2>

<?php if(isset($error)): ?>

<p class="error"><?= $error ?></p>

<?php endif; ?>

<form method="post" action="/login">

<?= csrf_field() ?>

<input type="email" name="email" placeholder="Correo" required>

<input type="password" name="password" placeholder="Contraseña" required>

<button type="submit">Iniciar sesión</button>

</form>

<a href="/register">Registrarse</a>

<a href="/forgot">¿Olvidaste tu contraseña?</a>

</div>

</body>
</html>