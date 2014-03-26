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

  $resuCtr = new ResultadosController($db);
  $resultadoHoje = $resuCtr->byData(date('Y-m-d'));
  $resultadoHisto = $resuCtr->byDataExcept(date('Y-m-d'));
?>

<div class="panel panel-default">
  <div class="panel-heading">Resultados</div>
  <div class="panel-body">
    <div class="panel panel-default">
      <div class="panel-heading hdefault">Hoje</div>
      <div class="panel-body">
        <table class="table">
          <tr>
            <th><center>Data dos sorteios</center></th>
            <th><center>1º Sorteio</center></th>
            <th><center>2º Sorteio</center></th>
            <th><center>3º Sorteio</center></th>
            <th><center>4º Sorteio</center></th>
            <th><center>5º Sorteio</center></th>
          </tr>
          <?php
              $value = $resultadoHoje;
              echo '
              <tr'.(($key%2)?(' bgcolor="#DCDCDC"'):("")).'>
                <td><center>'.$value->get("data").'</a><center></td>
                <td><center>'.$value->get("sorteio1").'<center></td>
                <td><center>'.$value->get("sorteio2").'<center></td>
                <td><center>'.$value->get("sorteio3").'<center></td>
                <td><center>'.$value->get("sorteio4").'<center></td>
                <td><center>'.$value->get("sorteio5").'<center></td>
              </tr>
              ';
          ?>
        </table>
      </div>
    </div>
    <p>
    <div class="panel panel-default">
      <div class="panel-heading hdefault">Histórico</div>
      <div class="panel-body">
        <table class="table">
          <tr>
            <th><center>Data dos sorteios</center></th>
            <th><center>1º Sorteio</center></th>
            <th><center>2º Sorteio</center></th>
            <th><center>3º Sorteio</center></th>
            <th><center>4º Sorteio</center></th>
            <th><center>5º Sorteio</center></th>
          </tr>
          <?php
              foreach ($resultadoHisto as $key => $value) {
                echo '
                <tr'.(($key%2)?(' bgcolor="#DCDCDC"'):("")).'>
                  <td><center>'.$value->get("data").'</a><center></td>
                  <td><center>'.$value->get("sorteio1").'<center></td>
                  <td><center>'.$value->get("sorteio2").'<center></td>
                  <td><center>'.$value->get("sorteio3").'<center></td>
                  <td><center>'.$value->get("sorteio4").'<center></td>
                  <td><center>'.$value->get("sorteio5").'<center></td>
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
