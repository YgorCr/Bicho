<?php

	require_once("default.controller.php");
	require_once("models/jogador.php");

	class JogadorController extends DefaultController {

		public function all()
		{

			$res = $this->db->select("jogador");

			$jogadores = array();

			foreach ($res as $arr) {
				$jog = new Jogador();
				foreach ($arr as $key => $value) {
					$jog->set($key, $value);
				}
				$jogadores[] = $jog;
			}

			return $jogadores;
		}

		public function byId(/* int */ $id)
		{
			$res = $this->db->select("jogador", "id='".$id."'");

			$jogadores = array();

			foreach ($res as $arr) {
				$jog = new Jogador();
				foreach ($arr as $key => $value) {
					$jog->set($key, $value);
				}
				$jogadores[] = $jog;
			}

			return $jogadores[0];
		}

		public function getPremiadas($data, $tipo_da_aposta, $aposta, $sorteio)
		{
			$res = $this->db->select("jogador", "id='".$id."'");

			$jogadores = array();

			foreach ($res as $arr) {
				$jog = new Jogador();
				foreach ($arr as $key => $value) {
					$jog->set($key, $value);
				}
				$jogadores[] = $jog;
			}

			return $jogadores[0];
		}

		public function tryLogin($cpf, $senha)
		{
			$md5 = md5($senha);

			$res = $this->db->run("SELECT * FROM jogador WHERE cpf_cod='".$cpf."' AND senha='".$md5."'");

			$jogadores = array();

			foreach ($res as $arr) {
				$jog = new Jogador();
				foreach ($arr as $key => $value) {
					$jog->set($key, $value);
				}
				$jogadores[] = $jog;
			}

			return $jogadores[0];
		}

		public function create($jogador)
		{
			$all = $jogador->get("attr");
			$values = array();
			foreach ($all as &$value) {
				$values[] = $jogador->get($value);
			}

			$insert = array();
			for($i=0;$i<count($all);$i++)
			{
				if($all[$i]=="id") continue;
				$insert[$all[$i]] = $values[$i];
			}

			$this->db->insert('jogador', $insert);

			$res = $this->db->run("SELECT CURRVAL('jogador_id_seq');");

			$jogador->set("id", $res[0]["currval"]);

			return $jogador;
		}

		public function update($jogador)
		{
			$all = $jogador->get("attr");
			$values = array();
			foreach ($all as &$value) {
				$values[] = $jogador->get($value);
			}

			$insert = array();
			for($i=0;$i<count($all);$i++)
			{
				$insert[$all[$i]] = $values[$i];
			}

			return $this->db->update('jogador', $insert, "id='".$jogador->get("id")."'");

		}

		public function delete($jogador){
			return $this->db->delete('jogador', "id='".$jogador->get("id")."'");

		}
	}

?>
