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
			$all = $aposta->get("attr");
			$values = array();
			foreach ($all as &$value) {
				$values[] = $aposta->getCtrl($value);
			}

			$insert = array();
			for($i=0;$i<count($all);$i++){
				if($all[$i]=="id" || $all[$i]=="data") continue;
				$insert[$all[$i]] = $values[$i];
			}

			$this->db->insert('aposta', $insert);

			$res = $this->db->run("SELECT CURRVAL('aposta_id_seq');");

			$aposta->set("id", $res[0]["currval"]);

			return $aposta;

		}

		public function update($aposta){
			$all = $aposta->get("attr");
			$values = array();
			foreach ($all as &$value) {
				$values[] = $aposta->get($value);
			}

			$insert = array();
			for($i=0;$i<count($all);$i++){
				$insert[$all[$i]] = $values[$i];
			}

			return $this->db->update('aposta', $insert, "id='".$aposta->get("id")."'");

		}

		public function delete($aposta){
			return $this->db->delete('aposta', "id='".$aposta->get("id")."'");

		}
	}

?>

