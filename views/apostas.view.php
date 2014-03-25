<?php
	// arquivo comum para o cabeçalho das páginas
	include("header.php");
?>

<title>Local de Apostas</title>
<?php
	if(!$jogador){
		header("?a=jogador");
	}

	$tipo_da_aposta = $_POST["opcao"];
	if($tipo_da_aposta){
		$aposta = $_POST['aposta'];
		$forma_de_pagamento = $_POST['forma_de_pagamento'];
		$sorteio = $_POST['sorteio'];
		$valor = $_POST['valor'];

		switch ($tipo_da_aposta) {
			case  'dezena':
			case  "Dezena":
				$_POST["opcao"] = 0;
				break;
				
			case  'centena':
			case  "Centena":
				$_POST["opcao"] = 1;
				break;
				
			case  'milhar':
			case  "Milhar":
				$_POST["opcao"] = 2;
				break;
				
			case  'Grupo':
			case  "grupo":
				$_POST["opcao"] = 3;
				break;
		}

		$apostaCtr = new ApostaController($db);
		$novaAposta = new Aposta();
		$novaAposta->set("tipo_da_aposta", $_POST["opcao"]);
		$novaAposta->set("aposta", $aposta);
		$novaAposta->set("forma_de_pagamento", $forma_de_pagamento);
		$novaAposta->set("sorteio", $sorteio);
		$novaAposta->set("valor", $valor);
		$novaAposta->set("jogador_id", $jogador->get("id"));

		$novaAposta = $apostaCtr->create($novaAposta);
		
		echo "<div class='panel panel-default'>
			<div class='panel-heading'>Aposta realizada com sucesso!</div>
		</div>";

		echo '<meta http-equiv="refresh" content="3; url=?a=home">';
	}
	else{
?>
		<div class="panel panel-default">
			<div class="panel-heading">Apostas</div>
			<div class="panel-body">
				<?php
					$opcao = $_POST['tipo_Aposta'];
					$maxlength = 0;
					switch ($opcao) {
						case 'dezena':
							$maxlength = 2;
							break;
						
						case 'centena':
							$maxlength = 3;
							break;

						case 'milhar':
							$maxlength = 4;
							break;
					}

					if($opcao == "grupo"){
						$palpite = "
							<div class='panel panel-default'>
								<div class='panel-heading'>Grupos</div>
								<div class='panel-body'>
									<table class='table' border='1'>
										<tr align='center'>
											<td>1</td><td><img src='static/images/Table_bichos/avestruz.jpg' height='50' width='50'/></br>Avestruz</td><td><br><nobr>01 - 02 - 03 - 04</nobr></td><td><input type='radio' name='aposta' value='01'/></td>
											<td>2</td><td><img src='static/images/Table_bichos/aguia.gif' height='50' width='50'/></br>Aguia</td><td><br><nobr>05 - 62 - 07 - 08</nobr></td><td><input type='radio' name='aposta' value='02'/></td>
											<td>3</td><td><img src='static/images/Table_bichos/burro.jpg' height='50' width='50'/></br>Burro</td><td><br><nobr>09 - 10 - 11 - 12</nobr></td><td><input type='radio' name='aposta' value='03'/></td>
											<td>4</td><td><img src='static/images/Table_bichos/borboleta.gif' height='50' width='50'/></br>Borboleta</td><td><br><nobr>13 - 14 - 15 - 16</nobr></td><td><input type='radio' name='aposta' value='04'/></td>
										</tr>
										<tr align='center'>
											<td>5</td><td><img src='static/images/Table_bichos/cachorro.png' height='50' width='50'/></br>Cachorro</td><td><br><nobr>17 - 18 - 19 - 20</nobr></td><td><input type='radio' name='aposta' value='05'/></td>
											<td>6</td><td><img src='static/images/Table_bichos/cabra.jpg' height='50' width='50'/></br>Cabra</td><td><br><nobr>21 - 22 - 23 - 24</nobr></td><td><input type='radio' name='aposta' value='06'/></td>
											<td>7</td><td><img src='static/images/Table_bichos/carneiro.png' height='50' width='50'/></br>Carneiro</td><td><br><nobr>25 - 26 - 27 - 28</nobr></td><td><input type='radio' name='aposta' value='07'/></td>
											<td>8</td><td><img src='static/images/Table_bichos/camelo.png' height='50' width='50'/></br>Camelo</td><td><br><nobr>29 - 30 - 31 - 32</nobr></td><td><input type='radio' name='aposta' value='08' /></td>
										</tr>
										<tr align='center'>
											<td>9</td><td><img src='static/images/Table_bichos/cobra.jpg' height='50' width='50'/></br>Cobra</td><td><br><nobr>33 - 34 - 35 - 36</nobr></td><td><input type='radio' name='aposta' value='09'/></td>
											<td>10</td><td><img src='static/images/Table_bichos/coelho.png' height='50' width='50'/></br>Coelho</td><td><br><nobr>37 - 38 - 39 - 40</nobr></td><td><input type='radio' name='aposta' value='10'/></td>
											<td>11</td><td><img src='static/images/Table_bichos/cavalo.png' height='50' width='50'/></br>Cavalo</td><td><br><nobr>41 - 42 - 43 - 44</nobr></td><td><input type='radio' name='aposta' value='11'/></td>
											<td>12</td><td><img src='static/images/Table_bichos/elefante.png' height='50' width='50'/></br>Elefante</td><td><br><nobr>45 - 46 - 47 - 48</nobr></td><td><input type='radio' name='aposta' value='12'/></td>
										</tr>'
										<tr align='center'>
											<td>13</td><td><img src='static/images/Table_bichos/galo.png' height='50' width='50'/></br>Galo</td><td><br><nobr>49 - 50 - 51 - 52</nobr></td><td><input type='radio' name='aposta' value='13' /></td>
											<td>14</td><td><img src='static/images/Table_bichos/gato.png' height='50' width='50'/></br>Gato</td><td><br><nobr>53 - 54 - 55 - 56</nobr></td><td><input type='radio' name='aposta' value='14'/></td>
											<td>15</td><td><img src='static/images/Table_bichos/jacare.jpg' height='50' width='50'/></br>Jacare</td><td><br><nobr>57 - 58 - 59 - 60</nobr></td><td><input type='radio' name='aposta' value='15'/></td>
											<td>16</td><td><img src='static/images/Table_bichos/leao.jpg' height='50' width='50'/></br>Leão</td><td><br><nobr>61 - 62 - 63 - 64</nobr></td><td><input type='radio' name='aposta' value='16'/></td>
										</tr>
										<tr align='center'>
											<td>17</td><td><img src='static/images/Table_bichos/macaco.png' height='50' width='50'/></br>Macaco</td><td><br><nobr>65 - 66 - 67 - 68</nobr></td><td><input type='radio' name='aposta' value='17'/></td>
											<td>18</td><td><img src='static/images/Table_bichos/porco.png' height='50' width='50'/></br>Porco</td><td><br><nobr>69 - 70 - 71 - 72</nobr></td><td><input type='radio' name='aposta' value='18'/></td>
											<td>19</td><td><img src='static/images/Table_bichos/pavao.jpg' height='50' width='50'/></br>Pavão</td><td><br><nobr>73 - 74 - 75 - 76</nobr></td><td><input type='radio' name='aposta' value='19'/></td>
											<td>20</td><td><img src='static/images/Table_bichos/peru.png' height='50' width='50'/></br>Peru</td><td><br><nobr>77 - 78 - 79 - 80</nobr></td><td><input type='radio' name='aposta' value='20'/></td>
										</tr>
										<tr align='center'>
											<td>21</td><td><img src='static/images/Table_bichos/touro.jpg' height='50' width='50'/></br>Touro</td><td><br><nobr>81 - 82 - 83 - 84</nobr></td><td><input type='radio' name='aposta' value='21'/></td>
											<td>22</td><td><img src='static/images/Table_bichos/tigre.jpg' height='50' width='50'/></br>Tigre</td><td><br><nobr>85 - 86 - 87 - 88</nobr></td><td><input type='radio' name='aposta' value='22'/></td>
											<td>23</td><td><img src='static/images/Table_bichos/urso.jpg' height='50' width='50'/></br>Urso</td><td><br><nobr>89 - 90 - 91 - 92</nobr></td><td><input type='radio' name='aposta' value='23'/></td>
											<td>24</td><td><img src='static/images/Table_bichos/veado.jpg' height='50' width='50'/></br>Veado</td><td><br><nobr>93 - 94 - 95 - 96</nobr></td><td><input type='radio' name='aposta' value='4'/></td>
										</tr>
									</table>
									<div style='padding-left: 37.5%'>
										<table class='table' border='1' style='width: 278px'>
											<tr align='center'>
												<td>25</td><td><img src='static/images/Table_bichos/vaca.png' height='50' width='50'/></br>Vaca</td><td><br><nobr>97 - 98 - 99 - 00</nobr></td><td><input type='radio' name='aposta' value='25'/></td></tr>
											</tr>
										</table>
									</div>
								</div>
							</div>";
					} else{
						$palpite = "
							<div style='width: 300px'>
								<input class='form-control' type='text' maxlength='".$maxlength."' name='aposta'/>
							</div>	
							";
					}

					if(isset($_POST['tipo_Aposta'])){
						$pagina = "<h1>Aposta por ".ucfirst($opcao)."</h1>
						<form action='?a=apostas' method='POST'>
							Em que sorteio deseja jogar:
							<div style='width: 300px'>
								<table class='table'>
									<tr>
										<td><center><input type='radio' name='sorteio' value='0'/></center></td>
										<td><center> 1º Sorteio </center></td>
										<td><center><img src='static/images/duvida.png' title='Concorre no primeiro sorteio.' height='14' width='14'/></center></td>
									</tr>
									<tr>
										<td><center><input type='radio' name='sorteio' value='1'></center></td>
										<td><center>  2º Sorteio </center></td>
										<td><center><img src='static/images/duvida.png' title='Concorre no segundo sorteio.' height='14' width='14'/></center></td>
									</tr>
									<tr>
										<td><center><input type='radio' name='sorteio' value='2'/></center></td>
										<td><center> 3º Sorteio </center></td>
										<td><center><img src='static/images/duvida.png' title='Concorre no terceiro sorteio.' height='14' width='14'/></center></td>
									</tr>
									<tr>
										<td><center><input type='radio' name='sorteio' value='3'/></center></td>
										<td><center> 4º Sorteio </center></td>
										<td><center><img src='static/images/duvida.png' title='Concorre no quarto sorteio.' height='14' width='14'/></center></td>
									</tr>
									<tr>
										<td><center><input type='radio' name='sorteio' value='4'/></center></td>
										<td><center> 5º Sorteio </center></td>
										<td><center><img src='static/images/duvida.png' title='Concorre no quinto sorteio.' height='14' width='14'/></center></td>
									</tr>
								</table>
							</div>
							<div>
								<input type='hidden' name='opcao' value=".$opcao.">
								Palpite: <br>
								".$palpite."
								<br>
							</div>
							<div style='width: 300px'>
								Valor: <br>
								<input class='form-control' type='text' name='valor'/>
								<br>
								Forma de Pagamento:<br>
								<select name='forma_de_pagamento' class='form-control'>
									<option value='0'>Débito</option>
									<option value='1'>Crédito</option>
								</select>
								<br>
								<center><input class='btn btn-default' type='submit' value='APOSTAR' /></center>
							</div>
						</form>";
					}
					else {
						$pagina = "<h1>Jogar no(a)</h1>
							<form action='?a=apostas' method='POST'>
								<br>
								<div style='width: 300px'>
									<table class='table'>
										<tr>
											<th>Grupo</th>
											<td style='width:100px'><center><input type='radio' name='tipo_Aposta' value='grupo'/></center></td>
											<td><img src='static/images/duvida.png' title='Neste tipo de aposta você escolherá um grupo que corresponde um determinado animal' height='14' width='14'/></td>
										</tr>
										<tr>
											<th>Dezena</th>
											<td><center><input type='radio' name='tipo_Aposta' value='dezena'/></center></td>
											<td><img src='static/images/duvida.png' title='Escolha uma moalidade de aposta para dezena' height='14' width='14'/></td>
										</tr>
										<tr>
											<th>Centena</th>
											<td><center><input type='radio' name='tipo_Aposta' value='centena'/></center></th>
											<td><img src='static/images/duvida.png' title='Escolha uma moalidade de aposta para centena' height='14' width='14'/></td>
										</tr>
										<tr>
											<th>Milhar</th>
											<td><center><input type='radio' name='tipo_Aposta' value='milhar'/></center></td>
											<td><img src='static/images/duvida.png' title='Escolha uma moalidade de aposta para milhar' height='14' width='14'/></td>
										</tr>
									</table>
									<center>
										<input class='btn btn-default' type='submit' value='JOGAR' />
									</center>
								</div>
							</form>";
					}

					echo $pagina;
				?>
			</div>
		</div>

<?php
	}
	// arquivo comum para o final das páginas
	include("footer.php");

?>
