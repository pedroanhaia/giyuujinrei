<?php
declare(strict_types=1);

namespace App\Controller;

class RelatoriosController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Assessment');
		$this->loadModel('Cores');
		$this->loadModel('Classes');
	}
	
	public function index() {
		$this->set('title', 'Relatórios');
	}

	public function destaques() {
		$mes = date('m');
		$ano = date('Y');
		$idcore = 0;
		$idclass = 0;

		if (!empty($this->request->getQuery())) {
			$mes = $this->request->getQuery('mes');
			$ano = $this->request->getQuery('ano');
			$idcore = $this->request->getQuery('idcore');
			$idclass = $this->request->getQuery('idclass');
		}
		
		$destaquesMes = $this->Assessment->destaquesMes($mes, $ano, $idcore, $idclass);
		$strMes = strMes($mes);
		$cores = [0 => 'Todos'] + $this->Cores->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$classes = [0 => 'Todas'] + $this->Classes->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['idcore' => $idcore])->order(['name ASC'])->toArray();
		
		$this->set(compact('destaquesMes', 'strMes', 'mes', 'ano', 'cores', 'idcore', 'idclass', 'classes'));
		$this->set('title', "Destaques $strMes/$ano");
	}
}
