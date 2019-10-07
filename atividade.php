<form action="index.php" name="imc" method="POST">
Informe seu nome: <input type="text" name="nome"> <br>
Informe sua data de nascimento: <input type="date" name="data_nascimento"><br>
Informe seu peso: <input type="float" size="3" name="peso"><br>
Informe sua altura: <input type="float" size="3" name="altura"><br>
Informe seu CPF: <input type="int" size="11" name="cpf"><br>
<input type="submit" value="Calcular IMC"><br>
<input type="submit" value="Calcular idade"><br>
</form>

<?php

class imc{
public $peso = $_POST['peso'];
public $altura = $_POST['altura'];
public $massa =  $peso / $altura; 
function __construct($peso, $altura, $massa)
{$this->peso = $peso;
$this->altura = $altura;
$this->massa = $massa;
}

function getimc()
{
return "{$this->peso}"."{$this->altura}";
}
}
$imc =  new imc($peso,$massa,$altura);
if ($massa<20) {
 $mensagem = "Voce esta abaixo do peso";
}

if (($massa=20)&&($massa<25)) {
$mensagem = "Voce esta com o peso ideal";
}

else {
$mensagem = "Voce esta acima do peso";
}

echo "$mensagem";
echo "Seu IMC é de $massa.";
class age{

public $bdate = $_POST['data_nascimento'];
public $hoje = mktime (date('m'), date('d'), date('y'));
public $idade = floor($bdate - $hoje);
function __construct($bdate, $hoje, $idade)
{
 $this->bdate = $bdate;
 $this->hoje = $hoje;
 $this->idade = $idade;   
}
function getage()
{
return "{$this->idade}";
}
}
$age = new age($bdate, $hoje, $idade);

echo "Sua idade é $idade";

function validaCPF($cpf) {
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        if (strlen($cpf) != 11) {
        return false;
       }
       if (preg_match('/(\d)\1{10}/', $cpf)) {
           return false;
       }
       for ($t = 9; $t < 11; $t++) {
       for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
           }
           $d = ((10 * $d) % 11) % 10;
           if ($cpf{$c} != $d) {
               return false;
           }
       }
       return true;
   
   }
   

?>