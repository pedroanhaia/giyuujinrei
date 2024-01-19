<?php
	require_once (ROOT . DS . 'Vendor' . DS  . 'BetelPackages' . DS . 'Constants.php');

	// Retorna a estrutura correta para a legenda do eCharts. Exemplo: 'Item A', 'Item B'
	// Parâmetros:
	//  $array = Deve ser o array com os dados (Ex: [0] => 'id' => 1, 'nome' => 'Grid', 'qtde' => 3).
	//  $columnLegend = Deve conter o nome da coluna que será utilizada ('nome').
	function eChartsLegend($array, $columnLegend){
		$eChartsLegend = "";

		foreach($array as $key => $item) {
			if(isset($item['qtd'])) $eChartsLegend .= "'" . $item[$columnLegend] . " (" . $item['qtd'] . ")', ";
			else $eChartsLegend .= "'" . $item[$columnLegend] . "', ";
		}
		// debug($eChartsLegend);

		return substr($eChartsLegend, 0, -2);
	}

	// Retorna a estrutura correta para os valores do eChart. Exemplo: {value:5, name:'CLIENTE A'}, {value:1, name:'CLIENTE B'}
	// Parâmetros:
	//  $array = Deve ser o array com os dados (Ex: [0] => 'id' => 1, 'nome' => 'CLIENTE A', 'qtde' => 5).
	//  $columnName = Deve conter o nome da coluna que será utilizada para o campo 'name' (Ex: razaosocial).
	//  $columnValue = Deve conter o nome da coluna que será utilizada para o campo 'value' (Ex: qtde).
	function eChartsValue($array, $columnName, $columnValue) {
		$eChartsValue = "";

		foreach($array as $key => $item) {
			if(isset($item['qtd'])) $eChartsValue .= "{value:" . $item[$columnValue] . ", name:" . "'" . $item[$columnName] . " (" . $item['qtd'] . ")'}, ";
			else $eChartsValue .= "{value:" . $item[$columnValue] . ", name:" . "'" . $item[$columnName] . "'}, ";
		}

		return substr($eChartsValue, 0, -2);
	}

	// Retorna o valor mais alto do array (o array já deve estar ordenado por ordem decrescente).
	function eChartsMaxValue($array, $columnValue) {
		return sizeof($array) > 0 ? $array[0][$columnValue] : 0;
	}

	function eChartsValueBar($array, $columnName) {
		$eChartsValueBar = "";

		foreach($array as $key => $item) {
			$eChartsValueBar .= $item[$columnName] . ', ';
		}

		return substr($eChartsValueBar, 0, -2);
	}

	function eChartsSeriesBar($array, $columnName) {
		if(empty($columnName)) $columnName = 'tempo'; 

		$eChartsSeriesBar = "";

		foreach($array as $key => $item) {
			$eChartsSeriesBar .= "{
				type: 'bar',
				emphasis: { focus: 'series' },
				universalTransition: true,
				animationDurationUpdate: 1000,
				label: {
					show: true,
					position: 'top',
					formatter: function (params) { return '". HorasMinutosSegundosSimples($item[$columnName])."';}
				},
			},";
		};

		return substr($eChartsSeriesBar, 0, -1);
	}

	function eChartsSeriesBarCicloMedio($array) {
		$eChartsSeriesBar = [];

		foreach($array as $key => $item) {
			if($item != 'Tempo' && $key !== 'Takttime') {
				$eChartsSeriesBar[] = [
					'type' => 'bar',
					'emphasis' => ['focus' => 'series'],
					'universalTransition' => true,
					'animationDurationUpdate' => 1000,
					'label' => [
						'show' => true,
						'position' => 'top',
						'formatter' => MinutosSegundosSimples($item),
					],
				];
			} else if($key === 'Takttime') {
				$eChartsSeriesBar[] = [
					'name' => 'Takt time',
					'type' => 'line',
					'emphasis' => ['focus' => 'series'],
					'universalTransition' => true,
					'animationDurationUpdate' => 1000,
					'label' => [
						'show' => true,
						'position' => 'top',
						'formatter' => MinutosSegundosSimples($item),
					],
				];
			}
		};

		return $eChartsSeriesBar;
	}

	function eChartsBarCicloMedio($array, $takttime) {
		$xAxisData = [''];
		$seriesData = [];
		$seriesData[] = ['value' => 0, 'itemStyle' => ['color' => 'white']];
		$takttimeData = [$takttime];

		foreach($array as $key => $item) {
			$xAxisData[] = $key;
			$seriesData[] = ['value' => $item, 'itemStyle' => ['color' => sprintf('#%06X', mt_rand(0, 0XFFFFFF))]];
			$takttimeData[] = $takttime;
		};

		$seriesData[] = ['value' => 0, 'itemStyle' => ['color' => 'white']];
		$takttimeData[] = $takttime;
		$xAxisData[] = '';

		$seriesData = array_values($seriesData);
		$takttimeData = array_values($takttimeData);
		$xAxisData = array_values($xAxisData);

		$xAxis = [
			'type' => 'category',
			'data' => $xAxisData,
			'axisPointer' => 'shadow',
		];

		$series = [
			[
				'name' => 'Tempo',
				'type' => 'bar',
				'data' => $seriesData,
			],
			[
				'name' => 'Takt Time',
				'type' => 'line',
				'data' => $takttimeData,
			],
		];

		return [
			'series' => $series,
			'xAxis' => $xAxis,
		];
	}

	function eChartsSeriesBarMotivosParadas($array) {
		$eChartsSeriesBar = [];

		foreach($array as $key => $item) {
			if($key != $item) {
				$eChartsSeriesBar[] = [
					'type' => 'bar',
					'emphasis' => ['focus' => 'series'],
					'universalTransition' => true,
					'animationDurationUpdate' => 1000,
					'label' => [
						'show' => true,
						'position' => 'top',
						'formatter' => MinutosSegundosSimples($item['tempo']),
					],
				];
			}
		};

		return $eChartsSeriesBar;
	}

	function eChartsSeriesBarRefugosMotivos($array) {
		$eChartsSeriesBar = [];

		foreach($array as $key => $item) {
			if($key != $item) {
				$eChartsSeriesBar[] = [
					'type' => 'bar',
					'emphasis' => ['focus' => 'series'],
					'universalTransition' => true,
					'animationDurationUpdate' => 1000,
					'label' => [
						'show' => true,
						'position' => 'top',
						'formatter' => $item['qtd'],
					],
				];
			}
		};

		return $eChartsSeriesBar;
	}

	function eChartsStatusHoraLabel($horaIni, $horaFinal, $arrSize) {
		$eChartsLabel = [];

		for ($j = 1; $j <= $arrSize ; $j++) {
			$eChartsLabel[] = $horaIni;
			$horaIni = date("H:i",strtotime($horaIni) + 3600);
		}

		return $eChartsLabel;
	}

	function eChartsTopParadasTipo($array) {
		$somaPx = count($array) > 6 ? 8 : 15;
		$somaMax = count($array) > 8 ? 10 : 15;
		$return['620px'] = round(count($array) / 3 * 8.4) + $somaPx;
		$return['978px'] = round(count($array) / 4 * 8.4) + $somaPx;
		$return['1400px'] = round(count($array) / 5 * 8.4) + $somaPx;
		$return['max'] = round(count($array) / 8 * 8.4) + $somaMax;

		return $return;
	}

	function eChartsParadasMotivosCor($array) {
		$return = [];
		foreach($array as $reg) 
			$return[] = !isset($reg['cor']) ? '#428EFF': $reg['cor'];

		return $return;
	}
?>
