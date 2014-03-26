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

  for($i = 0 ; $i < 5 ; $i++)
    $premiados[$i] = $apostaCtr->getPremiadas($resultado->get("data"), $resultado->get("sorteio1"), $i);
  
  $arrecadacaoTotal = $db->select("aposta", "data = '".$resultado->get("data")."'", "","sum(valor)");
  $arrecadacaoTotal = ($arrecadacaoTotal[0]["sum"])?($arrecadacaoTotal[0]["sum"]):(0);

  $totalDePremiosDistribuidos = 0;
  foreach ($premiados as $key => $premio) {
    foreach ($premio as $key => $value) {
      $totalDePremiosDistribuidos += $value->get("valor_do_premio");
    }
  }
?>
<a href="?a=sorteios.list">
  <button type="button" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-chevron-left"></span> Voltar
  </button>
</a>
<p>
<div class="panel panel-default">
  <div class="panel-heading hdefault">Dados da corrida</div>
    <table class="table">
      <tr>
        <th><center>Arrecadação</center></th>
        <th><center>Total em Prêmios</center></th>
        <th><center>Apostas Pagas</center></th>
        <th><center>Apostas a pagar</center></th>
      </tr>
      <tr>
        <td><center><?php echo "R$ ".$arrecadacaoTotal.",00"; ?></center></td>
        <td><center><?php echo "R$ ".$totalDePremiosDistribuidos.",00"; ?></center></td>
        <td><center><a href=<?php echo "'?a=pagas&id=".$_GET['id']."'"?>>Visualizar</a></center></td>
        <td><center><a href=<?php echo "'?a=a_pagar&id=".$_GET['id']."'"?>>Visualizar</a></center></td>
      </tr>
    </table>
  <div class="panel-body">
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Resultado do dia <?php echo $resultado->get("data"); ?></div>
  <div class="panel-body">
    <?php
      $ok = '<span class="glyphicon glyphicon-ok"></span>';
      $notOk = '<span class="glyphicon glyphicon-remove"></span>';
      foreach ($premiados as $key => $premio) { ?>
        <div class="panel panel-default">
          <div class="panel-heading hdefault">Vencedor(es) do <?php echo ($key+1).'º' ?> Sorteio</div>
          <div class="panel-body">
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
                      <th><center>Pago</center></th>
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
                          <td><center>'.$pago.'<center></td>
                        </tr>
                        ';
                      }
                    ?>
            </table>
            <?php 
            }else echo "<strong>Não há vencedores no ".($key+1)."º Sorteio</strong>";?>
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
