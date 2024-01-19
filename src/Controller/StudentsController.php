<?php
declare(strict_types=1);

namespace App\Controller;

class StudentsController extends AppController {
	public function index() {
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

		$this->set(compact('student'));
		$this->set('title', 'Cadastrar estudante');
	}

	public function edit($id = null) {
		$student = $this->Students->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$student = $this->Students->patchEntity($student, $this->request->getData());

			if ($this->Students->save($student)) {
				$this->Flash->success(__('O estudante foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvr o estudante, tente novamente.'));
		}

		$this->set(compact('student'));
		$this->set('title', 'Alterar estudante');
	}

	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$student = $this->Students->get($id);

		if ($this->Students->delete($student)) {
			$this->Flash->success(__('O estudante foi excluído com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir o estudante, tente novamente.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
