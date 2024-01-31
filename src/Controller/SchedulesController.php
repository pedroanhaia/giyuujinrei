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
			->contain([
				'Cores' => ['fields' => ['name']],
				'Classes' => ['fields' => ['name']]
			])
			->where(['Schedules.role' => C_ScheduleRoleAvaliacao])
		->toArray();

		$this->set(compact('schedules'));
		$this->set('title', 'Lista de agendamentos');
	}

	public function view($id = null) {
		$schedule = $this->Schedules->findById($id)
			->contain([
				'Cores' => ['fields' => ['name']],
				'Classes' => ['fields' => ['name']]
			])
		->first();

		$this->set(compact('schedule'));
		$this->set('title', 'Visualizar agendamento');
	}

	public function add() {
		$schedule = $this->Schedules->newEmptyEntity();
		if ($this->request->is('post')) {
			$schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());
			$schedule->role = C_ScheduleRoleAvaliacao;

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
			$schedule->role = C_ScheduleRoleAvaliacao;
			
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

	public function schedulesopt() {
		if($this->request->is('ajax')) {
			$data = $this->request->getData();

			$schedules = $this->Schedules->find()
				->where([
					'role' => C_ScheduleRoleAvaliacao, 
					'idclass' => $data['idclass'],
				])
				->contain(['Assessment'])
				->select(['id', 'name', 'date'])
			->toArray();

			foreach($schedules as $key => $reg) {
				foreach($reg->assessment as $avaliacao) {
					if($avaliacao->idstudent == $data['idstudent']) unset($schedules[$key]);
					continue;
				}
			}

			$schedulesOpt = [];

			foreach($schedules as $reg) {
				$schedulesOpt[$reg->id] = $reg->name . ' - ' . date_format($reg->date, 'd/m/Y');
			}

			if(empty($schedulesOpt)) return $this->jsonResponse('Não há agendamentos disponíveis para a avaliação deste estudante, verifique os agendamentos.', 400);

			return $this->jsonResponse($schedulesOpt, 200);
		}
	}
}
