<?php
declare(strict_types=1);

namespace App\Controller;

class TeachersController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Users');
	}

	public function index() {
		$teachers = $this->Teachers->find('all')->toArray();

		$this->set(compact('teachers'));
		$this->set('title', 'Lista de professores');
	}

	public function view($id = null) {
		$teacher = $this->Teachers->findById($id)->first();

		$this->set(compact('teacher'));
		$this->set('title', 'Visualizar professor');
	}

	public function add() {
		$teacher = $this->Teachers->newEmptyEntity();

		if ($this->request->is('post')) {
			$teacher = $this->Teachers->patchEntity($teacher, $this->request->getData());

			if ($this->Teachers->save($teacher)) {
				$this->Flash->success(__('O professor foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o professor, tente novamente.'));
		}

		$users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set('users', $users);
		$this->set(compact('teacher'));
		$this->set('title', 'Cadastrar professor');
	}

	public function edit($id = null) {
		$teacher = $this->Teachers->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$teacher = $this->Teachers->patchEntity($teacher, $this->request->getData());
			
			if ($this->Teachers->save($teacher)) {
				$this->Flash->success(__('O professor foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}
			
			$this->Flash->error(__('Não foi possível salvar o professor, tente novamente.'));
		}

		$users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set('users', $users);
		$this->set(compact('teacher'));
		$this->set('title', 'Alterar professor');
	}

	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$teacher = $this->Teachers->get($id);

		if ($this->Teachers->delete($teacher)) {
			$this->Flash->success(__('O professor foi excluído com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir o professor, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
