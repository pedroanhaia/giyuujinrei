<?php
declare(strict_types=1);

namespace App\Controller;

class SchedulesController extends AppController {
	public function initialize(): void {
		parent::initialize();
		$this->loadModel('Cores');
	}

	public function index() {
		$schedules = $this->Schedules->find()
			->contain(['Cores' => ['fields' => ['name']]])
		->toArray();

		$this->set(compact('schedules'));
		$this->set('title', 'Lista de agendamentos');
	}

	public function view($id = null) {
		$schedule = $this->Schedules->findById($id)
			->contain(['Cores' => ['fields' => ['name']]])
		->first();

		$this->set(compact('schedule'));
		$this->set('title', 'Visualizar agendamento');
	}

	public function add() {
		$schedule = $this->Schedules->newEmptyEntity();
		if ($this->request->is('post')) {
			$schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());

			if ($this->Schedules->save($schedule)) {
				$this->Flash->success(__('O agendamento foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o agendamento, tente novamente'));
		}

		$cores = $this->Cores->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set('cores', $cores);
		$this->set(compact('schedule'));
		$this->set('title', 'Cadastrar agendamento');
	}

	public function edit($id = null) {
		$schedule = $this->Schedules->get($id, [
			'contain' => [],
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());
			
			if ($this->Schedules->save($schedule)) {
				$this->Flash->success(__('O agendamento foi salvo com sucesso.'));
				return $this->redirect(['action' => 'index']);
			}

			$this->Flash->error(__('Não foi possível salvar o agendamento, tente novamente'));
		}

		$cores = $this->Cores->find('list', ['keyField' => 'id', 'valueField' => 'name'])->order(['name ASC'])->toArray();

		$this->set('cores', $cores);
		$this->set(compact('schedule'));
		$this->set('title', 'Alterar agendamento');
	}

	public function delete($id = null) {
		$this->request->allowMethod(['post', 'delete']);
		$schedule = $this->Schedules->get($id);

		if ($this->Schedules->delete($schedule)) {
			$this->Flash->success(__('O agendamento foi excluído com sucesso.'));
		} else {
			$this->Flash->error(__('Não foi possível excluir o agendamento, tente novamente'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
