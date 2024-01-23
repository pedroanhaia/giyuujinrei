<?php
declare(strict_types=1);

namespace App\Controller;

class StudentsController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Responsible');
		$this->loadModel('Cores');
		$this->loadModel('Ranks');
		$this->loadModel('Users');
		$this->loadModel('Sports');
		$this->loadModel('Classes');
	}

	public function index() {
		$this->paginate = [
			'limit' => 25,
			'order' => ['Students.id' => 'DESC'],
			'contain' => [
				'Cores' => ['fields' => ['name']],
				'Sports' => ['fields' => ['name']],
				'Responsible' => ['fields' => ['name']],
				'Ranks' => ['fields' => ['name']],
				'Classes' => ['fields' => ['name']],
			],
		];

		$students = $this->paginate($this->Students);

		$this->set(compact('students'));
		$this->set('title', 'Lista de estudantes');
	}

	public function view($id = null) {
		$student = $this->Students->get($id, [
			'contain' => [],
		]);

		$this->set(compact('student'));
		$this->set('title', 'Visualizar estudante');
	}

	public function add() {
		$student = $this->Students->newEmptyEntity();
		if ($this->request->is('post')) {
			$student = $this->Students->patchEntity($student, $this->request->getData());

			if ($this->Students->save($student)) {
				$this->Flash->success(__('O estudante foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvr o estudante, tente novamente.'));
		}

		$responsibles = $this->Responsible->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$cores = $this->Cores->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$ranks = $this->Ranks->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$sports = $this->Sports->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set('sports', $sports);
		$this->set('users', $users);
		$this->set('ranks', $ranks);
		$this->set('cores', $cores);
		$this->set('responsibles', $responsibles);
		$this->set(compact('student'));
		$this->set('title', 'Cadastrar estudante');
	}

	public function edit($id = null) {
		$student = $this->Students->get($id);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$student = $this->Students->patchEntity($student, $this->request->getData());

			if ($this->Students->save($student)) {
                $core = $this->Cores->findById($student->idcore)->first();
				$core->cont_students++;
				$this->Cores->save($core);

				$class = $this->Classes->findById($student->idclass)->first();
				$class->count_students++;
				$this->Cores->save($class);

				$this->Flash->success(__('O estudante foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvr o estudante, tente novamente.'));
		}

		$responsibles = $this->Responsible->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$cores = $this->Cores->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$ranks = $this->Ranks->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$users = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();
		$sports = $this->Sports->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set('sports', $sports);
		$this->set('users', $users);
		$this->set('ranks', $ranks);
		$this->set('cores', $cores);
		$this->set('responsibles', $responsibles);
		$this->set(compact('student'));
		$this->set('title', 'Alterar estudante');
	}

	public function delete($id = null) {
		$student = $this->Students->get($id);

		if ($this->Students->delete($student)) {
			$this->Flash->success(__('O estudante foi excluído com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir o estudante, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
