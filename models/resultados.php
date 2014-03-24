<?php
	class Resultados {
		private $id;
		private $data;
		private $sorteio1;
		private $sorteio2;
		private $sorteio3;
		private $sorteio4;
		private $sorteio5;

		private $attr = array("id", "data", "sorteio1", "sorteio2", "sorteio3", "sorteio4", "sorteio5");
		
		public function __construct(/*$id, $data, $sorteio1, $sorteio2, $sorteio3, $sorteio4, $sorteio5*/){
			$args = func_get_args();
			$numArgs = func_num_args();

			if($numArgs >= 7){
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
				
				case 'sorteio1':
				case 'sorteio2':
				case 'sorteio3':
				case 'sorteio4':
				case 'sorteio5':
					return is_numeric($attrValue) && strlen($attrValue) == 4;
				
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
					return 'O campo "'.$attrName.'" é obrigatório. Por favor, tente novamente.';
				
				case 'sorteio1':
				case 'sorteio2':
				case 'sorteio3':
				case 'sorteio4':
				case 'sorteio5':
					return "O atributo ".$attrName."é obrigatório e deve ser preenchido com 4 caracteres numéricos. Por favor, tente novamente.";

				default:
					return 'Erro de validação. Atributo com erro: "'.$attrName.'"';

			}
		}
	}
?>
