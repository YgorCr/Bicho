<!DOCTYPE html>
<html lang="pt-br">
	<head>
	    <
		<title></title>
	</head>
	<body>	
		<?php
			$opcao = $_POST['tipo_Aposta'];
			switch ($opcao) {
				case 'grupo':{
					echo "<h1>Aposta por Grupo</h1>
						  <h2>Tabela de Apostas</h2>
						  <table>
						  	<form action='' method=''>
						  	
						  	<tr><th>Grupo</th><th>Bicho</th><th>Dezenas</th><th>Apostar</th></tr>
						  	<tr><td>1</td><td>Avestruz</td><td>01 - 02 - 03 - 04</td><td><input type='radio' name='grupo' value='1'/></td></tr>
							<tr><td>2</td><td>Aguia</td><td>05 - 62 - 07 - 08</td><td><input type='radio' name='grupo' value='2'/></td></tr>
							<tr><td>3</td><td>Burro</td><td>09 - 10 - 11 - 12</td><td><input type='radio' name='grupo' value='3'/></td></tr>
							<tr><td>4</td><td>Borboleta</td><td>13 - 14 - 15 - 16</td><td><input type='radio' name='grupo' value='4'/></td></tr>
							<tr><td>5</td><td>Cachorro</td><td>17 - 18 - 19 - 20</td><td><input type='radio' name='grupo' value='5'/></td></tr>
							<tr><td>6</td><td>Cabra</td><td>21 - 22 - 23 - 24</td><td><input type='radio' name='grupo' value='6'/></td></tr>
							<tr><td>7</td><td>Carneiro</td><td>25 - 26 - 27 - 28</td><td><input type='radio' name='grupo' value='7'/></td></tr>
							<tr><td>8</td><td>Camelo</td><td>29 - 30 - 31 - 32</td><td><input type='radio' name='grupo' value='8' /></td></tr>
							<tr><td>9</td><td>Cobra</td><td>33 - 34 - 35 - 36</td><td><input type='radio' name='grupo' value='9'/></td></tr>
							<tr><td>10</td><td>Coelho</td><td>37 - 38 - 39 - 40</td><td><input type='radio' name='grupo' value='10'/></td></tr>
							<tr><td>11</td><td>Cavalo</td><td>41 - 42 - 43 - 44</td><td><input type='radio' name='grupo' value='11'/></td></tr>
							<tr><td>12</td><td>Elefante</td><td>45 - 46 - 47 - 48</td><td><input type='radio' name='grupo' value='12'/></td></tr>'
							<tr><td>13</td><td>Galo</td><td>49 - 50 - 51 - 52</td><td><input type='radio' name='grupo' value='13' /></td></tr>
							<tr><td>14</td><td>Gato</td><td>53 - 54 - 55 - 56</td><td><input type='radio' name='grupo' value='14'/></td></tr>
							<tr><td>15</td><td>Jacare</td><td>57 - 58 - 59 - 60</td><td><input type='radio' name='grupo' value='15'/></td></tr>
							<tr><td>16</td><td>Leão</td><td>61 - 62 - 63 - 64</td><td><input type='radio' name='grupo' value='16'/></td></tr>
							<tr><td>17</td><td>Macaco</td><td>65 - 66 - 67 - 68</td><td><input type='radio' name='grupo' value='17'/></td></tr>
							<tr><td>18</td><td>Porco</td><td>69 - 70 - 71 - 72</td><td><input type='radio' name='grupo' value='18'/></td></tr>
							<tr><td>19</td><td>Pavão</td><td>73 - 74 - 75 - 76</td><td><input type='radio' name='grupo' value='19'/></td></tr>
							<tr><td>20</td><td>Peru</td><td>77 - 78 - 79 - 80</td><td><input type='radio' name='grupo' value='20'/></td></tr>
							<tr><td>21</td><td>Touro</td><td>81 - 82 - 83 - 84</td><td><input type='radio' name='grupo' value='21'/></td></tr>
							<tr><td>22</td><td>Tigre</td><td>85 - 86 - 87 - 88</td><td><input type='radio' name='grupo' value='22'/></td></tr>
							<tr><td>23</td><td>Urso</td><td>89 - 90 - 91 - 92</td><td><input type='radio' name='grupo' value='23'/></td></tr>
							<tr><td>24</td><td>Veado</td><td>93 - 94 - 95 - 96</td><td><input type='radio' name='grupo' value='4'/></td></tr>
							<tr><td>25</td><td>Vaca</td><td>97 - 98 - 99 - 00</td><td><input type='radio' name='grupo' value='25'/></td></tr>
							<tr><td></td><td></td><td></td><td><input type='submit' value='Apostar'/></td></tr>
													  	
						  	</form>
						  </table>";
					break;
				}
				
				case 'dezena':{
				    echo "<form action='' method=''>
				            <table>
				                <tr></tr>
				                <tr></tr>
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