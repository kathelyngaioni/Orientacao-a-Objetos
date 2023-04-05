<?php

require_once 'src/Conta.php';

$cpf = new Cpf('123.456.789-10');
$titular = new Titular($cpf,'João da Silva');
$primeiraConta = new Conta($titular);

var_dump($primeiraConta);
echo Conta::numeroContas() . PHP_EOL;