<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', 'xxxxxx');
define('DB', 'tecnologia');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');