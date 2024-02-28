<?php
declare(strict_types=1);

namespace App\Controller;

class RanksController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Sports');
	}

	public function index() {
		$ranks = $this->Ranks->findByInactive(0)->contain(['Sports' => ['fields' => ['name']]])->toArray();
		$inactiveRanks = $this->Ranks->findByInactive(1)->contain(['Sports' => ['fields' => ['name']]])->toArray();

		$this->set(compact('ranks', 'inactiveRanks'));
		$this->set('title', 'Lista de graduações');
	}

	public function view($id = null) {
		$rank = $this->Ranks->findById($id)
			->contain(['Sports' => ['fields' => ['name']]])
		->first();

		$this->set(compact('rank'));
		$this->set('title', 'Visualizar graduação');
	}

	public function add() {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

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
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$rank = $this->Ranks->get($id);

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
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$rank = $this->Ranks->get($id);
		
		if ($this->Ranks->delete($rank)) {
			$this->Flash->success(__('The rank has been deleted.'));
		} else {
			$this->Flash->error(__('The rank could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
