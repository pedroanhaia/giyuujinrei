<?php
declare(strict_types=1);

namespace App\Controller;

class TeachersController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Users');
	}

	public function index() {
		$teachers = $this->Teachers->findByInactive(0)->toArray();
		$inactiveTeachers = $this->Teachers->findByInactive(1)->toArray();

		$this->set(compact('teachers', 'inactiveTeachers'));
		$this->set('title', 'Lista de professores');
	}

	public function view($id = null) {
		$teacher = $this->Teachers->findById($id)
			->contain(['Users' => ['fields' => ['name', 'id']]])
		->first();

		$this->set(compact('teacher'));
		$this->set('title', 'Visualizar professor');
	}

	public function add() {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$teacher = $this->Teachers->newEmptyEntity();

		if ($this->request->is('post')) {
			$teacher = $this->Teachers->patchEntity($teacher, $this->request->getData());

			if ($this->Teachers->save($teacher)) {
				$this->Flash->success(__('O professor foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o professor, tente novamente.'));
		}

		$users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['role >=' => C_RoleProfessor])->order(['name ASC'])->toArray();

		$this->set('users', $users);
		$this->set(compact('teacher'));
		$this->set('title', 'Cadastrar professor');
	}

	public function edit($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$teacher = $this->Teachers->get($id);
		
		if ($this->request->is(['patch', 'post', 'put'])) {
			$teacher = $this->Teachers->patchEntity($teacher, $this->request->getData());
			
			if ($this->Teachers->save($teacher)) {
				$this->Flash->success(__('O professor foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}
			
			$this->Flash->error(__('Não foi possível salvar o professor, tente novamente.'));
		}

		$users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['role >=' => C_RoleProfessor])->order(['name ASC'])->toArray();

		$this->set('users', $users);
		$this->set(compact('teacher'));
		$this->set('title', 'Alterar professor');
	}

	public function delete($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$teacher = $this->Teachers->get($id);

		if ($this->Teachers->delete($teacher)) {
			$this->Flash->success(__('O professor foi excluído com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir o professor, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
