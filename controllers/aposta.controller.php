<?php

	require_once("default.controller.php");
	require_once("models/aposta.php");
	
	class ApostaController extends DefaultController{
		
		public function all(){

			$res = $this->db->select("aposta");

			$apostas = array();

			foreach ($res as $arr) {
				$apos = new Aposta();
				foreach ($arr as $key => $value) {
					$apos->set($key, $value);
				}
				$apostas[] = $apos;
			}

			return $apostas;
		}
		
		public function byId(/* int */ $id){
			$res = $this->db->select("aposta", "id='".$id."'");

			$apostas = array();

			foreach ($res as $arr) {
				$apos = new Aposta();
				foreach ($arr as $key => $value) {
					$apos->set($key, $value);
				}
				$apostas[] = $apos;
			}

			return $apostas[0];
		}

		public function byDataApostaSorteio($data, $aposta, $sorteio, $tipo_da_aposta, $pago="nada")
		{
			if($pago === "nada"){
				$pago = "";
			}
			else{
				$pago = ($pago)?("TRUE"):("FALSE");
				$pago = " AND pago = '".$pago."'";
			}

			$sqlWhere = "data='".$data."' AND aposta = '".$aposta."' AND sorteio = '".$sorteio."' AND tipo_da_aposta = '".$tipo_da_aposta."'".$pago;
			
			$res = $this->db->select("aposta", $sqlWhere);

			$apostas = array();

			foreach ($res as $arr) {
				$apo = new Aposta();
				foreach ($arr as $key => $value) {
					$apo->set($key, $value);
				}
				$apostas[] = $apo;
			}
			
			return $apostas;
		}
		
		public function getPremiadas($data, $aposta, $sorteio)
		{
			$milhar = $aposta;
			$milharesPremiadas = $this->byDataApostaSorteio($data, $milhar, $sorteio, 2);

			$centena = substr($aposta, 1);
			$centenasPremiadas = $this->byDataApostaSorteio($data, $centena, $sorteio, 1);

			$dezena = substr($aposta, 2);
			$dezenasPremiadas = $this->byDataApostaSorteio($data, $dezena, $sorteio, 0);

			if($dezena == '00'){
				$grupo = '25';
			}
			else{
				$grupo = floor(intval($dezena)/4 + !!(intval($dezena)%4));
				$grupo = sprintf("%02d",$grupo);
			}

			$gruposPremiadas = $this->byDataApostaSorteio($data, $grupo, $sorteio, 3);

			$apostas = array_merge($milharesPremiadas, $centenasPremiadas);
			$apostas = array_merge($apostas, $dezenasPremiadas);
			$apostas = array_merge($apostas, $gruposPremiadas);

			return $apostas;
		}

		public function getPremiadasPagas($data, $aposta, $sorteio)
		{
			$milhar = $aposta;
			$milharesPremiadas = $this->byDataApostaSorteio($data, $milhar, $sorteio, 2, true);

			$centena = substr($aposta, 1);
			$centenasPremiadas = $this->byDataApostaSorteio($data, $centena, $sorteio, 1, true);

			$dezena = substr($aposta, 2);
			$dezenasPremiadas = $this->byDataApostaSorteio($data, $dezena, $sorteio, 0, true);

			if($dezena == '00'){
				$grupo = '25';
			}
			else{
				$grupo = floor(intval($dezena)/4 + !!(intval($dezena)%4));
				$grupo = sprintf("%02d",$grupo);
			}

			$gruposPremiadas = $this->byDataApostaSorteio($data, $grupo, $sorteio, 3, true);

			$apostas = array_merge($milharesPremiadas, $centenasPremiadas);
			$apostas = array_merge($apostas, $dezenasPremiadas);
			$apostas = array_merge($apostas, $gruposPremiadas);

			return $apostas;
		}

		public function getPremiadasNaoPagas($data, $aposta, $sorteio)
		{
			$milhar = $aposta;
			$milharesPremiadas = $this->byDataApostaSorteio($data, $milhar, $sorteio, 2, false);

			$centena = substr($aposta, 1);
			$centenasPremiadas = $this->byDataApostaSorteio($data, $centena, $sorteio, 1, false);

			$dezena = substr($aposta, 2);
			$dezenasPremiadas = $this->byDataApostaSorteio($data, $dezena, $sorteio, 0, false);

			if($dezena == '00'){
				$grupo = '25';
			}
			else{
				$grupo = floor(intval($dezena)/4 + !!(intval($dezena)%4));
				$grupo = sprintf("%02d",$grupo);
			}

			$gruposPremiadas = $this->byDataApostaSorteio($data, $grupo, $sorteio, 3, false);

			$apostas = array_merge($milharesPremiadas, $centenasPremiadas);
			$apostas = array_merge($apostas, $dezenasPremiadas);
			$apostas = array_merge($apostas, $gruposPremiadas);

			return $apostas;
		}

		public function byJogadorId($jogador_id){
			$res = $this->db->select("aposta", "jogador_id='".$jogador_id."' ORDER BY data DESC");

			$apostas = array();

			foreach ($res as $arr) {
				$apos = new Aposta();
				foreach ($arr as $key => $value) {
					$apos->set($key, $value);
				}
				$apostas[] = $apos;
			}

			return $apostas;
		}

		public function byJogador($jogador)
		{
			return $this->byJogadorId($jogador->get("id"));
		}
				
		public function create($aposta){
			$all = $aposta->getCtrl("attr");
			$values = array();
			foreach ($all as &$value) {
				$values[] = $aposta->getCtrl($value);
			}

			$insert = array();
			for($i=0;$i<count($all);$i++){
				if($all[$i]=="id" || $all[$i]=="pago" || $all[$i]=="premiada") continue;
				if($all[$i] == "data"){
					$res = $this->db->select("resultados", "", "", "max(data)");
					$res = $res[0]['max'];
					if(date('Y-m-d') == $res){
						$insert[$all[$i]] = date('Y-m-d', strtotime($res." +1 day"));
					}
					continue;
				}
				$insert[$all[$i]] = $values[$i];
			}

			$this->db->insert('aposta', $insert);

			$res = $this->db->run("SELECT CURRVAL('aposta_id_seq');");

			$aposta->set("id", $res[0]["currval"]);

			return $aposta;
		}

		public function update($aposta){
			$all = $aposta->getCtrl("attr");
			$values = array();
			foreach ($all as &$value) {
				if($value == "pago" || $value == "premiada"){
					$values[] = ($aposta->getCtrl($value))?("TRUE"):("FALSE");
					continue;	
				}
				$values[] = $aposta->getCtrl($value);
			}

			$insert = array();
			for($i=0;$i<count($all);$i++){
				$insert[$all[$i]] = $values[$i];
			}

			return $this->db->update('aposta', $insert, "id='".$aposta->getCtrl("id")."'");

		}

		public function delete($aposta){
			return $this->db->delete('aposta', "id='".$aposta->getCtrl("id")."'");

		}
	}

?>

