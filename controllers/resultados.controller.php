<?php

	require_once("default.controller.php");
	require_once("models/resultados.php");
	
	class ResultadosController extends DefaultController{
		
		public function all(){

			$res = $this->db->select("resultados");

			$resultados = array();

			foreach ($res as $arr) {
				$resu = new Resultados();
				foreach ($arr as $key => $value) {
					$resu->set($key, $value);
				}
				$resultados[] = $resu;
			}

			return $resultados;
		}

		public function byData(/* int */ $data){
			$res = $this->db->select("resultados", "data='".$data."'");

			$resultados = array();

			foreach ($res as $arr) {
				$resu = new Resultados();
				foreach ($arr as $key => $value) {
					$resu->set($key, $value);
				}
				$resultados[] = $resu;
			}

			return $resultados[0];
		}

		public function byDataExcept(/* int */ $data){
			$res = $this->db->select("resultados", "data != '".$data."' order by data desc");

			$resultados = array();

			foreach ($res as $arr) {
				$resu = new Resultados();
				foreach ($arr as $key => $value) {
					$resu->set($key, $value);
				}
				$resultados[] = $resu;
			}

			return $resultados;
		}

		public function byId(/* int */ $id){
			$res = $this->db->select("resultados", "id='".$id."'");

			$resultados = array();

			foreach ($res as $arr) {
				$resu = new Resultados();
				foreach ($arr as $key => $value) {
					$resu->set($key, $value);
				}
				$resultados[] = $resu;
			}

			return $resultados[0];
		}

		public function byJogadorId($jogador_id){
			$res = $this->db->select("resultados", "jogador_id='".$jogador_id."' ORDER BY data DESC");

			$resultados = array();

			foreach ($res as $arr) {
				$resu = new Resultados();
				foreach ($arr as $key => $value) {
					$resu->set($key, $value);
				}
				$resultados[] = $resu;
			}

			return $resultados;
		}

		public function byJogador($jogador)
		{
			return $this->byJogadorId($jogador->get("id"));
		}
		
		public function create($resultado){
			$all = $resultado->get("attr");
			$values = array();
			foreach ($all as &$value) {
				$values[] = $resultado->get($value);
			}

			$insert = array();
			for($i=0;$i<count($all);$i++){
				if($all[$i]=="id" || $all[$i]=="data") continue;
				$insert[$all[$i]] = $values[$i];
			}

			$this->db->insert('resultados', $insert);

			$res = $this->db->run("SELECT CURRVAL('resultados_id_seq');");

			$resultado->set("id", $res[0]["currval"]);

			return $resultado;
		}

		public function update($resultado){
			$all = $resultado->get("attr");
			$values = array();
			foreach ($all as &$value) {
				$values[] = $resultado->get($value);
			}

			$insert = array();
			for($i=0;$i<count($all);$i++){
				$insert[$all[$i]] = $values[$i];
			}

			return $this->db->update('resultados', $insert, "id='".$resultado->get("id")."'");

		}

		public function delete($resultado){
			return $this->db->delete('resultados', "id='".$resultado->get("id")."'");

		}
	}

?>

