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
  $premiados[0] = $apostaCtr->getPremiadas($resultado->get("data"), $resultado->get("sorteio1"), 0);
  $premiados[1] = $apostaCtr->getPremiadas($resultado->get("data"), $resultado->get("sorteio2"), 1);
  $premiados[2] = $apostaCtr->getPremiadas($resultado->get("data"), $resultado->get("sorteio3"), 2);
  $premiados[3] = $apostaCtr->getPremiadas($resultado->get("data"), $resultado->get("sorteio4"), 3);
  $premiados[4] = $apostaCtr->getPremiadas($resultado->get("data"), $resultado->get("sorteio5"), 4);
?>

<div class="panel panel-default">
  <div class="panel-heading">Resultado do dia <?php echo $resultado->get("data"); ?></div>
  <div class="panel-body">
    <a href="?a=sorteios.list">
      <button type="button" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-chevron-left"></span> Voltar
      </button>
    </a>
    <p>

    <?php
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
                      <th><center>Complemento</center></th>
                      <th><center>Tipo da Aposta</center></th>
                      <th><center>Valor da Aposta</center></th>
                      <th><center>Valor do Prêmio</center></th>
                    </tr>
                    <?php
                      foreach ($premio as $key => $value) {
                        $jogadorPremiado = $jogadorCtr->byId($value->get("jogador_id"));
                        echo '
                        <tr'.(($key%2)?(' bgcolor="#DCDCDC"'):("")).'>
                          <td><center>'.$jogadorPremiado->get("nome").'<center></td>
                          <td><center>'.$jogadorPremiado->get("cpf_cod").'<center></td>
                          <td><center>'.$jogadorPremiado->get("rua").",".$jogadorPremiado->get("bairro")." - ".$jogadorPremiado->get("estado").'<center></td>
                          <td><center>'.$jogadorPremiado->get("Complemento").'<center></td>
                          <td><center>'.$value->get("tipo_da_aposta").'<center></td>
                          <td><center>'.$value->get("valor").'<center></td>
                          <td><center>R$ '.$value->get("valor_do_premio").',00<center></td>
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
