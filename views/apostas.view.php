<?php
	// arquivo comum para o cabeçalho das páginas
	include("header.php");
?>

<title>Local de Apostas</title>
<script type="text/javascript" src="static/js/apostas.js"></script>

<div class="panel panel-default">
	<div class="panel-heading">Apostas</div>
	<div class="panel-body">
		<?php
			$opcao = $_POST['tipo_Aposta'];
			switch ($opcao) {
				case 'grupo':{
					echo "
						<h1>Aposta por Grupo</h1>
						<h2>Tabela de Apostas</h2>
						<form action='?a=apostas' method='POST'>
							<table class='table' border='1'>
								<tr align='center'>
									<td>1</td><td><img src='static/images/Table_bichos/avestruz.jpg' height='50' width='50'/></br>Avestruz</td><td><br><nobr>01 - 02 - 03 - 04</nobr></td><td><input type='radio' name='grupo' value='1'/></td>
									<td>2</td><td><img src='static/images/Table_bichos/aguia.gif' height='50' width='50'/></br>Aguia</td><td><br><nobr>05 - 62 - 07 - 08</nobr></td><td><input type='radio' name='grupo' value='2'/></td>
									<td>3</td><td><img src='static/images/Table_bichos/burro.jpg' height='50' width='50'/></br>Burro</td><td><br><nobr>09 - 10 - 11 - 12</nobr></td><td><input type='radio' name='grupo' value='3'/></td>
									<td>4</td><td><img src='static/images/Table_bichos/borboleta.gif' height='50' width='50'/></br>Borboleta</td><td><br><nobr>13 - 14 - 15 - 16</nobr></td><td><input type='radio' name='grupo' value='4'/></td>
								</tr>
								<tr align='center'>
									<td>5</td><td><img src='static/images/Table_bichos/cachorro.png' height='50' width='50'/></br>Cachorro</td><td><br><nobr>17 - 18 - 19 - 20</nobr></td><td><input type='radio' name='grupo' value='5'/></td>
									<td>6</td><td><img src='static/images/Table_bichos/cabra.jpg' height='50' width='50'/></br>Cabra</td><td><br><nobr>21 - 22 - 23 - 24</nobr></td><td><input type='radio' name='grupo' value='6'/></td>
									<td>7</td><td><img src='static/images/Table_bichos/carneiro.png' height='50' width='50'/></br>Carneiro</td><td><br><nobr>25 - 26 - 27 - 28</nobr></td><td><input type='radio' name='grupo' value='7'/></td>
									<td>8</td><td><img src='static/images/Table_bichos/camelo.png' height='50' width='50'/></br>Camelo</td><td><br><nobr>29 - 30 - 31 - 32</nobr></td><td><input type='radio' name='grupo' value='8' /></td>
								</tr>
								<tr align='center'>
									<td>9</td><td><img src='static/images/Table_bichos/cobra.jpg' height='50' width='50'/></br>Cobra</td><td><br><nobr>33 - 34 - 35 - 36</nobr></td><td><input type='radio' name='grupo' value='9'/></td>
									<td>10</td><td><img src='static/images/Table_bichos/coelho.png' height='50' width='50'/></br>Coelho</td><td><br><nobr>37 - 38 - 39 - 40</nobr></td><td><input type='radio' name='grupo' value='10'/></td>
									<td>11</td><td><img src='static/images/Table_bichos/cavalo.png' height='50' width='50'/></br>Cavalo</td><td><br><nobr>41 - 42 - 43 - 44</nobr></td><td><input type='radio' name='grupo' value='11'/></td>
									<td>12</td><td><img src='static/images/Table_bichos/elefante.png' height='50' width='50'/></br>Elefante</td><td><br><nobr>45 - 46 - 47 - 48</nobr></td><td><input type='radio' name='grupo' value='12'/></td>
								</tr>'
								<tr align='center'>
									<td>13</td><td><img src='static/images/Table_bichos/galo.png' height='50' width='50'/></br>Galo</td><td><br><nobr>49 - 50 - 51 - 52</nobr></td><td><input type='radio' name='grupo' value='13' /></td>
									<td>14</td><td><img src='static/images/Table_bichos/gato.png' height='50' width='50'/></br>Gato</td><td><br><nobr>53 - 54 - 55 - 56</nobr></td><td><input type='radio' name='grupo' value='14'/></td>
									<td>15</td><td><img src='static/images/Table_bichos/jacare.jpg' height='50' width='50'/></br>Jacare</td><td><br><nobr>57 - 58 - 59 - 60</nobr></td><td><input type='radio' name='grupo' value='15'/></td>
									<td>16</td><td><img src='static/images/Table_bichos/leao.jpg' height='50' width='50'/></br>Leão</td><td><br><nobr>61 - 62 - 63 - 64</nobr></td><td><input type='radio' name='grupo' value='16'/></td>
								</tr>
								<tr align='center'>
									<td>17</td><td><img src='static/images/Table_bichos/macaco.png' height='50' width='50'/></br>Macaco</td><td><br><nobr>65 - 66 - 67 - 68</nobr></td><td><input type='radio' name='grupo' value='17'/></td>
									<td>18</td><td><img src='static/images/Table_bichos/porco.png' height='50' width='50'/></br>Porco</td><td><br><nobr>69 - 70 - 71 - 72</nobr></td><td><input type='radio' name='grupo' value='18'/></td>
									<td>19</td><td><img src='static/images/Table_bichos/pavao.jpg' height='50' width='50'/></br>Pavão</td><td><br><nobr>73 - 74 - 75 - 76</nobr></td><td><input type='radio' name='grupo' value='19'/></td>
									<td>20</td><td><img src='static/images/Table_bichos/peru.png' height='50' width='50'/></br>Peru</td><td><br><nobr>77 - 78 - 79 - 80</nobr></td><td><input type='radio' name='grupo' value='20'/></td>
								</tr>
								<tr align='center'>
									<td>21</td><td><img src='static/images/Table_bichos/touro.jpg' height='50' width='50'/></br>Touro</td><td><br><nobr>81 - 82 - 83 - 84</nobr></td><td><input type='radio' name='grupo' value='21'/></td>
									<td>22</td><td><img src='static/images/Table_bichos/tigre.jpg' height='50' width='50'/></br>Tigre</td><td><br><nobr>85 - 86 - 87 - 88</nobr></td><td><input type='radio' name='grupo' value='22'/></td>
									<td>23</td><td><img src='static/images/Table_bichos/urso.jpg' height='50' width='50'/></br>Urso</td><td><br><nobr>89 - 90 - 91 - 92</nobr></td><td><input type='radio' name='grupo' value='23'/></td>
									<td>24</td><td><img src='static/images/Table_bichos/veado.jpg' height='50' width='50'/></br>Veado</td><td><br><nobr>93 - 94 - 95 - 96</nobr></td><td><input type='radio' name='grupo' value='4'/></td>
								</tr>
							</table>
							<div style='padding-left: 37%'>
								<table class='table' border='1' style='width: 278px'>
									<tr align='center'>
										<td>25</td><td><img src='static/images/Table_bichos/vaca.png' height='50' width='50'/></br>Vaca</td><td><br><nobr>97 - 98 - 99 - 00</nobr></td><td><input type='radio' name='grupo' value='25'/></td></tr>
									</tr>
								</table>
							</div>
							<div>
								<center>
									<input type='submit' value='Apostar'/>
								</center>
							</div>
						</form>";
					break;
				}

				case 'dezena':{
					echo "<h1>Aposta por Dezena</h1>
					<form action='' method=''>
						<table>
							<tr>
								<td>Defina a modalidade da jogada: </td>
								<td><input type='radio' name='modalidade' value='seca'  onchange=\"insereCampoAposta('secaDezena' , document.getElementById('campoAposta'), document.getElementById('botaoAposta'))\"/> Seca -  <img src='static/images/duvida.png' title='Apostar uma única dezena no primeiro prêmio' height='14' width='14' />
								    <input type='radio' name='modalidade' value='duque' onchange=\"insereCampoAposta('duqueDezena', document.getElementById('campoAposta'), document.getElementById('botaoAposta'))\"/> Duque - <img src='static/images/duvida.png' title='Apostar 2 dezenas. Ganha-se acertando entre o 1° e o 5° prêmio.' height='14' width='14'/>
								    <input type='radio' name='modalidade' value='terno' onchange=\"insereCampoAposta('ternoDezena', document.getElementById('campoAposta'), document.getElementById('botaoAposta'))\"/> Terno - <img src='static/images/duvida.png' title='Apostar 3 dezenas. Ganha-se se as 3 dezenas aparecerem do 1° ao 5° prêmio' height='14' width='14'/>
								</td>
							</tr>
						</table>
						<table>
							<tr>
								<td><div id='campoAposta'></div></td>
							</tr>
							<tr id='botaoAposta'></tr>
						</table>
					</form>";
					break;
				}

				case 'centena':{
					echo "<h1>Aposta por Centena</h1>
					<form action='' method=''>
						<table>
							<tr>
								<td>Defina a modalidade da jogada: </td>
								<td>
									<input type='radio' name='modalidade' value='seca' onchange=\"insereCampoAposta('secaCentena', document.getElementById('campoAposta'), document.getElementById('botaoAposta'))\"/> Seca - <img src='static/images/duvida.png' title='Apostar uma única centena no primeiro prêmio' height='14' width='14'/>
							        <input type='radio' name='modalidade' value='centena1a5' onchange=\"insereCampoAposta('centena1a5', document.getElementById('campoAposta'), document.getElementById('botaoAposta'))\"/> Uma centena do 1º ao 5º prêmio - <img src='static/images/duvida.png' title='Apostar uma única centena. Ganha-se acertando a centena em quaisquer que sejam os prêmios (entre o 1° e o 5°). O prêmio será dividido por 5.' height='14' width='14'/>
								</td>
						</table>
						<table>
							<tr>
								<td><div id='campoAposta'></div></td>
							</tr>
							<tr id='botaoAposta'></tr>
						</table> 
					</form>";
					break;
				}

				case 'milhar':{
					echo "<h1>Aposta por Milhar</h1>
					<form action='' method=''>
						<table>
							<tr>
								<td>Defina a modalidade da jogada: </td>
								<td>
									<input type='radio' name='modalidade' value='seca' onchange=\"insereCampoAposta('secaMilhar', document.getElementById('campoAposta'), document.getElementById('botaoAposta'))\"/> Seca - <img src='static/images/duvida.png' title='Apostar uma única milhar (na mesma sequência) no primeiro prêmio' height='14' width='14'/>
							        <input type='radio' name='modalidade' value='milhar1ao5' onchange=\"insereCampoAposta('milhar1a5', document.getElementById('campoAposta'), document.getElementById('botaoAposta'))\"/>  Milhar do 1° ao 5° prêmio - <img src='static/images/duvida.png' title='Apostar uma única milhar (na mesma sequência) do 1º ao 5º prêmio' height='14' width='14'/>
							        <input type='radio' name='modalidade' value='combinadaSeca' onchange=\"insereCampoAposta('milharCombinada', document.getElementById('campoAposta'), document.getElementById('botaoAposta'))\"/> Combinada no 1º prêmio - <img src='static/images/duvida.png' title='Com qualquer combinação, no 1º prêmio, dos números presentes em sua milhar você ganha' height='14' width='14'/>
							        <input type='radio' name='modalidade' value='combinadaPremioTodos' onchange=\"insereCampoAposta('milharCombinada1a5', document.getElementById('campoAposta'), document.getElementById('botaoAposta'))\"/> Combinada do 1º ao 5º - <img src='static/images/duvida.png' title='Com qualquer combinação, do 1º ao 5º prêmio, dos números presentes em sua milhar você ganha' height='14' width='14'/>
								</td>
							</tr>
						</table>
						<table>
							<tr>
								<td><div id='campoAposta'></div></td>
							</tr>
							<tr id='botaoAposta'></tr>
						</table>
					</form>";
					break;
				}

				default:{
					echo "<h1>Escolha o tipo de aposta</h1>
					<form action='?a=apostas' method='POST'>
						<table>
							<tr>
								<th>Tipo de Aposta</th><th>Apostar</th>
							</tr>
							<tr>
								<th>Grupo</th>
								<th><input type='radio' name='tipo_Aposta' value='grupo'/></th>
								<td><img src='static/images/duvida.png' title='Neste tipo de aposta você escolherá um grupo que corresponde um determinado animal' height='14' width='14'/></td>
							</tr>
							<tr>
								<th>Dezena</th>
								<th><input type='radio' name='tipo_Aposta' value='dezena'/></th>
								<td><img src='static/images/duvida.png' title='Escolha uma moalidade de aposta para dezena' height='14' width='14'/></td>
							</tr>
							<tr>
								<th>Centena</th>
								<th><input type='radio' name='tipo_Aposta' value='centena'/></th>
								<td><img src='static/images/duvida.png' title='Escolha uma moalidade de aposta para centena' height='14' width='14'/></td>
							</tr>
							<tr>
								<th>Milhar</th>
								<th><input type='radio' name='tipo_Aposta' value='milhar'/></th>
								<td><img src='static/images/duvida.png' title='Escolha uma moalidade de aposta para milhar' height='14' width='14'/></td>
							</tr>
							<tr>
								<th></th><th><input type='submit' value='Escolher' /></th>
							</tr>
						</table>
					</form>";
				}
			}
		?>
	</div>
</div>

<?php

	// arquivo comum para o final das páginas
	include("footer.php");

?>
