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
    header("location:?a=admin");

  $resuCtr = new ResultadosController($db);
  $resultados = $resuCtr->All();
?>

<div class="panel panel-default">
  <div class="panel-heading">Resultados</div>
  <div class="panel-body">
    <a href="?a=admin">
      <button type="button" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-chevron-left"></span> Voltar
      </button>
    </a>

    <p>

    <div class="panel panel-default">
      <div class="panel-heading hdefault">Minhas apostas</div>
      <div class="panel-body">
        <table class="table">
          <tr>
            <th><center>Data da aposta</center></th>
            <th><center>1º Sorteio</center></th>
            <th><center>2º Sorteio</center></th>
            <th><center>3º Sorteio</center></th>
            <th><center>4º Sorteio</center></th>
            <th><center>5º Sorteio</center></th>
          </tr>
          <?php
            foreach ($resultados as $key => $value) {
              echo '
              <tr'.(($key%2)?(' bgcolor="#DCDCDC"'):("")).'>
                <td><center><a href="?a=resultado&id='.$value->get("id").'">'.$value->get("data").'</a><center></td>
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
