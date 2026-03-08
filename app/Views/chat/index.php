<!DOCTYPE html>
<html>
<head>

<title>Usuarios</title>

<style>

body{
font-family:Arial;
background:#ecf0f1;
}

.container{
width:400px;
margin:auto;
margin-top:50px;
background:white;
padding:20px;
border-radius:10px;
}

.user{
padding:10px;
border-bottom:1px solid #ccc;
}

.user a{
text-decoration:none;
color:#2c3e50;
font-weight:bold;
}

.top{
display:flex;
justify-content:space-between;
}

</style>

</head>

<body>

<div class="container">

<div class="top">

<h3>Usuarios</h3>

<a href="/logout">Cerrar sesión</a>

</div>

<hr>

<?php foreach($users as $u): ?>

<div class="user">

<a href="/chat/conversation/<?= $u['id'] ?>">

<?= $u['name'] ?>

</a>

</div>

<?php endforeach; ?>

</div>

</body>
</html>