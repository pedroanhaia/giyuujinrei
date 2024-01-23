<?php
declare(strict_types=1);

namespace App\Controller;

class RelatoriosController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Assessment');
	}
	
	public function index() {
		$this->set('title', 'Relatórios');
	}

	public function destaques() {
		$mes = date('m');
		$ano = date('Y');

		if (!empty($this->request->getQuery())) {
			$mes = $this->request->getQuery('dataIni');
			$ano = $this->request->getQuery('dataFin');
		}
		
		$destaquesMes = $this->Assessment->destaquesMes($mes, $ano);
		$strMes = strMes($mes);
		
		$this->set('destaquesMes', $destaquesMes);
		$this->set('strMes', $strMes);
		$this->set('mes', $mes);
		$this->set('ano', $ano);
		$this->set('title', "Destaques $strMes/$ano");
	}
}
