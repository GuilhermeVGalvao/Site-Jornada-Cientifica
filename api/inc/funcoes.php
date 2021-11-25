<?php

	// Gera um erro e para a execução
	function erro($error_describe, $error_code){

		// configura erro
		$erro['error'] = $error_describe;
		$erro['code'] = $error_code;
		
		// mostra json
		show($erro);

	}

	// Retorna sucesso
	function sucesso() {
		show(["status" => "OK", "code" => 200]);
	}

	// Retorna json
	function show(Array $array) {
		
		echo json_encode($array);

		// para a execução
		exit();
	}

	//funcao para verificacao de request
	function itisreally($valor) {
		if (isset($valor)) {
			if (!empty($valor)) {
				return $valor;
			}
		} 

		return false;
	}

	//medir dias de diferença entre datas
	function diff_days($datai, $datao) {
		$data_inicio = new DateTime(date("Y-m-d", strtotime($datai)));
		$data_fim = new DateTime(date("Y-m-d", strtotime($datao)));

		// Resgata diferença entre as datas
		$dateInterval = $data_inicio->diff($data_fim);
		$dias = $dateInterval->days;

		return $dias;
	}

	// medir diferença de horas para a hora atual
	function diff_horas($datai) {
		$data_inicio = new DateTime(date("Y-m-d H:i:s", strtotime($datai)));
		$data_fim = new DateTime(date("Y-m-d H:i:s"));

		// Resgata diferença entre as datas
		$dateInterval = $data_inicio->diff($data_fim);
		$horas = $dateInterval->h;

		return $horas;
	}

	//cryptografa img base64
	function cryptImg($urlimg) {
		$ext = mime_content_type($urlimg);
		return "data:$ext;base64,".base64_encode(file_get_contents($urlimg));
	}

	// mostra a semana do ano
	function semana_do_ano($dia,$mes,$ano){
		return intval(date('z', mktime(0,0,0,$mes,$dia,$ano)) / 7) + 1;
	}
	
?>