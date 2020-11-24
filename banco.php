<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Conta\Conta;

$endereco = new Endereco('Petrópolis', 'bairro', 'rua', '71B');
$vinicius = new Titular(new CPF('675.224.787-12'), 'Vinicius Dias', $endereco);
try {
    $primeiraConta = new Alura\Banco\Modelo\Conta\ContaCorrente($vinicius);
} catch (Error $e) {
    echo "Erro pego: " . $e->getMessage();
}
$primeiraConta->deposita(500);
$primeiraConta->saca(300);

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$patricia = new Titular(new CPF('354.854.958-58'), 'Patricia', $endereco);
$segundaConta = new Alura\Banco\Modelo\Conta\ContaCorrenteConta($patricia);
var_dump($segundaConta);

$outroEndereco = new Endereco('cidade', 'outro bairro', 'outra rua', '857A');
$outra = new ContaAlura\Banco\Modelo\Conta\ContaCorrente(new Titular(new CPF('346.852.021-97'), 'Ana', $outroEndereco));
unset($segundaConta);
echo Conta::recuperaNumeroDeContas();
