<?php

  // arquivo comum para o cabeçalho das páginas
  include("header.php");

  function formataData($data, $toDB)
  {
    if($toDB)
      return implode("-", array_reverse(explode("/", $data)));
    else
      return implode("/", array_reverse(explode("-", $data)));
  }

  if(!$jogador)
    header("location:?a=jogador");

  $apostaCtr = new ApostaController($db);
  $apostas = $apostaCtr->byJogador($jogador);
?>

<div class="panel panel-default">
  <div class="panel-heading"><?php echo $jogador->get("nome"); ?></div>
  <div class="panel-body">
    <a href="?a=logout">
      <button type="button" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-off"></span> Sair
      </button>
    </a>

    <p>

    <div class="panel panel-default">
      <div class="panel-heading hdefault">Minhas apostas</div>
      <div class="panel-body">
        <table class="table">
          <tr>
            <th><center>Data da aposta</center></th>
            <th><center>Tipo da aposta</center></th>
            <th><center>Numero apostado</center></th>
            <th><center>Forma de pagamento</center></th>
            <th><center>Concorrendo no</center></th>
            <th><center>Valor</center></th>
          </tr>
          <?php
            foreach ($apostas as $key => $value) {
              echo '
              <tr'.(($key%2)?(' bgcolor="#DCDCDC"'):("")).'>
                <td><center>'.$value->get("data").'<center></td>
                <td><center>'.$value->get("tipo_da_aposta").'<center></td>
                <td><center>'.$value->get("aposta").'<center></td>
                <td><center>'.$value->get("forma_de_pagamento").'<center></td>
                <td><center>'.$value->get("sorteio").'<center></td>
                <td><center>'.$value->get("valor").'<center></td>
              </tr>
              ';
            }
          ?>
      </table>
      </div>
    </div>
  </div>
</div>

<?php

// arquivo comum para o final das páginas
include("footer.php");

?>
