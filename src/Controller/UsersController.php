<?php
declare(strict_types=1);

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {
	public function beforeFilter(\Cake\Event\EventInterface $event) {
		$this->Authentication->addUnauthenticatedActions(['login','loginapi']);
		parent::beforeFilter($event);

		$this->loadModel('Cores');
	}

	public function index() {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['controller' => 'users', 'action' => 'dashboard']);
		}

		$admins = $this->Users->find()->where(['Users.role' => C_RoleTudo, 'Users.inactive' => 1])->contain(['Cores' => ['fields' => ['name']]])->toArray();
		$teachers = $this->Users->find()->where(['Users.role' => C_RoleProfessor, 'Users.inactive' => 1])->contain(['Cores' => ['fields' => ['name']]])->toArray();
		$responsibles = $this->Users->find()->where(['Users.role' => C_RoleResponsável, 'Users.inactive' => 1])->contain(['Cores' => ['fields' => ['name']]])->toArray();
		$studentes = $this->Users->find()->where(['Users.role' => C_RoleEstudante, 'Users.inactive' => 1])->contain(['Cores' => ['fields' => ['name']]])->toArray();
		$inactive = $this->Users->find()->where(['Users.inactive' => 1])->contain(['Cores' => ['fields' => ['name']]])->toArray();

		$this->set(compact('admins', 'teachers', 'responsibles', 'studentes', 'inactive'));
		$this->set('title', 'Lista de usuários');
	}

	public function view($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['controller' => 'users', 'action' => 'dashboard']);
		}

		$user = $this->Users->findById($id)
			->contain(['Cores' => ['fields' => ['name']]])
		->first();

		$this->set(compact('user'));
		$this->set('title', 'Visualizar usuário');
	}

	public function add() {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['controller' => 'users', 'action' => 'dashboard']);
		}

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
		if($this->userObj->role < C_RoleTudo && $id != $this->userObj->id) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['controller' => 'users', 'action' => 'dashboard']);
		}

		$user = $this->Users->get($id);

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
		$this->set('title', 'Alterar usuário');
	}

	public function alterarsenha($id = null) {
		if($this->userObj->role < C_RoleTudo && $id != $this->userObj->id) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['controller' => 'users', 'action' => 'dashboard']);
		}
		
		$user = $this->Users->get($id);

		if ($this->request->is(['patch', 'post', 'put'])) {
			if($this->request->getData('password2') != $this->request->getData('password1')) {
				$this->Flash->error(__('As senhas informadas não conferem, tente novamente.'));
				return $this->redirect(['action' => 'alterarsenha', $id]);
			}

			$user = $this->Users->patchEntity($user, $this->request->getData());
			$user->password = $this->request->getData('password1');
			
			if ($this->Users->save($user)) {
				$this->Flash->success(__('A senha foi atualizada com sucesso.'));
				return $this->redirect(['action' => 'edit', $id]);
			}

			$this->Flash->error(__('Não foi possível alterar a senha, tente novamente.'));
		}

		$this->set(compact('user'));
		$this->set('title', 'Alterar senha');
	}

	public function delete($id = null) {
		if($this->userObj->role < C_RoleTudo) {
			$this->Flash->error(__('Você não possui permissão para realizar esta ação, contate um administrador.'));
			return $this->redirect(['controller' => 'users', 'action' => 'dashboard']);
		}

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
			$_SESSION['bLogin'] = true;
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

    public function loginapi() {
        $data = $this->request->getParsedBody();
        $response = $this->response->withType('application/json')->withStringBody(json_encode([$data]));

        $palavrapasse = $this->request->getData('sPasse');
        if ($palavrapasse == "adatec")
        {
            $email = $this->request->getData('sEmail');
            $senha = $this->request->getData('sSenha');
            $user = $this->Users->find()->where(['email' => $email])->first();

            if ($user != null)
            {
                if ($senha != null)
                {
                    if ((new DefaultPasswordHasher())->check($senha, $user->password)) {
                        // Autenticação bem-sucedida

                        $response = $response->withStringBody('My Body');
                        $data = [
                            'msgreturn' => 'sucesso',
                            'user' => $user
                        ];
                        $response = $this->response->withType('application/json')
                            ->withStringBody(json_encode([$data]));
                    }
                    else
                    {
                        $response = $response->withType('application/json')
                                                ->withStatus(401)
                                                ->withStringBody(json_encode(['id_erro' => '401','msg_erro' => 'senha ou e-mail incorreto.']));
                    }
                }
                else
                {
                    $response = $response->withType('application/json')
                                            ->withStatus(401)
                                            ->withStringBody(json_encode(['id_erro' => '401','msg_erro' => 'senha do usuário incorreta.']));
                }
            }
            else
            {
                $response = $response->withType('application/json')
                                            ->withStatus(401)
                                            ->withStringBody(json_encode(['id_erro' => '401','msg_erro' => 'usuário não encontrado, verifique e-mail ou cadastre uma conta.']));
                //return $response;
            }
        }

        // Retorna a resposta JSON
        return $response;
    }
}
