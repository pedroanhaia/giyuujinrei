<?php
declare(strict_types=1);

namespace App\Controller;

class RatingsController extends AppController {
	public function index() {
		$ratings = $this->Ratings->findByInactive(0)->toArray();
		$inactiveRatings = $this->Ratings->findByInactive(1)->toArray();

		$this->set(compact('ratings', 'inactiveRatings'));
		$this->set('title', 'Lista de áreas');
	}

	public function view($id = null) {
		$rating = $this->Ratings->findById($id) ->first();

		$this->set(compact('rating'));
		$this->set('title', 'Visualizar área');
	}

	public function add() {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$rating = $this->Ratings->newEmptyEntity();

		if ($this->request->is('post')) {
			$rating = $this->Ratings->patchEntity($rating, $this->request->getData());
			
			if ($this->Ratings->save($rating)) {
				$this->Flash->success(__('A área foi salva com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}
			
			$this->Flash->error(__('Não foi possível salvar a área, tente novamente.'));
		}

		$this->set(compact('rating'));
		$this->set('title', 'Cadastrar área');
	}

	public function edit($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$rating = $this->Ratings->get($id);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$rating = $this->Ratings->patchEntity($rating, $this->request->getData());
		
			if ($this->Ratings->save($rating)) {
				$this->Flash->success(__('A área foi salva com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar a área, tente novamente.'));
		}

		$this->set(compact('rating'));
		$this->set('title', 'Alterar área');
	}

	public function delete($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$rating = $this->Ratings->get($id);

		if ($this->Ratings->delete($rating)) {
			$this->Flash->success(__('A área foi excluída com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir a área, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
