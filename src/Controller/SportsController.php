<?php
declare(strict_types=1);

namespace App\Controller;

class SportsController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Ranks');
	}

	public function index() {
		$sports = $this->Sports->findByInactive(0)->toArray();
		$inactiveSports = $this->Sports->findByInactive(1)->toArray();

		$this->set(compact('sports', 'inactiveSports'));
		$this->set('title', 'Lista de esportes');
	}

	public function view($id = null) {
		$sport = $this->Sports->findById($id)->first();

		$this->set(compact('sport'));
		$this->set('title', 'Visualizar esporte');
	}

	public function add() {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$sport = $this->Sports->newEmptyEntity();

		if ($this->request->is('post')) {
			$sport = $this->Sports->patchEntity($sport, $this->request->getData());

			if ($this->Sports->save($sport)) {
				$this->Flash->success(__('O esporte foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o esporte, tente novamente.'));
		}

		$this->set(compact('sport'));
		$this->set('title', 'Cadastrar esporte');
	}

	public function edit($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$sport = $this->Sports->get($id);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$sport = $this->Sports->patchEntity($sport, $this->request->getData());
			
			if ($this->Sports->save($sport)) {
				$this->Flash->success(__('O esporte foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o esporte, tente novamente.'));
		}

		$this->set(compact('sport'));
		$this->set('title', 'Alterar esporte');
	}

	public function delete($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}
		
		$sport = $this->Sports->get($id);

		if ($this->Sports->delete($sport)) {
			$this->Flash->success(__('O esporte foi excuído com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir o esporte, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}

	public function sportsranks($idsport) {
		if($this->request->is('ajax')) {
			$ranks = $this->Ranks->findByIdsport($idsport)->select(['id', 'name'])->toArray();
			return $this->jsonResponse($ranks, 200);
		}
	}
}
