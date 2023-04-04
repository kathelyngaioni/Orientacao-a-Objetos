<?php

require_once 'src/Conta.php';

$primeiraConta = new Conta('123.456.789-10','João da Silva');

var_dump($primeiraConta);
echo Conta::numeroContas() . PHP_EOL;