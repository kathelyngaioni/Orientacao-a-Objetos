<?php

 require_once 'Titular.php';
//Membros estáticos são membros de uma classe em si e não de uma instância
//da classe.

class Conta
{
    //composição de objetos
    private Titular $titular;
    private float $saldo = 0;
    private static $numeroDeContas = 0;

    public function __construct (Titular $titular)
    {
      $this->titular = $titular;
      
     //self::$numeroDeContas++;
     Conta::$numeroDeContas++; //static
    }

    public function __destruct(){}
  
    public static function numeroContas() : int
    {
      //outra opção
      //return self::$numeroDeContas;
      return Conta::$numeroDeContas;
    }
  
    public function saca(float $valorASacar): void
    {
        if ($valorASacar > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->saldo -= $valorASacar;
    }

    public function deposita(float $valorADepositar): void
    {
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }

        $this->saldo += $valorADepositar;
    }

    public function transfere(float $valorATransferir, Conta $contaDestino): void
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->saca($valorATransferir);
        $contaDestino->deposita($valorATransferir);
    }

    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }

  //titular
  public function recuperaNomeTitular()
  {
    return $this->titular->recuperaNome();
  }
  
  public function recuperaCpfTitular()
  {
    return $this->titular->recuperaCpf();
  }
}
