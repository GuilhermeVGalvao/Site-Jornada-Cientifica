<?php

$a = $_REQUEST["senha"];

echo md5(base64_encode(md5(md5($a))));

echo "<br><br>";

echo md5($a);