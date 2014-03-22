<?php
	/******* TESTE *********
	$comp1 = new Compra(1, 12031994, "Boleto Bancário", 1);

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

		private $attr = array("id", "data", "tipo_da_aposta", "aposta", "forma_de_pagamento", "comprador_id");
		
		public function __construct(/*$id, $data, $tipo_da_aposta, $aposta, $forma_de_pagamento, $jogador_id*/){
			$args = func_get_args();
			$numArgs = func_num_args();

			if($numArgs >= 4){
				foreach ($this->attr as $key => $attrName) {
					if(Compra::validaCampo($attrName, $args[$key])){
						$this->$attrName = $args[$key];
					}
					else{
						throw new Exception(Compra::errorMsg($attrName), 1);
					}
				}
			}
		}

		public function get(/*string*/ $attrName){
			return $this->$attrName;
		}

		public function set($attrName, $attrValue){
			if(Compra::validaCampo($attrName, $attrValue)){
				$this->$attrName = $attrValue;
			}
			else{
				throw new Exception(Compra::errorMsg($attrName), 1);
			}
		}

		private static function validaCampo($attrName, $attrValue){
			$attrValue = print_r($attrValue, true);
			$tam = strlen($attrValue);

			switch ($attrName) {
				case 'id':
					return $tam != 0;

				case 'data':			
					list ($ano, $mes, $dia) = split ('[/.-]', $attrValue);
					return checkdate($mes, $dia, $ano);

				case 'tipo_da_aposta':
					return is_numeric($attrValue) && ((int)$attrValue) < 5 && ((int)$attrValue) >=0;

				case 'aposta':
					switch ($this->tipo_da_aposta) {
						case '0':
						case  0 :
							return is_numeric($attrValue) && strlen($attrValue) == 2;
						
						case '1':
						case  1 :
							return is_numeric($attrValue) && strlen($attrValue) == 3;
						
						case '2':
						case  2 :
							return is_numeric($attrValue) && strlen($attrValue) == 4;
						
						default:
							return false;
					}

				case 'forma_de_pagamento':
					return $attrValue == '0' || $attrValue == '1';

				case 'jogador_id':
					return (is_numeric($attrValue));
					
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
					return 'O campo "'.$attrName.'" é obrigatório. Por favor, tente novamente.';

				default:
					return "Erro de validação. Atributo com erro: ".$attrName;

			}
		}
	}
?>
