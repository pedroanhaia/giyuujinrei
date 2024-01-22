<?php
declare(strict_types=1);

namespace App\Controller;

class ResponsibleController extends AppController {
	public function index() {
		$this->paginate = [
			'limit' => 25,
			'order' => ['Responsible.id' => 'DESC'],
		];

		$responsibles = $this->paginate($this->Responsible);
		
		$this->set(compact('responsibles'));
		$this->set('title', 'Lista de responsáveis');
	}

	public function view($id = null) {
		$responsible = $this->Responsible->get($id, [
			'contain' => [],
		]);

		$this->set(compact('responsible'));
		$this->set('title', 'Visualizar responsável');
	}

	public function add() {
		$responsible = $this->Responsible->newEmptyEntity();
		if ($this->request->is('post')) {
			$responsible = $this->Responsible->patchEntity($responsible, $this->request->getData());

			if ($this->Responsible->save($responsible)) {
				$this->Flash->success(__('O responsável foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o responsável, tente novamente.'));
		}

		$this->set(compact('responsible'));
		$this->set('title', 'Cadastrar responsável');
	}

	public function edit($id = null) {
		$responsible = $this->Responsible->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$responsible = $this->Responsible->patchEntity($responsible, $this->request->getData());
			
			if ($this->Responsible->save($responsible)) {
				$this->Flash->success(__('O responsável foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o responsável, tente novamente.'));
		}

		$this->set(compact('responsible'));
		$this->set('title', 'Alterar responsável');
	}

	public function delete($id = null) {
		$responsible = $this->Responsible->get($id);

		if ($this->Responsible->delete($responsible)) {
			$this->Flash->success(__('O responsável foi excluído com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir o responsável, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
