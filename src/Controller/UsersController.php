<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {
	public function beforeFilter(\Cake\Event\EventInterface $event) {
		parent::beforeFilter($event);
		$this->Authentication->addUnauthenticatedActions(['login']);
		$this->loadModel('Cores');
	}

	public function index() {
		$this->paginate = [
			'limit' => 25,
			'order' => ['Teachers.id' => 'DESC'],
			'contain' => ['Cores' => ['fields' => ['name']]],
		];

		$users = $this->paginate($this->Users);

		$this->set(compact('users'));
		$this->set('title', 'Lista de usuários');
	}

	public function view($id = null) {
		$user = $this->Users->get($id, [
			'contain' => [],
		]);

		$this->set(compact('user'));
		$this->set('title', 'Visualizar usuário');
	}

	public function add() {
		$user = $this->Users->newEmptyEntity();
		if ($this->request->is('post')) {
			if($this->request->getData('password') != $this->request->getData('password1')) {
				$this->Flash->error(__('As senhas informadas não conferem, tente novamente.'));
				return $this->redirect(['action' => 'add']);
			}

			$user = $this->Users->patchEntity($user, $this->request->getData());

			if ($this->Users->save($user)) {
				$this->Flash->success(__('O usuário foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o usuário, tente novamente.'));
		}

		$cores = $this->Cores->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set('cores', $cores);
		$this->set(compact('user'));
		$this->set('title', 'Cadastrar usuário');
	}

	public function edit($id = null) {
		$user = $this->Users->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			if($this->request->getData('password2') != $this->request->getData('password1')) {
				$this->Flash->error(__('As senhas informadas não conferem, tente novamente.'));
				return $this->redirect(['action' => 'add']);
			}

			$user = $this->Users->patchEntity($user, $this->request->getData());
			$user->password = $this->request->getData('password1');
			
			if ($this->Users->save($user)) {
				$this->Flash->success(__('O usuário foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o usuário, tente novamente.'));
		}

		$cores = $this->Cores->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set('cores', $cores);
		$this->set(compact('user'));
		$this->set('title', 'Salvar usuário');
	}

	public function delete($id = null) {
		$user = $this->Users->get($id);

		if ($this->Users->delete($user)) {
			$this->Flash->success(__('O usuário foi excluído com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir o usuário, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}

	public function login() {
		$this->viewBuilder()->setLayout("login");
		$this->request->allowMethod(['get', 'post']);
		$result = $this->Authentication->getResult();
		// regardless of POST or GET, redirect if user is logged in
		if ($result && $result->isValid()) {
			$this->Flash->set(__('/img/Logo5-3D.gif'),['element'=>'success_with_gif']);

			$redirect = $this->request->getQuery('redirect', [
				'controller' => 'Users',
				'action' => 'index',
			]);
			return $this->redirect($redirect);
		}

		if ($this->request->is('post') && !$result->isValid()) {
			$this->Flash->error(__('Usuário ou senha inválidos!'));
		}
	}

	public function logout() {
		$this->Authentication->logout();
		return $this->redirect(['controller' => 'Users', 'action' => 'login']);
	}

	public function atualizarDarkmode() {
		$this->autoRender = false; // Desativa a renderização automática da visão

		if ($this->request->is('ajax')) {
			$userData = $this->Authentication->getIdentity()->getOriginalData();
			$usuarioId = $userData->id; // Obtém o ID do usuário autenticado
			$darkMode = $this->request->getData('darkmode'); // Obtém o valor do campo darkmode enviado por AJAX

			$usuario = $this->Users->findById($usuarioId)->first();
			$usuario->darkmode = $darkMode;
			$this->Users->save($usuario);
			return $this->jsonResponse(['Msg' => 'Alterado com sucesso'], 200);
		}
	}
}
