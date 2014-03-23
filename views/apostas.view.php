<!DOCTYPE html>
<html lang="pt-br">
	<head>
	    <meta charset='UTF-8' />
		<title></title>
	</head>
	<body>	
		<?php
			$opcao = $_POST['tipo_Aposta'];
			switch ($opcao) {
				case 'grupo':{
					echo "<h1>Aposta por Grupo</h1>
						  <h2>Tabela de Apostas</h2>
						  <table border='1'>
						  	<form action='' method=''>
						  	
						  	<tr><th>Grupo</th><th>Bicho</th><th>Dezenas</th><th>Apostar</th></tr>
						  	<tr align='center'><td>1</td><td><img src='../static/images/Table_bichos/avestruz.jpg' height='100' width='100'/></br>Avestruz</td><td>01 - 02 - 03 - 04</td><td><input type='radio' name='grupo' value='1'/></td></tr>
							<tr align='center'><td>2</td><td><img src='../static/images/Table_bichos/aguia.gif' height='100' width='100'/></br>Aguia</td><td>05 - 62 - 07 - 08</td><td><input type='radio' name='grupo' value='2'/></td></tr>
							<tr align='center'><td>3</td><td><img src='../static/images/Table_bichos/burro.jpg' height='100' width='100'/></br>Burro</td><td>09 - 10 - 11 - 12</td><td><input type='radio' name='grupo' value='3'/></td></tr>
							<tr align='center'><td>4</td><td><img src='../static/images/Table_bichos/borboleta.gif' height='100' width='100'/></br>Borboleta</td><td>13 - 14 - 15 - 16</td><td><input type='radio' name='grupo' value='4'/></td></tr>
							<tr align='center'><td>5</td><td><img src='../static/images/Table_bichos/cachorro.png' height='100' width='100'/></br>Cachorro</td><td>17 - 18 - 19 - 20</td><td><input type='radio' name='grupo' value='5'/></td></tr>
							<tr align='center'><td>6</td><td><img src='../static/images/Table_bichos/cabra.jpg' height='100' width='100'/></br>Cabra</td><td>21 - 22 - 23 - 24</td><td><input type='radio' name='grupo' value='6'/></td></tr>
							<tr align='center'><td>7</td><td><img src='../static/images/Table_bichos/carneiro.png' height='100' width='100'/></br>Carneiro</td><td>25 - 26 - 27 - 28</td><td><input type='radio' name='grupo' value='7'/></td></tr>
							<tr align='center'><td>8</td><td><img src='../static/images/Table_bichos/camelo.png' height='100' width='100'/></br>Camelo</td><td>29 - 30 - 31 - 32</td><td><input type='radio' name='grupo' value='8' /></td></tr>
							<tr align='center'><td>9</td><td><img src='../static/images/Table_bichos/cobra.jpg' height='100' width='100'/></br>Cobra</td><td>33 - 34 - 35 - 36</td><td><input type='radio' name='grupo' value='9'/></td></tr>
							<tr align='center'><td>10</td><td><img src='../static/images/Table_bichos/coelho.png' height='100' width='100'/></br>Coelho</td><td>37 - 38 - 39 - 40</td><td><input type='radio' name='grupo' value='10'/></td></tr>
							<tr align='center'><td>11</td><td><img src='../static/images/Table_bichos/cavalo.png' height='100' width='100'/></br>Cavalo</td><td>41 - 42 - 43 - 44</td><td><input type='radio' name='grupo' value='11'/></td></tr>
							<tr align='center'><td>12</td><td><img src='../static/images/Table_bichos/elefante.png' height='100' width='100'/></br>Elefante</td><td>45 - 46 - 47 - 48</td><td><input type='radio' name='grupo' value='12'/></td></tr>'
							<tr align='center'><td>13</td><td><img src='../static/images/Table_bichos/galo.png' height='100' width='100'/></br>Galo</td><td>49 - 50 - 51 - 52</td><td><input type='radio' name='grupo' value='13' /></td></tr>
							<tr align='center'><td>14</td><td><img src='../static/images/Table_bichos/gato.png' height='100' width='100'/></br>Gato</td><td>53 - 54 - 55 - 56</td><td><input type='radio' name='grupo' value='14'/></td></tr>
							<tr align='center'><td>15</td><td><img src='../static/images/Table_bichos/jacare.jpg' height='100' width='100'/></br>Jacare</td><td>57 - 58 - 59 - 60</td><td><input type='radio' name='grupo' value='15'/></td></tr>
							<tr align='center'><td>16</td><td><img src='../static/images/Table_bichos/leao.jpg' height='100' width='100'/></br>Leão</td><td>61 - 62 - 63 - 64</td><td><input type='radio' name='grupo' value='16'/></td></tr>
							<tr align='center'><td>17</td><td><img src='../static/images/Table_bichos/macaco.png' height='100' width='100'/></br>Macaco</td><td>65 - 66 - 67 - 68</td><td><input type='radio' name='grupo' value='17'/></td></tr>
							<tr align='center'><td>18</td><td><img src='../static/images/Table_bichos/porco.png' height='100' width='100'/></br>Porco</td><td>69 - 70 - 71 - 72</td><td><input type='radio' name='grupo' value='18'/></td></tr>
							<tr align='center'><td>19</td><td><img src='../static/images/Table_bichos/pavao.jpg' height='100' width='100'/></br>Pavão</td><td>73 - 74 - 75 - 76</td><td><input type='radio' name='grupo' value='19'/></td></tr>
							<tr align='center'><td>20</td><td><img src='../static/images/Table_bichos/peru.png' height='100' width='100'/></br>Peru</td><td>77 - 78 - 79 - 80</td><td><input type='radio' name='grupo' value='20'/></td></tr>
							<tr align='center'><td>21</td><td><img src='../static/images/Table_bichos/touro.jpg' height='100' width='100'/></br>Touro</td><td>81 - 82 - 83 - 84</td><td><input type='radio' name='grupo' value='21'/></td></tr>
							<tr align='center'><td>22</td><td><img src='../static/images/Table_bichos/tigre.jpg' height='100' width='100'/></br>Tigre</td><td>85 - 86 - 87 - 88</td><td><input type='radio' name='grupo' value='22'/></td></tr>
							<tr align='center'><td>23</td><td><img src='../static/images/Table_bichos/urso.jpg' height='100' width='100'/></br>Urso</td><td>89 - 90 - 91 - 92</td><td><input type='radio' name='grupo' value='23'/></td></tr>
							<tr align='center'><td>24</td><td><img src='../static/images/Table_bichos/veado.jpg' height='100' width='100'/></br>Veado</td><td>93 - 94 - 95 - 96</td><td><input type='radio' name='grupo' value='4'/></td></tr>
							<tr align='center'><td>25</td><td><img src='../static/images/Table_bichos/vaca.png' height='100' width='100'/></br>Vaca</td><td>97 - 98 - 99 - 00</td><td><input type='radio' name='grupo' value='25'/></td></tr>
							<tr align='center'><td></td><td></td><td></td><td><input type='submit' value='Apostar'/></td></tr>
													  	
						  	</form>
						  </table>";
					break;
				}
				
				case 'dezena':{
				    echo "<h1>Aposta por Dezena</h1>
                          <form action='' method=''>
				            <table>
				                <tr><td>Defina a modalidade da jogada: </td><td><input type='radio' name='modalidade' value='seca'/> Seca - <img src='../static/images/duvida.jpg' title='Apostar um única dezena no primeiro prêmio' height='14' width='14'/>
				                                                                <input type='radio' name='modalidade' value='terno'/> Terno - <img src='../static/images/duvida.jpg' title='Apostar 3 dezenas. Ganha-se se as 3 dezenas aparecerem do 1° ao 5° prêmio' height='14' width='14'/> 
				                                                                <input type='radio' name='modalidade' value='duque'/> Duque - <img src='../static/images/duvida.jpg' title='Apostar 2 dezenas. Ganha-se acertando entre o 1° e o 5° prêmio.' height='14' width='14'/></td></tr>
				                <tr><td>Defina o valor da Dezena: </td><td><input type='text' name='dezena'/></td></tr>
				                <tr><td></td><td><input type='submit' value='Apostar'/></td></tr>
				            </table>
				          </form>";
					break;
				}
				
				case 'centena':{
					break;
				}
				
				case 'milhar':{
					break;
				}
				
				default:{
					echo "<h1>Escolha o tipo de aposta</h1>
						  <table>
						  	<form action='apostas.view.php' method='POST'>
								<tr><th>Tipo de Aposta</th><th>Apostar</th></tr>
								<tr><th>Grupo</th><th><input type='radio' name='tipo_Aposta' value='grupo'/></tr>
								<tr><th>Dezena</th><th><input type='radio' name='tipo_Aposta' value='dezena'/></th></tr>
								<tr><th>Centena</th><th><input type='radio' name='tipo_Aposta' value='centena'/></th></tr>
								<tr><th>Milhar</th><th><input type='radio' name='tipo_Aposta' value='milhar'/></th></tr>
								<tr><th></th><th><input type='submit' value='Escolher' /></th></tr>
						  	</form>
						  </table>";
				}
					
					
			}
		?>
	</body>
</html>