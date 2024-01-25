<?php
declare(strict_types=1);

namespace App\Controller;

class IndexesController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Ratings');
	}

	public function index() {
		$indexes = $this->Indexes->find()
			->contain(['Ratings' => ['fields' => ['name']]])
		->toArray();

		$this->set(compact('indexes'));
		$this->set('title', 'Lista de índices');
	}

	public function view($id = null) {
		$index = $this->Indexes->findById($id)
			->contain(['Ratings' => ['fields' => ['name']]])
		->first();

		$this->set(compact('index'));
		$this->set('title', 'Visualizar índice');
	}

	public function add() {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$index = $this->Indexes->newEmptyEntity();

		if ($this->request->is('post')) {
			$index = $this->Indexes->patchEntity($index, $this->request->getData());
			
			if ($this->Indexes->save($index)) {
				$this->Flash->success(__('O índice foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o índice, tente novamente.'));
		}

		$ratings = $this->Ratings->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set('ratings', $ratings);
		$this->set(compact('index'));
		$this->set('title', 'Cadastrar índice');
	}

	public function edit($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$index = $this->Indexes->get($id, [
			'contain' => [],
		]);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$index = $this->Indexes->patchEntity($index, $this->request->getData());

			if ($this->Indexes->save($index)) {
				$this->Flash->success(__('O índice foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o índice, tente novamente.'));
		}
		
		$ratings = $this->Ratings->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set(compact('index'));
		$this->set('ratings', $ratings);
		$this->set('title', 'Alterar índice');
	}

	public function delete($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$index = $this->Indexes->get($id);

		if ($this->Indexes->delete($index)) {
			$this->Flash->success(__('O índice foi excluído com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir o índice, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}

	public function indexesbyrating($idrating) {
		if($this->request->is('ajax')) {
			$indexes = $this->Indexes->findByIdrating($idrating)->select(['id', 'name'])->toArray();
			return $this->jsonResponse($indexes, 200);
		}
	}
}
