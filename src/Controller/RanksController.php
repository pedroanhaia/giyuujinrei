<?php
declare(strict_types=1);

namespace App\Controller;

class RanksController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Sports');
	}

	public function index() {
		$this->paginate = [
			'limit' => 25,
			'order' => ['Ranks.id' => 'DESC'],
			'contain' => [
				'Sports' => ['fields' => ['name']],
			],
		];

		$ranks = $this->paginate($this->Ranks);

		$this->set(compact('ranks'));
		$this->set('title', 'Lista de graduações');
	}

	public function view($id = null) {
		$rank = $this->Ranks->get($id, [
			'contain' => ['Sports' => ['fields' => ['name']]],
		]);

		$this->set(compact('rank'));
	}

	public function add() {
		$rank = $this->Ranks->newEmptyEntity();
		if ($this->request->is('post')) {
			$rank = $this->Ranks->patchEntity($rank, $this->request->getData());

			if ($this->Ranks->save($rank)) {
				$this->Flash->success(__('A graduação foi salva com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar a graduação, tente novamente.'));
		}

		$sports = $this->Sports->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set(compact('rank'));
		$this->set('sports', $sports);
		$this->set('title', 'Cadastrar graduação');
	}

	public function edit($id = null) {
		$rank = $this->Ranks->get($id, [
			'contain' => [],
		]);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$rank = $this->Ranks->patchEntity($rank, $this->request->getData());

			if ($this->Ranks->save($rank)) {
				$this->Flash->success(__('A graduação foi salva com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar a graduação, tente novamente.'));
		}

		$sports = $this->Sports->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set(compact('rank'));
		$this->set('sports', $sports);
		$this->set('title', 'Alterar graduação');
	}

	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$rank = $this->Ranks->get($id);
		if ($this->Ranks->delete($rank)) {
			$this->Flash->success(__('The rank has been deleted.'));
		} else {
			$this->Flash->error(__('The rank could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
