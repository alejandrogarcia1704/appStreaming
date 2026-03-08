<h2>Usuarios</h2>

<?php foreach($users as $u): ?>

<a href="/chat/conversation/<?= $u['id'] ?>">
<?= $u['name'] ?>
</a>
<br>

<?php endforeach; ?>