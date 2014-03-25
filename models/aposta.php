<?php
	/******* TESTE *********
	$comp1 = new Aposta(1, 12031994, "Boleto Bancário", 1);

	$all = $comp1->get("attr");
	$comp1->set("data","mudou \o/");
	
	$testValidation = array(1, 1, 1, 1);
	$errorValues = array(null, null, null, null);
	$rightValues = array(1, 12031994, "Boleto Bancário", 1);
	foreach ($all as $key => $names) {
		$comp1->set($names, $testValidation[$key] ? ($errorValues[$key]) : ($rightValues[$key]) );
	}
	
	foreach ($all as &$value) {
		echo $comp1->get($value)."<br>";
	}
	/******* END TESTE *********/
?>

<?php
	class Aposta {
		private $id;
		private $data;
		private $tipo_da_aposta;
		private $aposta;
		private $forma_de_pagamento;
		private $jogador_id;
		private $sorteio;
		private $valor;

		private $attr = array("id", "data", "tipo_da_aposta", "aposta", "forma_de_pagamento", "jogador_id", "sorteio", "valor");
		
		public function __construct(/*$id, $data, $tipo_da_aposta, $aposta, $forma_de_pagamento, $jogador_id, $sorteio, $valor*/){
			$args = func_get_args();
			$numArgs = func_num_args();

			if($numArgs >= 4){
				foreach ($this->attr as $key => $attrName) {
					if($this->validaCampo($attrName, $args[$key])){
						$this->$attrName = $args[$key];
					}
					else{
						throw new Exception(Aposta::errorMsg($attrName), 1);
					}
				}
			}
		}

		public function get(/*string*/ $attrName){
			if($attrName == "tipo_da_aposta")
				return Aposta::getTipo($this->$attrName);
			else if($attrName == "forma_de_pagamento")
				return Aposta::getFormaDePagamento($this->$attrName);
			else if($attrName == "sorteio")
				return Aposta::getSorteio($this->$attrName);
			else if($attrName == "aposta"  && 3 == $this->tipo_da_aposta)
				return Aposta::getGrupo($this->aposta);
			else if($attrName == "valor_do_premio")
				return $this->getMultiplicador()*$this->valor;
			else
				return $this->$attrName;
		}

		public function getCtrl(/*string*/ $attrName){
			return $this->$attrName;
		}

		public function set($attrName, $attrValue){
			if($this->validaCampo($attrName, $attrValue)){
				$this->$attrName = $attrValue;
			}
			else{
				throw new Exception(Aposta::errorMsg($attrName), 1);
			}
		}

		private function validaCampo($attrName, $attrValue){
			$attrValue = print_r($attrValue, true);
			$tam = strlen($attrValue);

			switch ($attrName) {
				case 'id':
					return $tam != 0;

				case 'data':
					list ($ano, $mes, $dia) = explode('-', $attrValue);
					if(!isset($ano) || !isset($mes) || !isset($dia))
						list ($ano, $mes, $dia) = explode('/', $attrValue);
					return checkdate($mes, $dia, $ano);

				case 'tipo_da_aposta':
					return is_numeric($attrValue) && ((int)$attrValue) < 4 && ((int)$attrValue) >=0;

				case 'aposta':
					switch ($this->tipo_da_aposta) {
						case  '0':
						case   0 :
							return is_numeric($attrValue) && strlen($attrValue) == 2;
						
						case  '1':
						case   1 :
							return is_numeric($attrValue) && strlen($attrValue) == 3;
						
						case  '2':
						case   2 :
							return is_numeric($attrValue) && strlen($attrValue) == 4;
						
						case  '3':
						case   3 :
							return is_numeric($attrValue) && ((int)$attrValue) < 100 && ((int)$attrValue) >=0;

						default:
							return false;
					}

				case 'forma_de_pagamento':
					return $attrValue == '0' || $attrValue == '1';

				case 'jogador_id':
					return (is_numeric($attrValue));

				case 'valor':
					return (is_numeric($attrValue) && ((float)$attrValue) >=1.0);
				
				case 'sorteio':
					return is_numeric($attrValue) && ((int)$attrValue) < 5 && ((int)$attrValue) >=0;

				case 'attr':
					return false;

				default:
					throw new Exception("O atributo ".$attrName." não pertence a esta classe. Atributo desconhecido!", 1);
			}
		}

		private static function errorMsg($attrName){
			switch ($attrName) {
				case 'attr':
					return 'O atributo attr não deve ser modificado. Somente leitura!';

				case 'data':
				case 'forma_de_pagamento':
				case 'sorteio':
					return 'O campo "'.$attrName.'" é obrigatório. Por favor, tente novamente.';

				case 'valor':
					return "O atributo valor deve ser maior que 1 Real. Por favor, tente novamente.";

				default:
					return 'Erro de validação. Atributo com erro: "'.$attrName.'"';

			}
		}

		private static function getTipo($tipo){
			switch ($tipo) {
				case  '0':
				case   0 :
					return "Dezena";
				
				case  '1':
				case   1 :
					return "Centena";
				
				case  '2':
				case   2 :
					return "Milhar";
				case  '3':
				case   3 :
					return "Grupo";
			}
		}

		private static function getFormaDePagamento($forma){
			switch ($forma) {
				case '0':
				case  0 :
					return "Débito";
				
				case '1':
				case  1 :
					return "Crédito";
				
			}
		}

		private static function getSorteio($sorteio){
			switch ($sorteio) {
				case  '0':
				case   0 :
					return "1º Sorteio";
				
				case  '1':
				case   1 :
					return "2º Sorteio";
				
				case  '2':
				case   2 :
					return "3º Sorteio";
					
				case  '3':
				case   3 :
					return "4º Sorteio";
					
				case  '4':
				case   4 :
					return "5º Sorteio";
			}
		}

		private static function getGrupo($num){
			$num = print_r($num, true);
			switch ($num) {
				case '1':
					return 'Avestruz';

				case '2':
					return 'Aguia';

				case '3':
					return 'Burro';

				case '4':
					return 'Borboleta';

				case '5':
					return 'Cachorro';

				case '6':
					return 'Cabra';

				case '7':
					return 'Carneiro';

				case '8':
					return 'Camelo';

				case '9':
					return 'Cobra';

				case '10':
					return 'Coelho';

				case '11':
					return 'Cavalo';

				case '12':
					return 'Elefante';

				case '13':
					return 'Galo';

				case '14':
					return 'Gato';

				case '15':
					return 'Jacare';

				case '16':
					return 'Leão';

				case '17':
					return 'Macaco';

				case '18':
					return 'Porco';

				case '19':
					return 'Pavão';

				case '20':
					return 'Peru';

				case '21':
					return 'Touro';

				case '22':
					return 'Tigre';

				case '23':
					return 'Urso';

				case '24':
					return 'Veado';

				case '25':
					return 'Vaca';
			}

		}

		public static function getDezenasGrupo($num){
			$num = print_r($num, true);
			$num = intval($num);

			$retorno  = array();
			if($num != 25)
				for($i = 3; $i >= 0 ; $i--){
					$retorno[$i] = sprintf("%02d",$num * 4 - $i);
				}
			else
				$retorno = array('97', '98', '99', '00');

			return $retorno;
		}

		private function getMultiplicador(){
			switch ($this->tipo_da_aposta) {
				case '0':
				case  0 :
					return 80;
					break;

				case '1':
				case  1 :
					return 500;
					break;

				case '2':
				case  2 :
					return 4000;
					break;

				case '3':
				case  3 :
					return 15;
					break;
			}
		}
	}
?>
