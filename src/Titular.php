<?php

require_once 'Cpf.php';

class Titular {
  private string $nome;
  private Cpf $cpf;
  
  public function __construct(Cpf $cpf, string $nome)
  {
    $this->cpf = $cpf;
    $this->nome = $nome;
  }
  
  public function recuperaNome()
  {
    return $this->nome;
  }
  
  public function recuperaCpf()
  {
    return $this->cpf->recuperaCpf();
  }
}
?>