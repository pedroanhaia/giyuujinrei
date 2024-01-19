<?php
declare(strict_types=1);

namespace App\Controller;

class CoresController extends AppController {
	public function index() {
		$this->paginate = [
			'limit' => 25,
			'order' => ['Cores.id' => 'DESC'],
		];

		$cores = $this->paginate($this->Cores);

		$this->set('title', 'Lista de dojôs');
		$this->set(compact('cores'));
	}

	public function view($id = null) {
		$core = $this->Cores->get($id, [
			'contain' => [],
		]);

		$this->set('title', 'Visualizar dojô');
		$this->set(compact('core'));
	}

	public function add() {
		$core = $this->Cores->newEmptyEntity();
		if ($this->request->is('post')) {
			$core = $this->Cores->patchEntity($core, $this->request->getData());

			if ($this->Cores->save($core)) {
				$this->Flash->success(__('O dojô foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o dojô, tente novamente.'));
		}

		$this->set(compact('core'));
		$this->set('title', 'Cadastrar dojô');
	}

	public function edit($id = null) {
		$core = $this->Cores->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$core = $this->Cores->patchEntity($core, $this->request->getData());

			if ($this->Cores->save($core)) {
				$this->Flash->success(__('O dojô foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o dojô, tente novamente.'));
		}

		$this->set(compact('core'));
		$this->set('title', 'Cadastrar dojô');
	}

	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$core = $this->Cores->get($id);
		if ($this->Cores->delete($core)) {
			$this->Flash->success(__('O dojô foi excluído com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir o dojô, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
