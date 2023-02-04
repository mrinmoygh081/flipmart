<?php

$price = $_POST['price'];
$gid = $_POST['gid'];
header("Location: ../category.php?gid=$gid&price=$price&page=1&sort=1&show=10");
?>