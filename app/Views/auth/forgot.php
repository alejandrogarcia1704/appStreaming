<!DOCTYPE html>
<html>
<head>

<title>Recuperar contraseña</title>

<style>

body{
font-family:Arial;
background:#16a085;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.container{
background:white;
padding:40px;
border-radius:10px;
width:300px;
text-align:center;
}

input{
width:100%;
padding:10px;
margin:10px 0;
border:1px solid #ccc;
border-radius:5px;
}

button{
width:100%;
padding:10px;
background:#e67e22;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#ca6f1e;
}

</style>

</head>

<body>

<div class="container">

<h2>Recuperar contraseña</h2>

<form method="post" action="/forgot">

<input type="email" name="email" placeholder="Correo" required>

<button>Enviar</button>

</form>

</div>

</body>
</html>