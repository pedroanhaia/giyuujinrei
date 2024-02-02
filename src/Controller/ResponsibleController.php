<?php
declare(strict_types=1);

namespace App\Controller;

class ResponsibleController extends AppController {
	public function index() {
		$responsibles = $this->Responsible->find('all')->where(['inactive' => 0])->toArray();
		$inactiveResponsibles = $this->Responsible->find('all')->where(['inactive' => 1])->toArray();
		
		$this->set(compact('responsibles', 'inactiveResponsibles'));
		$this->set('title', 'Lista de responsáveis');
	}

	public function view($id = null) {
		$responsible = $this->Responsible->findById($id)
			->contain(['Users' => ['fields' => ['name', 'id']]])
		->first();

		$this->set(compact('responsible'));
		$this->set('title', 'Visualizar responsável');
	}

	public function add() {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$responsible = $this->Responsible->newEmptyEntity();
		
		if ($this->request->is('post')) {
			$responsible = $this->Responsible->patchEntity($responsible, $this->request->getData());

			if ($this->Responsible->save($responsible)) {
				$this->Flash->success(__('O responsável foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o responsável, tente novamente.'));
		}
		
		$users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['role' => C_RoleResponsável])->order(['name ASC'])->toArray();

		$this->set('users', $users);
		$this->set(compact('responsible'));
		$this->set('title', 'Cadastrar responsável');
	}

	public function edit($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}

		$responsible = $this->Responsible->get($id);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$responsible = $this->Responsible->patchEntity($responsible, $this->request->getData());
			
			if ($this->Responsible->save($responsible)) {
				$this->Flash->success(__('O responsável foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o responsável, tente novamente.'));
		}
		
		$users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['role' => C_RoleResponsável])->order(['name ASC'])->toArray();

		$this->set('users', $users);
		$this->set(compact('responsible'));
		$this->set('title', 'Alterar responsável');
	}

	public function delete($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['action' => 'index']);
		}
		
		$responsible = $this->Responsible->get($id);

		if ($this->Responsible->delete($responsible)) {
			$this->Flash->success(__('O responsável foi excluído com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir o responsável, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
