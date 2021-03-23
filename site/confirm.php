<?php
require('function.php');

$add = $pdo->prepare('insert into articles values(NULL, ?, ?, ?)');
$add->execute([$_SESSION['title'], $_SESSION['body'], date('Y/m/d')]);

$_SESSION = [];

header('Location:http://localhost:8080/plactis/site/index.php');
?>