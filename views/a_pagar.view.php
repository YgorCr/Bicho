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

  if(!$admin)
    header("location:?a=home");

  $resultadosCtr = new ResultadosController($db);
  $apostaCtr = new ApostaController($db);
  $jogadorCtr = new JogadorController($db);
  $resultado = $resultadosCtr->byId($_GET["id"]);
  $premiados = array();
  $premiados[0] = array();

  for($i = 0 ; $i < 5 ; $i++)
    $premiados[0] = array_merge($premiados[0],$apostaCtr->getPremiadasNaoPagas($resultado->get("data"), $resultado->get("sorteio1"), $i));
  
  $arrecadacaoTotal = $db->select("aposta", "data = '".$resultado->get("data")."'", "","sum(valor)");
  $arrecadacaoTotal = ($arrecadacaoTotal[0]["sum"])?($arrecadacaoTotal[0]["sum"]):(0);

  $totalDePremiosDistribuidos = 0;
  foreach ($premiados as $key => $premio) {
    foreach ($premio as $key => $value) {
      $totalDePremiosDistribuidos += $value->get("valor_do_premio");
    }
  }
?>
<a href=<?php echo "?a=resultado&id=".$_GET["id"]?>>
  <button type="button" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-chevron-left"></span> Voltar
  </button>
</a>
<p>

<div class="panel panel-default">
  <div class="panel-heading">Vencedores do dia <?php echo $resultado->get("data"); ?> (NÃO PAGOS)</div>
  <div class="panel-body">
    <?php
      $ok = '<span class="glyphicon glyphicon-ok"></span>';
      $notOk = '<span class="glyphicon glyphicon-remove"></span>';
      foreach ($premiados as $key => $premio) { ?>
            <?php 
            if(count($premio) != 0){?>
              <table class="table">
                    <tr>
                      <th><center>Nome</center></th>
                      <th><center>CPF</center></th>
                      <th><center>Endereço</center></th>
                      <th><center>Tipo da Aposta</center></th>
                      <th><center>Valor da Aposta</center></th>
                      <th><center>Valor do Prêmio</center></th>
                      <th><center>Pagar</center></th>
                    </tr>
                    <?php
                      foreach ($premio as $key => $value) {
                        $jogadorPremiado = $jogadorCtr->byId($value->get("jogador_id"));
                        $pago = ($value->get("pago"))?($ok):($notOk);
                        echo '
                        <tr'.(($key%2)?(' bgcolor="#DCDCDC"'):("")).'>
                          <td><center>'.$jogadorPremiado->get("nome").'<center></td>
                          <td><center>'.$jogadorPremiado->get("cpf_cod").'<center></td>
                          <td><center>'.$jogadorPremiado->get("rua").",".$jogadorPremiado->get("bairro")." - ".$jogadorPremiado->get("estado").'<center></td>
                          <td><center>'.$value->get("tipo_da_aposta").'<center></td>
                          <td><center>R$ '.$value->get("valor").',00<center></td>
                          <td><center>R$ '.$value->get("valor_do_premio").',00<center></td>
                          <td><center><a href="?a=pagar&apostaid='.$value->get("id").'&id='.$_GET["id"].'">PAGAR</a><center></td>
                        </tr>
                        ';
                      }
                    ?>
            </table>
            <?php 
            }else echo "<strong>Não há vencedores não pagos.</strong>";?>
          </div>
        </div>
    <?php 
      } ?>
  </div>
</div>

<?php

// arquivo comum para o final das páginas
include("footer.php");

?>
