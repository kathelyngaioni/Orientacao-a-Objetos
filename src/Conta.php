<?php

//Membros estáticos são membros de uma classe em si e não de uma instância
//da classe.

class Conta
{
    private string $cpfTitular;
    private string $nomeTitular;
    private float $saldo;
    private static $numeroDeContas = 0;

    public function __construct (string $cpfTitular, string $nomeTitular) {
     $this->cpfTitular = $cpfTitular;
     $this->nomeTitular = $nomeTitular;
     $this->saldo = 0;
     //self::$numeroDeContas++;
     Conta::$numeroDeContas++; //static
    }

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


    public function recuperaCpfTitular(): string
    {
        return $this->cpfTitular;
    }

    public function recuperaNomeTitular(): string
    {
        return $this->nomeTitular;
    }
}